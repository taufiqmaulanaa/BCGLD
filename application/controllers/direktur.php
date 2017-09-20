<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direktur extends CI_Controller {


    
     public function __construct() {
        parent::__construct();
        $this->load->model('model_Direktur');
        $this->load->helper('form');
         $this->load->library('fpdf');
        $this->load->model('model_security');
    }
	public function index()
	{
		$this->model_security->getsecurity();
		$isi['judul']='Direktur Home';
                 $isi['content'] = 'direktur/v_homedirektur';
		$this->load->view('tampilan_direktur',$isi);
	}
        
         public function vLaporan() {
        $this->model_security->getsecurity();
        $isi['judul'] = 'Laporan Pesanan';
        $isi['content'] = 'direktur/v_datalaporan';
        $this->load->model('model_Direktur');
         $isi['get_laporan'] = $this->model_Direktur->get_laporan();
        $this->load->view('tampilan_direktur',$isi);
    }
        
         public function vBarangLaporan($id_Pesanan) {
        $this->model_security->getsecurity();
        $isi['judul'] = 'Laporan Barang';
        $isi['content'] = 'direktur/v_laporbarang';
        $this->load->model('model_Direktur');
         $isi['vdatalaporan'] = $this->model_Direktur->vdatalaporan($id_Pesanan);
        $this->load->view('tampilan_direktur',$isi);
    }

         public function vchart() {
        $this->load->model('model_Direktur');
        $isi ['Tampil_Tahun']= $this->model_Direktur->get_tahun();
        $isi['judul'] = 'Grafik Laporan';
        $isi['content'] = 'Direktur/v_datalaporan';
        $isi['v_chart_januari'] = $this->model_Direktur->v_chart_januari();
        $isi['v_chart_februari'] = $this->model_Direktur->v_chart_februari();
        $isi['v_chart_maret'] = $this->model_Direktur->v_chart_maret();
        $isi['v_chart_april'] = $this->model_Direktur->v_chart_april();
        $isi['v_chart_mei'] = $this->model_Direktur->v_chart_mei();
        $isi['v_chart_juni'] = $this->model_Direktur->v_chart_juni();
        $isi['v_chart_juli'] = $this->model_Direktur->v_chart_juli();
        $isi['v_chart_agustus'] = $this->model_Direktur->v_chart_agustus();
        $isi['v_chart_september'] = $this->model_Direktur->v_chart_september();
        $isi['v_chart_oktober'] = $this->model_Direktur->v_chart_oktober();
        $isi['v_chart_november'] = $this->model_Direktur->v_chart_november();
        $isi['v_chart_desember'] = $this->model_Direktur->v_chart_desember();
        $this->load->view('tampilan_direktur', $isi);
    }
        
        
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
