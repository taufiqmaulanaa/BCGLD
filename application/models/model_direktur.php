
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Direktur extends CI_model {

 

    public function __constructor() {
		parent::__construct();
		$this->load->database();
	}

      public function get_laporan() {
         $query=$this->db->query("Select * from Pesanan join Pemesan Using (Id_Pemesan) where Laporan='Sudah'");
         $result=$query->result();
         return $result;
    }

    public function vdatalaporan($id_Pesanan){
    	  $query=$this->db->query("Select * from Pesanan join Barang Using (Id_Pesanan) where Id_Pesanan='".$id_Pesanan."'");
         $result=$query->result();
         return $result;
     }
        public function v_chart_januari() {
            $tahun=$this->input->post('tahun');
            $query = $this->db->query("select * from Pesanan where MONTH(Tgl_Pesanan)=1 and Tgl_Pesanan like '%$tahun%'");
            return $query->result();
        }
        public function v_chart_februari() {
            $tahun = $this->input->post('tahun');
            $query = $this->db->query("select * from Pesanan where MONTH(Tgl_Pesanan)=2 and Tgl_Pesanan like '%$tahun%'");
            return $query->result();
        }
        public function v_chart_maret() {
            $tahun=$this->input->post('tahun');
            $query = $this->db->query("select * from Pesanan where MONTH(Tgl_Pesanan)=3 and Tgl_Pesanan like '%$tahun%'");
            return $query->result();
        }
        public function v_chart_april() {
            $tahun=$this->input->post('tahun');
            $query = $this->db->query("select * from Pesanan where MONTH(Tgl_Pesanan)=4 and Tgl_Pesanan like '%$tahun%'");
            return $query->result();
        }
        public function v_chart_mei() {
            $tahun=$this->input->post('tahun');
            $query = $this->db->query("select * from Pesanan where MONTH(Tgl_Pesanan)=5 and Tgl_Pesanan like '%$tahun%'");
            return $query->result();
        }
        public function v_chart_juni() {
            $tahun=$this->input->post('tahun');
            $query = $this->db->query("select * from Pesanan where MONTH(Tgl_Pesanan)=6 and Tgl_Pesanan like '%$tahun%'");
            return $query->result();
        }
        public function v_chart_juli() {
            $tahun=$this->input->post('tahun');
            $query = $this->db->query("select * from Pesanan where MONTH(Tgl_Pesanan)=7 and Tgl_Pesanan like '%$tahun%'");
            return $query->result();
        }
        public function v_chart_agustus() {
            $tahun=$this->input->post('tahun');
            $query = $this->db->query("select * from Pesanan where MONTH(Tgl_Pesanan)=8 and Tgl_Pesanan like '%$tahun%'");
            return $query->result();
        }
        public function v_chart_september() {
            $tahun=$this->input->post('tahun');
            $query = $this->db->query("select * from Pesanan where MONTH(Tgl_Pesanan)=9 and Tgl_Pesanan like '%$tahun%'");
            return $query->result();
        }
        public function v_chart_oktober() {
            $tahun=$this->input->post('tahun');
            $query = $this->db->query("select * from Pesanan where MONTH(Tgl_Pesanan)=10 and Tgl_Pesanan like '%$tahun%'");
            return $query->result();
        }
        public function v_chart_november() {
            $tahun=$this->input->post('tahun');
            $query = $this->db->query("select * from Pesanan where MONTH(Tgl_Pesanan)=11 and Tgl_Pesanan like '%$tahun%'");
            return $query->result();
        }
        public function v_chart_desember() {
            $tahun=$this->input->post('tahun');
            $query = $this->db->query("select * from Pesanan where MONTH(Tgl_Pesanan)=12 and Tgl_Pesanan like '%$tahun%'");
            return $query->result();
        }
         public function get_tahun() {
            $query = $this->db->query("select YEAR(Tgl_Pesanan) as Tahun from Pesanan group by Tahun;");
            return $query->result();
        }

    }
    


