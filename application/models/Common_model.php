<?php

class Common_model extends CI_Model 
{	
    public function __construct()
    {
        parent::__construct();
    }
    
    public function insert_data($table,$data)
    {
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }
    
    public function update_data($table,$data,$where=array())
    {
        if(!empty($where))
        {
            $this->db->where($where);
        }
        $this->db->update($table,$data);
    }
}

