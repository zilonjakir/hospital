<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ('Access.php');
class Admin extends Access
{
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model("setting_model");
        $this->load->model("investigation_billing_model");
        define('CONTROLLER', strtolower(get_class()));
    }
    public function index() {
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "This is custom title";
        $data['view'] = "admin_home";
        $this->load->view("index",$data);
    }
    
    public function investigation_billing()
    {
        $data['doctors_list'] = $this->setting_model->doctors_list();
        //$data['referance_list'] = $this->setting_model->referance_list();
        $data['referance_list'] = $this->setting_model->ref_dr();
        $data['category_service_list'] = $this->setting_model->category_service_list();
        $data['service_list'] = $this->setting_model->service_list();
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Investigation Billing";
        $data['view'] = "investigation_billing";
        $this->load->view("index",$data);
    }
    
    public function deu_collection()
    {
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Investigation Billing";
        $data['bill_id']= $this->investigation_billing_model->investigation_list_sql();
        $data['view'] = "due_collection";
        $this->load->view("index",$data);
    }
    
    public function bill_info()
    {
        $id = $this->input->post('id');
        $result = $this->investigation_billing_model->get_pdf_information($id);
        echo json_encode($result);
    }
    
    public function due_collection_final_submit()
    {
        $bill_id = $this->input->post("bill_id");
        $due = $this->input->post("due");
        $paid = $this->input->post("paid");
        $prev_paid = $this->input->post("prev_paid");
        
        $this->db->query("UPDATE investigation_billing set total_paid=total_paid+".$paid.", due=due-".$paid." WHERE investigation_billing_id=".$bill_id);
        echo $bill_id;
    }

    public function get_investigation_billing_referance()
    {
        $data['referance_list'] = $this->setting_model->referance_list();
        $this->load->view("investigation_billing_referance_ajax",$data);
    }
    
    public function get_investigation_billing_referance2()
    {
        //$data['referance_list'] = $this->setting_model->referance_list();
        $data['referance_list'] = $this->setting_model->ref_dr();
        $this->load->view("investigation_billing_referance_ajax2",$data);
    }
    
    public function get_investigation_billing_doctors()
    {
        $data['doctors_list'] = $this->setting_model->doctors_list();
        $this->load->view("investigation_billing_doctors_ajax",$data);
    }
    
    
    public function commission_pay()
    {
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Commission Pay";
        $data['commission_holder_info']= $this->investigation_billing_model->commission_holder_info();
        //debug($this->db->last_query(),1);
        $data['view'] = "commission_pay";
        $this->load->view("index",$data);
    }
    public function commission_pay_search_value()
    {
        $ref_id = $this->input->post('ref_id');
        $a = explode("_", $ref_id);
        $date_range = str_replace(" ","",$this->input->post('date_range'));
        $dateb = explode("-", $date_range);
        $fromdate = date("Y-m-d",strtotime($dateb[0]));
        $todate = date("Y-m-d",strtotime($dateb[1]));
        
        $rows = $this->db->query("SELECT * FROM investigation_billing where ref_name='".$a[0]."' AND created between '".$fromdate."' AND '".$todate."'")->result();
        $html = "";
        //debug($this->db->last_query(),1);
        foreach ($rows as $row)
        {
            $ps = json_decode($row->category_service_json,TRUE);
            $less = $row->total_price - ($row->total_paid+$row->due);
            
            
            
            $html .= "<tr class='serviceField'>";
            $html .= "<td>".$row->investigation_billing_id."</td>";
            $html .= "<td>".$row->patient_name."</td>";
            $html .= "<td>".$row->created."</td>";
            $html .= get_specification_json_type($ps, "value");
            $html .= "<td class='rowDataSd'>".$less."</td>";
            $html .= "</tr>";
        }
            $html .= "<tr class='totalColumn'>";
            $html .= "<td colspan='3'>&nbsp;</td>";
            $html .= $this->investigation_billing_model->get_service_total("total");
            $html .= "<td class='totalCol'>100</td>";
            $html .= "</tr>";
            
            
            $html .= "<tr class='percentColumn'>";
            $html .= "<td colspan='3'>&nbsp;</td>";
            $html .= $this->investigation_billing_model->get_service_total("percent");
            $html .= "<td><input type='text' class='percenttotalvalue' name='less_percent' value='100' style='width:40px; text-align:right'></td>";
            $html .= "</tr>";
            
            $html .= "<tr class='percentTotalColumn'>";
            $html .= "<td colspan='3'>&nbsp;</td>";
            $html .= $this->investigation_billing_model->get_service_total("percent_total");
            $html .= "<td class='percenttotal totalpayableless' percent='100'>100</td>";
            $html .= "</tr>";
        echo $html;
    }

    
    public function commission_pay_submit()
    {
        $post = $this->input->post();
        $msg = "";
        if($post["ref_id"] == "")
        {
            $msg .= "Please select referance name.";
        }
        $a = explode("_", $post["ref_id"]);
        unset($post["ref_id"]);
        $post["ref_id"] = @$a[1];
        $date_range = str_replace(" ","",$this->input->post('daterange'));
        $dateb = explode("-", $date_range);
        $post['from_date'] = date("Y-m-d",strtotime($dateb[0]));
        $post['to_date'] = date("Y-m-d",strtotime($dateb[1]));
        
        
        $checkdate = $this->db->query("SELECT COUNT(*) as total FROM commision_pay WHERE ref_id=".((@$a[1])?$a[1]:0)." AND from_date >='".$post['from_date']."' AND to_date <='".$post['to_date']."'")->row();
        if($checkdate->total > 0)
        {
            $msg .= "Sorry This date range already paid";
        }
        
        
        unset($post['daterange']);
        if($msg == "")
        {
            $insert_id = $this->common_model->insert_data("commision_pay",$post);
            echo $insert_id;
        }
        else
        {
            echo $msg;
        }
        
    }

        public function services()
    {
        $data['service_list'] = $this->setting_model->service_list();
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Services";
        $data['view'] = "services";
        $this->load->view("index",$data);
    }
    
    public function service_list_save()
    {
        $post = $this->input->post();
        if($post['service_list_id'])
        {
            $where = array(
                "service_list_id"=>$post["service_list_id"]
            );
            unset($post['service_list_id']);
            $this->common_model->update_data("service_list",$post,$where);
            echo "updated";
        }
        else
        {
            $this->common_model->insert_data("service_list",$post);
            echo "saved";
        }
    }
    
    public function get_service_list()
    {
        $data['service_list'] = $this->setting_model->service_list();
        $this->load->view("service_list_ajax_view",$data);
    }
    
    
    public function categories()
    {
        $data['category_list'] = $this->setting_model->category_list();
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Categories";
        $data['view'] = "categories";
        $this->load->view("index",$data);
    }
    
    
    public function category_list_save()
    {
        $post = $this->input->post();
        if($post['category_id'])
        {
            $where = array(
                "category_id"=>$post["category_id"]
            );
            unset($post['category_id']);
            $this->common_model->update_data("category",$post,$where);
            echo "updated";
        }
        else
        {
            $this->common_model->insert_data("category",$post);
            echo "saved";
        }
    }
    
    public function get_category_list()
    {
        $data['category_list'] = $this->setting_model->category_list();
        $this->load->view("category_list_ajax_view",$data);
    }
    
    
    public function category_service()
    {
        $data['category_service_list'] = $this->setting_model->category_service_list();
        $data['category_list'] = $this->setting_model->category_list();
        $data['service_list'] = $this->setting_model->service_list();
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Category Service List";
        $data['view'] = "category_service";
        $this->load->view("index",$data);
    }
    
    public function category_service_list_save()
    {
        $post = $this->input->post();
        $this->form_validation->set_rules('service_list_id', 'Service Name', 'required|is_unique[category_service.service_list_id]');
        if($this->form_validation->run() == TRUE)
        {
            if($post['category_service_id'])
            {
                $where = array(
                    "category_service_id"=>$post["category_service_id"]
                );
                unset($post['category_service_id']);
                $this->common_model->update_data("category_service",$post,$where);
                echo "updated";
            }
            else
            {
                $this->common_model->insert_data("category_service",$post);
                echo "saved";
            }
        }
        else
        {
            echo validation_errors();
        }
        
    }
    
    
    public function get_category_service_list()
    {
        $data['category_service_list'] = $this->setting_model->category_service_list();
        $this->load->view("category_service_list_ajax_view",$data);
    }
    
    public function doctors()
    {
        $data['doctors_list'] = $this->setting_model->doctors_list();
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Doctors List";
        $data['view'] = "doctors";
        $this->load->view("index",$data);
    }
    
    
    public function dr_list_save()
    {
        $post = $this->input->post();
        if($post['dr_info_id'])
        {
            $where = array(
                "dr_info_id"=>$post["dr_info_id"]
            );
            unset($post['dr_info_id']);
            $this->common_model->update_data("dr_info",$post,$where);
            echo "updated";
        }
        else
        {
            $this->common_model->insert_data("dr_info",$post);
            echo "saved";
        }
    }
    
    public function get_doctors_list()
    {
        $data['doctors_list'] = $this->setting_model->doctors_list();
        $this->load->view("doctors_list_ajax_view",$data);
    }
    
    
    public function referance()
    {
        $data['referance_list'] = $this->setting_model->referance_list();
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Referance List";
        $data['view'] = "referance";
        $this->load->view("index",$data);
    }
    
    public function ref_list_save()
    {
        $post = $this->input->post();
        if($post['ref_info_id'])
        {
            $where = array(
                "ref_info_id"=>$post["ref_info_id"]
            );
            unset($post['ref_info_id']);
            $this->common_model->update_data("ref_info",$post,$where);
            echo "updated";
        }
        else
        {
            $this->common_model->insert_data("ref_info",$post);
            echo "saved";
        }
    }
    
    public function get_referance_list()
    {
        $data['referance_list'] = $this->setting_model->referance_list();
        $this->load->view("referance_list_ajax_view",$data);
    }
    
    public function my_services()
    {
        $cat_service_id= $this->input->post("cat_service_id");
        echo $this->investigation_billing_model->my_services_html($cat_service_id);
    }
    
    public function investigation_billing_submit()
    {
        $post = $this->input->post();
        //debug($post,1);
        $post['age_type'] = $post['age'].' '.$post['a_type'];
        $post['category_service_json'] = json_encode($post['category_service_list_id']);
        $post['created_by'] = $this->session->userdata('admin_id');
        unset($post['age']);
        unset($post['a_type']);
        unset($post['category_service_list_id']);
        $insert_id = $this->common_model->insert_data("investigation_billing",$post);
        $ref_commision = array(
            "investigation_billing_id"=>$insert_id,
            "referance_name"=>$post['ref_name'],
            "commision"=>  $this->investigation_billing_model->get_total_commision($post['category_service_json'])
        );
        $result = $this->common_model->insert_data("referance_commision",$ref_commision);
        echo $insert_id;
    }
    
    public function investigation_report_pdf($info=NULL)
    {
      $data['pdf_info'] = $this->investigation_billing_model->get_pdf_information($info);
      $data['investigation_details'] = $this->investigation_billing_model->investigation_details_info(json_decode($data['pdf_info']->category_service_json));
      $data['view'] = 'investigation_pdf_details';
      mpdf_create($data,'pdf_name','A4');
    }
    
    public function commission_pay_report_pdf($info=NULL)
    {
      $data['pdf_info'] = $this->investigation_billing_model->get_commission_pay_pdf_information($info);
      //debug($this->db->last_query(),1);
      //debug($data['pdf_info'],1);
      $data['view'] = 'commission_pdf_details';
      mpdf_create($data,'pdf_name','A4');
    }
    
    public function investigation_billing_list()
    {
        //debug($this->session->all_userdata(),1);
        $data['investigation_list'] = $this->investigation_billing_model->investigation_list_sql();
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Investigation Billing List";
        $data['view'] = "investigation_billing_list";
        $this->load->view("index",$data);
    }
    
    public function commision_holder_list()
    {
        $data['commision_holder_list'] = $this->investigation_billing_model->commision_holder_sql();
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Commision Holder Person";
        $data['view'] = "commision_holder_list";
        $this->load->view("index",$data);
    }
    
    public function deu_collection_list()
    {
        $data['due_collection_sql'] = $this->investigation_billing_model->due_collection_sql();
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Due Collection List";
        $data['view'] = "due_collection_list";
        $this->load->view("index",$data);
    }
    
    
    

    public function add_service_report_list()
    {
        $data['service_report_list'] = $this->setting_model->service_report_list();
        $data['service_list'] = $this->setting_model->service_list();
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Servicef Report List";
        $data['view'] = "service_report";
        $this->load->view("index",$data);
    }
    
    
    public function service_report_save()
    {
        $post = $this->input->post();
        if($post['service_report_id'])
        {
            $where = array(
                "service_report_id"=>$post["service_report_id"]
            );
            unset($post['service_report_id']);
            $this->common_model->update_data("service_report",$post,$where);
            echo "updated";
        }
        else
        {
            $this->common_model->insert_data("service_report",$post);
            echo "saved";
        }
    }
    
    public function get_service_report()
    {
        $data['service_report_list'] = $this->setting_model->service_report_list();
        $this->load->view("service_report_list_ajax_view",$data);
    }
    function create_menu_list_all($menu_id,$permitted_array){
        $result = $this->login_model->get_menu($menu_id);
        $p =  "<ul>";
        foreach($result as $item){
            if ($item['Count'] > 0) {              
                $p .= "<li><span>";
                $p .= "<input name='menu_id[]' type='checkbox' value='".$item['menu_id']."' ".(in_array($item['menu_id'], $permitted_array)?'checked':'')." />" . $item['menu_name'] ."</span>";
                $p .= "<ul>";
                $p .= $this->create_menu_list_all($item['menu_id'],$permitted_array);
                $p .= "</ul></li>";
            } elseif ($item['Count']==0) {              
                $p .= "<li><span><input name='menu_id[]' type='checkbox' value='".$item['menu_id']."' ".(in_array($item['menu_id'], $permitted_array)?'checked':'')." />" . $item['menu_name']."</span></li>";
            } else;
        }
        $p .= "</ul>";
        return $p;
    }
    public function menu_privilege()
    {
        $level_id = $this->input->post('user_level_id');
        $module_id = $this->input->post('module_id');
        $data = array();
        if($level_id != ''){
        $current_permitted_menu = $this->login_model->get_level_menu_list($level_id);
        $get_menu_info = $this->login_model->get_menu_model(NULL,$module_id);
        $array_str = '<ul>';
        
        foreach ($get_menu_info as $menu_item){
            $array_str .= "<li><span><i class='icon-leaf'></i><input name='menu_id[]' type='checkbox' value='".$menu_item['menu_id']."' ".(in_array($menu_item['menu_id'], $current_permitted_menu)?'checked':'')." />" . $menu_item['menu_name']."</span></li>".$this->create_menu_list_all($menu_item['menu_id'],$current_permitted_menu);
        }
        $array_str .= '</ul>';
        $data['menu_list_array'] = $array_str;
        $data['selected_level'] = $level_id;
        $data['selected_module'] = $module_id;
        }
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Menu Previlige";
        $data['modules'] = $this->db->query("SELECT * FROM module WHERE status='Active'")->result();
        $data['levels'] = $this->db->query("SELECT * FROM user_level WHERE status='Active' AND user_level_id NOT IN(1)")->result();
        $data['view'] = "menu_privilege";
        $this->load->view("index",$data);
    }
    function set_menu_access_for_level(){
        $selected_menu_array = $this->input->post('menu_id');
        $level_id = $this->input->post('level_id');
	$module_id = $this->input->post('module_id');
        $this->db->query("DELETE FROM privilege_menu WHERE user_level_id='$level_id' AND privilege_menu.menu_id IN (SELECT menu.menu_id FROM menu WHERE menu.module_id = $module_id)");
        foreach ($selected_menu_array as $menu_id) {
            $data = array(
                'menu_id' => $menu_id ,
                'user_level_id' => $level_id
             );

             $this->db->insert('privilege_menu', $data); 
        }
        $current_permitted_menu = $this->login_model->get_level_menu_list($level_id);
        $get_menu_info = $this->login_model->get_menu_model(NULL,$module_id); // call model for getting menu and sub menu

        $array_str = '<ul>';
        foreach ($get_menu_info as $menu_item){
            $array_str .= "<li><span><i class='icon-leaf'></i><input name='menu_id[]' type='checkbox' value='".$menu_item['menu_id']."' ".(in_array($menu_item['menu_id'], $current_permitted_menu)?'checked':'')." />" . $menu_item['menu_name']."</span></li>".$this->create_menu_list_all($menu_item['menu_id'],$current_permitted_menu);
        }
        $array_str .= '</ul>';
        $data['menu_list_array'] = $array_str;
        $data['selected_level'] = $level_id;
        $data['selected_module'] = $module_id;
        $data['page_title'] = "Menu Previlige";
        $data['modules'] = $this->db->query("SELECT * FROM module WHERE status='Active'")->result();
        $data['levels'] = $this->db->query("SELECT * FROM user_level WHERE status='Active' AND user_level_id NOT IN(1)")->result();
        $data['view'] = "menu_privilege";
        $this->load->view("index",$data);
    }
    
    public function level_privilege($auser_id=NULL)
    {
        $user_id = $this->input->post('user_id');
        $data = array();
        if(($user_id != '') || ($auser_id !=NULL)){
            if($auser_id)
            {
                $user_id = $auser_id;
            }
            $current_permitted_level = $this->login_model->get_level_list($user_id);
            $get_level_info = $this->login_model->get_level();
            $array_str = '<ul>';

            foreach ($get_level_info as $level_item){
                $array_str .= "<li><span><i class='icon-leaf'></i><input name='level_id[]' type='checkbox' value='".$level_item['user_level_id']."' ".(in_array($level_item['user_level_id'], $current_permitted_level)?'checked':'')." />" . $level_item['user_level_name'];
            }
            $array_str .= '</ul>';
            $data['menu_list_array'] = $array_str;
            $data['selected_user'] = $user_id;
        }
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Level Previlige";
        $data['users'] = $this->db->query("SELECT * FROM user where user_id NOT IN(1)")->result();
        //$data['levels'] = $this->db->query("SELECT * FROM user_level WHERE status='Active' AND user_level_id NOT IN(1)")->result();
        $data['view'] = "level_privilege";
        $this->load->view("index",$data);
    }
    
    
    function set_level_access_for_user(){
        $selected_level_array = $this->input->post();
        $this->db->query("DELETE FROM privilege_level WHERE user_id='".$selected_level_array["user_id"]."'");
        if(isset($selected_level_array['level_id']))
        {
            foreach ($selected_level_array['level_id'] as $vl)
            {
                $data = array(
                    "user_id"=>$selected_level_array["user_id"],
                    "user_level_id"=>$vl
                );
                $this->db->insert('privilege_level', $data); 
            }
        }
        
       redirect('admin/level_privilege/'.$selected_level_array["user_id"]);  
    }
}

