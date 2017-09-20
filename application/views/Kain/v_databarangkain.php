<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Kain
                            <div class="pull-right">
                        </div>
                       
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
                                            <th>Harga</th>
                                            <th>No Nota</th>
                                            <th>Nama Perusahan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        error_reporting(0); 
                                        $no = 1;
                                        foreach ($kain as $row) {?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->Id_Barang;?></td>
                                            <td><?php echo $row->Nama_Barang;?></td>
                                            <td><?php echo $row->Harga_Kain;?></td>
                                            <?php
                                                $attribut = array("class" => "form-horizontal", "method" => "post");
                                                echo form_open('kain/insertdataKain',$attribut);
                                            ?>
                                            
                                           
                                              <td>
                                    
                                                <input name="No_Notakain" type="text" class="form-control" placeholder="No Nota" required>
                                                <input type="hidden" name="Tgl_Inputkainproduksi" id="Tgl_Inputkainproduksi"  class="form-control" value="<?php echo gmdate("Y-m-d H:i:s", time()+60*60*7); ?>">
                                                <input type="hidden" value="<?php echo $row->Id_Barang;?>" name="Id_Barang">
                                                <input type="hidden" value="<?php echo $row->Id_Pesanan;?>" name="Id_Pesanan">
                                     
                                            </td>
                                             <td>
                                                    <select name="Id_Perusahaankain">
                                                            <option value="">Nama Perusahaan</option>
                                                            <?php foreach ($Nama_Perusahaan as $row) {?>
                                                            <option value="<?php echo $row->Id_Perusahaankain; ?>">
                                                                <?php echo $row->Nama_Perusahaankain; ?>
                                                            </option>
                                                            <?php } ?>
                                                    </select>
                                            </td>
                                            <td class="center">
                                                <input type="submit" class="btn btn-default" value="Simpan">
                                            </td>
                                            <?php
                                                echo form_close();
                                            ?>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                        <script src="<?php echo base_url();?>template/js/jquery.js"></script>
                       
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>