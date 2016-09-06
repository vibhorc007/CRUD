<?php

defined("BASEPATH") or exit('No direct script access allowed');

class Media extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('file_manager');
        $this->load->model('addressmodel');
//
//
//        if (!$this->session->user_id) {//check if  user is not login then redirect to user controller
//            redirect('user'); //redirect means to say operate user controller
//        }
    }

    //all address list fetch
    public function getSong($image_id = 0) {


        $songs = $this->file_manager->getSong($image_id);

        $this->layout->set_title('Songs');
         $songs['back'] = site_url('media/song_list');
        $this->layout->view('user/songs', $songs);
    }

    public function song_list() {

        $data['result'] = $this->file_manager->get_songs();

        $data['delete'] = site_url('media/delete_Audio');
        $this->layout->view('user/song_list', $data);
    }

    public function getVideo($image_id = 0) {

        $songs = $this->file_manager->getVideo($image_id);

        $this->layout->set_title('videos');
        
        $this->layout->view('user/videos', $songs);
    }

    public function video_list() {
        $data['result'] = $this->file_manager->get_videos();
        $data['delete'] = site_url('media/delete_Video');
        $this->layout->view('user/video_list', $data);
    }

   

    public function delete_Audio() {
   if ($this->input->post('selected')) {

            foreach ($this->input->post('selected') as $song_id) {

                $this->file_manager->trash_AV($song_id);
            }
            $this->session->set_flashdata('message', 'You have modified Users!');
            redirect('media/song_list');
        }
    }
    
    public function delete_Video() {
   if ($this->input->post('selected')) {

            foreach ($this->input->post('selected') as $video_id) {

                $this->file_manager->trash_AV($video_id);
            }
            $this->session->set_flashdata('message', 'You have modified Users!');
            redirect('media/video_list');
        }
    }

    public function image_gallery() {

        $data['fb_image'] = $this->file_manager->fb_image();

        $data['result'] = $this->file_manager->fetch_image();

        //this type is used when we want to print the error and message on view page
        $data['error'] = $this->session->flashdata('error'); //this error message comes from delete_gallery method.
        $data['message'] = $this->session->flashdata('message'); //this message comes from delete_gallery method.
//       echo '<pre>';
//       print_r($data);die;

        $this->layout->set_title('Gallery');
        $this->layout->view('user/gallery', $data);
    }

    public function imageUpload($user_id = '') {

       

        $datas = array();


        if (($this->input->post('image')) && $_FILES['file_name']['name'] == '') {
//if image select from select image part
            
            $image_id = $this->input->post('image');
            $info = $this->addressmodel->get_image($image_id);
            $datas['file_name'] = $info['file_name'];
        } else if (isset($_FILES['file_name']['name']) && $_FILES['file_name']['name'] != '') {



            $config['upload_path'] = str_replace('admin/','',  FCPATH . 'images/');//here we replace admin from url. because we want image folder at only one place
           
       
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file_name')) {
                $error = $this->upload->display_errors();
                
                $this->session->set_flashdata('upload_error', "$error");
                redirect(site_url('home/geteditProfileForm/' . $user_id));
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

                
                
                $upload_image_id = $this->file_manager->insert_AVI($data,$user_id);
            }
        } else {

            $this->session->set_flashdata('error', 'you did not select a file to upload');
            redirect(site_url('home/editProfile/' . $user_id));
        }

        if ($this->addressmodel->editProfile($datas, $user_id)) {
            
            $data = array();

            $current_image_id = $this->input->post('current_image'); //which image set on profile picture
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
            redirect(site_url('home/editProfile/' . $user_id));
        } else {

            $this->session->set_flashdata('error', 'Something went wrong');
            redirect(site_url('home/editProfile/' . $user_id));
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
     
      $s =   $this->file_manager->delete_pic($id);
      
        $this->session->set_flashdata('message', 'your display picture has been removed');
        redirect(site_url('home/editProfile' . '/' . $id));
    }

}
