<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_Model extends CI_Model {
    public function save_data($data, $table) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function update_data($data,$table,$where){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    
    function get_acc_head(){
        $sql = "SELECT
        acc_head.acc_head_id,
        acc_head.acc_head_number,
        acc_head.acc_head_name,
        parent_acc.acc_head_number AS acc_parent_number,
        parent_acc.acc_head_name AS parent_acc,
        acc_head.is_group,
        acc_head.default_currency
        FROM
        acc_head
        LEFT JOIN acc_head AS parent_acc ON acc_head.parent_id = parent_acc.acc_head_number";
        $head_list = $this->db->query($sql)->result_array();
        return $head_list;
    }
    
    
    function get_tag_accounts()
    {
        $this->db->select("*");
        $this->db->from("acc_tag");
        return $this->db->get()->result_array();
    }
            
    
    function edit_acc_head($id){
        $query = $this->db->query("SELECT
            acc_1.acc_head_id,
            acc_1.is_group,
            acc_1.acc_head_number,
            acc_1.acc_tag_id,
            acc_1.default_currency,
            acc_1.income_expense,
            acc_1.acc_desc,
            acc_1.acc_head_name,
            acc_2.acc_head_number AS parent_number,
            acc_2.acc_head_name AS parent_name
            FROM
            acc_head acc_1
            LEFT JOIN acc_head acc_2 ON acc_1.parent_id = acc_2.acc_head_number
            WHERE
            acc_1.acc_head_id = $id");
        return $query->row();
        
    }
    
    function get_acc_head_tag($id){

        $query = $this->db->query("SELECT
            `acc_tag`.`acc_tag_id` 
            FROM (`acc_head`) 
            LEFT JOIN `acc_head_tag_details` ON `acc_head`.`acc_head_id` = `acc_head_tag_details`.`acc_head_id` 
            LEFT JOIN `acc_tag` ON `acc_head_tag_details`.`acc_tag_id` = `acc_tag`.`acc_tag_id` 
            WHERE `acc_head`.`acc_head_id` = $id"
        );
        return $query->result_array();
    }
    
    function get_acc_head_details(){
        $query = $this->db->query("SELECT
        chartofaccounts.AccountCode AS id,
        chartofaccounts.ParentID AS pId,
        CONCAT(chartofaccounts.AccountCode,'-',chartofaccounts.AccountName) AS name,
        chartofaccounts.AccountCode,
        chartofaccounts.AccountName,
        chartofaccounts.AccountDescription,
        chartofaccounts.ParentID,
        chartofaccounts.IsGroup,
        chartofaccounts.AccountType,
        chartofaccounts.TrackAgreement,
        chartofaccounts.TrackCustomer,
        chartofaccounts.TrackEmployee,
        chartofaccounts.TrackBranch,
        chartofaccounts.TrackCostCenter,
        chartofaccounts.TrackAssetItem,
        chartofaccounts.TrackBill,
        chartofaccounts.TrackBank,
        chartofaccounts.TrackInventoryItem,
        chartofaccounts.TrackTeller,
        chartofaccounts.DefaultCurrency,
        chartofaccounts.LastUpdate
        FROM
        chartofaccounts");
        return $query->result_array();
    }
    
    function delete_acc_head($id){
        $this->db->query("DELETE FROM chartofaccounts WHERE AccountCode = $id");
    }
    function table_list(){
        $sql = "SHOW TABLES";
        $tbl_list = $this->db->query($sql)->result_array();
        return $tbl_list;
    }
    
    function get_acc_tag_list(){
        $this->db->select('acc_tag.acc_tag_id,acc_tag.acc_tag_name,acc_tag.table_name,acc_tag.field_name');
        $this->db->from('acc_tag');
        $this->db->where("status = 'Active'");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get_tag_details($tag_id){
        $this->db->select('acc_tag.acc_tag_id,acc_tag.acc_tag_name,acc_tag.table_name,acc_tag.field_name');
        $this->db->from('acc_tag');
        $this->db->where("acc_tag.status = 'Active' AND acc_tag.acc_tag_id='$tag_id'");
        $query = $this->db->get();
        return $query->row();
    }
    
    function get_acc_list(){
        $this->db->select('chartofaccounts.AccountName,chartofaccounts.AccountCode');
        $this->db->from('chartofaccounts');
        //$this->db->where('parent_id !=', 0);
        $this->db->where('IsGroup', 0);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_journal_type(){
        $this->db->select('journal_type.journal_type_name');
        $this->db->from('journal_type');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function voucher_details_model($journal_id){
        $query = $this->db->query("SELECT
            acc_head.acc_head_number,
            acc_head.acc_head_name,
            journal_details.description,
            journal_details.dr_amount,
            journal_details.cr_amount
            FROM
            journal_details
            LEFT JOIN journal_main ON journal_details.journal_main_id = journal_main.journal_id
            RIGHT JOIN acc_head ON journal_details.acc_head_id = acc_head.acc_head_id
            WHERE
            journal_details.journal_main_id = $journal_id");
        return $query->result_array();
    }
    
    function get_address_details($address_id){
        $sql = "SELECT
        company_address.company_address_id,
        company_address.company_address_name,
        company_address.address_line_1,
        company_address.address_line_2,
        company_address.phone
        FROM
        company_address WHERE company_address.company_address_id = $address_id";
        $query = $this->db->query($sql);
        return $query->row();
    }
    
    
    public function get_my_approvd_list($u_id){
        
        $this->db->select("dl.*,u.username");
        $this->db->from("delegation_log dl");
        $this->db->join("user u",'u.user_id=dl.approve_by', 'LEFT');
        $this->db->join("user r",'r.user_id=dl.reliever_of', 'LEFT');
        $this->db->like("dl.ref_no","PA","RIGHT");
        $this->db->where("u.user_id",$u_id);
        $result = $this->db->get();
        return $result->result_array();
        
    }
    
    public function update_acc_tag_status_sql($id)
    {
        $row = $this->db->select("*")->from("acc_tag")->where("acc_tag_id",$id)->get()->row();
        if($row->status == "Active")
        {
            $this->db->where("acc_tag_id",$id)->update("acc_tag",array("status"=>"Inactive"));
            return "Inactive";
        }
        else if($row->status == "Inactive")
        {
            $this->db->where("acc_tag_id",$id)->update("acc_tag",array("status"=>"Active"));
            return "Active";
        }
    }
    
//    public function alter_acc_head_voucher($acc_tag_name)
//    {
//        
//    }
    
    public function account_head_maping($acc_code,$post_data)
    {
        $acc_head_id = $this->db->select("AccountCode")->from("chartofaccounts")->where("AccountCode",$acc_code)->get()->row();
        
        $ahtd = $this->db->select("*")->from("acc_tag")->where("status","Active")->get()->result();
      
        $this->db->where("acc_head_id",$acc_head_id->AccountCode);
        $this->db->delete("acc_head_tag_details");
        
        foreach ($ahtd as $ahtd_val)
        {
//            echo '<pre>';
//            print_r($post_data[$ahtd_val->track_name]) ;
//            exit();
            if($post_data[$ahtd_val->track_name])
            {
                $data = array(
                    "acc_head_id"=>$acc_head_id->AccountCode,
                    "acc_tag_id"=>$ahtd_val->acc_tag_id
                );
                $this->db->insert("acc_head_tag_details",$data);
            }
        }
    }
    
    public function get_opening_balance($fromdate,$acc_head_id,$post)
    {
        unset($post['TransactionDate']);
        unset($post['acc_head_id']);
        $this->db->select("(Sum(voucherdetails.Debit)-Sum(voucherdetails.Credit)) AS balance");
        $this->db->from("voucherdetails");
        $this->db->where('VoucherNo IN (SELECT VoucherNo FROM vouchermain)',NULL,FALSE);   
        $this->db->where("EffectiveDate < ",$fromdate);
        if($acc_head_id)
        {
            $this->db->where("AccountName",$acc_head_id);
        }
        //$this->db->where($post);
        $result = $this->db->get()->row();
        //debug($this->db->last_query(),1);
        return ($result->balance)?$result->balance:0;
    }
    
    public function get_statement_data($fromdate,$todate,$acc_head_id,$post)
    {
        unset($post['TransactionDate']);
        unset($post['acc_head_id']);
        $this->db->select("*");
        $this->db->from("voucherdetails");
        //$this->db->join("acc_head","acc_head.acc_head_id=voucherdetails.AccountName","left");
        $this->db->where('VoucherNo IN (SELECT VoucherNo FROM vouchermain)',NULL,FALSE);   
        $this->db->where('date_format(EffectiveDate,"%Y-%m-%d") BETWEEN "'. date('Y-m-d', strtotime($fromdate)). '" and "'. date('Y-m-d', strtotime($todate)).'"');
        if($acc_head_id)
        {
            $this->db->where("AccountName",$acc_head_id);
        }
       // $this->db->where($post);
        $result = $this->db->get()->result_array();
        //debug($result,1);
        //debug($this->db->last_query(),1);
        return $result;
    }
    
    
    public function expense_list()
    {
        $this->db->select("*");
        $this->db->from("voucherdetails");
        $this->db->join("vouchermain","voucherdetails.VoucherNo = vouchermain.VoucherNo","inner");
        $this->db->where("vouchermain.VoucherEvent","Aditional Expenses");
        $this->db->where("AccountName NOT IN('Income In Cash')",NULL,FALSE);
        $sql = $this->db->get()->result();
        //debug($this->db->last_query(),1);
        return $sql;
    }
    
    public function expense_head_list()
    {
        $this->db->select("*");
        $this->db->from("chartofaccounts");
        $this->db->where("ParentID",4);
        return $this->db->get()->result();
    }
}