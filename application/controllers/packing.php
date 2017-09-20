<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Packing extends CI_Controller {



    public function __construct() {
        parent::__construct();
        $this->load->model('model_Packing');
        $this->load->helper('form');
         $this->load->library('fpdf');
        $this->load->model('model_security');
    }
	public function index()
	{
		$this->model_security->getsecurity();
		$isi['judul']='Packing Home';
        $isi['content'] = 'manajer/v_home';
		$this->load->view('tampilan_packing',$isi);
	}
        
        public function vpacking()
	{
		$this->model_security->getsecurity();
		$isi['judul']='Packing Home';
        $isi['content'] = 'Packinglist/v_packing';
        $this->load->model('Model_packing');
        $isi['data_packing'] = $this->Model_packing->getdatapacking();
		$this->load->view('tampilan_packing',$isi);
	}

    public function vpackingbarangx()
    {
        $this->model_security->getsecurity();
        $Id_Pesanan= $this->uri->segment(3,0);
        $isi['judul']='Packing';
        $isi['content'] = 'Packinglist/v_barangpack';
        $this->load->model('Model_packing');
        $isi['barangpackx'] = $this->Model_packing->barangpackx($Id_Pesanan);
        $this->load->view('tampilan_packing',$isi);
    }

    public function barangpackx()
    {
        $this->model_security->getsecurity();
        $Id_Barang= $this->uri->segment(3,0);
        $isi['judul']='Packing';
        $isi['content'] = 'Packinglist/v_packingbarangx';
        $this->load->model('Model_packing');
        $isi['id_barang'] = $this->Model_packing->idbrng($Id_Barang);
        $isi['xbox'] = $this->Model_packing->xbox($Id_Barang);
        $this->load->view('tampilan_packing',$isi);
    }

      public function vpackingx()
    {
        $this->model_security->getsecurity();

        $isi['judul']='Packing Home';
        $isi['content'] = 'Packinglist/v_Packingx';
        $this->load->model('Model_packing');
        $isi['data_packing'] = $this->Model_packing->getdatapacking();
        $this->load->view('tampilan_packing',$isi);
    }

       public function vnobox()
    {
        $this->model_security->getsecurity();
        $isi['judul']='No_box';
        $isi['content'] = 'Packinglist/No_Box';
        $this->load->model('Model_packing');
         $Id_Pesanan = $this->uri->segment(3,0);
        $isi['nobox'] = $this->Model_packing->nobox($Id_Pesanan);
        $this->load->view('tampilan_packing',$isi);
    }

          public function vhistoripacking()
    {
        $this->model_security->getsecurity();
        $isi['judul']='Packing Home';
        $isi['content'] = 'Packinglist/v_historipacking';
        $this->load->model('Model_packing');
        $isi['data_historipacking'] = $this->Model_packing->gethistoripacking();
        $this->load->view('tampilan_packing',$isi);
    }
        
        public function vbarangpacking()
    {
        $this->model_security->getsecurity();
        $Id_Pesanan = $this->uri->segment(3,0);
        $isi['judul']='Packing Barang';
        $isi['content'] = 'Packinglist/v_packingbarang';
        $this->load->model('Model_packing');
        $isi['id_barang'] = $this->Model_packing->idbrng($Id_Pesanan);
        $isi['data_packingbarang'] = $this->Model_packing->getdatabarangpacking($Id_Pesanan);
        $this->load->view('tampilan_packing',$isi);
    }

       public function databox()
    {
        $this->model_security->getsecurity();
        $Id_Pesanan = $this->uri->segment(3,0);
        $isi['judul']='Packing Barang';
        $isi['content'] = 'Packinglist/jml_box';
        $this->load->model('Model_packing');
        $isi['databox'] = $this->Model_packing->databox($Id_Pesanan);
        $this->load->view('tampilan_packing',$isi);
    }

     public function insrtbox() {
        $this->model_security->getsecurity();
        $this->load->model('Model_packing');
        $Id_Barang = $this->input->post('Id_Barang');
        
        $Jumlah = $this->input->post('Jumlah');
        $Jumlahbox = $this->input->post('Jumlahbox');
        
        echo $Jumlah;
        echo $Jumlahbox;
        
        $data = array( 
            'Id_Barang' => $this->input->post('Id_Barang'),
            'No_Box' => $this->input->post('No_Box'),
            'Jumlahbox' => $this->input->post('Jumlahbox')
        );
        if ($Jumlah <= 0){

        $message = "Box Sudah Penuh";
            echo "<script type='text/javascript'>alert('$message');
                      window.location.href='http://localhost/BCGLD/index.php/packing/barangpackx/$Id_Barang'
            </script>";
            //sleep(seconds)
            //redirect('manajer/vSttspsn');  

             
        }else{
        $Sisa = $Jumlah - $Jumlahbox ;
        $this->Model_packing->insert($data);
        $this->Model_packing->sisa($Sisa, $Id_Barang);
        redirect('packing/barangpackx/'.$Id_Barang);
}
    }

      public function vhistoribarangpacking()
    {
        $this->model_security->getsecurity();
        $isi['judul']='Packing Barang';
        $isi['content'] = 'Packinglist/v_historidatapacking';
        $this->load->model('Model_packing');
        $isi['getdatahistoribarangpacking'] = $this->Model_packing->getdatahistoribarangpacking();
        $this->load->view('tampilan_packing',$isi);
    }

        public function boox()
    {
        $this->model_security->getsecurity();
        $Id_Pesanan = $this->uri->segment(3,0);
        $nobox = $this->uri->segment(4,0);
        $isi['judul']='Packing Barang';
        $isi['content'] = 'Packinglist/v_bbox';
        $this->load->model('Model_packing');
        $isi['brg'] = $this->Model_packing->brg($Id_Pesanan,$nobox);
        $isi['data_packingbarang'] = $this->Model_packing->getdatabarangpacking($Id_Pesanan);

        $this->load->view('tampilan_packing',$isi);
    }


     public function boxx()
    {
        $this->model_security->getsecurity();
        $nobox = $this->uri->segment(3,0);
        $isi['judul']='Packing Barang';
        $isi['content'] = 'Packinglist/v_historidatapacking';
        $this->load->model('Model_packing');
        $isi['getdatahistoribarangpacking'] = $this->Model_packing->getdatahistoribarangpacking($nobox);
        $this->load->view('tampilan_packing',$isi);
    }
        
        
           public function insertbox()
	   {
	   $this->model_security->getsecurity();
        $this->load->model('Model_packing');
        $data = array( 
            'Id_Barang' => $this->input->post('Id_Barang'),
            'No_Box' => $this->input->post('No_Box'),

            'Jumlahbox' => $this->input->post('Jumlahbox')
           );
         $this->Model_packing->insert($data);  
        $isi['judul']='Packing Barang';
        $isi['content'] = 'Packinglist/v_packingbarang';
        $this->load->model('Model_packing');
        $Id_Pesanan = $this->input->post('Id_Pesanan');
       
        $isi['data_packingbarang'] = $this->Model_packing->getdatabarangpacking($Id_Pesanan);
	    $this->load->view('tampilan_packing',$isi);
        
	}
        
        
         public function updatepacking (){
        $this->model_security->getsecurity();
        $this->load->model('model_packing'); 
        $Kd_Packinglist = $this->input->post('Kd_Packinglist');
        $Id_Pesanan = $this->input->post('Id_Pesanan');
        $Tgl_Packing = $this->input->post('Tgl_Packing'); 
     
        $this->model_packing->updatenotif($Id_Pesanan); 
        redirect('Packing/vhistoripacking');
         }


        public function kirimpackinglist(){
            $this->load->model('model_packing');
            $Id_Barang = $this->uri->segment(3,0);
            $No_Box = $this->uri->segment(4,0);
            $barang = $this->model_packing->brg($Id_Barang,$No_Box);
            $this->load->library('pdf');
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Taufiq Maulana');
            $pdf->SetTitle('Send PDF');
            $pdf->SetSubject('TCPDF Tutorial');

            // set default header data
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

            $pdf->SetPrintHeader(true);
            $pdf->SetPrintFooter(true);

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            //set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            //set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            //set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // ---------------------------------------------------------

            // set font
            $pdf->SetFont('dejavusans', '', 10);

            // add a page
            $pdf->AddPage();
            // create some HTML content
            $htmlcontent = '<html>
                                              <body>
                                                    <table width="900"  align="Left" cellpadding="5" cellspacing="0">
                                                      <tr>
                                                            <td>Nama Pemesan: '.$barang[0]->Nama_Pemesan.'</td>
                                                            <td></td>
                                                      </tr>
                                                      <tr>
                                                            <td>Alamat: '.$barang[0]->Alamat.'</td>
                                                            <td></td>
                                                      </tr>
                                                      <tr> <td>ID Pesanan: '.$barang[0]->Id_Pesanan.'</td>
                                                          
                                                            <td>&nbsp;</td>
                                                      </tr>
                                                      <tr>
                                                            <td>Kode Packing List: '.$barang[0]->Kd_Packinglist.'</td>
                                                            <td>Tanggal: '.  date('d-M-Y').'</td>
                                                      </tr>
                                                      ';
                                                            
            $htmlcontent .= "</table>";

            $htmlcontent .= '<table border="1">';
            $htmlcontent .=  '<tr>
                                    <th align="center">No</th>
                                    <th align="center">ID Barang</th>
                                    <th align="center">Nama Barang</th>
                                    <th align="center">No_Box</th>
                                    <th align="center">Jumlah</th>
                             </tr>';
             $no = 1;
            for($i=0;$i<count($barang);$i++){
                $htmlcontent .=  "<tr>
                                    <td>".$no++."</td>
                                    <td>".$barang[$i]->Id_Barang."</td>
                                    <td>".$barang[$i]->Nama_Barang."</td>
                                    <td>".$barang[$i]->No_Box."</td>
                                    <td>".$barang[$i]->Jumlahbox."</td>
                                   "
                        ."</tr>";
            }
            $htmlcontent .= "</table></body></html>";
           

            // output the HTML content
            $pdf->writeHTML($htmlcontent, true, 0, true, 0);

            // reset pointer to the last page
            $pdf->lastPage();

            //Close and output PDF document
            $pdf->Output($_SERVER['DOCUMENT_ROOT'].'/BCGLD/file/'.$Id_Barang.'.pdf', 'F');
            $pdf->Output($_SERVER['DOCUMENT_ROOT'].'/BCGLD/file/'.$Id_Barang.'.pdf', 'E');
            $pdf->Output($_SERVER['DOCUMENT_ROOT'].'/BCGLD/file/'.$Id_Barang.'.pdf', 'I');
        }
        
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
