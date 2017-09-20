<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <!-- Modal -->
                            
                            <!-- modal edit -->
                            <!-- Modal -->
                  
                            
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
                                        foreach ($databox as $row) {?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->Id_Barang;?></td>
                                            <td><?php echo $row->Nama_Barang;?></td>
                                            <td><?php echo $row->Jumlah;?></td>
                                            <td align="center">
                                                <a href="<?php echo site_url('packing/vbarangpacking/'.$row->Id_Pesanan); ?>" <i class="btn btn-outline btn-primary btn-xs">View</i></a>
                                                 
                                            </td>
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