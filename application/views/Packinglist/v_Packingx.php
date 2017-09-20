<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Packing

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
                                            <th>Action</th>            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        error_reporting(0); 
                                        $no = 1;
                                        foreach ($data_packing as $row) {?>
                                        <tr class="odd gradeX">
                                             <td><?php echo $no++; ?></td>
                                            <td> <a href="<?php echo site_url('/packing/vpackingbarangx/'.$row->Id_Pesanan); ?>"><i><?php echo $row->Id_Pesanan;?></i></a></td>
                                            <td><?php echo $row->Nama_Pemesan;?></td>
                                            <?php
                                $attribut = array("class" => "form-horizontal", "method" => "post");
                                echo form_open("Packing/updatepacking", $attribut);
                                ?>        
                                
                                    <input  type="hidden" id="Id_Pesanan" name="Id_Pesanan" value="<?php echo $row->Id_Pesanan; ?>">
                                    <input  type="hidden" id="Kd_Packinglist" name="Kd_Packinglist" value="<?php echo $row->Kd_Packinglist; ?>">
                                    <input type="hidden" name="Tgl_Packing" id="Tgl_Packing"  class="form-control" value="<?php echo gmdate("Y-m-d H:i:s", time()+60*60*7); ?>">
                              

                                <td class="center">
                                        <input type="submit" class="btn btn-default" value="Simpan" onclick= "myFunction()">
                                    </td>
                                    <?php echo form_close(); ?>
                                        </tr>
                                        <?php }?>
                                    </tbody>
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