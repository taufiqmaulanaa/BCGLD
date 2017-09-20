<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Perusahaan Kain
                            <div class="pull-right">
                               <button type="button" class="btn btn-outline btn-success btn-xs" data-toggle="modal" data-target="#myModalAdd" >Tambah</button>
                            </div>
                        <!-- Modal -->
                            <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="<?php echo site_url();?>/kain/insertdataperusahaankain" onsubmit="return cekPemesan() ;">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title" id="myModalLabel">Form Add Customer</h4>
                                            </div>
                                         
                                            <div class="modal-body">
                                                <!-- isimodal -->
                                                <!-- set id buat ajax di bawah -->
                                                     <div class="form-group">
                                                        <label>Id Perusahaan Kain</label>
                                                         <input required id="Id_Perusahaankain" name="Id_Perusahaankain" type="text" value="<?php echo $getperusahaan ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama Perusahaan Kain</label>
                                                        <input name="Nama_Perusahaankain" id="Nama_Perusahaankain" class="form-control" placeholder="Nama Perusahaan Kain" required >
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Address Perusahaan Kain</label>
                                                        <input name="Alamat_Kain" id="Alamat_Kain" class="form-control" placeholder="Address Perusahaan Kain" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone Perusahaan Kain</label>
                                                        <input name="Telephone_Kain" id="Telephone_Kain" class="form-control" placeholder="Phone Perusahaan Kain" required>
                                                    </div>

                                                <!-- isimodal -->

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <input type="submit" class="btn btn-primary" value="Save"/>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- modal edit -->
                            <!-- Modal -->
                            <div>
                           
                            <?php
                            if (isset($data_perusahaankain)){
                                foreach($data_perusahaankain as $row){
                            ?>
                            <div class="modal fade" id="myModalEdit<?php echo $row->Id_Perusahaankain?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="<?php echo site_url('kain/editdataperusahaankain');?>">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Edit Customer</h4>
                                        </div>
                                        <div class="modal-body">
                                            <!-- isimodal -->
                                            <!-- set id buat ajax di bawah -->

                                                <div class="form-group">
                                                        <label>Id Perusahaan Kain</label>
                                                         <input required id="Id_Perusahaankain" name="Id_Perusahaankain" type="text" value="<?php echo $row->Id_Perusahaankain?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama Perusahaan Kain</label>
                                                        <input name="Nama_Perusahaankain" id="Nama_Perusahaankain" class="form-control" value="<?php echo $row->Nama_Perusahaankain?>" required >
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Address Perusahaan Kain</label>
                                                        <input name="Alamat_Kain" id="Alamat_Kain" class="form-control" value="<?php echo $row->Alamat_Kain?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone Perusahaan Kain</label>
                                                        <input name="Telephone_Kain" id="Telephone_Kain" class="form-control" value="<?php echo $row->Telephone_Kain?>" required>
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
                               <?php }
                                }
                                ?>
                            <!-- /.modal -->

                        </div>   
                </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                           <th>No</th>
                                            <th>Id Perusahaan</th>
                                            <th>Name Perusahaan </th>
                                            <th>Alamat Perusahaan</th>
                                            <th>Phone Perusahaan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        error_reporting(0); 
                                        $no = 1;
                                        foreach ($data_perusahaankain as $row) {?>
                                        <tr class="odd gradeX">
                                              <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->Id_Perusahaankain; ?></td>
                                            <td><?php echo $row->Nama_Perusahaankain;?></td>
                                            <td><?php echo $row->Alamat_Kain;?></td>
                                             <td><?php echo $row->Telephone_Kain;?></td>
                                            <td>
                                                <a href="#myModalEdit<?php echo $row->Id_Perusahaankain?>" data-toggle="modal" ><i> Edit</i></a>
                                                <a href="<?php echo site_url().'/kain/deletePerusahaan/'.$row->Id_Perusahaankain; ?>"onclick="return confirm('Anda yakin?')" ><i>Delete</i></a>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                        <script src="<?php echo base_url();?>template/js/jquery.js"></script>
                        <script type="text/javascript">
                            $(document).on("click", ".open-edit", function() {
                                var Id_Pemesan= $(this).data('Id_Pemesan');
                                var Nama_Customer = $(this).data('Nama_Perusahaankain');
                                var Alamat_Customer = $(this).data('Alamat_Customer');
                                var Email_Customer = $(this).data('Email_Customer');
                                var Phone_Customer= $(this).data('Phone_Customer');
                                $(".modal-body #id_Customer").val(Id_Customer);
                                $(".modal-body #Nama_Customer").val(Nama_Customer);
                                $(".modal-body #Alamat_Customer").val(Alamat_Customer);
                                $(".modal-body #Email_Customer").val(Email_Customer);
                                $(".modal-body #Phone_Customer").val(Phone_Customer);
                            });

                        </script>
                        <script type="text/javascript">

                            function cekPemesan()
                           
                           {

                                 if(!$("#Nama_Perusahaankain").val())
                            {
                                alert('maaf Nama Perusahaan tidak boleh kosong');
                                $("#Nama_Perusahaankain").focus();
                                return false;
                            }
                            if(!$("#Alamat_Kain").val())
                            {
                                alert('maaf Alamat Perusahan tidak boleh kosong');
                                $("#Alamat_Kain").focus();
                                return false;
                            }
                            
                            if(!$("#Telephone_Kain").val())
                            {
                                alert('maaf Telepon tidak boleh kosong');
                                $("#Telephone_Kain").focus();
                                return false;
                            }
                                          
                        }


                            </script>
      

                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>