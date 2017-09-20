<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kain extends CI_Controller {

        public function __construct() {
		parent::__construct();
		$this->load->model('Model_Kain');
		$this->load->helper('form');
		$this->load->model('model_security');		
	}
        
	public function index()
	{
		$this->model_security->getsecurity();
		$isi['judul']='Kain Home';
        $isi['content'] = 'Kain/v_homekain';
		$this->load->view('tampilan_kain',$isi);
	}
        
	public function vKain()
	{
		$this->model_security->getsecurity();
		$id_pesanan = $this->uri->segment(3,0);
		$stt = $this->uri->segment(4,0);
		$id_barang= $this->input->post('Id_Barang');
		$isi['idpes'] = $id_pesanan;
		$isi['judul']='Input Kain';
		$isi['content'] = 'Kain/v_hargabarangkain';
		$this->load->model('Model_Kain');
		$isi['data_kain'] = $this->Model_Kain->getkain($id_pesanan);
		$this->load->view('tampilan_kain',$isi);
		/* $data = array(
            'status_notif' => 2
        );
        if(!empty($stt)){
            $this->Model_Kain->updateStatus($data, $id_barang);
            redirect('Kain/vKain/'.$id_pesanan);
        }*/
	}

	public function vhistorihargakain()
	{
		$this->model_security->getsecurity();
		$isi['judul']='History Kain';
		$isi['content'] = 'Kain/v_historihargakain';
		$this->load->model('Model_Kain');
		$isi['data_historikain'] = $this->Model_Kain->gethistorikain();
		$this->load->view('tampilan_kain',$isi);
	}

	public function vhistoridatakain()
	{
		$this->model_security->getsecurity();
		$isi['judul']='History  Kain';
		$isi['content'] = 'Kain/v_historidatakain';
		$this->load->model('Model_Kain');
		$isi['data_historidatakain'] = $this->Model_Kain->gethistoridatakain();
		$this->load->view('tampilan_kain',$isi);
	}

		public function vPesananKain()
	{
		$this->model_security->getsecurity();
		$isi['judul']='Pesanan Kain';
		$isi['content'] = 'Kain/v_hargapesanankain';
		$this->load->model('Model_Kain');
		$isi['pesanan_kain'] = $this->Model_Kain->getpesanankain();
		$this->load->view('tampilan_kain',$isi);
	}


		public function vPesananKainProduksi()
	{
		$this->model_security->getsecurity();
		$isi['judul']='Pesanan Kain';
		$isi['content'] = 'Kain/v_pesankainproduksi';
		$this->load->model('Model_Kain');
		$isi['pesananproduksi_kain'] = $this->Model_Kain->getpesanankainproduksi();
		$this->load->view('tampilan_kain',$isi);
	}


        
        public function vdatakain()
	{
		$this->model_security->getsecurity();
		$id_pesanan = $this->uri->segment(3,0); 
		$stt = $this->uri->segment(4,0);
		$id_barang = $this->input->post('Id_Barang');
		$isi['judul']='Input Kain';
		$isi['content'] = 'Kain/v_databarangkain';
		$this->load->model('Model_Kain');
		$isi['Nama_Perusahaan']= $this->Model_Kain->getnamaperusahaan();
		$isi['kain'] = $this->Model_Kain->getdatakain($id_pesanan);
		$this->load->view('tampilan_kain',$isi);
		/*$data = array(
            'status_notif' => 12
        );
        if(!empty($stt)){
            $this->Model_Kain->updateStatuskainproduksi($data, $id_barang);
            redirect('Kain/vdatakain/'.$id_pesanan);
        }*/
	}
        
        public function insertdataKain()
	{
		$this->model_security->getsecurity();
		$this->load->model('model_kain');
		$data = array(
                     'Id_Barang' => $this->input->post('Id_Barang'),
                     'Id_Perusahaankain' => $this->input->post('Id_Perusahaankain'),
                     'No_Notakain' => $this->input->post('No_Notakain'),
                     'Tgl_Inputkainproduksi' => $this->input->post('Tgl_Inputkainproduksi')
                );
        $id_barang = $this->input->post('Id_Barang');
        $this->model_kain->datakain($id_barang,$data);
        $this->model_kain->updateStatusdatakainproduksi($id_barang);
        $this->model_kain->statuskain($id_barang);
        $this->session->set_flashdata("hargabarang",'<div class="alert alert-success"><strong>Success!</strong> Indicates a successful or positive action.</div>');
		redirect('Kain/vhistoridatakain');
	}
        
        public function insertKain()
         {
            $this->model_security->getsecurity();
            $this->load->model('Model_Kain');
            $panjang = $this->input->post('Panjang_Kain');
            $harga = $this->input->post('Harga_Kain');
            $id_barang = $this->input->post('Id_Barang');
            $Tgl_Inputhargakain = $this->input->post('Tgl_Inputhargakain');
            $this->Model_Kain->updateHargaKain($id_barang,$harga,$panjang,$Tgl_Inputhargakain);
            $this->Model_Kain->updateNotif($id_barang,2);
            $this->session->set_flashdata("hargakain",'<div class="alert alert-success"><strong>Success!</strong> Harga Berhasil disimpan.</div>');
             redirect('kain/vhistorihargakain');
         }
        
        public function vPerusahaan()
	{
		$this->model_security->getsecurity();
		$isi['judul']='Perusahaan Kain';
		$isi['content'] = 'Kain/v_pkain';
		$this->load->model('Model_Kain');
		$isi['getperusahaan'] = $this->Model_Kain->getperusahaan();
		$isi['data_perusahaankain'] = $this->Model_Kain->getperusahaankain();
		$this->load->view('tampilan_kain',$isi);
		/* $data = array(
            'status_notif' => 2
        );
        if(!empty($stt)){
            $this->Model_Kain->updateStatus($data, $id_barang);
            redirect('Kain/vKain/'.$id_pesanan);
        }*/
	}

	    public function insertdataperusahaankain()
	{
		$this->model_security->getsecurity();
		$this->load->model('model_kain');
		$data = array(
                     'Id_Perusahaankain' => $this->input->post('Id_Perusahaankain'),
                     'Nama_Perusahaankain' => $this->input->post('Nama_Perusahaankain'),
                     'Alamat_Kain' => $this->input->post('Alamat_Kain'),
                     'Telephone_Kain' => $this->input->post('Telephone_Kain')
                );
        $this->model_kain->insertdataperusahaankain($data);
        $this->session->set_flashdata("Data Perusahaan Berhasil Di Tambah",'<div class="alert alert-success"><strong>Success!</strong> Indicates a successful or positive action.</div>');
		redirect('Kain/vPerusahaan');
	}


     public function editdataperusahaankain() {
        $this->model_security->getsecurity();
        $id = $this->input->post('Id_Perusahaankain');
       	$data = array(
                     'Nama_Perusahaankain' => $this->input->post('Nama_Perusahaankain'),
                     'Alamat_Kain' => $this->input->post('Alamat_Kain'),
                     'Telephone_Kain' => $this->input->post('Telephone_Kain')
                );
        $this->load->model('model_kain');
        $this->model_kain->updateperusahaankain($data, $id);
       redirect('Kain/vPerusahaan');
    }


    public function deletePerusahaan($id) {
        $this->model_security->getsecurity();
        $this->load->model('model_kain');
        $this->model_kain->deleteperusahaankain($id);
       	redirect('Kain/vPerusahaan');
    }
       public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
        
}
