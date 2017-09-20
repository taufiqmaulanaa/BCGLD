<div class="row">
    <div class="col-lg-12">
        <?php echo $this->session->flashdata('');?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Harga Kain
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            error_reporting(0);
                            $no = 1;
                            foreach ($getdatajahit as $row) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->Id_Pesanan; ?></td>
                                    <td><?php echo $row->Nama_Pemesan; ?></td>
                                    <td><?php echo $row->Tgl_Pesanan; ?></td>
                                    <td><a href="<?php echo site_url('/Jahit/vdataJahit/'.$row->Id_Pesanan); ?>" <i class="btn btn-outline btn-primary btn-xs">View</i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
               
            </div>

        </div>
    </div>
</div>
    
    </div>
<!-- /.panel-body -->
<script src="<?php echo base_url(); ?>template/js/jquery.js"></script>

