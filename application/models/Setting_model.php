<?php

class Setting_model extends CI_Model 
{	
    public function __construct()
    {
        parent::__construct();
    }
    
    public function service_list()
    {
        $this->db->select("*");
        $this->db->from("service_list");
        return $this->db->get()->result();
    }
    
    public function category_list()
    {
        $this->db->select("*");
        $this->db->from("category");
        return $this->db->get()->result();
    }
    
    public function category_service_list()
    {
        $this->db->select("cs.*,c.category_name,s.service_list_name");
        $this->db->from("category_service cs");
        $this->db->join("category c","c.category_id=cs.category_id","left");
        $this->db->join("service_list s","s.service_list_id=cs.service_list_id","left");
        return $this->db->get()->result();
    }
    
    public function doctors_list()
    {
        $this->db->select("*");
        $this->db->from("dr_info");
        return $this->db->get()->result();
    }
    
    public function referance_list()
    {
        $this->db->select("*");
        $this->db->from("ref_info");
        return $this->db->get()->result();
    }
    
    
    public function ref_dr()
    {
        return $this->db->query("SELECT
            ref_info.`name`
            FROM
            ref_info
            UNION ALL
            SELECT dr_info.`name` FROM dr_info")->result();
    }
    
    public function service_report_list($service_report_id = NULL)
    {
        $this->db->select("sr.*,s.service_list_name");
        $this->db->from("service_report sr");
        $this->db->join("service_list s","s.service_list_id=sr.service_list_id","left");
        if($service_report_id)
        {
            $this->db->where("s.service_list_id",$service_report_id);
        }
        return $this->db->get()->result();
    }
}

