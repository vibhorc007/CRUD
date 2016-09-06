<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hauth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usermodel');
    }

    public function index() {
        $this->load->view('hauth/home');
    }

    public function login($provider = '') {

        log_message('debug', "controllers.HAuth.login($provider) called");

        try {

            log_message('debug', 'controllers.HAuth.login: loading HybridAuthLib');
            $this->load->library('HybridAuthLib');

            if ($this->hybridauthlib->providerEnabled($provider)) {

                log_message('debug', "controllers.HAuth.login: service $provider enabled, trying to authenticate.");

                $service = $this->hybridauthlib->authenticate($provider);

                if ($service->isUserConnected()) {
                    log_message('debug', 'controller.HAuth.login: user authenticated.');

                    $user_profile = $service->getUserProfile();


                    log_message('info', 'controllers.HAuth.login: user profile:' . PHP_EOL . print_r($user_profile, TRUE));

                    $data['firstname'] = $user_profile->firstName;
                    $data['lastname'] = $user_profile->lastName;
                    $data['gender'] = $user_profile->gender;
                    $data['email'] = $user_profile->email;

                    $data['file_name'] = $user_profile->photoURL;
                    $data['facebook_id'] = $user_profile->identifier;
                    $data['social_type'] = $provider;
                    $day = $user_profile->birthDay;
                    $month = $user_profile->birthMonth;
                    $year = $user_profile->birthYear;
                    $date = new Datetime($day . '-' . $month . '-' . $year);
                    $data['dob'] = $date->format('Y-m-d');
                    $fb_id = $this->usermodel->fetch_id($data['facebook_id']);

                    if (!$fb_id) {
                        $user_id = $this->usermodel->addUser($data);
                        if ($user_id) {
                            $res = $this->usermodel->getAddress($user_id); //this is used for insert access token and chek email verification code is empty or not
                            $datas = array(
                                'user_id' => $res['user_id'],
                                'firstname' => $res['firstname'],
                                'lastname' => $res['lastname'],
                                'image' => $res['file_name'],
                            );
                            $this->session->set_userdata($datas);
                            if ($result['email_verification_code'] != '') {
                                $this->send_verification_mail($result['firstname'], $result['email'], $result['email_verification_code']);

                                $this->session->set_flashdata('message', 'A verification link has been sent to ' . $result['email'] . ' please verify to complete the registration process.');
                                redirect('user'); //means user k index method me redirect ho jayega
                            } else {
                                redirect('welcome');
                            }
                        }
                    } else {
                        $resu = $this->usermodel->getAddress1($fb_id['facebook_id']);


                        $datas = array(
                            'user_id' => $resu['user_id'],
                            'username' => $resu['firstname'],
                            'lastname' => $resu['lastname'],
                            'image' => $resu['file_name'],
                        );
                        $this->session->set_userdata($datas);
                        redirect('welcome');
                    }
                } else { // Cannot authenticate user
                    show_error('Cannot authenticate user');
                }
            } else { // This service is not enabled.
                log_message('error', 'controllers.HAuth.login: This provider is not enabled (' . $provider . ')');
                show_404($_SERVER['REQUEST_URI']);
            }
        } catch (Exception $e) {
            $error = 'Unexpected error';
            switch ($e->getCode()) {
                case 0 : $error = 'Unspecified error.';
                    break;
                case 1 : $error = 'Hybriauth configuration error.';
                    break;
                case 2 : $error = 'Provider not properly configured.';
                    break;
                case 3 : $error = 'Unknown or disabled provider.';
                    break;
                case 4 : $error = 'Missing provider application credentials.';
                    break;
                case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
                    //redirect();
                    if (isset($service)) {
                        log_message('debug', 'controllers.HAuth.login: logging out from service.');
                        $service->logout();
                    }
                    show_error('User has cancelled the authentication or the provider refused the connection.');
                    break;
                case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
                    break;
                case 7 : $error = 'User not connected to the provider.';
                    break;
            }

            if (isset($service)) {
                $service->logout();
            }

            log_message('error', 'controllers.HAuth.login: ' . $error);
            show_error('Error authenticating user.');
        }
    }

    public function endpoint() {

        log_message('debug', 'controllers.HAuth.endpoint called.');
        log_message('info', 'controllers.HAuth.endpoint: $_REQUEST: ' . print_r($_REQUEST, TRUE));

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            log_message('debug', 'controllers.HAuth.endpoint: the request method is GET, copying REQUEST array into GET array.');
            $_GET = $_REQUEST;
        }

        log_message('debug', 'controllers.HAuth.endpoint: loading the original HybridAuth endpoint script.');
        require_once APPPATH . '/third_party/hybridauth-master/hybridauth/index.php';
    }

    public function logout() {
        $this->load->library('HybridAuthLib');
        $this->hybridauthlib->logoutAllProviders();
        redirect(site_url('hauth/index'), 'refresh');
    }

}

/* End of file hauth.php */
/* Location: ./application/controllers/hauth.php */
