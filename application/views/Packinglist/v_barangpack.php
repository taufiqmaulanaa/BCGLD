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
                                            <th>Nama Barang</th>
                                            <th>Jumlah Belum Dipacking</th>              
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        error_reporting(0); 
                                        $no = 1;
                                        foreach ($barangpackx as $row) {?>
                                        <tr class="odd gradeX">
                                             <td><?php echo $no++; ?></td>
                                             <td> <a href="<?php echo site_url('/packing/barangpackx/'.$row->Id_Barang); ?>"><i><?php echo $row->Id_Barang;?></i></a></td>
                                            <td><?php echo $row->Nama_Barang;?></td>
                                            <td><?php echo $row->Jumlah;?></td>
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