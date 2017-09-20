<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Packing 
           
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
                                            <th>Id Pesanan</th>
                                             <th>Kode_Packing</th>
                                             <th>No Box</th>            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        error_reporting(0); 
                                        $no = 1;
                                        foreach ($nobox as $row) {?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->Id_Pesanan;?></td>
                                            <td><?php echo $row->Kd_Packinglist;?></td>
                                            <td><?php echo $row->No_Box;?></td>
                                            <td align="center">
                                                <a href="<?php echo site_url('packing/boox/'.$row->Id_Pesanan.'/'.$row->No_Box); ?>" <i class="btn btn-outline btn-primary btn-xs">View</i></a>
                                                 <a href="<?php echo site_url('packing/kirimpackinglist/'.$row->Id_Pesanan.'/'.$row->No_Box); ?>" <i class="btn btn-outline btn-primary btn-xs">Cetak</i></a>
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