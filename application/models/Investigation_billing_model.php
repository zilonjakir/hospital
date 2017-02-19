<?php

class Investigation_billing_model extends CI_Model 
{	
    public function __construct()
    {
        parent::__construct();
    }
    
    public function my_services_html($cat_service_id)
    {
        $this->db->select("cs.category_service_id,c.category_name,c.commision,s.service_list_name,s.service_list_price,s.service_list_id");
        $this->db->from("category_service cs");
        $this->db->join("category c","c.category_id=cs.category_id","left");
        $this->db->join("service_list s","s.service_list_id=cs.service_list_id","left");
        $this->db->where("cs.category_service_id",$cat_service_id);
        $row = $this->db->get()->row();
        //$price = $row->service_list_price-$row->commision;
        $html = "";
        if(!empty($row))
        {
            $price = $row->service_list_price;
            $html .= "<tr>";
            $html .= "<td><input type='hidden' name='category_service_list_id[]' value='".$row->service_list_id."'>".$row->service_list_name."</td>";
            $html .= "<td>".$row->category_name."</td>";
            $html .= "<td class='each_price'>".$price."</td>";
            $html .= "<td><a class='remove_service_list_row' href=''><i class='fa fa-trash-o'></i></a></td>";
            $html.= "</tr>";
        }
        
        return $html;
    }
    
    public function investigation_list_sql()
    {
        return $this->db->query("SELECT
                    investigation_billing.*,
                    dr_info.`name` as doctorName,user.username
                    FROM
                    investigation_billing
                    LEFT JOIN dr_info ON investigation_billing.doctors_name = dr_info.dr_info_id
                    LEFT JOIN user ON user.user_id=investigation_billing.created_by
                ")->result();
    }
    
    public function get_service_list_from_array($service_id)
    {
        $this->db->select("*");
        $this->db->from("service_list");
        $this->db->where_in("service_list_id",$service_id);
        $rows = $this->db->get()->result();
        
        $text = "";
        foreach ($rows as $row)
        {
            $text .= $row->service_list_name.",";
        }
        return rtrim($text,",");
    }
    
    public function get_total_commision($service_id_array)
    {
       // debug(json_decode($service_id_array),1);
        $service_id= json_decode($service_id_array);
        $in = "(".implode(',',$service_id).')';
        $result = $this->db->query("SELECT
                    Sum(category.commision) tcommision
                    FROM
                    category
                    WHERE category.category_id IN (SELECT category_service.category_id FROM category_service WHERE category_service.service_list_id IN ".$in." GROUP BY category_service.category_id)
                ")->row();
        //debug($this->db->last_query(),1);
        return $result->tcommision;
    }
    
    public function commision_holder_sql()
    {
        return $this->db->query("SELECT
            referance_commision.referance_name,
            investigation_billing.patient_name,
            investigation_billing.created,
            referance_commision.commision
            FROM
            referance_commision
            LEFT JOIN investigation_billing ON referance_commision.investigation_billing_id = investigation_billing.investigation_billing_id")->result();
    }
    
    public function commission_holder_info()
    {
        return $this->db->select("*")->from("ref_info")->get()->result();
    }

        public function due_collection_sql()
    {
        return $this->db->query("SELECT
                investigation_billing.patient_name,
                investigation_billing.created,
                investigation_billing.address_phone,
                investigation_billing.delivery_date,
                investigation_billing.ref_name,
                investigation_billing.total_price,
                investigation_billing.due,
                investigation_billing.total_paid,
                dr_info.`name`
                FROM
                investigation_billing
                LEFT JOIN dr_info ON investigation_billing.doctors_name = dr_info.dr_info_id WHERE investigation_billing.due > 0")->result();
    }
    
    public function get_pdf_information($id)
    {
        //debug($id,1);
        $this->db->select("*");
        $this->db->from("investigation_billing");
        $this->db->where("investigation_billing_id",$id);
        $result = $this->db->get()->row();
        //debug($this->db->last_query(),1);
        return $result;
    }
    
    public function get_commission_pay_pdf_information($id)
    {
        return $this->db->query("SELECT
            ref_info.`name`,
            ref_info.address,
            ref_info.mobile,
            commision_pay.id,
            commision_pay.ref_id,
            commision_pay.from_date,
            commision_pay.to_date,
            commision_pay.category_json,
            commision_pay.less_percent,
            commision_pay.payable,
            commision_pay.less,
            commision_pay.paid
            FROM
            commision_pay
            LEFT JOIN ref_info ON commision_pay.ref_id = ref_info.ref_info_id
            WHERE
            commision_pay.id = ".$id)->row();
    }
    
    public function investigation_details_info($category_service_json)
    {
        return $this->db->select("*")->from("service_list")->where_in("service_list_id",$category_service_json)->get()->result();
    }
    
    public function get_service_total($type)
    {
        $rows = $this->db->query("SELECT
                category.category_name,
                category.commision,
                service_list.service_list_name
                FROM
                category_service
                LEFT JOIN category ON category_service.category_id = category.category_id
                LEFT JOIN service_list ON category_service.service_list_id = service_list.service_list_id
                GROUP BY
                category_service.service_list_id");
        $html = "";
        if($type == "total")
        {
            foreach ($rows->result() as $row)
            {
                $html .= "<td class='totalCol'>Total</td>";
            }
        }
        else if($type == "percent")
        {
            foreach ($rows->result() as $row)
            {
                $html .= "<td class='rowDatapercent'><input type='text' class='percenttotalvalue' value='".$row->commision."' style='width:40px; text-align:right'></td>";
            }
        }
        else if($type == "percent_total")
        {
            foreach ($rows->result() as $row)
            {
                $html .= "<td class='percenttotal totalpayable' percent='".$row->commision."'>&nbsp;</td>";
            }
        }
        else if($type == "total_count")
        {
            $total_count = "";
            foreach ($rows->result() as $row)
            {
                $total_count .= "0,";
            }
            $html .= $total_count."0";
        }
        
        return $html;
    }
}

