<div class="row">
    <div class="col-lg-12">
        <?php echo $this->session->flashdata('pesan');?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Pesanan <input required name="Id_Pesanan" id="Id_Pesanan" type="text" value="<?php echo $idpes; ?>" readonly>
                <div class="pull-right">
                    <button type="button" class="btn btn-outline btn-success btn-xs" data-toggle="modal" data-target="#myModalAdd" >Tambah</button>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="<?php echo site_url(); ?>/manajer/insertBarang" onsubmit="function cekPemesan()">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Form Add Pesanan</h4>
                            </div>
                            <div class="modal-body">
                                <!-- isimodal -->
                                <!-- set id buat ajax di bawah -->
                                <div class="form-group">
                                    <label for="disabledSelect">Id Pesanan</label>
                                    <input required name="Id_Pesanan" id="Id_Pesanan" type="text" value="<?php echo $idpes; ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Id Barang</label>
                                    <input required name="Id_Barang" id="Id_Barang" type="text" value="<?php echo $id_barang; ?>" readonly>
                                </div>  

                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input name="Nama_Barang" id="Nama_Barang" class="form-control" placeholder="Nama_Barang" required="true">
                                </div>

                                <div class="form-group">
                                    <label>Kain</label>
                                    <input name="Kain" id="Kain" class="form-control" placeholder="Kain" required="true">
                                </div>

                                <div class="form-group">
                                    <label>Print</label>
                                    <input name="Print" id="Print" class="form-control" placeholder="Print" required="true">
                                </div>

                                <div class="form-group">
                                    <label>Warna</label>
                                    <input name="Warna" id="Warna" class="form-control" placeholder="Warna" required="true">
                                </div>

                                <div class="form-group">
                                    <label>Body</label>
                                    <input name="Body" id="Body" class="form-control" placeholder="Body" required="true">
                                </div>

                                <div class="form-group">
                                    <label>Lace</label>
                                    <input name="Lace" id="Lace" class="form-control" placeholder="Lace" required="true">
                                </div>

                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input name="Jumlah" id="Jumlah" class="form-control" placeholder="Jumlah" required="true">
                                </div>

                                <!-- isimodal -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-primary" value="Save"/>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- modal edit -->
            <!-- Modal -->
            <div>           
                <?php
                if (isset($brg)) {
                    foreach ($brg as $row) {
                        ?>
                        <!-- /.modal -->
                        <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="<?php echo site_url(); ?>/manajer/editBarang">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Edit Barang</h4>
                                        </div>
                                        <div class="modal-body">

                                            <!-- isimodal -->
                                            <div class="form-group" >
                                                <label>Id Barang</label>
                                                <input name="Id_Barang" id="Id_Barang" class="form-control" value="<?php echo $row->Id_Barang; ?>"> 
                                            </div>
                                       
                                               <div class="form-group" >
                                                <label>Nama Barang</label>
                                                <input name="Nama_Barang" id="Nama_Barang" class="form-control" value="<?php echo $row->Nama_Barang; ?>" required> 
                                               </div>
                                        
                                            <div class="form-group" >
                                                <label>Warna</label>
                                                <input name="Warna" id="Warna" class="form-control" value="<?php echo $row->Warna; ?>"required>  
                                            </div>
                                             <div class="form-group" >
                                                <label>Body</label>
                                                <input name="Body" id="Body" class="form-control" value="<?php echo $row->Body; ?>"required>   
                                            </div>
                                              <div class="form-group" >
                                                <label>Lace</label>
                                                <input name="Lace" id="Lace" class="form-control" value="<?php echo $row->Body; ?>" required>  
                                            </div>
                                            <div class="form-group" >
                                                <label>Jumlah</label>
                                                <input name="Jumlah" id="Jumlah" class="form-control" value="<?php echo $row->Jumlah; ?>" required>  
                                            </div>
                                            <div class="form-group">
                                                <label>Harga Kain</label>
                                                <input name="Harga_Kain" id="Harga_Kain" class="form-control" value="<?php echo $row->Harga_Kain; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Harga Print</label>
                                                <input name="Harga_Print" id="Harga_Print" class="form-control" value="<?php echo $row->Harga_Print; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Harga Jahit</label>
                                                <input name="Harga_Jahit" id="Harga_Print" class="form-control" value="<?php echo $row->Harga_Jahit; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Harga Aksesoris</label>
                                                <input name="Aksesoris" id="Harga_Print" class="form-control" value="<?php echo $row->Aksesoris; ?>" required>
                                            </div>
                                            <!-- set id buat ajax di bawah -->

                                            <!-- isimodal -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                    <?php
                    }
                }
                ?>
            </div>  

             <div>           
                <?php
                if (isset($brg)) {
                    foreach ($brg as $row) {
                        ?>
                        <!-- /.modal -->
                        <div class="modal fade" id="modalbarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Edit Barang</h4>
                                        </div>
                                        <div class="modal-body">

                                            <!-- isimodal -->
                                            <div class="form-group" >
                                                <label>Id Barang</label>
                                                <input name="Id_Barang" id="Id_Barang" class="form-control" value="<?php echo $row->Id_Barang; ?>"> 
                                            </div>
                                       
                                               <div class="form-group" >
                                                <label>Harga Kain</label>
                                                <input name="Harga_Kain" id="Harga_Kain" class="form-control" value="<?php echo $row->Harga_Kain; ?>" readonly> 
                                               </div>
                                        
                                            <div class="form-group" >
                                                <label>Harga Print</label>
                                                <input name="Harga_Print" id="Harga_Print" class="form-control" value="<?php echo $row->Harga_Print; ?>"readonly>  
                                            </div>
                                             <div class="form-group" >
                                                <label>Harga Jahit</label>
                                                <input name="Harga_Jahit" id="Harga_Jahit" class="form-control" value="<?php echo $row->Harga_Jahit; ?>"readonly>   
                                            </div>
                                            <div class="form-group">
                                                <label>Harga Aksesoris</label>
                                                <input name="Aksesoris" id="Aksesoris" class="form-control" value="<?php echo $row->Aksesoris; ?>" readonly>
                                            </div>
                                   
                                            <!-- set id buat ajax di bawah -->

                                            <!-- isimodal -->
                                        </div>
                                        <div class="modal-footer">
                                            
                                        </div>
                                    </form>
                                </div>

                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                    <?php
                    }
                }
                ?>
            </div>     
            <!-- /.modal -->


            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                        <thead>
                            <tr>
                                                      
                                <th>Id Barang</th>
                                <th>Kain</th>
                                <th>Warna</th>
                                <th>Print</th>
                                <th>Body</th>
                                <th>Lace</th>
                                <th width="100px">Jumlah</th>
                                <th width="100px">Harga</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            error_reporting(0);
                            $no = 1;
                            $total=0;
                            $totalp=0;
                            $totalh=0;
                            foreach ($brg as $row) {
                                ?>
                                <tr class="odd gradeX">
                                                           
                                    <td> <a href="#modalbarang<?php echo $row->Id_Barang?>" data-toggle="modal" data-target="#modalbarang" class="open-edit"><i> <?php echo $row->Id_Barang;?></i></a></td>
                                    <td><?php echo $row->Kain; ?></td>
                                    <td><?php echo $row->Warna; ?></td>
                                    <td><?php echo $row->Print; ?></td>
                                    <td><?php echo $row->Body; ?></td>
                                    <td><?php echo $row->Lace; ?></td>
                                    <td><?php echo $row->Jumlah; ?></td>
                                    <td>

                                        <?php
                                        $harga_kain = $row->Harga_Kain;
                                        $harga_print = $row->Harga_Print;
                                        $harga_jahit = $row->Harga_Jahit;
                                        $Aksesoris = $row->Aksesoris;
                                        $pajak =  (($harga_kain + $harga_print + $harga_jahit + $Aksesoris) * 2 / 100);
                                        $harga = (($harga_kain + $harga_print + $harga_jahit + $Aksesoris) * 2);
                                        $tharga= $harga+ $pajak;
                                        ?>
                                        <input name="Harga" id="Harga" type="text" class="form-control" 
                                               value="Rp.<?php echo number_format($harga, 2, ".", "."); ?>" placeholder="Harga" required readonly>
                                    </td>
                                    <?php  
                                          $totalp = $totalp + $pajak; 
                                           $totalh = $totalh + $harga;
                                           $total = $total + $tharga;
                                    ?>
                                    <td class="center">
                                        <?php
                                        $attribut = array("class" => "form-horizontal", "method" => "post");
                                        echo form_open("manajer/deleteBarang",$attribut);
                                        ?>                                       
                                        <input type="hidden" name="Id_Pesanan" id="Id_Pesanan" type="text" class="form-control" value="<?php echo $row->Id_Pesanan; ?>">
                                         <input type="hidden" name="Id_Barang" id="Id_Barang" type="text" class="form-control" value="<?php echo $row->Id_Barang; ?>">      
                                        <input type="submit" class="btn btn-outline btn-danger btn-xs" value="Delete">
                                        <a href="#modalEdit<?php echo $row->Id_Barang ?>" data-toggle="modal" data-target="#myModalEdit" class="open-edit"><i type="button" class="btn btn-outline btn-primary btn-xs">Edit</i></a>
                                    <?php } ?> 
                                         <?php echo form_close(); ?>     
                                     </td>    
                        </tbody>
                            <tr> 
                                <th colspan="7"> <b>Harga Rp.</b> </th> 
                                <th>
                                 <input name="Harga" id="Harga" type="text" class="form-control"  value="<?php echo number_format($totalh, 2, ".", "."); ?>" placeholder="Harga_Total" required readonly>
                                </th>
                            </tr>
                            <tr> 
                                <th colspan="7"> <b>Pajak Rp.</b> </th> 
                                <th>
                                 <input name="Pajak" id="Pajak" type="text" class="form-control"  value="<?php echo number_format($totalp, 2, ".", "."); ?>" placeholder="Harga_Total" required readonly>
                                </th>
                            </tr>
                            <tr>
                                <?php
                                $attribut = array("class" => "form-horizontal", "method" => "post");
                                echo form_open("manajer/vtotal", $attribut);
                                ?>
                                <th colspan="7"> <b>Total Rp.</b> </th>         
                                <th>
                                    <input name="Total_Harga" id="Total_Harga" type="text" class="form-control"  value="<?php echo number_format($total, 2, ".", "."); ?>" placeholder="Harga_Total" required readonly>
                                    <input type="hidden"name="Pajak" id="Pajak" type="text" class="form-control"  value="<?php echo number_format($totalp, 2, ".", "."); ?>" placeholder="Harga_Total" required readonly>
                                    <input type="hidden"name="Harga" id="Harga" type="text" class="form-control"  value="<?php echo number_format($totalh, 2, ".", "."); ?>" placeholder="Harga_Total" required readonly>
                                    <input  type="hidden" id="Id_Pesanan" name="Id_Pesanan" value="<?php echo $idpes; ?>">
                                    <input type="hidden" id="Id_Barang" name="Id_Barang" value="<?php echo $id_barang; ?>">
                                    <input type="hidden" id="Total_Harga" name="Total_Harga" value="<?php echo $total; ?>">
                                </th>

                                <td class="center">
                                        <input type="submit" class="btn btn-default" value="Simpan" onclick= "myFunction()">
                                    </td>
                                    <?php echo form_close(); ?>
                                    <script>
                                        function myFunction() {
                                            alert("Harga Berhasil Disimpan");
                                        }
                                    </script>
                            </tr>
                        </thead>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.panel-body -->
            <script src="<?php echo base_url(); ?>template/js/jquery.js"></script>

              <script type="text/javascript">

                            function cekPemesan()
                           
                           {

                                 if(!$("#Id_Barang").val())
                            {
                                alert('maaf Id Barang tidak boleh kosong');
                                $("#Id_Barang").focus();
                                return false;
                            }
                            if(!$("#Nama_Barang").val())
                            {
                                alert('maaf Nama_Barang tidak boleh kosong');
                                $("#Nama_Barang").focus();
                                return false;
                            }
                             if(!$("#Kain").val())
                            {
                                alert('maaf Kain tidak boleh kosong');
                                $("#Kain").focus();
                                return false;
                            }
                            
                            
                            if(!$("#Print").val())
                            {
                                alert('maaf Print tidak boleh kosong');
                                $("#Print").focus();
                                return false;
                            }


                            if(!$("#Warna").val())
                            {
                                alert('maaf Warna tidak boleh kosong');
                                $("#Warna").focus();
                                return false;
                            }
                         

                            if(!$("#Body").val())
                            {
                                alert('maaf Body tidak boleh kosong');
                                $("#Body").focus();
                                return false;
                            }

                                 if(!$("#Jumlah").val())
                            {
                                alert('maaf Jumlah tidak boleh kosong');
                                $("#Jumlah").focus();
                                return false;
                            }
                         
                                          
                        }


                            </script>
      

         


            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
<!-- /.col-lg-12 -->
</div>