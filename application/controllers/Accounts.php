<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ('Access.php');
class Accounts extends Access
{
     public function __construct() {
        parent::__construct();
        $this->load->model("setting_model");
        $this->load->model("report_model");
        $this->load->model("account_model");
        $this->load->model("investigation_billing_model");
        define('CONTROLLER', strtolower(get_class()));
    }
    
    public function accounts_statement()
    {
//        $data['referance_list'] = $this->setting_model->ref_dr();
//        $data['category_service_list'] = $this->setting_model->category_service_list();
        $data['headTitle'] = $this->common_model->account_list();
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Accounts Statement";
        $data['view'] = "accounts_statement";
        $this->load->view("index",$data);
    }
    
    
    
//    public function get_account_statement()
//    {
//        $post = $this->input->post();
//        $transaction_date = $this->input->post("TransactionDate");
//        $date_ex = explode("-", $transaction_date);
//        $fromdate = $date_ex[0];
//        $todate = $date_ex[1];
//        $data['opening_balance_date'] = date(date('Y-m-d',strtotime($fromdate)),  strtotime(' -1 day'));
//        $account_head = $this->input->post("AccountName");
//        
//        $data['dynamic_thead'] = $this->account_reports_model->dynamic_thead($post,"thead");
//        $data['opening_balance_head'] = $this->account_reports_model->dynamic_thead($post,"opening_balance_head");
//       
//        $data['opening_balance'] = $this->account_reports_model->get_opening_balance($fromdate,$account_head,$post);
//        $data['statement_data'] = $this->account_reports_model->get_statement_data($fromdate,$todate,$account_head,$post); 
//        $this->load->view('accounting/reports/accounts_statement_result',$data);
//    }
    
    
    
    public function get_taging_by_acc_head()
    {
        $acc_head_id = $this->input->post("acc_head_id");
        echo $this->account_reports_model->get_taging_by_acc_head_html($acc_head_id);
    }
    public function get_account_statement()
    {
        $post = $this->input->post();
        $transaction_date = $this->input->post("TransactionDate");
        $date_ex = explode("-", $transaction_date);
        $fromdate = $date_ex[0];
        $todate = $date_ex[1];
        $data['opening_balance_date'] = date(date('Y-m-d',strtotime($fromdate)),  strtotime(' -1 day'));
        $account_head = $this->input->post("AccountName");
        //debug($account_head,1);
       // $data['dynamic_thead'] = $this->account_model->dynamic_thead($post,"thead");
       // $data['opening_balance_head'] = $this->account_model->dynamic_thead($post,"opening_balance_head");
       
        $data['opening_balance'] = $this->account_model->get_opening_balance($fromdate,$account_head,$post);
        $data['statement_data'] = $this->account_model->get_statement_data($fromdate,$todate,$account_head,$post); 
        //debug($this->db->last_query(),1);
        $this->load->view('accounts_statement_result',$data);
    } 
    
    
    public function expense_entry()
    {
        $data['expense_list'] = $this->account_model->expense_list();
        $data['expense_head_list'] = $this->account_model->expense_head_list();
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Expense Entry";
        $data['view'] = "expense_entry";
        $this->load->view("index",$data);
    }
    
    public function get_expense_list()
    {
         $data['expense_list'] = $this->account_model->expense_list();
        $this->load->view("expense_list_ajax_view",$data);
    }
    
    public function expense_entry_save() {
        //debug($this->session->all_userdata(),1);
        //$ChequeID = get_generated_code(8);
        $post = $this->input->post();
        //debug($post,1);
        //$accName = $this->cheque_management->get_fund_amount_cal($post['ChequeReferenceTypeValue'], $post['ChequeHead'], $post['Ref2'], 'accName');
        $insertArray[1] = array(
            "AccountName" => "Income In Cash",
            "Debit" => 0,
            "Credit" => $post['amount'],
            "Reference"=>"Expense for ".$post['expense_head']
        );
        $insertArray[2] = array(
            "AccountName" => $post['expense_head'],
            "Credit" => 0,
            "Debit" => $post['amount'],
            "Reference"=>"Expense for ".$post['expense_head']
        );
//        $indent_number = $post['Ref2'];
//        $proforma_invoice_id = $this->cheque_management->get_pi($indent_number);
        $voucharID = maxVoucherNo()+1;
        //debug($voucharID,1);
        $sl = 1;
        foreach ($insertArray as $dData) {
            $voucherDetailsData = array(
                'VoucherLineID' => $voucharID . '-' . $sl,
                'VoucherNo' => $voucharID,
                'SLNo' => $sl,
                'BranchCode' => 1,
                'AccountName' => $dData['AccountName'],
                'Debit' => $dData['Debit'],
                'Credit' => $dData['Credit'],
                'Currency' => 'BDT',
                'Rate' => 1,
                'Reference'=>$post['narration'],
                'UserID' => $this->session->userdata("admin_id"),
                'EffectiveDate' => date("Y-m-d")
            );
            if($post['voucherno'])
            {
                unset($voucherDetailsData['VoucherLineID']);
                unset($voucherDetailsData['VoucherNo']);
                unset($voucherDetailsData['SLNo']);
                unset($voucherDetailsData['BranchCode']);
                unset($voucherDetailsData['Credit']);
                $this->db->where("VoucherLineID",$post['voucherlineid']);
                $this->db->update("voucherdetails",$voucherDetailsData);
            }
            else
            {
                $this->db->insert("voucherdetails", $voucherDetailsData);
            }
            
            $sl++;
        }


        $voucherMainData = array(
            'VoucherNo' => $voucharID,
            'VoucherType'=>'Expense Entry',
            'VoucherEvent'=>'Aditional Expenses',
            'VoucherDate' => date("Y-m-d H:i:s"),
            'EntryDate' => date("Y-m-d H:i:s"),
            'TotalAmount' => $post['amount'],
            'ApplicationStatus' => 'Approved',
            'Version' => 1,
            'UserID' => $this->session->userdata("admin_id"),
            'ApprovedBy' => $this->session->userdata("admin_id")
        );
        if($post['voucherno'])
        {
            //
        }
        else
        {
            $this->db->insert("vouchermain", $voucherMainData);
        }
        
        echo TRUE;
    }
    
    
    public function expense_head()
    {
        $data['expense_head_list'] = $this->account_model->expense_head_list();
        //$data['expense_head_list'] = $this->account_model->expense_head_list();
        $data['controller'] = CONTROLLER;
        $data['page_title'] = "Expense Head";
        $data['view'] = "expense_head_entry";
        $this->load->view("index",$data);
    }
    
    
    public function expense_head_entry_save() {
        $post = $this->input->post();
        $accountCode = $this->db->query("SELECT MAX(CAST(AccountCode AS UNSIGNED)) as maxCode FROM chartofaccounts")->row();
        $insertArray = array(
            "AccountCode"=>$accountCode->maxCode+1,
            "IsGroup" =>0,
            "ParentID" => 4,
            "AccountName" => $post['expenseName'],
            "AccountType"=>"Expenditure",
            "DefaultCurrency"=>"BDT",
            "UserID"=>  $this->session->userdata('admin_id')
        );
        if($post['accountCode'])
        {
            $this->db->where("AccountCode",$post['accountCode']);
            $this->db->update("chartofaccounts", array("AccountName"=>$post['expenseName']));
        }
        else
        {
            $this->db->insert("chartofaccounts", $insertArray);
        }
        
        
        echo TRUE;
    }
    
    public function get_expense_head_list()
    {
        $data['expense_head_list'] = $this->account_model->expense_head_list();
        $this->load->view("expense_head_list_ajax_view",$data);
    }
}
?>