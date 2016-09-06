    <?php 


if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('usermodel');
    }
//    public function index(){
//        
//        $this->layout->view('pages/forgot_password');
//    }
    
    public function reset_password($token = 0) {
        
        $data = array();
        
        $data['display_form'] = false;
        $data['success'] = $this->session->flashdata('success_verify');
        $data['error'] = $this->session->flashdata('error_verify');
        if (!($data['success'] || $data['error'])) {
            $this->load->model('usermodel');
            $r = $this->usermodel->verify_token($token);
            if ($token && $r) {
                if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->validateReset()) {
                    if ($this->usermodel->reset_password($token, $this->input->post('password'), $r['user_id'])) {
                        $this->session->set_flashdata('success_verify', 'Password has been successfully updated.');
                        redirect('common/reset_password');
                    } else {
                        $this->session->set_flashdata('error_verify', 'Something went wrong! Please try later.');
                        redirect('common/reset_password');
                    }
                } else {
                    $data['display_form'] = true;
                }
            } else {
                $data[' error'] = 'Password reset link is expired.';
            }
        }
        
        $this->load->view('user/forgot_password', $data);
    }
    
    protected function validateReset() {
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('password1', 'Confirm Password', 'trim|required|matches[password]');
        $this->form_validation->set_error_delimiters('<div class="text-danger small">', '</div>');
        return $this->form_validation->run();
    }
    
    public function verify($code = 0) {

        $data = array();
        if (!$this->session->flashdata('success_verify') && !$this->session->flashdata('error_verify')) {
            $this->load->model('usermodel');
            if (!$code) {
                $m = 'The verification code is invalid!';
                
                $this->session->set_flashdata('error_verify', $m);
            } else {
                $result = $this->usermodel->verify($code);
                if (isset($result['email_verification_status']) && $result['email_verification_status']) {
                    $m = 'You have already verified your email.';
                    //$m .= '<br />Click <a href='.site_url('common/signin').'>here</a> to sign in';
                    $this->session->set_flashdata('success_verify', $m);
                } else if (isset($result['email']) && $result['email']) {
                    $m = 'You have successfully verified your email. ';
                    //$m .= '<br />Click <a href='.site_url('common/signin').'>here</a> to sign in';
                    $this->session->set_flashdata('success_verify', $m);
                } else {
                    $m = 'The verification code is invalid or expired!';
                    $this->session->set_flashdata('error_verify', $m);
                }
            }            
            redirect(site_url('common/verify'));
        }
        
        $data['success'] = $this->session->flashdata('success_verify');
        $data['error'] = $this->session->flashdata('error_verify');
       
        $this->load->view('user/verify', $data);
    }
    
  
}