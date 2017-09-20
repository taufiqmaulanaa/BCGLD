<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-heading">
                           Packing 
                            <div class="pull-right">
                                <button type="button" class="btn btn-outline btn-success btn-xs" data-toggle="modal" data-target="#myModalAdd" >Tambah</button>
                                </div>
                         </div>
                            
 
                      <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="<?php echo site_url();?>/packing/insrtbox" onsubmit="return ce() ;">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Box</h4>
                                        </div>
                                        <div class="modal-body">
                                            <!-- isimodal -->
                                            <!-- set id buat ajax di bawah -->
                                    
                            <?php foreach ($id_barang as $row) {?>
                                  <!-- set id buat ajax di bawah -->



                                                 <div class="form-group">
                                                    <label>Id Barang</label>
                                                    <input name="Id_Barang" id="Id_Barang" class="form-control" value="<?php echo $row->Id_Barang;?> " required>
                                                  
                                                </div>
                                                 <div class="form-group">
                                                    <label>Jumlah Belum Packing</label>
                                                    <input name="Jumlah" id="Jumlah" class="form-control" value="<?php echo $row->Jumlah;?>" required>
                                                </div>
                                                 
                                                <div class="form-group">
                                                    <label>Jumlah Dalam Box</label>
                                                    <input name="Jumlahbox" id="Jumlahbox" class="form-control" value="" required>
                                                </div>
                                       
                                                <div class="form-group">
                                                    <label>No Box</label>
                                                    <input name="No_Box" id="No_Box" class="form-control" placeholder="" required>
                                                </div>
                          <?php } ?>

                                            <!-- isimodal -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                           <th>No</th>
                                            <th>Id_Pesanan</th>
                                            <th>Nama Pemesan</th> 
                                            <th>Jumlah</th>
                                            <th>No_Box</th>
                                            <th>Action</th>              
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        error_reporting(0); 
                                        $no = 1;
                                        foreach ($xbox as $row) {?>
                                        <tr class="odd gradeX">
                                             <td><?php echo $no++; ?></td>
                                             <td><?php echo $row->Id_Barang;?></td>
                                            <td><?php echo $row->Nama_Barang;?></td>
                                            <td><?php echo $row->Jumlahbox;?></td>
                                            <td><?php echo $row->No_Box;?></td>
                                            <td><a href="<?php echo site_url('packing/kirimpackinglist/'.$row->Id_Barang.'/'.$row->No_Box); ?>" <i class="btn btn-outline btn-primary btn-xs">Cetak</i></a></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                                 <script type="text/javascript">

                            function cek()
                           
                           {

                                 if(!$("#Jumlahbox").val())
                            {
                                alert('Jumlah Dalam Box Tidak Boleh Kosong');
                                $("#Jumlahbox").focus();
                                return false;
                            }
                            if(!$("#No_Box").val())
                            {
                                alert('No Box Tidak Boleh Kosong');
                                $("#No_Box").focus();
                           
                                          
                        }


                            </script>
      

                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>