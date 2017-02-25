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
        
        public function default_module()
        {
            $row = $this->db->query("SELECT module_name FROM module WHERE module_id=".$this->session->userdata('admin_default_module_id'))->row();
            return $row->module_name;
        }
        
        public function all_module_list()
        {
            return $this->db->query("SELECT
                            privilege_module.user_module_id,
                            module.module_name
                            FROM
                            privilege_module
                            LEFT JOIN module ON privilege_module.user_module_id = module.module_id
                            WHERE
                            module.`status` = 'Active' AND
                            privilege_module.user_id = ".$this->session->userdata('admin_id'))->result();
        }
        
        public function all_parent_menu_list()
        {
            $result = $this->db->query("SELECT
                menu.menu_name,
                menu.icon_class,
                menu.parent_menu_id,
                menu.menu_url,
                menu.menu_id
                FROM
                menu
                LEFT JOIN privilege_menu ON privilege_menu.menu_id = menu.menu_id
                LEFT JOIN privilege_level ON privilege_menu.user_level_id = privilege_level.user_level_id
                WHERE
                menu.menu_type = 'Main' AND
                menu.parent_menu_id = 0 AND
                privilege_level.user_id = ".$this->session->userdata('admin_id')." AND
                menu.module_id = ".$this->session->userdata('admin_default_module_id')."
                GROUP BY
                menu.menu_name")->result();
            //debug($this->db->last_query());
            return $result;
        }
        
        
        public function all_child_menu_list($parent_id=NULL)
        {
            $result = $this->db->query("SELECT
                menu.menu_name,
                menu.icon_class,
                menu.parent_menu_id,
                menu.menu_url,
                menu.menu_id
                FROM
                menu
                LEFT JOIN privilege_menu ON privilege_menu.menu_id = menu.menu_id
                LEFT JOIN privilege_level ON privilege_menu.user_level_id = privilege_level.user_level_id
                WHERE
                menu.menu_type = 'Sub' AND
                menu.parent_menu_id = ".$parent_id." AND
                privilege_level.user_id = ".$this->session->userdata('admin_id')." AND
                menu.module_id = ".$this->session->userdata('admin_default_module_id')."
                GROUP BY
                menu.menu_name")->result();
            //debug($this->db->last_query());
            return $result;
        }
	
}
