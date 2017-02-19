<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ('Access.php');
class Report extends Access
{
    public function __construct() {
        parent::__construct();
        $this->load->model("setting_model");
        $this->load->model("report_model");
        $this->load->model("investigation_billing_model");
        define('CONTROLLER', strtolower(get_class()));
    }
    
    public function create_report()
    {
        $data['investigation_list'] = $this->investigation_billing_model->investigation_list_sql();
        $data['service_list'] = $this->setting_model->service_list();
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Create Report";
        $data['view'] = "report/create_report";
        $this->load->view("index",$data);
    }
    
    public function test_info_html()
    {
        $service_id = $this->input->post("service_id");
        $data['service_report_list'] = $this->setting_model->service_report_list($service_id);
        //debug($data['service_report_list'],1);
        $this->load->view("report/test_info_html",$data);
    }
    
    public function service_report_submit()
    {
        $post = $this->input->post();
        $result = $this->report_model->create_report_insert($post);
        if($result)
        {
            //echo "saved";
            echo $result;
        }
    }
    
    public function report_list()
    {
        $data['service_list'] = $this->setting_model->service_list();
        $data['report_list'] = $this->report_model->report_list();
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Report List";
        $data['view'] = "report/report_list";
        $this->load->view("index",$data);
    }
    
    public function report_list_ajax_view()
    {
        $service_id = $this->input->post("service_id");
        $data['report_list'] = $this->report_model->report_list($service_id);
        $this->load->view("report/report_list_ajax_view",$data);
    }
    
    public function patient_info()
    {
        $patient_id = $this->input->post('patient_id');
        $patient_info = $this->report_model->patient_info($patient_id);
        $pservices = $this->report_model->patient_services($patient_info->category_service_json);
        echo $patient_info->patient_name."**".$patient_info->address_phone."**".$pservices;
    }
    
    public function report_pdf($info=NULL)
    {
        //debug("jak",1);
      $data['pdf_info'] = $this->report_model->get_pdf_information($info);
      //debug(json_decode($data['pdf_info']->test_value_json),1);
      //$data['sum']=$this->purchase_model->get_totalamount($info);
      $data['sum']="Jakir hosan";

      $data['view'] = 'pdf_details';
      mpdf_create($data,'pdf_name','A4');
    }
    
    
    public function due_collection_pdf()
    {
      $data['due_collection_sql'] = $this->investigation_billing_model->due_collection_sql();
      $data['sum']="Jakir hosan";
      $data['view'] = 'due_collection_pdf_details';
      mpdf_create($data,'pdf_name','A4');
    }
    
    public function commision_holder_pdf()
    {
        $data['commision_holder_list'] = $this->investigation_billing_model->commision_holder_sql();
        //debug($data['commision_holder_list'],1);
        $data['sum']="Jakir hosan";
        $data['view'] = 'comision_holder_pdf_details';
        mpdf_create($data,'pdf_name','A4');
    }
}

