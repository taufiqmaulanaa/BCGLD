<div class="row">
    <div class="col-lg-12">
         <?php echo $this->session->flashdata('deletepesan');?>
        <div class="panel panel-default">
                  <div class="panel-heading">
                Data Pesanan <input required name="Id_Pemesan" id="Id_Pemesan" type="text" value="<?php echo $idpel; ?>" readonly></input>
                <div class="pull-right">
                    <button type="button" class="btn btn-outline btn-success btn-xs" data-toggle="modal" data-target="#myModalAdd" >Tambah</button>
                </div>
            </div>
                <!-- Modal -->
                <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="<?php echo site_url();?>/manajer/insertPesanan">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">;</button>
                                    <h4 class="modal-title" id="myModalLabel">Form Add Pesanan</h4>
                                </div>
                                <div class="modal-body">
                                    <!-- isimodal -->
                                    <!-- set id buat ajax di bawah -->
                                    <div class="form-group">
                                        <label>Id Pesanan </label>
                                        <input required name="Id_Pesanan" id="Id_Pesanan" type="text" value="<?php echo $Id_Pesanan; ?>" readonly>
                                    </div>  
                                     <div class hidden="form-group">
                                        <label>Id Pemesan</label>
                                        <input required name="Id_Pemesan" id="Pemesan" type="text" value="<?php echo $idpel; ?>">
                                    </div> 
                                      <div class hidden="form-group">
                                        <label>Kd Packinglist</label>
                                        <input required name="Kd_Packinglist" id="Kd_Packinglist" type="text" value="<?php echo $id_Pack; ?>">
                                    </div>  
                                    <div class="form-group">
                                        <label>Tanggal Pesanan</label>
                                        <input type="Tgl_Pesanan" name="Tgl_Pesanan" id="Tgl_Pesanan"  class="form-control" value="<?php echo gmdate("Y-m-d", time()+60*60*7);?>">
                                    </div>
                                    <!-- isimodal -->
                                     <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <input type="submit" class="btn btn-primary" value="Save"/>
                                </div>
                            </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                </div>
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
                            foreach ($get_pesanan as $row) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->Id_Pesanan; ?></td>
                                    <td><?php echo $row->Nama_Pemesan;?></td>
                                    <td><?php echo $row->Tgl_Pesanan; ?></td>
                                    <td class="center">
                                        <?php
                                        $attribut = array("class" => "form-horizontal", "method" => "post");
                                        echo form_open("manajer/deletePesanan",$attribut);
                                        ?>                                       
                                            <input type="hidden" name="Id_Pesanan" id="Id_Pesanan" type="text" class="form-control" value="<?php echo $row->Id_Pesanan; ?>">     
                                            <input type="hidden" name="Id_Pemesan" id="Id_Pemesan" type="text" class="form-control" value="<?php echo $row->Id_Pemesan; ?>">         
                                         <input type="submit" class="btn btn-outline btn-danger btn-xs" value="Delete">
                                        <a href="<?php echo site_url('/manajer/vBarang/'.$row->Id_Pesanan); ?>" <i class="btn btn-outline btn-primary btn-xs">View</i></a>
                                         
                                    </td>
                                </tr>
<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.panel-body -->
            <script src="<?php echo base_url(); ?>template/js/jquery.js"></script>
            <script type="text/javascript">
                                        $(document).on("click", ".open-edit", function () {
                                            var Id_Pesanan = $(this).data('Id_Pesanan');
                                            var Nama_Pemesan = $(this).data('Nama_Pemesan');
                                            var Tgl_Pesanan= $(this).data('Tgl_Pesanan');
                                            var Harga = $(this).data('Harga');
                                            $(".modal-body #Id_Pesanan").val(Id_Pesanan);
                                            $(".modal-body #Nama_Pemesan").val(Nama_Pemesan);
                                            $(".modal-body #Tgl_Pesanan").val(Tgl_Pesanan);
                                            $(".modal-body #Harga").val(Harga);
                                            
                                        });
            </script>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>