<div class="row">
    <div class="col-lg-12">
      
        <div class="panel panel-default">
            <div class="panel-heading">
            Lporan Barang
                <div class="pull-right">
             
                </div>
            </div>
            <!-- Modal -->
           
            <!-- modal edit -->
            <!-- Modal -->
               
            <!-- /.modal -->


            <!-- /.panel-heading -->
           <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>                                
                                <th>Id Barang</th>
                                <th>Nama Barang</th>
                                <th>Kain</th>
                                <th>Warna</th>
                                <th>Body</th>
                                <th>Lace</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            error_reporting(0);
                            $no = 1;

                            foreach ($vdatalaporan as $row) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>                                  
                                    <td><?php echo $row->Id_Barang; ?></td>
                                    <td><?php echo $row->Nama_Barang; ?></td>
                                    <td><?php echo $row->Kain; ?></td>
                                    <td><?php echo $row->Warna; ?></td>
                                    <td><?php echo $row->Body; ?></td>
                                    <td><?php echo $row->Lace; ?></td>
                                    <td><?php echo $row->Jumlah; ?></td>
                                    <td>

                                        <?php
                                        $harga_kain = $row->Harga_Kain;
                                        $harga_print = $row->Harga_Print;
                                        $harga_jahit = $row->Harga_Jahit;
                                        $jumlah_harga = (((($harga_kain + $harga_print + $harga_jahit) * 2) + ($harga_kain + $harga_print + $harga_jahit) * 2 / 100));
                                        ?>
                                        <input name="Harga" id="Harga" type="text" class="form-control" 
                                               value="<?php echo number_format($jumlah_harga, 2, ".", "."); ?>" placeholder="Harga" required readonly>

                                    </td>
                                    <?php $total = $total + $jumlah_harga; ?>

                                    <td class="center">

                                        
                                    <?php } ?>        
                        </tbody>
                        <thead>
                            <tr>
                                <?php
                                $attribut = array("class" => "form-horizontal", "method" => "post");
                                echo form_open("manajer/vtotal", $attribut);
                                ?>
                                <th colspan="8"><b>Total</b> </th>         
                                <th>

                                    <input name="Total_Harga" id="Total_Harga" type="text" class="form-control" 
                                           value="<?php echo number_format($total, 2, ".", "."); ?>" placeholder="Harga_Total" required readonly>
                                    <input type="hidden" id="Id_Pesanan" name="Id_Pesanan" value="<?php echo $idpes; ?>">
                                    <input type="hidden" id="Id_Barang" name="Id_Barang" value="<?php echo $id_barang; ?>">
                                    <input type="hidden" id="Total_Harga" name="Total_Harga" value="<?php echo $total; ?>">


                                </th>

                             
                                    <?php echo form_close(); ?>
                                    <script>
                                        function myFunction() {
                                            alert("Harga Berhasil Disimpan");
                                        }
                                    </script>
                                </th>
                                <?php echo form_close(); ?>  
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
            <!-- /.panel-body -->
            <script src="<?php echo base_url(); ?>template/js/jquery.js"></script>
            


            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
<!-- /.col-lg-12 -->
</div>