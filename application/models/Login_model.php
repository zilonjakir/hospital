<?php
class Login_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}
	
	
	function login($username,$password)
	{
		$this->db->from('user');
		$this->db->where(array('username' => $username,'password'=>md5($password)));
		$this->db->limit(1);
		$query = $this->db->get();
		
		if($query->num_rows()==1)
		{
                    $row=$query->row();
                    $newdata = array(
                        'admin_id' => $row->user_id,
                        'admin_username' => $row->username,
                        'admin_name' => $row->name,
                        'admin_designation' => $row->designation,
                        'admin_contact_no' => $row->contact_no,
                        'admin_email' => $row->email,
                        'admin_role_id' => $row->role_id,
                        'admin_module_id' => $row->module_id,
                        'admin_default_module_id' => $row->default_module_id
               );
			$this->session->set_userdata($newdata);
			return true;
		}
		return false;
	}
	

	function logout()
	{
            $this->session->sess_destroy();
            redirect(base_url());
	}
	

	function is_logged_in()
	{
            $admin_username = $this->session->userdata('admin_username')!=false;
            $admin_id	   = $this->session->userdata('admin_id')!=false;
            $admin_level	= $this->session->userdata('admin_role_id')!=false;
            return ($admin_username && $admin_id && $admin_level);
	}
	
}
