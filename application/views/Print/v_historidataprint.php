<div class="row">
    <div class="col-lg-12">
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
                                <th>Nama Barang</th>
                                <th>Nama Perusahaan </th>
                                <th>No Nota</th>
                                <th>Harga_Print</th>
                                <th>Tanggal Input</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            error_reporting(0);
                            $no = 1;
                            foreach ($historidataprint as $row) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->Id_Barang; ?></td>
                                    <td><?php echo $row->Nama_Barang; ?></td>
                                    <td class="center"><?php echo $row->Nama_Perusahaanprint; ?></td>
                                    <td class="center"><?php echo $row->No_Notaprint; ?></td>
                                      <td class="center"><?php echo $row->Harga_Print; ?></td>
                                    <td class="center"><?php echo $row->Tgl_Inputprintproduksi; ?></td>
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

