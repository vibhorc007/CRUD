<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {
    private $error = array();
    private $data = array();
    
    public function index() {
        
     
        $this->layout->set_title('Login');
        
        if ($this->u->isLogged()) {
            
            redirect(site_url('common/home'), 'refresh');
        }
        
        if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->validate()) {
       
            redirect(site_url('common/home'));
            
        }

        if (isset($this->error['warning'])) {
            $this->data['error_warning'] = $this->error['warning'];
        } else {
            $this->data['error_warning'] = '';
        }
        
        $this->data['action'] = site_url('common');
        
        $this->layout->view('common/login', array_merge($this->data, $this->error), 'login');
    }
    
     protected function validate() {
         
        if (!$this->u->login($this->input->post('username'), $this->input->post('password'))) {
            $this->error['warning'] = 'No match for Username and/or Password.';
        }        
        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }
    
    public function logout() {
      
        $this->u->logout();
        redirect(site_url('common'), 'refresh');
    }
    
    public function home(){
  
        if (!$this->u->isLogged()) {
            redirect(site_url('common'), 'refresh');
        }
       redirect('home');
    }
    
  

}
