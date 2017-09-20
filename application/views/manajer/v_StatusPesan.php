<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               Status Pesanan
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="950px" id="table_pesanan">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Pesanan</th>
                                <th>Nama Pemesan</th>
                                <th>Tanggal Pesanan</th>
                                <th>Total Harga</th>
                                <th width="50px">DP</th>
                                <th width="100px">Status</th>
                                 <th width="150px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            error_reporting(0);
                            $no = 1;
                            foreach ($get_pesanan as $row) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->Id_Pesanan; ?></td>
                                    <td><?php echo $row->Nama_Pemesan;?></td>
                                    <td><?php echo $row->Tgl_Pesanan; ?></td>
                                    <td> <?php echo $row->Total_Harga; ?></td>
                                    <?php
                                            $total_harga = $row->Total_Harga;
                                            $dp = $total_harga/2;

                                        ?>
                                    <td>        
                                        
                                        
                                              <?php
                                        $attribut = array("class" => "form-horizontal", "method" => "post");
                                        echo form_open("manajer/uptdpsn",$attribut);
                                        ?>
                                            <input name="DP" id="DP" type="text" class="form-control" 
                                                    value="<?php echo $dp?>"  required >
                                            <input type="hidden" name="harga" id="DP" type="text" class="form-control" 
                                            value="<?php echo $total_harga?>"  required >
                                            <input type="hidden" name="Id_Pesanan" id="Id_Pesanan" type="text" class="form-control" value="<?php echo $row->Id_Pesanan; ?>">
                                            <input type="hidden" name="Kd_Packinglist" id="Kd_Packinglist" type="text" class="form-control" value="<?php echo $idPack ?>"> 
                                            <input type="hidden" name="Total_Harga" id="Total_Harga" type="text" class="form-control" value="<?php echo $Total_Harga ?>"> 
                                    </td>
                                    <td><?php echo $row->Status; ?></td>
                                    <td>
                                                <input type="submit" Id="Produksi" class="btn btn-default btn-xs" value="Produksi" > 
                                                <?php 
                                                    echo anchor('manajer/email/'.$row->Nama_Pemesan.'/'.$row->Id_Pesanan,'<i class="btn btn-outline btn-success btn-xs">Kirim</i>');
                                                 ?>
                                                <a href="<?php echo site_url().'/manajer/deletePesanan/'.$row->Id_Pemesan; ?>"onclick="return confirm('Anda yakin?')" class="btn btn-outline btn-danger btn-xs"><i>Delete</i></a>          
                                    </td>
                                      
                                </tr>
                <?php } ?>
                        </tbody>    
                    </table>
                </div>
            </div>
            <!-- /.panel-body -->
            <script src="<?php echo base_url(); ?>template/js/jquery.js"></script>
      
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

