<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pdf extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper(array('url','buatpdf'));
        $this->load->database();
    }
    
    function index($download_pdf=""){
         $this->model_security->getsecurity();
        $ret='';
        $id="PSN001";
        $pdf_filename = 'user_info_'.$id.'.pdf';
        $link_download=($download_pdf== TRUE)?'':anchor(base_url().'pdf/index/true/','Download pdf');
   
        $query = $this->db->query("select * from Pemesan where Id_Pemesan = '$id'");
        if($query->num_row()>0)
           $user_info = $query->rowarray();
    }
    
} 

        $isi['judul'] = 'Home Manajer';
        $isi['content'] = 'PDF';
     
    
       
?>      