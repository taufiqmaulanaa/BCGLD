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
                                <th>Id Pesanan</th>
                                <th>Kd Packing</th>
                                <th>Nama Pemesan</th>
                                <th>Tanggal Pesanan</th>
                                <th>Harga Total</th>
                                <th>Status</th>
                                 <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            error_reporting(0);
                            $no = 1;
                            foreach ($data_Laporan as $row) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->Id_Pesanan; ?></td>
                                    <td><?php echo $row->Kd_Packinglist; ?></td>
                                    <td><?php echo $row->Nama_Pemesan;?></td>
                                    <td><?php echo $row->Tgl_Pesanan; ?></td>
                                    <td><?php echo 'Rp. '.number_format($row->DP, 2, ',', '.');?></td>
                                    <td><?php echo $row->Laporan; ?></td>
                                 <td>  <a href="<?php echo site_url('/manajer/laporanbarang/'.$row->Id_Pesanan.'/'.$row->Kd_Packinglist); ?>" <i class="btn btn-outline btn-success btn-xs" >view</i></a></td>
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
