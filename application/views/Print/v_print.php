<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Jahit
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
                                <th>Panjang</th>
                               <th>Harga Print</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            error_reporting(0);
                            $no = 1;
                            foreach ($data_perint as $row) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->Id_Barang; ?></td>
                                    <td><?php echo $row->Nama_Barang; ?></td>
                                    <td><?php echo $row->Panjang_Kain; ?></td>   
                                    <td class="center">
                                        <?php
                                        $attribut = array("class" => "form-horizontal", "method" => "post");
                                        echo form_open("Perint/hitungprint", $attribut);
                                        ?>
                                        <input name="Hargaperint" type="text" class="form-control" placeholder="Masukan Harga" required>
                                        <input type="hidden" name="Id_Barang" value="<?php echo $row->Id_Barang; ?>">
                                        <input type="hidden" name="Id_Pesanan" value="<?php echo $row->Id_Pesanan; ?>">
                                        <input type="hidden" name="Tgl_Inputhargaprint" id="Tgl_Inputhargaprint"  class="form-control" value="<?php echo gmdate("Y-m-d H:i:s", time()+60*60*7); ?>">
                                    </td>
                                    <td class="center">
                                        <input type="submit" class="btn btn-default" value="Hitung" onclick="return confirm('Simpan Harga?')" >
        
                                    <?php echo form_close(); ?>
                                <?php } ?>
                                </tr> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>
</div> 



<!-- /.panel-body -->
<script src="<?php echo base_url(); ?>template/js/jquery.js"></script>

