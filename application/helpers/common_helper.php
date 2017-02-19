<?php
function debug($value, $die = FALSE) {
    echo (" <pre>\n");
    print_r($value);
    echo ("\n</pre>");
    if ($die == TRUE) {
        die('<h3> Die() </h3>');
    }
}
function get_specification_json_type($json_details,$flag)
{
    $CI = & get_instance();
    $jd_array = array();
    foreach ($json_details as $jd)
    {
        $jd_array[$jd] = $jd;
    }
    $rows = $CI->db->query("SELECT* FROM service_list");

    $html = "";
    if($flag == 'title')
    {
        foreach ($rows->result() as $row)
        {
            $html .= "<th>".$row->service_list_name."</th>";
        }
    }
    else if($flag == "value")
    {
        foreach ($rows->result() as $row)
        {
            if($row->service_list_id == @$jd_array[$row->service_list_id])
            {
                $html .= "<td class='rowDataSd'>".$row->service_list_price."</td>";
            }
            else
            {
                $html .= "<td class='rowDataSd'>0</td>";
            }
        }
    }
    return $html;
}



function rawQuery($rawSql) {
    $CI = & get_instance();
    return $CI->db->query($rawSql);
}
function edit_value($object, $value, $default_value = "") {
    if (is_object($object) AND !empty($object)) {
        return $object->$value;
    } 
    else {
        return $default_value;
    }
}
function edit_selected_value($object, $value, $option_value) {
    if (is_object($object) AND !empty($object)) {
        if ($object->$value == $option_value) {
            return "selected";
        } 
        else {
            return "";
        }
    } 
    else {
        return "";
    }
}



if (!function_exists('html_entities')) {
    function html_entities($str) {
        return htmlentities($str, ENT_QUOTES, "UTF-8");
    }
}





if (!function_exists('current_full_url')) {
    function current_full_url() {
        $CI = & get_instance();
        $url = $CI->config->site_url($CI->uri->uri_string());
        return $_SERVER['QUERY_STRING'] ? $url . '?' . $_SERVER['QUERY_STRING'] : $url;
    }
}



if(!function_exists('randomPassword'))
{
    function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }    
}

if(!function_exists('find_string'))
{
    function find_string($str, $niddle){
        if (strpos($str,$niddle) !== false) {
            return TRUE;
        }
    }
}



if (!function_exists('mpdf_create')) {
    function mpdf_create($data, $file_name = '', $page_size = 'A4-L') {        
        $CI = & get_instance();
        //debug($CI->session->all_userdata(),1);
        $sess_id = $CI->session->userdata('admin_id');
        if (empty($sess_id)) {
            show_404();
        } 
        //$data['infoIFneed'] = "";
        $CI->load->helper('dompdf');
        $CI->load->view('pdf/pdf_template', $data);
        $html = $CI->output->get_output();
        if (empty($file_name)) {
            $file_name = "eml report - " . date("jS M, Y");
        }
        do_mpdf_create($html, $file_name, $page_size, 190, 236, $data);
        /**
         * Legal
         * Letter
         * Demy
         * Ledger
         * A4
         */
    }
}