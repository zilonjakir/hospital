<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// function pdf_create($html, $filename='', $stream=TRUE,$width=960,$height=1000) 
// {
//     require_once("dompdf/dompdf_config.inc.php");
//     $dompdf = new DOMPDF();
	
//  	//$paper_size = array(0,0,1300,600);
//  	$paper_size = array(0,0,$width,$height);
// 	$dompdf->set_paper($paper_size);
//     $dompdf->load_html($html);
//     $dompdf->render();
//     if ($stream) {
//         $dompdf->stream($filename.".pdf",array('Attachment'=>0));
//     } else {
//         return $dompdf->output();
//     }
// }

if (!function_exists('do_mpdf_create')) 
{
    function do_mpdf_create($html_data, $file_name = "",$page='A4-L', $wide_mm=190,$height_mm=236, $data) 
    {        
        $CI_mpd =& get_instance(); // load ci object
        $CI_mpd->load->helper( array('url','file') ); // load helper
        $url = site_url();  // load site name
        // Set file name
        if ($file_name == "") {
            $file_name = 'lcms_report_' . date('jS_M_Y'); // set name
        }
        // load class file
        require 'MPDF60/mpdf.php';
        // $mpdf=new mPDF('utf-8', array($wide_mm,$height_mm));
        $mpdf=new mPDF('UTF-8',$page, 0, '', 15, 15, 35, 22, 3, 5, 'L');
        //$mpdf->debug=true;
        //$mpdf->SetHeader($url.'||Page {PAGENO}');
        $mpdf->SetHeader('    
            <div style="text-align:center">
                <div style="font-size:20px;">Dhaka Diagnostic Center</div>
                <p>50,52/C, Asad Avenue,(BRTC Busstand), Mohammadpur, Dhaka-1207, Phone : 58157660</p>
            </div>
            ');  
        $mpdf->SetHTMLFooter( '<hr>		
                <p style="text-align:center">Ref. Value May be Changed Depending On the Test Method.</p>
            ' );		
        // write html
        $mpdf->WriteHTML($html_data);
        // force browser to open pdf
        open_pdf( $file_name.".pdf" );
        // show on browser
        $mpdf->Output($file_name.".pdf",'I'); 
        exit; // Exit here




        /******** Need Config Help ***********/
        /******** Delete When Confirm Not Need Anymore ***********/


        // string Output ([ string $filename , string $dest ])
        // I: send the file inline to the browser. The plug-in is used if available. The name given by filename is used when one selects the "Save as" option on the link generating the PDF.
        // D: send to the browser and force a file download with the name given by filename.
        // F: save to a local file with the name given by filename (may include a path).
        // S: return the document as a string. filename is ignored.


        // A0 - A10, B0 - B10, C0 - C10
        // 4A0, 2A0, RA0 - RA4, SRA0 - SRA4
        // Letter, Legal, Executive, Folio
        // Demy, Royal
        // A (Type A paperback 111x178mm)
        // B (Type B paperback 128x198mm)
        // Ledger, Tabloid*
        // All of the above values can be suffixed with "-L" to force a 
        // Landscape page orientation document e.g. "A4-L".
        // If format is defined as a string, the final orientation parameter will be ignored.



        // class mPDF ( 
        //              [ string $mode 
        //              [, mixed $format 
        //              [, float $default_font_size 
        //              [, string $default_font 
        //              [, 
        //                  float $margin_left , 
        //                  float $margin_right , 
        //                  float $margin_top , 
        //                  float $margin_bottom , 
        //                  float $margin_header , 
        //                  float $margin_footer 
        //              [, string $orientation ]]]]]]
        //             )
        //             
        //             orientation (P,L)

        // $mpdf->SetFooter($url.'||Page {PAGENO}');

        // $mpdf->SetHTMLHeader( '<div class="footer">
        //                             <div class="footer_info">
        //                                 <div class="finfo_left">LAW CHAMBER MANAGEMENT SYSTEM (LCMS)</div>
        //                                 <div class="finfo_right">Powered by : Siddique Enterprise Limited</div>
        //                             </div>
        //                         </div>', '',1 );
        //  $mpdf->WriteHTML('Total Page No: '.$mpdf->getPageCount());

                 
    }
}

if (!function_exists('do_mpdf_create_2')) 
{
    function do_mpdf_create_2($html_data, $file_name = "",$page='A4', $wide_mm=190,$height_mm=236) 
    {        
        $CI_mpd =& get_instance(); // load ci object
        $CI_mpd->load->helper( array('url','file') ); // load helper
        $url = site_url();  // load site name
        // Set file name
        if ($file_name == "") {
            $file_name = 'lcms_report_' . date('jS_M_Y'); // set name
        }
        // load class file
        require 'MPDF60/mpdf.php';
        // $mpdf=new mPDF('utf-8', array($wide_mm,$height_mm));
        $mpdf=new mPDF('UTF-8',$page, 0, '', 15, 15, 30, 22, 3, 5, 'L');
        $mpdf->debug=true;
        //$mpdf->SetHeader($url.'||Page {PAGENO}');
        $mpdf->SetHTMLFooter( '<hr>     
        
        <div class="footer">
        
        <div style="width:100%">
             <div class="footer_left">Printed from <strong>Law Chamber Management System</strong>, Developed by <strong>Siddique Enterprise Ltd.</strong></div>
             <div class="footer_right">Page {PAGENO}</div>
             </div>
        </div>' );        
        // write html
        $mpdf->WriteHTML($html_data);
        // force browser to open pdf
        open_pdf( $file_name.".pdf" );
        // show on browser
        $mpdf->Output($file_name.".pdf",'I'); 
        exit; // Exit here
                 
    }
}
if (!function_exists('do_mpdf_create_3')) 
{
    function do_mpdf_create_3($html_data, $file_name = "",$page='A4', $wide_mm=190,$height_mm=236 ,$data) 
    {                
        $CI_mpd =& get_instance(); // load ci object
        $CI_mpd->load->helper( array('url','file') ); // load helper
        $url = site_url();  // load site name
        // Set file name
        if ($file_name == "") {
            $file_name = 'lcms_report_' . date('jS_M_Y'); // set name
        }
        // load class file
        require 'MPDF60/mpdf.php';
        // $mpdf=new mPDF('utf-8', array($wide_mm,$height_mm));
        $mpdf=new mPDF('UTF-8',$page, 0, '', 15, 15, 14.1, 22, 3, 5, 'L');
        $mpdf->debug=true;
        $mpdf->SetHeader('    
            <div class="chamber_name"><span class="chamber_logo">'.
                ( ($data['chamber_info']->chamber_logo=='') ? 
                    '<img src="'.base_url().'images/default_chamber_logo.png" height="30px" width="50px"/>':
                    '<img src="'.get_Pdf_Image( base_url().'uploads/'.$data['apps_chamber_code'].'/images/'. $data['chamber_info']->chamber_logo ).'" height="30px" width="50px"/>'
                ).
            '</span><span class="chamber_name2">'.$data['chamber_info']->chamber_name.'</span>
            </div>' 
        ); 
        //  $mpdf->SetHTMLFooter( $url.'||Page {PAGENO}'); 
        //  write html
        $mpdf->WriteHTML($html_data);
        $mpdf->WriteHTML( '    
            <div class="footer">        
            <div style="width:100%">
                 <div class="footer_left">Printed from <strong>Law Chamber Management System</strong>, Developed by <strong>Siddique Enterprise Ltd.</strong></div>
                 <div class="footer_right">Page '.$mpdf->page.'</div>
                 </div>
            </div>' 
        );
        // force browser to open pdf
        open_pdf( $file_name.".pdf" );
        // show on browser
        $mpdf->Output($file_name.".pdf",'I'); 
        exit; // Exit here
                 
    }
}
if( !function_exists('get_Pdf_Image'))
{
    function get_Pdf_Image( $PATH=NULL )
    {
        $imageDetails = @getimagesize( $PATH );
        if( isset($imageDetails["bits"]) && $imageDetails["bits"]>0)
        {
            return $PATH;
        }
        else
        {
            return base_url('images/default_chamber_logo.png');
        }
    }
}
if( !function_exists('open_pdf'))
{
    function open_pdf( $fileName=NULL )
    {
        header("Content-Type: application/pdf");
        header("Content-Disposition: inline; filename=\"".$fileName."\"");
    }
}
	
	
	
	if (!function_exists('do_mpdf_create_4')) 
{
    function do_mpdf_create_4($html_data, $file_name = "",$page='A4', $wide_mm=190,$height_mm=236 ,$data) 
    {                
        $CI_mpd =& get_instance(); // load ci object
        $CI_mpd->load->model( array('common_model') );
        $CI_mpd->load->helper( array('url','file') ); // load helper
        $url = site_url();  // load site name
        // Set file name
        if ($file_name == "") {
            $file_name = 'lcms_report_' . date('jS_M_Y'); // set name
        }
        // load class file
        require 'MPDF60/mpdf.php';
        // $mpdf=new mPDF('utf-8', array($wide_mm,$height_mm));
        $mpdf=new mPDF('UTF-8',$page, 0, '', 15, 15, 14.1, 0, 6, 5, 'L');
        $mpdf->debug=true;
        $mpdf->SetHeader('    
             	<div class="row">
                	<div class="">
                    	<div class="chamber"> '.$data['chamber_info']->chamber_name.' </div>
                    	<div class="address"> '.$data['chamber_info']->chamber_address.' '.$CI_mpd->common_model->get_country( $data['chamber_info']->chamber_country ).' </div>
                        <div class="phone"> Tel: '.$data['chamber_info']->chamber_phone.($data['chamber_info']->chamber_phone!=null && $data['chamber_info']->chamber_mobile!=null?", ".$data['chamber_info']->chamber_mobile:null).' </div>
                    </div>
                </div>			
			' 
        ); 
        //  $mpdf->SetHTMLFooter( $url.'||Page {PAGENO}'); 
        //  write html
        $mpdf->WriteHTML($html_data);
        $mpdf->WriteHTML( '  '   );
        // force browser to open pdf
        open_pdf( $file_name.".pdf" );
        // show on browser
        $mpdf->Output($file_name.".pdf",'I'); 
        exit; // Exit here
                 
    }
}


if (!function_exists('do_mpdf_create_5')) 
{
    function do_mpdf_create_5($html_data, $file_name = "",$page='A4', $wide_mm=190,$height_mm=236 ,$data) 
    {                
        $CI_mpd =& get_instance(); // load ci object
        $CI_mpd->load->model( array('common_model') );
        $CI_mpd->load->helper( array('url','file') ); // load helper
        $url = site_url();  // load site name
        // Set file name
        if ($file_name == "") {
            $file_name = 'lcms_report_' . date('jS_M_Y'); // set name
        }
        // load class file
        require 'MPDF60/mpdf.php';
        // $mpdf=new mPDF('utf-8', array($wide_mm,$height_mm));
        $mpdf=new mPDF('UTF-8',$page, 0, '', 34, 22.7, 50, 0, 3, 5, 'L');
        $mpdf->debug=true;
 
        //  $mpdf->SetHTMLFooter( $url.'||Page {PAGENO}'); 
        //  write html
        $mpdf->WriteHTML($html_data);
        $mpdf->WriteHTML( '  '   );
        // force browser to open pdf
        open_pdf( $file_name.".pdf" );
        // show on browser
        $mpdf->Output($file_name.".pdf",'I'); 
        exit; // Exit here
                 
    }
}

    function create_pdf( $data, $file_name = "",$page='A4', $wide_mm=190,$height_mm=236, $top_pad="50"  )
    {
        $prefix = prefix();
        $CI_mpd =& get_instance();
        $sess_id                =   $CI_mpd->session->userdata('apps_chamber_id');
        if( empty($sess_id) ) { show_404(); }
        
        /*** get chamber info ***/
        $chamber_table          =   $prefix.'chamber';
        $country_table          =   $prefix.'countries';
        $cite_table             =   $prefix.'districts';
        $chamber_sql            =   "   SELECT
                                          tc.*,tc1.name AS countryname, td.name AS cityname
                                        FROM $chamber_table tc
                                          LEFT JOIN $country_table tc1 ON tc.chamber_country= tc1.id
                                          LEFT JOIN $cite_table td ON tc.chamber_city=td.id
                                        WHERE tc.cid = '$sess_id'";

        //$CI_mpd->load->database(); 
        $data['chamber_info']       =   $CI_mpd->db->query($chamber_sql)->row();
        $data['apps_chamber_code']  =   $CI_mpd->session->userdata('apps_chamber_code');

        /*** get chamber info Ends ***/
        $CI_mpd->load->helper('dompdf');
        $CI_mpd->load->helper( array('url','file') ); // load helper

        $CI_mpd->load->view('apps/pdf_template',$data);
        $html_file_data       =   $CI_mpd->output->get_output();
        if(empty($file_name)){
            $file_name  =   "lcms report - ".date("jS M, Y");
        }
        
        $url = site_url();  // load site name
        // Set file name
        if ($file_name == "") {
            $file_name = 'lcms_report_' . date('jS_M_Y'); // set name
        }
        // load class file
        require 'MPDF60/mpdf.php';
        // $mpdf=new mPDF('utf-8', array($wide_mm,$height_mm));
        $mpdf=new mPDF('UTF-8',$page, 0, '', 34, 22.7, $top_pad, 0, 3, 5, 'L');
        $mpdf->debug=true;
 
        //  write html
        $mpdf->WriteHTML($html_file_data);
        // force browser to open pdf
        open_pdf( $file_name.".pdf" );
        // show on browser
        $mpdf->Output($file_name.".pdf",'I'); 
        exit; // Exit here            

    }
	

    
    
if (!function_exists('do_mpdf_create_6')) 
{
    function do_mpdf_create_6($html_data, $file_name = "",$page='A4', $wide_mm=190,$height_mm=236 ,$data) 
    {                
        $CI_mpd =& get_instance(); // load ci object
        $CI_mpd->load->model( array('common_model') );
        $CI_mpd->load->helper( array('url','file') ); // load helper
        $url = site_url();  // load site name
        // Set file name
        if ($file_name == "") {
            $file_name = 'lcms_report_' . date('jS_M_Y'); // set name
        }
        // load class file
        require 'MPDF60/mpdf.php';
        // $mpdf=new mPDF('utf-8', array($wide_mm,$height_mm));
        $mpdf=new mPDF('UTF-8',$page, 0, '', 34, 22.7, 10, 0, 6, 5, 'L');
        $mpdf->debug=true;
        $mpdf->SetHeader('    
                <div class="row" style="min-height: 130px !important;">
                    <div class="" style="padding-top:45px;">
                        <div class="chamber"> '.$data['chamber_info']->chamber_name.' </div>
                        <div class="address"> '.$data['chamber_info']->chamber_address.' '.$CI_mpd->common_model->get_country( $data['chamber_info']->chamber_country ).' </div>
                        <div class="phone"> Tel: '.$data['chamber_info']->chamber_phone.($data['chamber_info']->chamber_phone!=null && $data['chamber_info']->chamber_mobile!=null?", ".$data['chamber_info']->chamber_mobile:null).' </div>
                    </div>
                </div>          
            ' 
        ); 
        //  $mpdf->SetHTMLFooter( $url.'||Page {PAGENO}'); 
        //  write html
        $mpdf->WriteHTML($html_data);
        $mpdf->WriteHTML( '  '   );
        // force browser to open pdf
        open_pdf( $file_name.".pdf" );
        // show on browser
        $mpdf->Output($file_name.".pdf",'I'); 
        exit; // Exit here
                 
    }
}	


?>