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
                                        <form method="POST" action="<?php echo site_url();?>/packing/insrtbox">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Box</h4>
                                        </div>
                                        <div class="modal-body">
                                            <!-- isimodal -->
                                            <!-- set id buat ajax di bawah -->
                                           
                                        <label>Id Barang</label>
                                     <select name="Id_Barang">
                                                            <option value="">Nama_Barang</option>
                                                            <?php foreach ($id_barang as $row) {?>
                                                            <option value="<?php echo $row->Id_Barang; ?>">
                                                                <?php echo $row->Nama_Barang; ?>
                                                            </option>
                                                            <?php } ?>
                                     </select>
                            
                           
                                                <div class="form-group">
                                                    <label>Jumlah</label>
                                                    <input name="Jumlah" id="Jumlah" class="form-control" value="" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>No Box</label>
                                                    <input name="No_Box" id="No_Box" class="form-control" placeholder="" required>
                                                </div>
                 

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
                            <!-- /.modal -->
         
               
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Status Jahit</th>
                                            <th>No_Box</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        error_reporting(0); 
                                        $no = 1;
                                        foreach ($data_packingbarang as $row) {?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->Id_Barang;?></td>
                                            <td><?php echo $row->Nama_Barang;?></td>
                                            <td><?php echo $row->Jumlah;?></td>
                                            <td><?php echo $row->Status_Jahit;?></td>
                                            <td><?php echo $row->No_Box;?></td>
                                             <td class="center">
                                               <a href="#modalEdit<?php echo $row->Id_Barang?>" data-toggle="modal" data-target="#myModalEdit<?php echo $row->Id_Barang?>" class="open-edit"><i class="fa fa-edit"> Edit</i></a>   
                                            </td>
                                        </tr>

                                        <?php }?>
                                    </tbody>   
                        <thead>
                            <tr>
                                <?php
                                $attribut = array("class" => "form-horizontal", "method" => "post");
                                echo form_open("Packing/updatepacking", $attribut);
                                ?>
                                <th colspan="5"><b></b> </th>         
                                <td>
                                    <input  type="hidden" id="Id_Pesanan" name="Id_Pesanan" value="<?php echo $row->Id_Pesanan; ?>">
                                    <input  type="hidden" id="Kd_Packinglist" name="Kd_Packinglist" value="<?php echo $row->Kd_Packinglist; ?>">
                                    <input type="hidden" name="Tgl_Packing" id="Tgl_Packing"  class="form-control" value="<?php echo gmdate("Y-m-d H:i:s", time()+60*60*7); ?>">
                                </td>

                                <td class="center">
                                        <input type="submit" class="btn btn-default" value="Simpan" onclick= "myFunction()">
                                    </td>
                                    <?php echo form_close(); ?>
                                  
                                </th>
                                <?php echo form_close(); ?>  
                            </tr>
                        </thead>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                      
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>