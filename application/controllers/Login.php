<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct() {
        parent::__construct();        
    }    
    function index() {
        if ($this->login_model->is_logged_in()) {
            redirect(base_url().'admin');
        } 
        else {
            $this->set_rules();
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Login';
                $data['action'] = base_url().'login';
                $this->load->view('template/login', $data);
            } 
            else {
                redirect(base_url().'admin');
                //redirect function
            }
        }
    }    
    function set_rules() {
        $this->form_validation->set_rules('username', 'Username', 'callback_login_check');
        $this->form_validation->set_error_delimiters('<div style="text-align:center; color:#f00;">', '</div>');
    }    
    function login_check($username) {
        $password = $this->input->post("password");
        $bullian = $this->login_model->login($username, $password);
        
        if (!$bullian) {
            $this->form_validation->set_message('login_check', 'Invalid username or password.');
            return false;
        }
        return true;
    }
    
    
    public function logout()
    {
        $this->login_model->logout();
    }
    
}
