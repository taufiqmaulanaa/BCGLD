<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manajer extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('model_manajer');
        $this->load->helper('form');
        $this->load->library('fpdf');
        $this->load->model('model_security');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->model_security->getsecurity();
        $isi['judul'] = 'Home Manajer';
        $isi['content'] = 'manajer/v_home';
        $this->load->view('tampilan_manajer', $isi);
    }
    
    public function vPesanan() {
        $this->model_security->getsecurity();
        $this->load->model('model_manajer');
        $Id_Pemesan = $this->uri->segment(3,0);
        $isi ['Id_Pesanan']= $this->model_manajer->idpesanan();
        $isi ['idpes'] = $this->input->post('Id_Pesanan');
        $isi ['idpel']= $Id_Pemesan;
        $isi ['judul'] = 'Input Pesanan';
        $isi ['content'] = 'manajer/v_pesanan';
        $isi ['id_Pack']= $this->model_manajer->idPack();
        $isi ['get_pesanan']= $this->model_manajer->getPesanan($Id_Pemesan);
        $this->load->view('tampilan_manajer', $isi);
    }
    
  public function vBarang() {
        $this->load->model('model_manajer');
        $this->model_security->getsecurity();
        $id_pesanan = $this->uri->segment(3,0);
        $id_Packing = $this->uri->segment(3,0);
        $stt = $this->uri->segment(4,0);
        $isi['judul'] = 'Input Barang';
        $isi['content'] = 'manajer/v_barang';
        $isi['idpes'] = $id_pesanan;
        $isi['id_Pack'] = $id_Packing;
        $isi['brg'] = $this->model_manajer->getBarang($id_pesanan);
        $isi['id_barang'] = $this->model_manajer->idBarang();
        $this->load->view('tampilan_manajer', $isi);
        $data = array(
            'status_notif' => 5
        );
        if(!empty($stt)){
            $this->model_manajer->updateStatus($data, $id_pesanan);
            redirect('manajer/vBarang/'.$id_pesanan);
        }

    }
        public function vCustomer() {
        $this->model_security->getsecurity();
        $isi['judul'] = 'Input Customer';
        $isi['content'] = 'manajer/v_customer';
        $this->load->model('model_manajer');
        $isi['data'] = $this->model_manajer->getAllData();
        $isi['id'] = $this->model_manajer->getkodeunik();
        $isi['idpes'] = $this->input->post('Id_Pesanan');
        $this->load->view('tampilan_manajer', $isi);
        
    }

 
    public function vHarga() {
        $this->model_security->getsecurity();
        $this->load->model('model_manajer');
        $isi['getharga'] = $this->model_manajer->getharga();
         //$total_harga = $this->uri->segment(4,0);
        //$id_barang = $this->uri->segment(3,0);
        //$isi['getharga'] = $this->model_manajer->getharga($id,$total_harga,$id_barang);
     
        }
    


    public function vSttspsn() {
        $this->model_security->getsecurity();
        $isi['judul'] = 'Status Pesanan';
        $isi['content'] = 'manajer/v_StatusPesan';
        $this->load->model('model_manajer');
        $isi['get_pesanan'] = $this->model_manajer->getstspsn();
     $isi['idPack']= $this->model_manajer->idPack();
        $this->load->view('tampilan_manajer', $isi);
    }
    
    
    public function vproduksi() {

        $this->model_security->getsecurity();
        $id_pesanan = $this->uri->segment(3,0);
        $isi['judul'] = 'Status Produksi';
        $isi['content'] = 'manajer/v_produksi';
        $this->load->model('model_manajer');
        $isi['get_produksi'] = $this->model_manajer->getproduksi();
         $data = array(
            'status_notif' => 11
        );
        if(!empty($stt)){
            $this->model_manajer->updateStatuss($data, $id_pesanan);
            redirect('manajer/vproduksi/'.$id_pesanan);
        }
        $this->load->view('tampilan_manajer', $isi);
    }
    
     public function vpackinglist() {

        $this->model_security->getsecurity();
        $isi['judul'] = 'Packinglist';
        $id_pesanan = $this->uri->segment(3,0);
        $isi['content'] = 'manajer/v_packinglist';
        $this->load->model('model_manajer');
        $isi['data_packingbarang'] = $this->model_manajer->data_packingbarang();
        $this->load->view('tampilan_manajer', $isi);
      
    }
    
    
         public function Laporan() {

        $this->model_security->getsecurity();
        $isi['judul'] = 'Laporan';
        $isi['content'] = 'manajer/v_buatlaporan';
        $this->load->model('model_manajer');
        $isi['data_Laporan'] = $this->model_manajer->data_Laporan();
         $this->load->view('tampilan_manajer', $isi);
    }
    
    public function updteLaporan() {

        $this->model_security->getsecurity();
        $isi['judul'] = 'Laporan';
        $isi['content'] = 'manajer/v_buatlaporan';
        $idpesanan = $this->input->post('Id_Pesanan');
        $this->model_manajer->Lapor($idpesanan);
        $this->model_manajer->updateStatusp($idpesanan);
        redirect('manajer/Laporan');
    }
    
     public function vBarangprod() {
        $this->load->model('model_manajer');
        $this->model_security->getsecurity();
        $id_pesanan = $this->uri->segment(3,0);
        $stt = $this->uri->segment(4,0);
        $isi['judul'] = 'Barang Produksi';
        $isi['content'] = 'manajer/v_barangprod';
        $isi['idpes'] = $id_pesanan;
        $isi['brg'] = $this->model_manajer->getBarang($id_pesanan);
        $this->load->view('tampilan_manajer', $isi);
          $data = array(
            'status_notif' => 10
        );
        if(!empty($stt)){
            $this->model_manajer->updateStatusprod($data, $id_pesanan);
            redirect('manajer/vBarangprod/'.$id_pesanan);
        }
    }
    
        
    public function insertCustomer() {
        $this->model_security->getsecurity();

        $this->load->model('model_manajer');
        $data = array( 
            'Id_Pemesan' => $this->input->post('Id_Pemesan'),
            'Nama_Pemesan' => $this->input->post('Nama_Pemesan'),
            'Alamat' => $this->input->post('Alamat'),
            'Email' => $this->input->post('Email'),
            'Telepon' => $this->input->post('Telepon'),
        );
        $this->model_manajer->insert($data);
        $isi['judul'] = 'Input Pesanan';
        $isi['content'] = 'manajer/v_pesanan';
        $isi['idpel'] = $this->input->post('Id_Pemesan');
        $isi ['id_Pack']= $this->model_manajer->idPack();
        $isi ['Id_Pesanan']= $this->model_manajer->idpesanan();    
        $this->load->view('tampilan_manajer', $isi);


    }

   public function insertPesanan() {
        $this->model_security->getsecurity();
        $this->load->model('model_manajer');
        $data = array(
            'Id_Pesanan' => $this->input->post('Id_Pesanan'),
            'Id_Pemesan' => $this->input->post('Id_Pemesan'),
            'Tgl_Pesanan' => date("Y-m-d", strtotime($this->input->post('Tgl_Pesanan'))),
            'Kd_Packinglist' => $this->input->post('Kd_Packinglist')
        );
        
        $idpack = $this->input->post('Kd_Packinglist');
        $this->model_manajer->insertpsn($data,$idpack);
        $id = $this->input->post('Id_Pesanan');
        $isi['judul'] = 'Input Barang';
        $isi['content'] = 'manajer/v_Barang';
        $isi['idpes'] = $this->input->post('Id_Pesanan');
        $isi['idpel'] = $this->input->post('Id_Pemesan');
        $isi['brg'] = $this->model_manajer->getbarang($id);
        $isi['id_barang'] = $this->model_manajer->idBarang();
        $isi['get_nama'] = $this->model_manajer->idpesanan();
         $isi['get_Pack'] = $this->model_manajer->idPack();
        $this->load->view('tampilan_manajer', $isi);
   }

     public function insertBarang() {
        $this->model_security->getsecurity();
        $this->load->model('model_manajer');
        $data = array(
            'Id_Barang' => $this->input->post('Id_Barang'),
            'Id_Pesanan' => $this->input->post('Id_Pesanan'),
            'Nama_Barang' => $this->input->post('Nama_Barang'),
            'Kain' => $this->input->post('Kain'),
            'Print' => $this->input->post('Print'),
            'Warna' => $this->input->post('Warna'),
            'Body' => $this->input->post('Body'),
            'Lace' => $this->input->post('Lace'),
            'Jumlah' => $this->input->post('Jumlah'),
        );
        $id = $this->input->post('Id_Pesanan');
        $id_barang = $this->input->post('Id_Barang');
        $this->model_manajer->insrtbrng($data,$id_barang);
        $isi['judul'] = 'Input Barang';
        $isi['content'] = 'manajer/v_Barang';
        $isi['idpes'] = $this->input->post('Id_Pesanan');
        $isi['id_barang'] = $this->model_manajer->idBarang();
        $isi['brg'] = $this->model_manajer->getbarang($id);
        $this->load->view('tampilan_manajer', $isi);
    }

   
     public function updateCustomer() {
        $this->model_security->getsecurity();
        $id = $this->input->post('Id_Pemesan');
        $data = array(
            'Nama_Pemesan' => $this->input->post('Nama_Pemesan'),
            'Alamat' => $this->input->post('Alamat'),
            'Email' => $this->input->post('Email'),
            'Telepon' => $this->input->post('Telepon'),
        );
        $this->load->model('model_manajer');
        $this->model_manajer->update($data, $id);
        redirect('manajer/vCustomer');
    }
    
     public function uptdpsn() {
        $this->model_security->getsecurity();
        $this->load->model('model_manajer');
        $idpes = $this->input->post('Id_Pesanan');
        $DP = $this->input->post('DP');
        $harga = $this->input->post('harga');
        $setengah = $harga / 2 ;

        if ($DP < $setengah){

        $message = "Dp Kurang Dari Setengah Harga";
            echo "<script type='text/javascript'>alert('$message');
                    window.location.href='http://localhost/BCGLD/index.php/manajer/vSttspsn'
            </script>";
            //sleep(seconds)
            //redirect('manajer/vSttspsn');

             ;
        }else{
        $id_Pack =$this->input->post('Kd_Packinglist');
        $this->model_manajer->updtstspsn($DP,$idpes,$id_Pack);
        $this->model_manajer->updetnotifprod($idpes);
        redirect('manajer/vSttspsn');

    }
    }
    
    public function vtotal() {
            $idpes = $this->input->post('Id_Pesanan');
            $id_barang = $this->input->post('Id_Barang');
            $harga_total = $this->input->post('Total_Harga');
            $pajak = $this->input->post('Pajak');
            $harga = $this->input->post('Harga');
            $this->input->post('submit');
            $this->model_manajer->htotal($idpes,$harga_total, $id_barang,$pajak,$harga);
            redirect('manajer/vSttspsn');
    }
          
    

    public function deleteCustomer($id) {
        $this->model_security->getsecurity();
        $this->load->model('model_manajer');
        $this->model_manajer->delete($id);
        redirect('manajer/vCustomer','refresh');
    }
    
     public function deletePesanan() {
        $this->model_security->getsecurity();
        $this->load->model('model_manajer');
        $id_pesanan = $this->input->post('Id_Pesanan');
        $Id_Pemesan = $this->input->post('Id_Pemesan');
        $this->model_manajer->deletepesanan($id_pesanan);
        $this->session->set_flashdata("deletepesan",'<div class="alert alert-success"><strong>Pesanan Berhasil Di Hapus!</strong></div>');
        redirect('manajer/vPesanan/'.$Id_Pemesan);
    }
    
       public function deleteBarang() {
        $this->model_security->getsecurity();
        $this->load->model('model_manajer');
        $id_pesanan = $this->input->post('Id_Pesanan');
        $Id_Barang = $this->input->post('Id_Barang');
        $this->model_manajer->deletebarang($Id_Barang);
        $this->session->set_flashdata("pesan",'<div class="alert alert-success"><strong></strong>Barang Berhasil Di Hapus!</div>');
        redirect('manajer/vBarang/'.$id_pesanan,'refresh');
    }

    public function editBarang() {
        $this->model_security->getsecurity();

        $id_barang = $this->input->post('Id_Barang');

        $data = array(
            'Harga_Kain' => $this->input->post('Harga_Kain'),
            'Harga_Print' => $this->input->post('Harga_Print'),
            'Harga_Jahit' => $this->input->post('Harga_Jahit')
        );
        $this->load->model('model_manajer');
        $this->model_manajer->updateharga($data, $id_barang);
        redirect('manajer/vPesanan');
    }
    
   public function email(){
        $namapemesan = $this->uri->segment(3);
        $id_pesanan = $this->uri->segment(4);
        $barang = $this->model_manajer->getBarangemail($id_pesanan);
        //$htotal = $this->model_manajer->hpes($id_pesanan);
        $decimal = "0";
        $ribuan = ".";
        $pemisah = ",";
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
                                                      <tr> <td>ID Pesanan: '.$id_pesanan.'</td>
                                                          
                                                            <td>&nbsp;</td>
                                                      </tr>
                                                      <tr>
                                                         
                                                            <td>Tanggal: '.  date('d-M-Y').'</td>
                                                      </tr>
                                                      ';
$htmlcontent .= "</table>";

$htmlcontent .= '<table width="650" border="1">';
$htmlcontent .=  '<tr>
                        <th align="center">No</th>
                        <th align="center">ID Barang</th>
                <th align="center">Nama Barang</th>
                        <th align="center">Kain</th>
                        <th align="center">Print</th>
                        <th align="center">Warna</th>
                        <th align="center">Jumlah</th>
                        <th align="center">Harga Satuan</th>
            <th align="center">Harga</th>
                 </tr>';
 $no = 1;
for($i=0;$i<count($barang);$i++){
    $htmlcontent .=  '<tr>
                        <td>'.$no++.'</td>
                        <td>'.$barang[$i]->Id_Barang.'</td>
                        <td>'.$barang[$i]->Nama_Barang.'</td>
                        <td>'.$barang[$i]->Kain.'</td>
                        <td>'.$barang[$i]->Print.'</td>
                        <td>'.$barang[$i]->Warna.'</td>
                        <td>'.$barang[$i]->Jumlah.'</td>
                        <td>Rp'.$barang[$i]->Harga_Satuan.'</td>
            <td>Rp.'.$barang[$i]->Hargax.'</td>'
            .'</tr>';
}
$htmlcontent .=  "<tr>"
        . '<td colspan="8">Harga</td>'
        . "<td>Rp.".$barang[0]->Harga."</td>"
        . "</tr>";
$htmlcontent .=  "<tr>"
        . '<td colspan="8">Pajak</td>'
        . "<td>Rp.".$barang[0]->Pajak."</td>"
        . "</tr>";
$htmlcontent .=  "<tr>"
        . '<td colspan="8">Total</td>'
        . "<td>Rp.".$barang[0]->Total_Harga."</td>"
        . "</tr>";
$htmlcontent .= "</table></body></html>";

// output the HTML content
$pdf->writeHTML($htmlcontent, true, 0, true, 0);

// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output($_SERVER['DOCUMENT_ROOT'].'/BCGLD/file/'.$id_pesanan.'.pdf', 'F');
//$pdf->Output($_SERVER['DOCUMENT_ROOT'].'/BCGLD/file/'.$id_pesanan.'.pdf', 'E');
$pdf->Output($_SERVER['DOCUMENT_ROOT'].'/BCGLD/file/'.$id_pesanan.'.pdf', 'I');
        
        
        $datapemesan =  $this->model_manajer->email($namapemesan);
        $this->load->library('email'); // load email library
        $this->email->from('taufiqmaulanaa@gmail.com', 'Taufiq as sender name');
        $this->email->to($datapemesan[0]->Email);
        $this->email->subject('Your Subject');
        $this->email->message('Your Message');
        $this->email->attach('/Applications/XAMPP/xamppfiles/htdocs/BCGLD/file/'.$id_pesanan.'.pdf');
        
        if ($this->email->send()) {
            echo "Mail Sent!" . $datapemesan[0]->Email;
        } else {
            echo "There is error in sending mail!" . $datapemesan[0]->email;
        }
    }
    public function kirimpackinglist(){
            $id_pesanan = $this->uri->segment(3);
            $kd_packinglist = $this->uri->segment(4);
            $barang = $this->model_manajer->kirimPackingbarang($id_pesanan);
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
                                                      <tr> <td>ID Pesanan: '.$id_pesanan.'</td>
                                                          
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
                                    <th align="center">Box</th>
                                    <th align="center">Kain</th>
                                    <th align="center">Print</th>
                                    <th align="center">Warna</th>
                                    <th align="center">Jumlah</th>
                                    <th align="center">Harga Satuan</th>
                                    <th align="center">Harga</th>
                             </tr>';
             $no = 1;
            for($i=0;$i<count($barang);$i++){
                $htmlcontent .=  "<tr>
                                    <td>".$no++."</td>
                                    <td>".$barang[$i]->Id_Barang."</td>
                                    <td>".$barang[$i]->Nama_Barang."</td>
                                    <td>".$barang[$i]->No_Box."</td>
                                    <td>".$barang[$i]->Kain."</td>
                                    <td>".$barang[$i]->Print."</td>
                                    <td>".$barang[$i]->Warna."</td>
                                    <td>".$barang[$i]->Jumlah."</td>
                                    <td>".$barang[$i]->Harga_Satuan."</td>
                                    <td>".$barang[$i]->Harga. "</td>"
                        ."</tr>";
            }
            $htmlcontent .=  "<tr>"
                    . '<td colspan="9">Harga</td>'
                    . "<td>Rp.".$barang[0]->Harga."</td>"
                    . "</tr>";
            $htmlcontent .=  "<tr>"
                    . '<td colspan="9">Pajak</td>'
                    . "<td>Rp.".$barang[0]->Pajak."</td>"
                    . "</tr>";
            $htmlcontent .=  "<tr>"
                    . '<td colspan="9">Total</td>'
                    . "<td>Rp.".$barang[0]->Total_Harga."</td>"
                    . "</tr>";
            $htmlcontent .= "</table></body></html>";

            // output the HTML content
            $pdf->writeHTML($htmlcontent, true, 0, true, 0);

            // reset pointer to the last page
            $pdf->lastPage();

            //Close and output PDF document
            //$pdf->Output($_SERVER['DOCUMENT_ROOT'].'/BCGLD/file/'.$id_pesanan.'.pdf', 'F');
            //$pdf->Output($_SERVER['DOCUMENT_ROOT'].'/BCGLD/file/'.$id_pesanan.'.pdf', 'E');
            $pdf->Output($_SERVER['DOCUMENT_ROOT'].'/BCGLD/file/'.$id_pesanan.'.pdf', 'I');
        
        
            $datapemesan =  $this->model_manajer->email($namapemesan);
            $this->load->library('email'); // load email library
            $this->email->from('taufiqmaulanaa@gmail.com', 'Taufiq as sender name');
            $this->email->to($datapemesan[0]->Email);
            $this->email->subject('Your Subject');
            $this->email->message('Your Message');
            $this->email->attach('/Applications/XAMPP/xamppfiles/htdocs/BCGLD/file/'.$id_pesanan.'.pdf');

            if ($this->email->send()) {
                echo "Mail Sent!" . $datapemesan[0]->Email;
            } else {
                echo "There is error in sending mail!" . $datapemesan[0]->email;
            }

            
        }

        public function vchart() {
		$this->load->model('model_manajer');
        $isi ['Tampil_Tahun']= $this->model_manajer->get_tahun();
        $isi['judul'] = 'Grafik Laporan';
        $isi['content'] = 'manajer/v_chart';
        $isi['v_chart_januari'] = $this->model_manajer->v_chart_januari();
		$isi['v_chart_februari'] = $this->model_manajer->v_chart_februari();
		$isi['v_chart_maret'] = $this->model_manajer->v_chart_maret();
        $isi['v_chart_april'] = $this->model_manajer->v_chart_april();
        $isi['v_chart_mei'] = $this->model_manajer->v_chart_mei();
        $isi['v_chart_juni'] = $this->model_manajer->v_chart_juni();
        $isi['v_chart_juli'] = $this->model_manajer->v_chart_juli();
        $isi['v_chart_agustus'] = $this->model_manajer->v_chart_agustus();
        $isi['v_chart_september'] = $this->model_manajer->v_chart_september();
        $isi['v_chart_oktober'] = $this->model_manajer->v_chart_oktober();
        $isi['v_chart_november'] = $this->model_manajer->v_chart_november();
        $isi['v_chart_desember'] = $this->model_manajer->v_chart_desember();
        $this->load->view('tampilan_manajer', $isi);
    }

     
        public function laporanbarang($Id_Pesanan) {
        $this->model_security->getsecurity();
        $isi['judul'] = 'Laporan';
        $isi['content'] = 'manajer/v_baranglapor';
        $this->load->model('model_manajer');
        $isi['barangpesanan'] = $this->model_manajer->barangpesanan($Id_Pesanan);
        $this->load->view('tampilan_manajer', $isi);
        
    }
        
    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
    
    
    

}
