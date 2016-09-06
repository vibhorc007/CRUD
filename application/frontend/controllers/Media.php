<?php

defined("BASEPATH") or exit('No direct script access allowed');

class Media extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('file_manager');
        $this->load->model('addressmodel');


        if (!$this->session->user_id) {//check if  user is not login then redirect to user controller
            redirect('user'); //redirect means to say operate user controller
        }
    }

    //all address list fetch
    public function getSongs() {
        $data = array();
        $songs = $this->file_manager->songs();
        
          foreach ($songs as $song) {
            $song_info['file_name'] = $song['file_name'];
            $song_info['file_ext'] = $song['file_ext'];
            $song_info['image_id'] = $song['image_id'];
          
            $data['songs'][] = $song_info;
        }
     
        $this->layout->set_title('Songs');
        $data['upload'] = site_url('media/file_upload');
        $this->layout->view('user/songs', $data);
    }
    
    public function getVideo() {
        $data = array();
        $videos = $this->file_manager->video();
        
          foreach ($videos as $video) {
            $video_info['file_name'] = $video['file_name'];
            $video_info['file_ext'] = $video['file_ext'];
            $video_info['image_id'] = $video['image_id'];
          
            $data['videos'][] = $video_info;
        }
     
        $this->layout->set_title('Videos');
        $data['upload'] = site_url('media/file_upload');
        $this->layout->view('user/videos', $data);
    }

    public function file_upload() {
        
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            

            $data = array();

            if (preg_match('/image/', $_FILES['file_upload']['type'])) {
                $config['upload_path'] = FCPATH . 'images/';
            } else {
                $config['upload_path'] = FCPATH . 'songs/';
            }

            $config['allowed_types'] = '*';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file_upload')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error',$error);
                redirect(base_url('media/file_upload'));
            } else {
                $data = $this->upload->data();

                $info['file_name'] = $data['file_name'];
                $info['file_ext'] = $data['file_type'];


                if (preg_match('/audio/', $data['file_type'])) {

                    $info['file_type'] = 'audio';
                }
                if (preg_match('/video/', $data['file_type'])) {

                    $info['file_type'] = 'video';
                }

                if (preg_match('/image/', $data['file_type'])) {

                    $info['file_type'] = 'image';
                }

                $result_id = $this->file_manager->insert_AVI($info);
                if ($result_id) {
                    $this->session->set_flashdata('message', 'Your data has been uploaded!');
                    redirect(base_url('media'));
                } else {
                    $this->session->set_flashdata('message', 'Something went wrong!');
                    redirect(base_url('media'));
                }
            }
        }
      
        $this->layout->set_title('Upload File');
        $data['error'] = $this->session->flashdata('error');
        $data['back'] = site_url('media');
        $this->layout->view('user/upload_file', $data);
    }

    public function delete_AV($image_id) {
        $this->file_manager->trash_AV($image_id);

        $this->session->set_flashdata('message', 'Selected data has been deleted successfully');//this message print on view page who load in media and this is simple method to print the message.
        redirect(base_url('media'));
    }

    public function image_gallery() {
        
        $data['fb_image'] = $this->file_manager->fb_image();
       
        $data['result'] = $this->file_manager->fetch_image();

        //this type is used when we want to print the error and message on view page
        $data['error'] = $this->session->flashdata('error');//this error message comes from delete_gallery method.
        $data['message'] = $this->session->flashdata('message');//this message comes from delete_gallery method.

//       echo '<pre>';
//       print_r($data);die;

        $this->layout->set_title('Gallery');
        $this->layout->view('user/gallery', $data);
    }

    public function imageUpload() {



        $datas = array();


        if (($this->input->post('image')) && $_FILES['file_name']['name'] == '') {//if image select from select image part

            $image_id = $this->input->post('image');
            $info = $this->addressmodel->get_image($image_id);
            $datas['file_name'] = $info['file_name'];
        } else if (isset($_FILES['file_name']['name']) && $_FILES['file_name']['name'] != '') {



            $config['upload_path'] = FCPATH . 'images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file_name')) {
                $error = $this->upload->display_errors();
//                echo $error;die;
                $this->session->set_flashdata('upload_error', "$error");
                redirect(site_url('home/geteditProfileForm/' . $this->session->user_id));
            } else {
                $info = $this->upload->data();

                //upload image folder
                $data['file_name'] = $info['file_name'];
                $data['file_ext'] = $info['file_type'];

                if (preg_match('/audio/', $info['file_type'])) {

                    $data['file_type'] = 'audio';
                }
                if (preg_match('/video/', $info['file_type'])) {

                    $data['file_type'] = 'video';
                }

                if (preg_match('/image/', $info['file_type'])) {

                    $data['file_type'] = 'image';
                }

                $datas['file_name'] = $info['file_name'];



                $upload_image_id = $this->file_manager->insert_AVI($data);
            }
        } else {

            $this->session->set_flashdata('error', 'you did not select a file to upload');
            redirect(site_url('home/editProfile/' . $this->session->user_id));
        }

        if ($this->addressmodel->editProfile($datas)) {

            $data = array();

            $current_image_id = $this->input->post('current_image');//which image set on profile picture
            

            //here code for select image who is set on profile picture
            if (isset($upload_image_id) && $upload_image_id != '') {
                $data['selected_image_id'] = $upload_image_id;
                $data['current_image_id'] = $current_image_id;
            }

            if (($this->input->post('image')) && $_FILES['file_name']['name'] == '') {
                $data['selected_image_id'] = $this->input->post('image');
                $data['current_image_id'] = $current_image_id;
            }

            $this->addressmodel->update_image($data);


            $this->session->set_flashdata('message', 'your profile picture has been updated');
            redirect(site_url('home/editProfile/' . $this->session->user_id));
        } else {

            $this->session->set_flashdata('error', 'Something went wrong');
            redirect(site_url('home/editProfile/' . $this->session->user_id));
        }
    }

    public function delete_gallery() {
        $images = $this->input->post();

//        echo '<pre>';
//        $data = $this->input->post();
//        print_r($data);die;

        if ($images) {

            foreach ($images['image'] as $image) {

                $this->file_manager->delete_galleryPic($image);
                $this->session->set_flashdata('message', 'your image has been deleted');
            }
            redirect(base_url('media/image_gallery'));
        }
        $this->session->set_flashdata('error', 'Please Select image to delete');
        redirect(base_url('media/image_gallery'));


//        echo '<pre>';
//        $data = $this->input->post();
//        print_r($data);
    }

    public function delete_photo($id) {

        $this->file_manager->delete_pic($id);
        $this->session->set_flashdata('message','your display picture has been removed');
        redirect(base_url('home/editProfile'));
    }
    

}
