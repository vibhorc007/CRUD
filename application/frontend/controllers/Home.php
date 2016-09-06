<?php

defined("BASEPATH") or exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //load model
        $this->load->model('addressmodel'); //load  Addressmodel 
        $this->load->model('usermodel');
        $this->load->model('file_manager');

        if (!$this->session->user_id) {//check if  user is not login then redirect to user controller
            redirect('user'); //redirect means to say operate user controller
        }
    }

    //all address list fetch
    public function index() {

        $data['upload_count'] = $this->file_manager->count_upload();
        $data['image_count'] = $this->file_manager->upload_image();
        $data['audio_count'] = $this->file_manager->upload_audio();
        $data['video_count'] = $this->file_manager->upload_video();
        $data['result'] = $this->addressmodel->getAddressList();

//        echo '<pre>';
//        print_r($data);die;
        $this->layout->set_title('crud | home');
        $data['audio'] = site_url('media/getSongs');
        $data['video'] = site_url('media/getVideo');
        $data['images'] = site_url('media/image_gallery');
        foreach ($data['result'] as $row) {
            $data['edit'] = site_url('home/edit' . '/' . $row['address_id']);
        }
        $data['delete'] = site_url('home/delete1');
        $this->layout->view('user/home', $data);
    }

    public function getList($address_id) {

        $data = $this->addressmodel->getAddress($address_id);
        $data['back'] = site_url('home');
        $data['edit'] = site_url('home/edit/' . $address_id);
        $this->layout->view('user/addressview', $data);
    }

    public function popup() {
        $this->layout->set_title('welcome');
        $this->layout->view('welcome_message');
    }

    public function addAddress() {

        if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->addValidations()) {


            $result = $this->addressmodel->addaddress($this->input->post());

            if (!empty($result)) {

                //Set session message
                $this->session->set_flashdata('message', 'You have sucessfully Add Address.');

                redirect('home');
            } else {

                $this->session->set_flashdata('message', 'Please try again');

                redirect('home/addAddress');
            }
        }


        $this->addForm();
    }

    protected function addForm() {
        $this->layout->set_title('Insert Records');
        $this->layout->view('user/insert');
    }

    protected function addValidations() {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('gender', 'Gemder', 'required');

        $this->form_validation->set_error_delimiters('<div style="color: #980000;">', '</div>');

        return $this->form_validation->run();
    }

    protected function editValidations() {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');

        $this->form_validation->set_error_delimiters('<div style="color: #980000;">', '</div>');

        return $this->form_validation->run();
    }

    public function edit($address_id) {
        // echo current_url();die;//print the url
        //echo uri_string();die;//print all except base_url();

        if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->editValidations()) {

            $this->addressmodel->editAddress($address_id, $this->input->post());
            $this->session->set_flashdata('message', '&#9745 You have successfully updated the data ');
            redirect('home');
        }

        $this->getEditForm($address_id);
    }

    protected function getEditForm($address_id) {

        $data['result'] = $this->addressmodel->getAddress($address_id);
        $this->layout->set_title('Edit Record');
        $this->layout->view('user/edit_address', $data);
    }

    protected function editProfileValidation() {


        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        $this->form_validation->set_rules('dob', 'DOB', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');

        $this->form_validation->set_error_delimiters('<div style="color: #980000;">', '</div>');

        return $this->form_validation->run();
    }

    public function editProfile($user_id = '') {

        if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->editProfileValidation()) {


            if (isset($data['firstname']) && $data['firstname']) {
                $info['firstname'] = $data['firstname'];
            }
            if (isset($data['lastname']) && $data['lastname']) {
                $info['lastname'] = $data['lastname'];
            }
            if (isset($data['email']) && $data['email']) {
                $info['email'] = $data['email'];
            }

            if (isset($data['dob']) && $data['dob']) {
                $info['dob'] = $data['dob'];
            }
            if (isset($data['gender']) && $data['gender']) {
                $info['gender'] = $data['gender'];
            }

            $res = $this->addressmodel->editProfile($info);

            $this->session->set_flashdata('message', 'You have successfully updated your profile &#x1F60D');
            redirect('home');
        }

        $this->geteditProfileForm($user_id);
    }

    public function geteditProfileForm($user_id = '') {
        $data['error'] = $this->session->flashdata('error');
        $data['message'] = $this->session->flashdata('message');
        $data['result'] = $this->addressmodel->getUser($user_id);
        $data['images'] = $this->file_manager->fetch_image();
        $data['upload_error'] = $this->session->flashdata('upload_error');
        $this->layout->set_title('Edit Profile');
        $this->layout->view('user/edit_profile', $data);
    }

    public function delete1() {
        if ($this->input->post('selected')) {
     
            foreach ($this->input->post('selected') as $address_id) {
                 
               $this->addressmodel->deleteAddress($address_id);

            }
            $this->session->set_flashdata('message', 'You have modified Users!');
            redirect('home');
        }

    }

    public function logout() {
        //session close,
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('lastname');

        $this->session->sess_destroy();

        $this->session->set_flashdata('message', 'You have signed out.');
        redirect('user');
    }

    public function update_password() {
        $this->layout->set_title('Forgot Password');
        $this->layout->view('user/forgotpass');
    }

    public function delete_all() {

        $this->addressmodel->drop();
        redirect('home/logout');
    }

    public function get() {
        $data['result'] = $this->addressmodel->get();
        $this->layout->view('user/delete_account', $data);
    }

    public function profile() {
        $data['result'] = $this->addressmodel->profile();

        $this->layout->set_title('Profile');
        $this->layout->view('user/profile', $data);
    }

    public function change_pass() {
        $data['action'] = base_url('home/password_c');

        $this->layout->set_title('Change Password');
        $this->layout->view('user/change_password', $data);
    }

    protected function changepass_validation() {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]');


        $this->form_validation->set_error_delimiters('<div style="color: #980000;">', '</div>');

        return $this->form_validation->run();
    }

    public function password_c() {
        if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->changepass_validation()) {
            $result = $this->usermodel->edit_password($this->input->post());

            if ($result) {
                $this->session->set_flashdata('message', 'You have successfully changed the password');
                redirect('home');
            } else {
                $this->session->set_flashdata('message', 'Invalid Email');
                redirect('home/change_pass');
            }
        }

        $this->change_pass();
    }

    public function system_info() {

        $data['info'] = $this->addressmodel->System_info();

        $this->layout->set_title('System Information');
        $this->layout->view('user/information', $data);
    }

}
