<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Addressmodel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //All address list
    public function getAddressList() {
        
        $this->db->select('ad.*, u.firstname');
        $this->db->from('address ad');
        $this->db->join('user u', 'u.user_id = ad.user_id', 'left');

        $query = $this->db->get();
        return $query->result_array();
    }

    //get single address
    public function getAddress($address_id) {
        
        $this->db->select('ad.*,u.firstname');
        $this->db->from('address ad');
        $this->db->join('user u', 'u.user_id = ad.user_id', 'left');
        $this->db->where('address_id',$address_id);
        
        $query = $this->db->get();
        return $query->row_array();
    
    }

    public function getUser($user_id) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //Add address
    public function addAddress($data) {


        $data['operations_time'] = date("Y-m-d H:i:s", time());
        $data['user_id'] = $this->session->user_id; //this line is showing that's data which user is login

        $this->db->insert('address', $data);

        return $this->db->insert_id();


        //$this->db->insert($data);
    }

    //delete address
    public function deleteAddress($address_id) {
      
       
        $this->db->where('address_id', $address_id);
        $this->db->delete('address');
    }

    //Edit address
    public function editAddress($address_id, $data) {

        $data['date_modified'] = date("Y-m-d H:i:s ", time());
      
        $this->db->where('address_id', $address_id);
        $this->db->update('address', $data);
    }

    public function drop($user_id) {
      $this->db->where('user_id',$user_id);
      $this->db->delete('user');
    }

    public function get() {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $this->session->user_id); //this line is showing that's data which user is login
        $query = $this->db->get();
        return $query->result_array();
    }

    public function profile($user_id = 0) {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $user_id); //this line is showing that's data which user is login
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function get_users(){
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function info($data = array()) {


        $data['login_time'] = date("Y-m-d H:i:s", time());


        $this->db->insert('loginInfo', $data);

        if ($this->db->insert_id()) {

            $this->db->select('	loginInfo_id');
            $this->db->from('loginInfo');
            $this->db->where('user_id', $data['user_id']);
            $s = $this->db->count_all_results();
            if ($s > 10) {
                $this->db->select_min('loginInfo_id');
                $this->db->from('loginInfo');
                $this->db->where('user_id', $data['user_id']);
                $query = $this->db->get();
                return $query->row_array(); //return the result into array form
                //
//                $s = $query->row_array();
//                return $s['loginInfo_id'];//return the result into simple form
            }
        }
    }

    public function deleteExtra($id, $data = array()) {
        $this->db->where('user_id', $data['user_id']);
        $this->db->where('loginInfo_id', $id);
        return $this->db->delete('loginInfo');
    }

    public function editProfile($s, $user_id) {

        if (isset($data['password']) || isset($data['email'])) {
            $data['access_token'] = '';
        }
        $s['date_modified'] = date("Y-m-d H:i:s ", time());

        $this->db->where('user_id', $user_id); //this line is showing that's data which user is login
        //$this->db->where('address_id', $address_id);
        $this->db->update('user', $s);
        if ($this->db->affected_rows() > 0) {

            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('user_id', $user_id);
            $q = $this->db->get();
            $result = $q->row_array();

            $datas = array(
                'username' => $result['firstname'],
                'lastname' => $result['lastname'],
                'image' => ($result['file_name'] != '') ? site_url('images') . '/' . $result['file_name'] : site_url('images/glyphicons_user.png'),
            );

         //   $this->session->set_userdata($datas); //here session set for immediate effect bcoz image pr login time pr session set hota h to image show hoti lekin jb hum update krte h to session set nhi hota isliye yha pr session set kiya gya jisse image ek dum show ho
            if ($result['access_token'] == '') {
                $result['access_token'] = $this->generate_token($result);
            }

            return TRUE;
        }
        return FALSE;
    }

    public function generate_token($row) {
        $token = '';
        if ($row['password']) {
            $token = $row['user_id'] . $row['email'] . ':DEALERT:' . $row['password'];
        } else {
            $token = $row['user_id'] . $row['email'] . ':DEALERT:' . $row['social_id'];
        }

        if ($row['user_id']) {
            $token = md5($token);
            $d = array('access_token' => $token);

            $this->db->where('user_id', $row['user_id']);
            $this->db->update('user', $d);
            return $token;
        }

        return FALSE;
    }

    public function fetchUser_id($user_id) {
        $this->db->select('user_id');
        $this->db->from('loginInfo');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_image($data = array()) {
        
        
        $d = array();

        $d['status'] = "0";
        $update['status'] = "1";

        $this->db->where('image_id', $data['current_image_id']);
        if ($this->db->update('image', $d)) {
            $this->db->where('image_id', $data['selected_image_id']);
            return $this->db->update('image', $update);
        }
    }

    public function get_image($image_id = 0) {
        $this->db->select('*');
        $this->db->from('image');
        $this->db->where('image_id', $image_id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
        public function System_info(){
        $this->db->select('*');
        $this->db->from('loginInfo');
        $this->db->where('user_id',$this->session->user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

}
