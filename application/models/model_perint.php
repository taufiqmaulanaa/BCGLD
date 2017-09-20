
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Perint extends CI_model {

	public function __constructor() {
		parent::__construct();
		$this->load->database();
	}

	public function getperint($id_pesanan) {
            $getdata = $this->db->query("SELECT * FROM Barang WHERE Id_Pesanan = '".$id_pesanan."' and Harga_Print = 0");            
            return $getdata->result();
        }
        
    public function insertprint($id_barang,$data) {
       $this->db->where('Id_Barang', $id_barang);
        $this->db->update('Barang', $data);
    }

    public function statusprint($id_barang){
         $query = "UPDATE Barang set Status_Print='Sudah' where Id_Barang='".$id_barang."' ";
         $exec = $this->db->query($query);
    }
	
        public function updateHargaperint($id_barang,$hargaprint,$Tgl_Inputhargaprint){
             $this->db->query("UPDATE Barang SET Harga_Print=".$hargaprint." *Panjang_Kain , Tgl_Inputhargaprint='".$Tgl_Inputhargaprint."' WHERE Id_Barang='".$id_barang."'");
        }

        public function getdataprint() {
            $getdata = $this->db->query("select * from Pesanan join Barang using(Id_pesanan) where Status_Kain='Sudah' And Status_Print ='Belum'"); 
            return $getdata->result();
        }


        public function getpesananprint() {
            $getdata = $this->db->query("select * from pemesan join pesanan using(Id_Pemesan) join barang using(Id_Pesanan) where Harga_Print = 0 group by Id_Pesanan"); 
            return $getdata->result();
        }

        public function gethistoriprint() {
            $getdata = $this->db->query("select * from Barang where Harga_Print > 0 "); 
            return $getdata->result();
        }
        public function historidataprint() {
            $getdata = $this->db->query("select * from Barang join Perusahaan_Print using (Id_Perusahaanprint) "); 
            return $getdata->result();
        }

        public function getpesananprintproduksi() {
            $getdata = $this->db->query("select * from Pesanan join Pemesan using (Id_Pemesan) join Barang using (Id_Pesanan) where Status = 'Produksi' And Status_Print='Belum' group by Id_Pesanan"); 
            return $getdata->result();
        }
        public function updateStatus($data, $id_barang) {
        $this->db->where('Id_Barang', $id_barang);
        $this->db->update('Barang', $data);
        }

         public function updateNotif($id_barang,$status){
            $query = "UPDATE Barang SET Status_Notif=".$status." WHERE Id_Barang='".$id_barang."'";
            $exec = $this->db->query($query);
        }

        public function updateNotifdata($data, $id_pesanan) {
        $this->db->where('Id_Pesanan', $id_pesanan);
        $this->db->update('Barang', $data);
        }

        public function updateNotifkainprod($id_barang){
            $query = "UPDATE Barang SET Status_Notif=8 WHERE Id_Barang='".$id_barang."'";
            $exec = $this->db->query($query);
        }
        public function getperusahaanprint() {
            $getdata = $this->db->query("Select * from Perusahaan_Print"); 
            return $getdata->result();
        }

        public function getperusahaan() {
        $q = $this->db->query("SELECT MAX(RIGHT(Id_Perusahaanprint,3)) AS id_max FROM Perusahaan_print");
        $kd = ""; //kode awal
        if ($q->num_rows() > 0) { //jika data ada
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->id_max) + 1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = sprintf("%03s", $tmp); //kode ambil 4 karakter terakhir
            }
        } else { //jika data kosong diset ke kode awal
            $kd = "001";
        }
        //karakter depan kodenya
        //gabungkan string dengan kode yang telah dibuat tadi
        return "PP".$kd;
    }

     public function insertdataperusahaanprint($data) {
        $this->db->insert('Perusahaan_Print', $data);
        
    }

     public function updateperusahaanprint($data, $id) {
        $this->db->where('Id_Perusahaanprint', $id);
        $this->db->update('Perusahaan_Print', $data);
    }

     public function deleteperusahaanprint($id) {
        $this->db->where('Id_Perusahaanprint', $id);
        $this->db->delete('Perusahaan_Print');
    }

    public function getnamaperusahaan(){
        $getdata = $this->db->get('Perusahaan_Print');
        return $getdata->result();
    }

        
}