<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_packing extends CI_model {

    public function __constructor() {
        parent::__construct();
        $this->load->database();
    }  
    
     public function getdatapacking(){
        $query = $this->db->query("Select * from Pesanan join Packinglist Using(Kd_Packinglist) join Pemesan Using (Id_Pemesan) Join Barang using (Id_Pesanan) Where Status_Pack='Belum' And Status_Jahit = 'Sudah' group by Id_Pesanan");
        return $query->result();
    }

     public function gethistoripacking(){
        $query = $this->db->query("Select * from Pesanan join Packinglist Using(Kd_Packinglist) join Pemesan Using (Id_Pemesan) Join Barang using (Id_Pesanan) Where Status_Pack='Sudah' And Status_Jahit = 'Sudah' group by Id_Pesanan");
        return $query->result();
    }
    
    
    public function getdatabarangpacking($Id_Pesanan){
        $query = $this->db->query("Select * from Pesanan join Barang using(Id_Pesanan) join PackingList using (Kd_Packinglist) where Status='Produksi' and Id_Pesanan='".$Id_Pesanan."'");
        return $query->result();
    }
    
   
    public function box($nobox,$id_barang,$Tgl_Inputbox){
        $query = $this->db->query("Update Barang Set No_Box=".$nobox." , Tgl_Inputbox='".$Tgl_Inputbox."' where Id_Barang='".$id_barang."'");
    }
      
    
    public function update($Kd_Packinglist,$Tgl_Packing){
        
        $query = $this->db->query("Update PackingList Set Tgl_Packing='".$Tgl_Packing."', Status_Pack='Sudah' where Kd_Packinglist='".$Kd_Packinglist."'");
    }

      public function updatenotif($Id_Pesanan){
            $query = "UPDATE Barang SET Status_Notif=10 WHERE Id_Pesanan='".$Id_Pesanan."'";
            $exec = $this->db->query($query);
        }

     public function getdatahistoribarangpacking($nobox){
        $query = $this->db->query("Select * from Pesanan join Packinglist Using(Kd_Packinglist) join Pemesan Using (Id_Pemesan) Join Barang using (Id_Pesanan) Where Status_Pack = 'Sudah' And Id_Pesanan='".$nobox."' and Id_Pesanan = ");
        return $query->result();
    }

       public function kirimPackingbarang($id_pesanan){
     $query =$this->db->query("select *, Nama_Pemesan, Alamat, Id_Barang, Id_Pesanan, Nama_Barang, Kain,Print, Warna, Jumlah,format((Total_Harga),2) as Total_Harga, Format(sum((Harga_Kain+Harga_Print+Harga_Jahit+Aksesoris)*2),2) as Harga,Format(sum((Harga_Kain+Harga_Print+Harga_Jahit+Aksesoris)*2)/Jumlah,2) as Harga_Satuan, Format(sum(Pajak),2) as Pajak, Kd_Packinglist from Barang Join Pesanan Using(Id_Pesanan) join Pemesan using(Id_Pemesan) join Packinglist using (Kd_Packinglist) where Id_Pesanan ='".$id_pesanan."' group by Id_Barang");
     return $query->result();
    }

     public function nobox($Id_Pesanan){
        $query = $this->db->query("select * from barang join pesanan using (Id_Pesanan) where Id_Pesanan = '".$Id_Pesanan."' group by Id_box");
        return $query->result();
    }

 public function brg($Id_Barang,$No_Box){
        $query = $this->db->query("select * from pemesan join pesanan using(Id_Pemesan) join Barang using (Id_Pesanan) join box using(Id_Barang) join Packinglist using(Kd_Packinglist) where Id_Barang = '".$Id_Barang."' and No_Box = '".$No_Box."'");
        return $query->result();
    }

    public function idbrng($Id_Barang){
        $query = $this->db->query("select * from Barang where Id_Barang='".$Id_Barang."' group by Id_Barang");
        return $query->result();
    }
        public function insert($data) {
        $this->db->insert('Box', $data);
        
    }

     public function databox(){
        $query = $this->db->query("select * from barang join pesanan using(Id_Pesanan) join Pemesan using(Id_Pemesan) join Packinglist using(Kd_Packinglist)");
        return $query->result();
    }

     public function barangpackx($Id_Pesanan){
        $query = $this->db->query("Select * from barang where Id_Pesanan='".$Id_Pesanan."'");
        return $query->result();
    }

     public function xbox($Id_Barang){
        $query = $this->db->query("select * from barang join Box using(Id_Barang) where Id_Barang='".$Id_Barang."' and No_Box >=0");
        return $query->result();
    }

    public function sisa($Sisa, $Id_Barang){
         $query = $this->db->query("UPDATE Barang SET Jumlah='".$Sisa."' WHERE Id_Barang='".$Id_Barang."'"); }

}
