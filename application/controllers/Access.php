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
        
        public function module_change($module_id)
        {
            $this->session->unset_userdata('admin_default_module_id');
            $this->session->set_userdata(array('admin_default_module_id'=>$module_id));
            redirect(base_url().'admin');
        }
}