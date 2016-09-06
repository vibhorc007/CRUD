<?php

class U {

    var $ci;
    var $user_id;
    var $firstname;
    var $lastname;
    var $email;
    var $image;
    var $type;

    public function __construct($params = array()) {
        $this->ci = & get_instance();

        if ($this->ci->session->userdata('admin_user_id')) {
            $this->ci->db->select('*');
            $this->ci->db->from('admin_user');
            $this->ci->db->where('admin_user_id', $this->ci->session->userdata('admin_user_id'));
            $this->ci->db->where('status', 1);
            $query = $this->ci->db->get();
            if ($query->num_rows()) {
                $row = $query->row_array();
                $this->admin_user_id = $row['admin_user_id'];
           //     $this->name = $row['name'];
                $this->username = $row['username'];
                $this->email = $row['email'];
                $this->password = $row['password'];
                $this->status = $row['status'];
            } else {
                $this->logout();
            }
        }
    }

    public function login($email, $password) {
        $this->ci->db->select('*');
        $this->ci->db->from('admin_user');
        $this->ci->db->where('username', $email);
        $this->ci->db->where('status', 1);
        $this->ci->db->where('password', md5($password));
        $query = $this->ci->db->get();

        if ($query->num_rows()) {
            $row = $query->row_array();

            $this->ci->session->set_userdata('admin_user_id', $row['admin_user_id']);
            $this->ci->session->set_userdata('email', $row['email']);
            $this->admin_user_id = $row['admin_user_id'];
            $this->name = $row['name'];
            $this->username = $row['username'];
            $this->email = $row['email'];
            $this->password = $row['password'];
            $this->status = $row['status'];
            return true;
        } else {
            return false;
        }
    }

    public function socialLogin($social_id, $social_type) {
        $this->ci->db->select('*');
        $this->ci->db->from('user');
        $this->ci->db->where('social_id', $social_id);
        $this->ci->db->where('social_type', strtolower($social_type));
        $query = $this->ci->db->get();

        if ($query->num_rows()) {
            $row = $query->row_array();

            $this->ci->session->set_userdata('user_id', $row['user_id']);
            $this->ci->session->set_userdata('email', $row['email']);
            $this->user_id = $row['user_id'];
            $this->email = $row['email'];
            $this->firstname = $row['firstname'];
            $this->lastname = $row['lastname'];
            $this->type = $row['type'];

            return 200;
        } else {
            return 404;
        }
    }

    public function logout() {
        $this->ci->session->unset_userdata('admin_user_id');
        $this->ci->session->unset_userdata('email');
        $this->admin_user_id = '';
        $this->name = '';
        $this->username = '';
        $this->email = '';
        $this->password = '';
        $this->status = '';

        //$this->ci->session->sess_destroy();
    }

    public function isLogged() {
        return $this->ci->session->userdata('admin_user_id');
    }

    public function getId() {
        return $this->admin_user_id;
    }

    public function getFirstname() {
        return $this->name;
    }

    public function getLastname() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getStatus() {
        return $this->status;
    }

}
