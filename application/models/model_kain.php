
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Kain extends CI_model {

	public function __constructor() {
		parent::__construct();
		$this->load->database();
	}

	public function getkain($id_pesanan) {
            $getdata = $this->db->query('SELECT * FROM Barang WHERE Harga_Kain= 0 and  Id_Pesanan ="'.$id_pesanan.'"'); 
            return $getdata->result();
        }
        
        
    public function datakain($id_barang,$data) {
        $this->db->where('Id_Barang', $id_barang);
        $this->db->update('Barang', $data);
    }

    public function statuskain($id_barang){
         $query = "UPDATE Barang set Status_Kain='Sudah' where Id_Barang='".$id_barang."' ";
            $exec = $this->db->query($query);
    }

        
        
    public function getdatakain($id_pesanan) {
            $getdata = $this->db->query("select * from Pesanan join Barang using(Id_pesanan) join Perusahaan_Kain where Status='Produksi' and Status_Kain='Belum' And Id_Pesanan = '".$id_pesanan."' group by Id_Barang"); 
            return $getdata->result();
        }

    public function getpesanankain() {
            $getdata = $this->db->query("select * from pemesan join pesanan using(Id_Pemesan) join barang using(Id_Pesanan) where Harga_Kain = 0 group by Id_Pesanan"); 
            return $getdata->result();
        }
        
     public function getPesanan() {
		$getdata = $this->db->get('pesanan');
		return $getdata->result();
	}
	
       /* public function updateHarga($id_pesanan,$harga,$panjang){
            $query = "UPDATE barang SET Harga_Kain=".$harga*$panjang.",Panjang_Kain='".$panjang."' WHERE Id_barang='".$id_pesanan."'";
            $exec = $this->db->query($query);
        }*/
        
        public function updateHargaKain($id_barang,$harga,$panjang,$Tgl_Inputhargakain){
            $query = "UPDATE Barang SET Panjang_Kain=".$panjang." , Harga_kain=".$harga*$panjang." , Tgl_Inputhargakain='".$Tgl_Inputhargakain."' WHERE Id_Barang='".$id_barang."'";
            $exec = $this->db->query($query);
        }
        
        public function updateNotif($Id_Barang,$status){
            $query = "UPDATE Barang SET Status_Notif=".$status." WHERE Id_Barang='".$Id_Barang."'";
            $exec = $this->db->query($query);
        }

        public function printPdf(){
            $query = $this->db->query('SELECT * FROM Bag_Kain WHERE Nama_Perusahaan IS NOT NULL');
            return $query->result();
        }

        public function gethistorikain() {
            $getdata = $this->db->query("select * from Barang where Harga_Kain > 0"); 
            return $getdata->result();
        }

        public function gethistoridatakain() {
            $getdata = $this->db->query("select * from Barang Join Perusahaan_Kain using (Id_Perusahaankain) Where Id_Perusahaankain is not null"); 
            return $getdata->result();
        }


        public function getpesanankainproduksi() {
            $getdata = $this->db->query("select * from Pesanan join Pemesan using (Id_Pemesan) join Barang using (Id_Pesanan) where Status = 'Produksi' And Status_Kain ='Belum' group by Id_Pesanan"); 
            return $getdata->result();
        }

        public function getakun() {
            $getdata = $this->db->query("select * from akun where roll='kain' "); 
            return $getdata->result();
        }


          public function updateStatus($data, $id_barang) {
        $this->db->where('Id_Barang', $id_barang);
        $this->db->update('Barang', $data);
    }


          public function updateStatuskainproduksi($data, $id_barang) {
            $this->db->where('Id_Barang', $id_barang);
            $this->db->update('Barang', $data);
    }

    public function updateStatusdatakainproduksi($id_barang) {
          $query = "UPDATE Barang SET Status_Notif= 7  WHERE Id_Barang='".$id_barang."'";
            $exec = $this->db->query($query);
        }


    public function getperusahaankain() {
            $getdata = $this->db->query("Select * from Perusahaan_Kain"); 
            return $getdata->result();
        }

        public function getperusahaan() {
        $q = $this->db->query("SELECT MAX(RIGHT(Id_Perusahaankain,3)) AS id_max FROM Perusahaan_Kain");
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
        return "PK".$kd;
    }

    public function insertdataperusahaankain($data) {
        $this->db->insert('Perusahaan_Kain', $data);
        
    }

    public function updateperusahaankain($data, $id) {
        $this->db->where('Id_Perusahaankain', $id);
        $this->db->update('Perusahaan_Kain', $data);
    }
    
    public function deleteperusahaankain($id) {
        $this->db->where('Id_Perusahaankain', $id);
        $this->db->delete('Perusahaan_Kain');
    }

    public function getnamaperusahaan(){
        $getdata = $this->db->get('Perusahaan_Kain');
        return $getdata->result();
    }
    

    }
      
