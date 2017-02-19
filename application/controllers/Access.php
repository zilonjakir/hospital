<?php
class Access extends CI_Controller
{
	function __construct()
	{
            parent::__construct();
            //$this->load->model("login");
            if(!$this->login_model->is_logged_in())
            {
                redirect('manager/login');
            }
	}
}