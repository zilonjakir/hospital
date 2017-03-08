<?php
class Login_model extends CI_Model 
{
        private $user_id;
	function __construct()
	{
		parent::__construct();
                $this->user_id = $this->session->userdata('admin_id');
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
            $where = (($this->session->userdata('admin_username') == 'superadmin')?'':' AND privilege_level.user_id='.$this->session->userdata('admin_id'));
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
                menu.parent_menu_id = 0 ".$where." AND
                menu.module_id = ".$this->session->userdata('admin_default_module_id')." 
                GROUP BY
                menu.menu_name
                ORDER BY menu.sort_number ASC")->result();
            //debug($this->db->last_query());
            return $result;
        }
        
        
        public function all_child_menu_list($parent_id=NULL)
        {
            $where = (($this->session->userdata('admin_username') == 'superadmin')?'':' AND privilege_level.user_id='.$this->session->userdata('admin_id'));
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
                menu.parent_menu_id = ".$parent_id.$where." AND
                menu.module_id = ".$this->session->userdata('admin_default_module_id')."
                GROUP BY
                menu.menu_name")->result();
            //debug($this->db->last_query());
            return $result;
        }
        
        
        function get_level_menu_list($level_id){
            $query = $this->db->query("SELECT
            privilege_menu.menu_id,
            privilege_menu.user_level_id,
            menu.module_id
            FROM
            privilege_menu
            INNER JOIN menu ON privilege_menu.menu_id = menu.menu_id
            WHERE
            privilege_menu.user_level_id = '$level_id'");
            $data = array();
            foreach($query->result_array() as $item){
                $data[] = $item['menu_id'];
            }
            return $data;
        }
        
        function get_level_list($user_id){
            $query = $this->db->query("SELECT
            user_level_id
            FROM
            privilege_level 
            WHERE
            user_id = '$user_id'");
            $data = array();
            foreach($query->result_array() as $item){
                $data[] = $item['user_level_id'];
            }
            return $data;
        }
        
        
        public function get_menu_model($command = NULL,$modl_id = NULL) {
            $user_level_id = $this->session->userdata('LEVEL_ID');
            $module_id = $modl_id==NULL?$this->session->userdata('default_module_id'):$modl_id;

            $this->db->select('*,module.module_name');
            $this->db->from('menu');
            $this->db->group_by('menu.menu_id'); 
            /*
             * If an admin logged in to the system he is able to access all apsis developer module menu.
             *No privilege is required.
             */ 
            $this->db->join('module', 'module.module_id = menu.module_id');
            if( $this->user_id != 1 ){
                $this->db->join('privilege_menu', 'privilege_menu.menu_id = menu.menu_id');
                $this->db->where_in('privilege_menu.user_level_id', $user_level_id);
            }
            if( $command == NULL ){
            $this->db->where('menu.module_id', $module_id);
            }
            $this->db->where('menu.status', 'Active');  
            $this->db->where('menu.menu_type', 'Main');  
            $this->db->order_by('menu.sort_number', 'asc'); 
            $query = $this->db->get();
            return $query->result_array();
        }
        
        public function get_level() {
            $this->db->select('*');
            $this->db->from('user_level');
            $this->db->where_not_in("user_level_id",array(1));
            $query = $this->db->get();
            return $query->result_array();
        }
        
        
        function get_menu($parent_id){
            $join_str = '';
            //$user_level_id = $this->session->userdata('LEVEL_ID');
            if( $this->user_id != 1 ){
                $join_str = "INNER JOIN privilege_menu ON privilege_menu.menu_id = a.menu_id AND privilege_menu.user_level_id IN (SELECT user_level_id FROM privilege_level WHERE user_id=".$this->session->userdata('admin_id').")";
            }
            $sql = "SELECT
            a.menu_id,
            a.menu_name,
            a.menu_url,
            a.icon_class,
            Deriv1.Count,
            module.module_name
            FROM `menu` a
            LEFT OUTER JOIN (SELECT parent_menu_id, COUNT(*) AS Count FROM `menu` GROUP BY parent_menu_id) Deriv1 ON a.menu_id = Deriv1.parent_menu_id
            JOIN module ON module.module_id = a.module_id
            $join_str
            WHERE a.parent_menu_id=$parent_id GROUP BY a.menu_id ORDER BY sort_number
            ";
            //echo $sql;
            $query = $this->db->query($sql);
            return $query->result_array();
        }
	
}
