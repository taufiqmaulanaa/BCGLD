<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jahit extends CI_Controller {
        public function __constructor() {
        parent::__construct();
        $this->load->model('model_manajer');
        $this->load->helper('form');
        $this->load->model('model_security');
        }

	public function index()
	{
		$this->model_security->getsecurity();
		$isi['judul']='Jahit Home';
        $isi['content'] = 'jahit/v_homejahit';
		$this->load->view('tampilan_jahit',$isi);
	}
        
        
        public function vJahit()
	{
		$this->model_security->getsecurity();
	    $id_pesanan = $this->uri->segment(3,0);
		$stt = $this->uri->segment(4,0);
		$id_barang = $this->input->post('Id_Barang');
		$isi['judul']='Input Jahit';
		$isi['content'] = 'Jahit/v_jahit';
		$this->load->model('Model_Jahit');
        $isi['data_jahit'] = $this->Model_Jahit->getJahit($id_pesanan);
		$this->load->view('tampilan_jahit',$isi);
		/*$data = array(
            'status_notif' => 9
        );
        if(!empty($stt)){
            $this->Model_Jahit->updateStatus($data, $id_barang);
            redirect('/Jahit/vJahit/'.$id_pesanan);
        }*/

    }
	

	public function vhistorihargajahit()
	{
		$this->model_security->getsecurity();
		$isi['judul']='History Jahit';
		$isi['content'] = 'Jahit/v_historihargajahit';
		$this->load->model('Model_Jahit');
		$isi['data_historijahit'] = $this->Model_Jahit->gethistorijahit();
		$this->load->view('tampilan_jahit',$isi);
	}

	public function vhistoridatajahit()
	{
		$this->model_security->getsecurity();
		$isi['judul']='History Jahit';
		$isi['content'] = 'Jahit/v_historidatajahit';
		$this->load->model('Model_Jahit');
		$isi['historijahit'] = $this->Model_Jahit->gethistoridatajahit();
		$this->load->view('tampilan_jahit',$isi);
	}
        

           	public function vPesananJahit()
	{
		$this->model_security->getsecurity();
		$isi['judul']='Harga Jahit';
		$isi['content'] = 'Jahit/v_hargapesanjahit';
		$this->load->model('Model_Jahit');
		$isi['pesanan_jahit'] = $this->Model_Jahit->getpesanjahit();
		$this->load->view('tampilan_jahit',$isi);
	}

	    	public function vDataPesananJahit()
	{
		$this->model_security->getsecurity();
		$isi['judul']='Harga Jahit';
		$isi['content'] = 'Jahit/v_pesananjahitproduksi';
		$this->load->model('Model_Jahit');
		$isi['getdatajahit'] = $this->Model_Jahit->getdatapesanjahit();
		$this->load->view('tampilan_jahit',$isi);
	}
      
        
        public function hitungjahit()
         {
	  		$this->load->model('Model_Jahit');
            $harga_jahit = $this->input->post('Harga_Jahit');
            $id_barang = $this->input->post('Id_Barang');
            $aksesoris = $this->input->post('Aksesoris');
            $Tgl_Inputhargajahit = $this->input->post('Tgl_Inputhargajahit');
            $id_pesanan = $this->input->post('Id_Pesanan');
            $this->Model_Jahit->updateNotif($id_barang);
            $this->Model_Jahit->updateHargaJahit($id_barang,$harga_jahit,$aksesoris,$Tgl_Inputhargajahit);
            $this->session->set_flashdata("hargajahit",'<div class="alert alert-success"><strong>Success!</strong> Harga Berhasil disimpan.</div>');
           redirect('Jahit/vhistorihargajahit');
         }
         
         public function vdataJahit()
	{
		$this->model_security->getsecurity();
		$id_pesanan = $this->uri->segment(3,0);
		$stt = $this->uri->segment(4,0);
		$id_barang = $this->uri->segment(5,0);
		$isi['judul']='Input Jahit';
		$isi['content'] = 'Jahit/v_datajahit';
		$this->load->model('Model_Jahit');
		$isi['Nama_Perusahaan'] = $this->Model_Jahit->getnamaperusahaan();
        $isi['jahit'] = $this->Model_Jahit->getdatajahit($id_pesanan);
		$this->load->view('tampilan_jahit',$isi);
		/*$data = array(
            'status_notif' => 16
        );
        if(!empty($stt)){
            $this->Model_Jahit->updateStatusdata($data, $id_barang);
            redirect('/Jahit/vdataJahit/'.$id_pesanan);
        }*/
	}

         public function insertjahit()
	{
		$this->model_security->getsecurity();
		$this->load->model('Model_Jahit');
		$data = array(
                     'Id_Barang' => $this->input->post('Id_Barang'),
                     'Id_Perusahaanjahit' => $this->input->post('Id_Perusahaanjahit'),
                     'No_Notajahit' => $this->input->post('No_Notajahit'),
                     'Tgl_Inputjahitproduksi' => $this->input->post('Tgl_Inputjahitproduksi')
                );
        $id_barang = $this->input->post('Id_Barang');
		$this->Model_Jahit->updateNotifdata($id_barang);
        $this->Model_Jahit->insertjht($data,$id_barang);
        $this->Model_Jahit->statusjahit($id_barang);
		redirect('Jahit/vhistoridatajahit');
	}

	 public function vPerusahaan()
	{
		$this->model_security->getsecurity();
		$isi['judul']='Perusahaan Jahit';
		$isi['content'] = 'Jahit/v_pjahit';
		$this->load->model('Model_Jahit');
		$isi['getperusahaan'] = $this->Model_Jahit->getperusahaan();
		$isi['data_perusahaanjahit'] = $this->Model_Jahit->getperusahaanjahit();
		$this->load->view('tampilan_jahit',$isi);
		/* $data = array(
            'status_notif' => 2
        );
        if(!empty($stt)){
            $this->Model_Kain->updateStatus($data, $id_barang);
            redirect('Kain/vKain/'.$id_pesanan);
        }*/
	}

	  public function insertdataperusahaanjahit()
	{
		$this->model_security->getsecurity();
		$this->load->model('Model_Jahit');
		$data = array(
                     'Id_Perusahaanjahit' => $this->input->post('Id_Perusahaanjahit'),
                     'Nama_Perusahaanjahit' => $this->input->post('Nama_Perusahaanjahit'),
                     'Alamat_Jahit' => $this->input->post('Alamat_Jahit'),
                     'Telephone_Jahit' => $this->input->post('Telephone_Jahit')
                );
        $this->Model_Jahit->insertdataperusahaanjahit($data);
        $this->session->set_flashdata("Data Perusahaan Berhasil Di Tambah",'<div class="alert alert-success"><strong>Success!</strong> Indicates a successful or positive action.</div>');
		redirect('Jahit/vPerusahaan');
	}

	 public function editdataperusahaanjahit() {
        $this->model_security->getsecurity();
        $id = $this->input->post('Id_Perusahaanjahit');
       	$data = array(
                     'Nama_Perusahaanjahit' => $this->input->post('Nama_Perusahaanjahit'),
                     'Alamat_Jahit' => $this->input->post('Alamat_Jahit'),
                     'Telephone_Jahit' => $this->input->post('Telephone_Jahit')
                );
        $this->load->model('Model_Jahit');
        $this->Model_Jahit->updateperusahaanjahit($data, $id);
       redirect('Jahit/vPerusahaan');
    }

     public function deletePerusahaan($id) {
        $this->model_security->getsecurity();
        $this->load->model('Model_Jahit');
        $this->Model_Jahit->deleteperusahaanjahit($id);
       	redirect('Jahit/vPerusahaan');
    }
        
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
