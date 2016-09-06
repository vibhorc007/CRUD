<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class file_manager extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_songs() {

        $this->db->select('img.*, u.firstname');
        $this->db->from('image img');
        $this->db->join('user u', 'u.user_id = img.user_id', 'left');
        $this->db->where('file_type', 'audio');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSong($image_id = 0) {


        $this->db->select('img.*, u.firstname');
        $this->db->from('image img');
        $this->db->join('user u', 'u.user_id = img.user_id', 'left');
        $this->db->where('file_type', 'audio');
        $this->db->where('image_id', $image_id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_videos() {
        $this->db->select('img.*, u.firstname');
        $this->db->from('image img');
        $this->db->join('user u', 'u.user_id = img.user_id', 'left');
        $this->db->where('file_type', 'video');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getVideo($image_id = 0) {

        $this->db->select('img.*, u.firstname');
        $this->db->from('image img');
        $this->db->join('user u', 'u.user_id = img.user_id', 'left');
        $this->db->where('file_type', 'video');
        $this->db->where('image_id', $image_id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function trash_AV($image_id) {
        $this->db->select('*');
        $this->db->from('image');

        $this->db->where('image_id', $image_id);
        $query = $this->db->get();
        $s = $query->row_array();
        if ($s) {
            unlink(str_replace('admin/', '', FCPATH . 'songs/' . $s['file_name'])); //here delete image from folder
        }


        $this->db->where('image_id', $image_id);
        $this->db->delete('image');
    }

    public function fetch_image($user_id = '') {
        $this->db->select('*');
        $this->db->from('image');
        $this->db->where('user_id', $user_id);
        $this->db->like('file_type', 'image');
        $query = $this->db->get();
        $result = $query->result_array();

        if ($result) {

            $data = array();
            foreach ($result as $row) {
                $info['file_name'] = $row['file_name'];
                $info['image_id'] = $row['image_id'];
                $info['status'] = $row['status'];
                $data[] = $info;
            }

            return $data;

//            echo '<pre>';
//            print_r($data);die;
        }
    }

    public function fb_image() {
        $this->db->select('file_name');
        $this->db->from('user');
        $this->db->where('user_id', $this->session->user_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function insert_AVI($data = array(),$user_id='') {

        if ($user_id) {
            $data['user_id'] = $user_id;
        }

        $this->db->insert('image', $data);

        return $this->db->insert_id();
    }

    public function delete_galleryPic($image_id = '') {


        $this->db->select('*');
        $this->db->from('image');
        $this->db->where('user_id', $this->session->user_id);
        $this->db->where('image_id', $image_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();

            if ($this->session->image == base_url('images/' . $row['file_name'])) {

                $data['file_name'] = '';
                $this->db->where('user_id', $this->session->user_id);

                if ($this->db->update('user', $data)) {
                    $this->session->set_userdata('image', base_url('images/glyphicons_user.png'));
                }
            }


            unlink(FCPATH . 'images/' . $row['file_name']);
            $this->db->where('image_id', $image_id);
            $this->db->delete('image');
        }
    }

    public function delete_pic($user_id) {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        $result = $query->row_array();

        $this->db->where('user_id', $user_id); //here delete image from image 
        $this->db->where('file_name', $result['file_name']);
        $this->db->delete('image');
        if ($result) {
            
            unlink(str_replace('admin/','', FCPATH) . 'images/' . $result['file_name']); //here delete image from folder
        }
        $data['file_name'] = '';
        $this->db->where('user_id', $user_id);
        $this->db->update('user', $data); //here delete image from user
        if ($this->db->affected_rows() > 0) {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('user_id', $user_id);
            $query = $this->db->get();
            $result = $query->row_array();
            $datas = array(
                'image' => ($result['file_name'] != '') ? str_replace('admin/', '', site_url('images')) . '/' . $result['file_name'] : str_replace('admin/','',site_url('images/glyphicons_user.png')),
            );
            $this->session->set_userdata($datas);
        }
    }

    public function count_upload() {

        $this->db->select('*');
        $this->db->from('image');
        // $this->db->where('user_id', $this->session->user_id);
        $s = $this->db->count_all_results();

        return $s;
    }

    public function upload_audio() {
        $this->db->select('*');
        $this->db->from('image');
        //$this->db->where('user_id', $this->session->user_id);

        $this->db->where("(file_type = 'audio')");
        $a = $this->db->count_all_results();
        return $a;
    }

    public function upload_video() {
        $this->db->select('*');
        $this->db->from('image');
        //$this->db->where('user_id', $this->session->user_id);

        $this->db->where("(file_type = 'video')");
        $a = $this->db->count_all_results();
        return $a;
    }

    public function upload_image() {
        $this->db->select('*');
        $this->db->from('image');
        //$this->db->where('user_id', $this->session->user_id);

        $this->db->where("(file_type = 'image')");
        $a = $this->db->count_all_results();
        return $a;
    }

}
