<div class="row">
    <div class="col-lg-12">
        <?php echo $this->session->flashdata('hargaprint');?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Histori Harga Print
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Barang</th>
                                <th>Kain</th>
                                <th>Panjang Kain</th>
                                <th>Harga Print</th>
                                 <th>Tanggal Input</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            error_reporting(0);
                            $no = 1;
                            foreach ($data_historiprint as $row) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->Id_Barang; ?></td>
                                    <td><?php echo $row->Nama_Barang; ?></td>
                                    <td class="center"><?php echo $row->Panjang_Kain; ?> Meter</td>
                                    <td class="center"><?php echo $row->Harga_Print; ?></td>
                                    <td class="center"><?php echo $row->Tgl_Inputhargaprint; ?></td>
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

