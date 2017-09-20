<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Laporan               
                <!-- Modal -->
          
                <!-- modal edit -->
                <!-- Modal -->
                
                <!-- /.modal -->
            </div>

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
                                <th>Print</th>
                                <th>Lace</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            error_reporting(0);
                            $no = 1;
                            foreach ($barangpesanan as $row) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->Id_Barang; ?></td>
                                    <td><?php echo $row->Nama_Barang;?></td>
                                    <td><?php echo $row->Kain;?></td>
                                    <td><?php echo $row->Print;?></td>
                                    <td><?php echo $row->Lace;?></td>
                                    <td><?php echo $row->Jumlah;?></td>
                                    <td><?php echo $row->Harga;?></td>
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
</div><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
