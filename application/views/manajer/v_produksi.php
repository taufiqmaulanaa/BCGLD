<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               Status Pesanan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Pesanan</th>
                                <th>Nama Pemesan</th>
                                <th>Tanggal Pesanan</th>
                                <th>Harga</th>
                                <th>Status</th>
                                 <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            error_reporting(0);
                            $no = 1;
                            foreach ($get_produksi as $row) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->Id_Pesanan; ?></td>
                                    <td><?php echo $row->Nama_Pemesan;?></td>
                                    <td><?php echo $row->Tgl_Pesanan; ?></td>
                                    <td><?php echo 'Rp. '.number_format($row->Total_Harga, 2, ',', '.');?></td>
                                    <td><?php echo $row->Status; ?></td>
                                    <td class="center">
                                        <a href="<?php echo site_url('/manajer/vBarangprod/' . $row->Id_Pesanan.'/'.$id_pesanan); ?>"  class="btn btn-outline btn-primary" >Cek Produksi </a>
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