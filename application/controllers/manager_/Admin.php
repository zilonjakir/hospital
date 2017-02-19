<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ('access.php');
class Admin extends Access
{
    public function __construct() {
        parent::__construct();
        define('CONTROLLER', strtolower(get_class()));
    }
    public function index() {
        //debug(implode(',',json_decode($this->session->userdata('admin_module_id'))),1);
        //debug('jak',1);
        $data['controller'] = CONTROLLER;
        $data['module_list'] = $this->common_model->getUserModelList();
        //debug($data['module_list']->result(),1);
        $data['page_title'] = "This is custom title";
        $data['view'] = "admin_home";
        $this->load->view("sitemanager/index",$data);
    }
    
}

