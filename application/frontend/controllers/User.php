<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //load model
        $this->load->model('usermodel');
        $this->load->model('addressmodel');
        $this->load->model('file_manager');
        $this->load->library('upload');
        if ($this->session->user_id) {//check if  user is not login then redirect to user controller
            redirect('home'); //redirect means to say operate user controller
        }
    }

    //Login Page

    public function index() {



        if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->loginValidation()) {

            $datam['email'] = $this->input->post('email');
            $datam['password'] = $this->input->post('password');
            $result = $this->usermodel->login($datam);
            

            if ($result) {


                if ($result['email_verification_code'] == '') {

                    // $data = array();

                    $datas = array(
                        'username' => $result['firstname'],
                        'user_id' => $result['user_id'],
                        'lastname' => $result['lastname'],
                        'image' => ($result['file_name'] != '')? base_url('images').'/'.$result['file_name']:base_url('images/glyphicons_user.png'),
                    );

                    
                    //this is used to get info of system
                    $data['ipaddress'] = $this->input->ip_address('ipaddress');
                    $data['browser_name'] = $this->agent->browser('browser_name');
                    $data['platform'] = $this->agent->platform('platform');
                    $data['version'] = $this->agent->version('version');
                    $data['accept_lang'] = $this->agent->accept_lang('accept_lang');
                    $data['referrer_link'] = $this->agent->referrer('referrer');
                    $data['user_id'] = $datas['user_id'];
                    // $user_id = $this->addressmodel->fetchUser_id($result['user_id']);
                    $insert_id = $this->addressmodel->info($data);
                    if ($insert_id) {
                        $this->addressmodel->deleteExtra($insert_id['loginInfo_id'], $data);
                    }


                    //Create session
                    $this->session->set_userdata($datas);
                    //$this->session->set_flashdata('message','successfully logged in');
                    redirect('welcome');
                } else {
                    $this->session->set_flashdata('message', 'You can not login with un-verified account');
                }
            }
//            else {
//                
//
//                //set flash session data
//                $this->session->set_flashdata('message', 'your email or password does not valid');
//            }
        }
        $this->getLoginPage();
    }

    protected function getLoginPage() {
        $data['message'] = $this->session->flashdata('message');
        $data['attempt'] = $this->session->flashdata('attempt');
        $this->load->view('user/login', $data);
    }

    protected function loginValidation() {

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        return $this->form_validation->run(); //this line is used for validation's execution
    }

    public function getRegisterPage() {


        if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->registerValidation()) {
            $info = array();
            $data = array();
            $data['firstname'] = $this->input->post('firstname');
            $data['lastname'] = $this->input->post('lastname');
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');

            $data['contact_no'] = $this->input->post('contact_no');
            $data['gender'] = $this->input->post('gender');

            $data['dob'] = $this->input->post('date');

            $data['social_type'] = $this->input->post('social_type');
            $config['upload_path'] = FCPATH . 'images/';
            
            $config['allowed_types'] = '*';
           
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file_name')) {
                $error =$this->upload->display_errors();

                print_r($error);
             
            } else {
                $datas = $this->upload->data();
                
                $data['file_name'] = $datas['file_name'];
                
                
                $info['file_name'] = $datas['file_name'];
                $info['file_ext'] = $datas['file_type'];
                $info['status'] = "1";


                if (preg_match('/audio/', $datas['file_type'])) {

                    $info['file_type'] = 'audio';
                }
                if (preg_match('/video/', $datas['file_type'])) {

                    $info['file_type'] = 'video';
                }

                if (preg_match('/image/', $datas['file_type'])) {

                    $info['file_type'] = 'image';
                }

                
            }
                
             $user_id = $this->usermodel->addUser($data);

            //or

            /* $data = [
              'firstname' => $this->input->post('firstname'), //which value is gives in input field that value is getting by post method here
              'lastname' => $this->input->post('lastname'),
              'email' => $this->input->post('email'),
              //$data['password'] = md5($this->input->post('password'));this line is used for secure password in md5 form.
              'password' => $this->input->post('password'),
              'gender' => $this->input->post('gender'),
              'dob' => $this->input->post('Date')
              ];
              $result = $this->usermodel->addUser($data); */

            //or

            /* $data = array(
              'firstname' => $this->input->post('firstname'), //which value is gives in input field that value is getting by post method here
              'lastname' => $this->input->post('lastname'),
              'email' => $this->input->post('email'),
              //$data['password'] = md5($this->input->post('password'));this line is used for secure password in md5 form.
              'password' => $this->input->post('password'),
              'gender' => $this->input->post('gender'),
              'dob' => $this->input->post('Date')
              );
              $result = $this->usermodel->addUser($data); */


            if ($user_id) {//means if $result store the result
                
             
                $result = $this->usermodel->getAddress($user_id);
                $info['user_id'] = $result['user_id'];
                    $image_id = $this->file_manager->insert_AVI($info);
                if ($result['email_verification_code'] != '') {
                    $this->send_verification_mail($result['firstname'], $result['email'], $result['email_verification_code']);

                    $this->session->set_flashdata('message', 'A verification link has been sent to ' . $result['email'] . ' please verify to complete the registration process.');
                    redirect('user'); //means user k index method me redirect ho jayega
                } else {
                    $this->session->set_flashdata('message', 'Please Login');
                    redirect('user');
                }
            }
        } else {

            $this->getForm();
        }
        //$this->load->view('user/register');http://localhost/_login/
    }

    public function send_verification_mail($username = 'CRUD Customer', $email = '', $code = '') {
        $link = site_url('common/verify/' . $code);

        $message = '<p>Hi ' . $username . '</p>
        <p>Welcome to CRUD!</p>
        <p>Please click the link below to verify that this is your email address.</p>

        <p><a target="_blank" href="' . $link . '">' . $link . '</a></p>

        <p>Thanks! <br>
        CRUD</p>
        ';


        email($email, 'Confirm your CRUD Account | CRUD', $message);
    }

    protected function getform() {

        $this->load->view('user/register1');
    }

    protected function registerValidation() {


        $this->form_validation->set_rules('firstname', 'Firstname', 'required'); //validation on firstname field
        $this->form_validation->set_rules('lastname', 'lastname', 'required'); //validation on lastname field
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]'); //validation on password field
        $this->form_validation->set_rules('contact_no', 'Contact', 'required'); //validation on password field
        $this->form_validation->set_rules('date', 'Date', 'required'); //validation on email
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]'); //validation on email
        $this->form_validation->set_rules('social_type', 'Social Type', 'required');
      
        $this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('gender', 'Gender', 'required'); //validation on email
        //$this->form_validation->set_rules('captcha', 'captcha', 'required'); //validation on emai
        $this->form_validation->set_error_delimiters('<div style="color: #980000;">', '</div>'); // this line is jst use for coloring error message.

        return $this->form_validation->run(); //validation run from this lineuser
    }

    public function forget() {
        if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->forgetValidation()) {
            $email = $this->input->post('email');
            $result = $this->usermodel->getUserByEmail($email);

            if ($result['email'] == $email) {

                if ($result['social_type'] == 'web') {

                    $da['forgot_token'] = genToken();
                    $this->usermodel->addForgotToken($da, $email);

                    $link = site_url('common/reset-password/' . $da['forgot_token']);
                    $subject = 'Password reset | _login';
                    $message = '<p>Hi ' . $result['firstname'] . '</p>
                <p>We received a request to reset your password!</p>
                <p>Please click the link below or copy and paste it into your browser to create a new password.</p>

                <p><a target="_blank" href="' . $link . '">' . $link . '</a></p>

                <p>Thanks! <br>
                CRUD</p>
                ';

                    email($email, $subject, $message);

                    $this->session->set_flashdata('message', 'We have sent the instructions to ' . $result['email']);
                    redirect(site_url('user/forget'));
                } else {
                    $this->session->set_flashdata('message', 'This email is registered with ' . $result['social_type']);
                    redirect('user/forget');
                }
            } else {
                $this->session->set_flashdata('message', 'This email is not registered with us.');
                redirect('user/forget');
            }
        } else {
            $this->getForgetPage();
        }
    }
    
     public function profile_Pic() {
        $data['path'] = base_url('images/'); 
        //  print_r($data['path']);die;
        $data = $this->usermodel->fetch_Dp();
        print_r($data);die;

        $this->layout->view('user/home', $data);
    }

    protected function getForgetPage() {
        $data['message'] = $this->session->flashdata('message');
        $this->load->view('user/forget', $data);
    }

    protected function forgetValidation() {
        $this->form_validation->set_rules('email', 'Email', 'required');

        $this->form_validation->set_error_delimiters('<div style="color: #980000;">', '</div>'); // this line is jst use for coloring error message.

        return $this->form_validation->run();
    }

    public function edit() {

        if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->forgetValidation()) {
            $data = $this->input->post();
            $info = array();

            if (isset($data['firstname']) && $data['firstname'] != '') {
                $info['firstname'] = $data['firstname'];
            }

            if (isset($data['lastname']) && $data['lastname'] != '') {
                $info['lastname'] = $data['lastname'];
            }

            if (isset($data['lastname']) && $data['lastname'] != '') {
                $info['lastname'] = $data['lastname'];
            }

            if (isset($data['email']) && $data['email'] != '') {
                $info['lastname'] = $data['lastname'];
            }

            if (isset($data['password']) && $data['password'] != '') {
                $info['password'] = $data['password'];
            }

            if (isset($data['gender']) && $data['gender'] != '') {
                $info['gender'] = $data['gender'];
            }
        }
    }

}
