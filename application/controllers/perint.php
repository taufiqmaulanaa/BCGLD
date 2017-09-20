<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perint extends CI_Controller {

        public function __constructor() {
		parent::__construct();
		$this->load->model('model_perint');
		$this->load->helper('form');
		$this->load->library('session');
	}
	public function index()
	{
		$this->model_security->getsecurity();
		$isi['judul']='Print Home';
        $isi['content'] = 'Print/v_homeprint';
		$this->load->view('tampilan_print',$isi);
           
	}
        

        public function vPrint()
	{
		$this->model_security->getsecurity();
		$id_pesanan = $this->uri->segment(3,0);
		$stt = $this->uri->segment(4,0);
		$id_barang = $this->input->post('Id_Barang');
		$isi['judul']='Print';
		$isi['content'] = 'Print/v_print';
		$this->load->model('Model_Perint');
        $isi['data_perint'] = $this->Model_Perint->getperint($id_pesanan);
		$this->load->view('tampilan_print',$isi);
		/*$data = array(
            'status_notif' => 5
        );
        if(!empty($stt)){
            $this->Model_Perint->updateStatus($data, $id_barang);
            redirect('Perint/vPrint/'.$id_pesanan);
        }*/
	}
	

         public function hitungprint()
         {
	 		$this->load->model('Model_Perint');
            $hargaprint = $this->input->post('Hargaperint');
            $id_barang = $this->input->post('Id_Barang');
            $Tgl_Inputhargaprint = $this->input->post('Tgl_Inputhargaprint');
            $this->Model_Perint->updateHargaperint($id_barang,$hargaprint,$Tgl_Inputhargaprint);
            $this->Model_Perint->updateNotif($id_barang,3);
            $this->session->set_flashdata("hargaprint",'<div class="alert alert-success"><strong>Success!</strong> Harga Berhasil disimpan.</div>');
           redirect('Perint/vhistorihargaprint');
         }


         	public function vhistorihargaprint()
	{
		$this->model_security->getsecurity();
		$isi['judul']='History Print';
		$isi['content'] = 'Print/v_historihargaprint';
		$this->load->model('Model_Perint');
		$isi['data_historiprint'] = $this->Model_Perint->gethistoriprint();
		$this->load->view('tampilan_print',$isi);
	}

         	public function vPesananPrint()
	{
		$this->model_security->getsecurity();
		$isi['judul']='Harga Print';
		$isi['content'] = 'Print/v_hargapesananprint';
		$this->load->model('Model_Perint');
		$isi['pesanan_print'] = $this->Model_Perint->getpesananprint();
		$this->load->view('tampilan_print',$isi);
	}
         
           public function vdataprint()
	{
		$this->model_security->getsecurity();
		$id_pesanan = $this->uri->segment(3,0);
		$stt = $this->uri->segment(4,0);
		$id_barang = $this->input->post('Id_Barang');
		$isi['judul']='Print';
		$isi['content'] = 'Print/v_dataprint';
		$this->load->model('Model_Perint');
		$isi['Nama_Perusahaan']= $this->Model_Perint->getnamaperusahaan();
        $isi['data_perint'] = $this->Model_Perint->getdataprint();
		$this->load->view('tampilan_print',$isi);
		/*$data = array(
            'status_notif' => 14
        );
        if(!empty($stt)){
            $this->Model_Perint->updateStatusprintprod($data, $id_pesanan);
            redirect('Perint/vdataprint/'.$id_pesanan);
        }*/
	}

	public function vPesananPrintProduksi()
	{
		$this->model_security->getsecurity();
		$isi['judul']='Pesanan Print';
		$isi['content'] = 'Print/v_datapesanprint';
		$this->load->model('Model_Perint');
		$isi['pesananproduksi_kain'] = $this->Model_Perint->getpesananprintproduksi();
		$this->load->view('tampilan_print',$isi);
	}
        
        
        public function insertperint()
	{
		$this->model_security->getsecurity();
		$this->load->model('Model_Perint');
		$data = array(
                     'Id_Barang' => $this->input->post('Id_Barang'),
                     'Id_Perusahaanprint' => $this->input->post('Id_Perusahaanprint'),
                     'No_Notaprint' => $this->input->post('No_Notaprint'),
                     'Tgl_Inputprintproduksi' => $this->input->post('Tgl_Inputprintproduksi')
                );
        $id_barang = $this->input->post('Id_Barang');
        $this->Model_Perint->updateNotifkainprod($id_barang);
        $this->Model_Perint->insertprint($id_barang,$data);
        $this->Model_Perint->statusprint($id_barang);
		redirect('Perint/vhistoridataprint');
	}


         	public function vhistoridataprint()
	{
		$this->model_security->getsecurity();
		$isi['judul']='History Print';
		$isi['content'] = 'Print/v_historidataprint';
		$this->load->model('Model_Perint');
		$isi['historidataprint'] = $this->Model_Perint->historidataprint();
		$this->load->view('tampilan_print',$isi);
	}

	  public function vPerusahaan()
	{
		$this->model_security->getsecurity();
		$isi['judul']='Perusahaan Print';
		$isi['content'] = 'Print/v_pprint';
		$this->load->model('Model_Perint');
		$isi['getperusahaan'] = $this->Model_Perint->getperusahaan();
		$isi['data_perusahaanprint'] = $this->Model_Perint->getperusahaanprint();
		$this->load->view('tampilan_print',$isi);
		/* $data = array(
            'status_notif' => 2
        );
        if(!empty($stt)){
            $this->Model_Kain->updateStatus($data, $id_barang);
            redirect('Kain/vKain/'.$id_pesanan);
        }*/
	}

	  public function insertdataperusahaanprint()
	{
		$this->model_security->getsecurity();
		$this->load->model('Model_Perint');
		$data = array(
                     'Id_Perusahaanprint' => $this->input->post('Id_Perusahaanprint'),
                     'Nama_Perusahaanprint' => $this->input->post('Nama_Perusahaanprint'),
                     'Alamat_Print' => $this->input->post('Alamat_Print'),
                     'Telephone_Print' => $this->input->post('Telephone_Print')
                );
        $this->Model_Perint->insertdataperusahaanprint($data);
        $this->session->set_flashdata("Data Perusahaan Berhasil Di Tambah",'<div class="alert alert-success"><strong>Success!</strong> Indicates a successful or positive action.</div>');
		redirect('Perint/vPerusahaan');
	}

	 public function editdataperusahaanprint() {
        $this->model_security->getsecurity();
        $id = $this->input->post('Id_Perusahaanprint');
       	$data = array(
                     'Nama_Perusahaanprint' => $this->input->post('Nama_Perusahaanprint'),
                     'Alamat_Print' => $this->input->post('Alamat_Print'),
                     'Telephone_Print' => $this->input->post('Telephone_Print')
                );
        $this->load->model('Model_Perint');
        $this->Model_Perint->updateperusahaanprint($data, $id);
       redirect('Perint/vPerusahaan');
    }

     public function deletePerusahaan($id) {
        $this->model_security->getsecurity();
        $this->load->model('Model_Perint');
        $this->Model_Perint->deleteperusahaanprint($id);
       	redirect('Perint/vPerusahaan');
    }
        
        public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
