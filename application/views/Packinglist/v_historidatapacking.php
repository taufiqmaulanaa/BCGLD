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
                                            <th>Id Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>No_Box</th>
                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        error_reporting(0); 
                                        $no = 1;
                                        foreach ($getdatahistoribarangpacking as $row) {?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->Id_Barang;?></td>
                                            <td><?php echo $row->Nama_Barang;?></td>
                                            <td><?php echo $row->Jumlah;?></td>
                                            <td><?php echo $row->No_Box;?></td>
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