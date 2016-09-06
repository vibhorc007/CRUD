<?php

defined("BASEPATH") OR exit("No direct script access allowed");

class Usermodel extends CI_Model {

    public function login($data) {


        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($data);

        $query = $this->db->get();
        $row = $query->row_array();

        if (!$row) {

            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('email', $data['email']);

            $q = $this->db->get();
            $r = $q->row_array();
            if ($r) {

                $time = date('Y-m-d H:i:s');
                $to_time = strtotime($r['attempt_time']);
                $from_time = strtotime($time);

                if ((round(abs($from_time - $to_time) / 60, 2) > 30) && ($r['attempt_count'] == 3)) {
                    $time = array();
                    $time['attempt_time'] = "0000-00-00 00:00:00";
                    $time['attempt_count'] = "0";
                    $this->db->where('email', $data['email']);
                    $this->db->update('user', $time);

                    $this->db->select('*');
                    $this->db->from('user');
                    $this->db->where('email', $data['email']);

                    $q = $this->db->get();
                    $r = $q->row_array();
                }

                if ($r['attempt_count'] < 3) {
                    if ($r['attempt_count'] == 2) {
                        $attemp['attempt_count'] = $r['attempt_count'] + 1;
                        $attemp['attempt_time'] = date('Y-m-d H:i:s');
                    } else {
                        $attemp['attempt_count'] = $r['attempt_count'] + 1;
                    }
                    $this->db->where('email', $data['email']);
                    $this->db->update('user', $attemp);
                    $this->session->set_flashdata('message', 'your email or password does not valid &#9829');
                } else {
                    $re = 30 - round(abs($from_time - $to_time) / 60);
                    $this->session->set_flashdata('message', 'Blocked! now you can login after ' . $re . ' minutes.');
                }
            } else {
                $this->session->set_flashdata('message', 'Email is not registered in our system.');
            }
        } else {

            $time = date('Y-m-d H:i:s');
            $to_time = strtotime($row['attempt_time']);
            $from_time = strtotime($time);

            if ((round(abs($from_time - $to_time) / 60, 2) > 30)) {

                $time = array();
               // $time['attempt_time'] = "0000-00-00 00:00:00";
                $time['attempt_count'] = "0";
                $this->db->where('email', $data['email']);
                $this->db->update('user', $time);

                return $row;
            } else {
                $re = 30 - round(abs($from_time - $to_time) / 60);
                $this->session->set_flashdata('message', 'Now please wait  for ' . $re . ' minutes. You are blocked by server');
            }
        }



        //return all row in the form of associate array.
    }
    
   

    public function addUser($data) {
        if ($data['social_type'] == 'web') {
            $data['email_verification_code'] = genToken(32);
            $data['email_verification_status'] = 0;
        } else {
            $data['email_verification_status'] = 1;
           
        }
        
        $this->db->insert('user', $data);
        return $this->db->insert_id();
       
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

    public function edit_password() {
        
//        $data['email'] = $this->input->post('email');
//        $data['password'] = $this->input->post('password');


        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id',$this->session->user_id);
        $this->db->where('email', $this->input->post('email'));
        $query = $this->db->get();
        $s = $query->row_array();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $info['email'] = $this->input->post('email');
            $info['password'] = $this->input->post('password');
            $info['access_token'] = '';
            $this->db->where('user_id', $row['user_id']);
            $this->db->update('user', $info);
           if ($this->db->affected_rows() > 0){
               $this->db->select('*');
               $this->db->from('user');
               $this->db->where('user_id',$row['user_id']);
               $q = $this->db->get();
               $result = $q->row_array();
               if($result['access_token']==''){
                   $result['access_token'] = $this->generate_token($result);
               }
           }
           return TRUE;
        } 
        else{
            return FALSE;
        }
    }

    public function getAddress($user_id) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $user_id);

        $query = $this->db->get();
        if ($query->num_rows()) {
            $row = $query->row_array();
            if ($row['access_token'] == '') {

                $row['access_token'] = $this->generate_token($row);
            }
            return $row;
        } else {
            return FALSE;
        }
    }
    
    public function getAddress1($fb_id){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('facebook_id',$fb_id);
        
        $query = $this->db->get();
        return $query->row_array();
        
    }

    public function verify($code) {
        $this->db->select('user_id, email, firstname');
        $this->db->from('user');
        $this->db->where('email_verification_code       ', $code);
        $query = $this->db->get();
        if ($query->num_rows()) {
            $row = $query->row_array();
            $update_data = array(
                'email_verification_code' => '',
                'email_verification_status' => 1
            );

            $this->db->where('user_id', $row['user_id']);
            $this->db->update('user', $update_data);
            return $row;
        } else {
            return false;
        }
    }

    public function getUserByEmail($data) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $data);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function addForgotToken($data, $email) {

        $default = array(
            'date_modified' => date('Y-m-d H:i:s')
        );

        $this->db->where('email', $email);


        return $this->db->update('user', array_merge($default, $data));
    }

    public function verify_token($token) {
        $this->db->select('user_id, email');
        $this->db->from('user');
        $this->db->where('forgot_token', $token);
        $query = $this->db->get();
        if ($query->num_rows()) {
            return $query->row_array();
        }

        return false;
    }

    public function reset_password($token, $password, $user_id = 0) {
        $data['password'] = $password;
        $data['forgot_token'] = '';
        $data['access_token'] = '';
        $this->db->where('forgot_token', $token);
        if ($this->db->update('user', $data)) {
            if ($user_id) {
                $this->getAddress($user_id);
            }

            return true;
        }
        return false;
    }

    public function fetch_id($id) {
        $this->db->select('facebook_id');
        $this->db->from('user');
        $this->db->where('facebook_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
  

}
