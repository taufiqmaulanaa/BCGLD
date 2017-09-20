
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Jahit extends CI_model {

 

    public function __constructor() {
		parent::__construct();
		$this->load->database();
	}

      public function getJahit($id_pesanan) {
         $query=$this->db->query("SELECT * FROM Barang WHERE Harga_Print >0 and Harga_Jahit =0  And Id_Pesanan = '".$id_pesanan."'" );
         $result=$query->result();
         return $result;
    }
    
        public function insertjht($data,$id_barang) {
        $this->db->where('id_barang', $id_barang);
        $this->db->update('Barang', $data);
        }
        
        public function updateHargaJahit($id_barang,$harga_jahit,$Aksesoris, $Tgl_Inputhargajahit){
            $query = "UPDATE Barang SET Aksesoris=".$Aksesoris."*Jumlah, Harga_Jahit=".$harga_jahit."*Jumlah , Tgl_Inputhargajahit='".$Tgl_Inputhargajahit."' WHERE Id_Barang='".$id_barang."'";
            $exec = $this->db->query($query);
        }
        
        public function getdatajahit($id_pesanan) {
            $getdata = $this->db->query("select * from Pesanan join Barang using(Id_pesanan) where Status_Print='Sudah' And Status_Jahit ='Belum' And Id_Pesanan = '".$id_pesanan."'"); 
            return $getdata->result();
        }

         public function getdatapesanjahit() {
            $getdata = $this->db->query("select * from Pesanan Join Pemesan using (Id_Pemesan) join Barang using(Id_pesanan) where Status_Print='Sudah' And Status_Jahit ='Belum' group by Id_Pesanan"); 
            return $getdata->result();
        }

         public function getpesanjahit() {
            $getdata = $this->db->query("select * from pemesan join pesanan using(Id_Pemesan) join barang using(Id_Pesanan) where Harga_Jahit =0 and Harga_Print < 0 group by Id_Pesanan"); 
            return $getdata->result();
        }

        public function gethistorijahit() {
            $getdata = $this->db->query("select *, DATE_FORMAT(Tgl_Inputhargajahit, '%D-%M-%Y %H:%I:%S') AS Tgl_Inputhargaprint from Barang where Harga_Jahit > 0 "); 
            return $getdata->result();
        }

           public function updateStatus($data, $id_barang) {
           $this->db->where('Id_Barang', $id_barang);
           $this->db->update('Barang', $data);
        }

           public function updateStatusdata($data, $id_barang) {
           $this->db->where('Id_Barang', $id_barang);
           $this->db->update('Barang', $data);
    }

    public function statusjahit($id_barang){
         $query = "UPDATE Barang set Status_Jahit='Sudah' where Id_Barang='".$id_barang."' ";
         $exec = $this->db->query($query);
    }

      public function updateNotif($id_barang){
            $query = "UPDATE Barang SET Status_Notif=4 WHERE Id_Barang='".$id_barang."'";
            $exec = $this->db->query($query);
        }


      public function updateNotifdata($id_barang){
            $query = "UPDATE Barang SET Status_Notif=9 WHERE Id_Barang='".$id_barang."'";
            $exec = $this->db->query($query);
        }

        public function gethistoridatajahit() {
            $getdata = $this->db->query("select * from Barang Join Perusahaan_Jahit using (Id_Perusahaanjahit) Where Id_Perusahaanjahit is not null"); 
            return $getdata->result();
        }
        public function getperusahaanjahit() {
            $getdata = $this->db->query("Select * from Perusahaan_Jahit"); 
            return $getdata->result();
        }

        public function getperusahaan() {
        $q = $this->db->query("SELECT MAX(RIGHT(Id_Perusahaanjahit,3)) AS id_max FROM Perusahaan_Jahit");
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
        return "PJ".$kd;
    }

     public function insertdataperusahaanjahit($data) {
        $this->db->insert('Perusahaan_Jahit', $data);
        
    }

     public function updateperusahaanjahit($data, $id) {
        $this->db->where('Id_Perusahaanjahit', $id);
        $this->db->update('Perusahaan_Jahit', $data);
    }

     public function deleteperusahaanjahit($id) {
        $this->db->where('Id_Perusahaanjahit', $id);
        $this->db->delete('Perusahaan_Jahit');
    }

      public function getnamaperusahaan(){
        $getdata = $this->db->get('Perusahaan_Jahit');
        return $getdata->result();
    }
    

        
}
