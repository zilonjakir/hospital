<?php

class Report_model extends CI_Model 
{	
    public function __construct()
    {
        parent::__construct();
    }
    
    public function create_report_insert($post)
    {
        $result_entry_array = array();
        foreach ($post['result_entry'] as $k=>$row)
        {
            if($row)
            {
                $result_entry_array[$k] = $row;
            }
        }
        $post['test_value_json'] = json_encode($result_entry_array);
        unset($post['result_entry']);
        $this->db->insert("service_report_details",$post);
        return $this->db->insert_id();
    }
    
    public function report_list($service_id=NULL)
    {
        $this->db->select("sr.*");
        $this->db->select("sl.service_list_name");
        $this->db->from("service_report_details sr");
        $this->db->join("service_list sl","sr.service_list_id = sl.service_list_id","left");
        if($service_id)
        {
            $this->db->where("sr.service_list_id",$service_id);
        }
        return $this->db->get()->result();
    }
    
    public function patient_info($patient_id)
    {
        return $this->db->query("SELECT * FROM investigation_billing WHERE investigation_billing_id=".$patient_id)->row();
    }
    
    public function patient_services($sjson)
    {
        $sj = json_decode($sjson);
        $this->db->select("*");
        $this->db->from("service_list");
        $this->db->where_in("service_list_id",$sj);
        $rows = $this->db->get()->result();
        
        $html = '<option value="">Select Service</option>';
        foreach ($rows as $sl)
        {
            $html .= '<option value="'.$sl->service_list_id.'">'.$sl->service_list_name.'</option>';
        }
        return $html;
    }
    
    public function get_pdf_information($id)
    {
        return $this->db->query("SELECT
                    service_report_details.patient_id,
                    service_report_details.patient_name,
                    investigation_billing.ref_name,
                    service_report_details.created,
                    investigation_billing.sex,
                    investigation_billing.delivery_date,
                    investigation_billing.age_type,
                    service_report_details.test_value_json,
                    service_list.service_list_name
                    FROM
                    service_report_details
                    LEFT JOIN investigation_billing ON service_report_details.patient_id = investigation_billing.investigation_billing_id
                    LEFT JOIN service_list ON service_report_details.service_list_id = service_list.service_list_id
                    WHERE
                    service_report_details.service_report_details_id = ".$id)->row();
    }
    
    public function get_service_name($service_report_id)
    {
        return $this->db->query("SELECT *
                        FROM
                        service_report
                        WHERE
                        service_report.service_report_id = ".$service_report_id)->row();
    }
}

