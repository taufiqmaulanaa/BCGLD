<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_manajer extends CI_model {

    public function __constructor() {
        parent::__construct();
        $this->load->database();
    }
    
    
    public function getPesanan($Id_Pemesan){
        $query = $this->db->query("Select * from Pemesan join Pesanan using(Id_Pemesan) where Id_Pemesan='".$Id_Pemesan."' and Status='Belum Produksi' group by Id_Pesanan");
        return $query->result();
    }
    
    public function getBarang($id_pesanan){
       $query = $this->db->query("SELECT * FROM Barang Join Pesanan using (Id_Pesanan) WHERE Id_Pesanan='".$id_pesanan."'");
       return $query->result();
    }
    
    
    public function getBarangemail($id_pesanan){
       $query = $this->db->query("select *, Nama_Pemesan, Alamat, Id_Barang, Id_Pesanan, Nama_Barang, Kain,Print, Warna, Jumlah,format((Total_Harga),2) as Total_Harga, Format(sum((Harga_Kain+Harga_Print+Harga_Jahit+Aksesoris)*2),2) as Hargax,Format(sum((Harga_Kain+Harga_Print+Harga_Jahit+Aksesoris)*2)/Jumlah,2) as Harga_Satuan, Format(sum(Pajak),2) as Pajak,Format(sum(Harga),2) as Harga, Kd_Packinglist from Barang Join Pesanan Using(Id_Pesanan) join Pemesan using(Id_Pemesan) join Packinglist using (Kd_Packinglist) where Id_Pesanan ='".$id_pesanan."' group by Id_Barang");
       return $query->result();
    }
    

   
    public function getstspsn(){
        $query = $this->db->query("select * from Pemesan join Pesanan using (Id_Pemesan) join Barang using(Id_Pesanan) where Status='Belum Produksi' and Total_Harga > 0 group by Id_Pesanan");
        return $query->result();
    }
    
    
    public function data_packingbarang(){
        $query = $this->db->query("select * from Pemesan Join Pesanan using(Id_Pemesan) join PackingList using(Kd_Packinglist) where Status_Pack='Sudah' and Laporan = 'Belum'");
        return $query->result();
    }

    public function updtstspsn($dp,$id_pesanan){
        $this->db->trans_start();
         $this->db->query("UPDATE Pesanan set DP=".$dp.", Status='Produksi' where Id_Pesanan='".$id_pesanan."'");
         
       
        //$this->db->query("INSERT INTO PackingList (Id_Pesanan) VALUES ('".$id_pesanan."')");
        $this->db->trans_complete();
    }
     
     public function getproduksi(){
        $query = $this->db->query("select * from Pemesan Join Pesanan Using (Id_Pemesan) Join Packinglist using (Kd_Packinglist) Where status='Produksi'  and Status_Pack ='Belum' group by Id_Pesanan");
        return $query->result();
    }
    
    public function kirimPackingbarang($id_pesanan){
     $query =$this->db->query("select *, Nama_Pemesan, Alamat, Id_Barang, Id_Pesanan, Nama_Barang, Kain,Print, Warna, Jumlah,format((Total_Harga),2) as Total_Harga, Format(sum((Harga_Kain+Harga_Print+Harga_Jahit+Aksesoris)*2),2) as Harga,Format(sum((Harga_Kain+Harga_Print+Harga_Jahit+Aksesoris)*2)/Jumlah,2) as Harga_Satuan, Format(sum(Pajak),2) as Pajak, Kd_Packinglist from Barang Join Pesanan Using(Id_Pesanan) join Pemesan using(Id_Pemesan) join Packinglist using (Kd_Packinglist) where Id_Pesanan ='".$id_pesanan."' group by Id_Barang");
     return $query->result();
    }
   
    public function Updatepacking( $kd_packinglist){
       
            $this->db->trans_start();
             $this->db->query("UPDATE PackingList set Status_Kirim='Sudah' where Kd_Packinglist='".$kd_packinglist."'");
            $this->db->trans_complete();
    }
   
    /*
     * SELECT
	Id_Barang,
    (Harga_Jahit+Harga_Kain+Harga_Print)*2 AS Total,
    ((Harga_Jahit+Harga_Kain+Harga_Print) * 1)/100 AS Pajak,
    ((Harga_Jahit+Harga_Kain+Harga_Print)*2) + (((Harga_Jahit+Harga_Kain+Harga_Print) * 1)/100) AS Total_Harga
FROM barang
WHERE Id_Pesanan='PSN001'
GROUP BY Id_Barang
     */
    

    public function getkodeunik() {
        $q = $this->db->query("SELECT MAX(RIGHT(Id_Pemesan,3)) AS id_max FROM Pemesan");
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
        return "PEL".$kd;
    }
    
    public function idpesanan() {
        $q = $this->db->query("SELECT MAX(RIGHT(Id_Pesanan,3)) AS id_max FROM Pesanan");
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
        return "PSN".$kd;
    }
    
    
     public function idBarang() {
        $q = $this->db->query("SELECT MAX(RIGHT(Id_Barang,3)) AS id_max FROM Barang");
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
        return "BRG".$kd;
    }
    
        public function idPack() {
        $q = $this->db->query("SELECT MAX(RIGHT(Kd_Packinglist,3)) AS id_max FROM PackingList");
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
        return "PCK".$kd;
    }
    
     public function getAllData() {
        $getdata = $this->db->get('pemesan');
        return $getdata->result();
    }

    public function insert($data) {
        $this->db->insert('pemesan', $data);
        
    }

    public function delete($id) {
        $this->db->where('Id_Pemesan', $id);
        $this->db->delete('pemesan');
    }
    
     public function deletebarang($Id_Barang) {
        $this->db->where('Id_Barang', $Id_Barang);
        $this->db->delete('Barang');
    }
    
     public function deletepesanan($id_pesanan) {
           $this->db->trans_start();
         $this->db->query("Delete From Pesanan where Id_Pesanan='".$id_pesanan."'");
         $this->db->query("Delete From Barang where Id_Pesanan='".$id_pesanan."'");
       
        //$this->db->query("INSERT INTO PackingList (Id_Pesanan) VALUES ('".$id_pesanan."')");
        $this->db->trans_complete();
         
     }

    public function update($data, $id) {
        $this->db->where('Id_pemesan', $id);
        $this->db->update('pemesan', $data);
    }

     public function updateStatus($data, $id_pesanan) {
        $this->db->where('Id_Pesanan', $id_pesanan);
        $this->db->update('Barang', $data);
    }
    public function updateStatuss($data, $id_pesanan) {
        $this->db->where('Id_Pesanan', $id_pesanan);
        $this->db->update('Barang', $data);
    }


    public function updateStatusprod($data, $id_pesanan) {
        $this->db->where('Id_Pesanan', $id_pesanan);
        $this->db->update('Barang', $data);
    }

   public function updateharga($data, $id_barang) {
        $this->db->where('Id_Barang', $id_barang);
        $this->db->update('Barang', $data);
    }
    
    public function getnama() {
         $query=$this->db->query('select Nama_Pemesan, Id_Pemesan from Pemesan');
         $result=$query->result();
         return $result;
    }
    
    
    public function insertpsn($data,$idpack) {
        $this->db->trans_start();
        $this->db->insert('Pesanan', $data);
         $this->db->query("INSERT INTO PackingList (Kd_Packinglist) VALUES ('".$idpack."')");
         $this->db->trans_complete();
    }
    
    
    public function getbarangs($id) {
        $this->db->where('Id_Pesanan', $id);
        $query=$this->db->query('select * from Barang Join Pesanan Using(Id_Pesanan)');
        $getdata=$query;
        return $getdata->result();
    }
    
    public function getharga($id,$total,$id_barang) {
        $this->db->where('Id_Barang', $id);
        $getdata = $this->db->get('Barang');
        $query = $this->db->query("UPDATE barang SET total_harga=".$total." WHERE id_barang='".$id_barang."'");
        return $getdata->result();
    }
    public function insrtbrng($data,$id_barang) {
        $this->db->trans_start();
        $this->db->insert('Barang', $data);
        $this->db->trans_complete();
    }
    
     public function getIdpsn() {
         $query=$this->db->query('select Id_Pesanan From Pesanan');
         $result=$query->result();
         return $result;
    }
      
      public function gethargapsn() {
          $query=$this->db->query('select Id_Barang, Nama_Pemesan, Tgl_Pesanan, Harga, Harga_Kain, Harga_Print, Harga_Jahit
                                   from Pemesan Join Pesanan using (Id_Pemesan)
                                   join Barang using (Id_Pesanan)');
         $result=$query->result();
         return $result;
    }
    
        public function email($namapemesan) {
            $command = "select Email From Pemesan where Nama_Pemesan='".$namapemesan."'";
            $query=$this->db->query($command);
            $result=$query->result();
            return $result;
        }
        
        public function htotal ($idpes, $harga_total, $id_barang,$pajak,$harga){
            $this->db->trans_start();
            $this->db->query("update Pesanan SET Total_Harga='".$harga_total."',Harga='".$harga."', Pajak='".$pajak."'  Where Id_Pesanan ='".$idpes."'");
            $this->db->trans_complete();
        }
        
        
        public function hpes ($id_pesanan){
           $data= "select * from pesanan where Id_Pesanan ='.$id_pesanan.'";
           return $this->db->query($data);
        }
        
        public function updateHargaBarang($harga,$id_barang) {
            $query = $this->db->query("UPDATE Barang SET Harga_Barang=".$harga." WHERE id_barang='".$id_barang."'");
        }
        
        public function jumlahBox(){
            $query = $this->db->query("SELECT DISTINCT(No_Box) FROM Barang");
            return $query->result();
        }
        
        public function data_Laporan() {
         $query=$this->db->query('select * from Pemesan Join Pesanan using(Id_Pemesan) join PackingList using(Kd_Packinglist) where Laporan ="Sudah" And Status_Pack="Sudah"');
         $result=$query->result();
         return $result;
        }
        
         public function Lapor($idpesanan) {
             $this->db->trans_start();
              $this->db->query = $this->db->query("UPDATE Pesanan SET Laporan='Sudah' WHERE Id_Pesanan='".$idpesanan."'");
            $this->db->trans_complete();
         }

         public function updetnotifprod($idpes) {
            $query = $this->db->query("UPDATE Barang SET Status_Notif=6 WHERE Id_Pesanan='".$idpes."'");
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

         public function barangpesanan($Id_Pesanan) {
            $query = $this->db->query("select *,Format(sum((Harga_Kain+Harga_Print+Harga_Jahit+Aksesoris)*2),2) as Hargax from barang join pesanan using (id_pesanan) join pemesan using(Id_pemesan) join Packinglist using(kd_packinglist) where Laporan ='Sudah' and Id_Pesanan='".$Id_Pesanan."'  group by id_barang");
            return $query->result();
        }

        public function updateStatusp($id_pesanan) {
        $query = $this->db->query("UPDATE Barang SET Status_Notif=11 WHERE Id_Pesanan='".$id_pesanan."'");    }


    }
    


