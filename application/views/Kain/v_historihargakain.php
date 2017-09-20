<div class="row">
    <div class="col-lg-12">
         <?php echo $this->session->flashdata('hargakain');?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Histori Harga Kain
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
                                <th>Body </th>
                                <th>Lace</th>
                                <th>Jumlah</th>
                                <th>Harga Kain</th>
                                <th>Panjang Kain</th>
                                 <th>Tanggal Input</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            error_reporting(0);
                            $no = 1;
                            foreach ($data_historikain as $row) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->Id_Barang; ?></td>
                                    <td><?php echo $row->Kain; ?></td>
                                    <td class="center"><?php echo $row->Body; ?></td>
                                    <td class="center"><?php echo $row->Lace; ?></td>
                                    <td class="center"><?php echo $row->Jumlah; ?></td>
                                    <td class="center"><?php echo $row->Harga_Kain; ?></td>
                                    <td class="center"><?php echo $row->Panjang_Kain; ?></td>
                                    <td class="center"><?php echo $row->Tgl_Inputhargakain; ?></td>
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

