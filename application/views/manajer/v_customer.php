<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Customer
                            <div class="pull-right">
                               <button type="button" class="btn btn-outline btn-success btn-xs" data-toggle="modal" data-target="#myModalAdd" >Tambah</button>
                            </div>
                        <!-- Modal -->
                            <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="<?php echo site_url();?>/manajer/insertCustomer" onsubmit="return cekPemesan() ;">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title" id="myModalLabel">Form Add Customer</h4>
                                            </div>
                                         
                                            <div class="modal-body">
                                                <!-- isimodal -->
                                                <!-- set id buat ajax di bawah -->
                                                    <div class="form-group">
                                                        <label>Id Customer</label>
                                                         <input required id="Id_Pemesan" name="Id_Pemesan" type="text" value="<?php echo $id; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Name Customer</label>
                                                        <input name="Nama_Pemesan" id="Nama_Pemesan" class="form-control" placeholder="Enter Name Here" required >
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Address Customer</label>
                                                        <input name="Alamat" id="Alamat" class="form-control" placeholder="Enter Address Here" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email Customer</label>
                                                        <input name="Email" id="Email" class="form-control" placeholder="Enter Email Here" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone Customer</label>
                                                        <input name="Telepon" id="Telepon" class="form-control" placeholder="Enter Phone Here" required>
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
                            if (isset($data)){
                                foreach($data as $row){
                            ?>
                            <div class="modal fade" id="myModalEdit<?php echo $row->Id_Pemesan?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="<?php echo site_url('manajer/updateCustomer');?>">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Edit Customer</h4>
                                        </div>
                                        <div class="modal-body">
                                            <!-- isimodal -->
                                            <!-- set id buat ajax di bawah -->

                                                <div class="form-group">
                                                    <label>Id Pemesan</label>
                                                    <input name="Id_Pemesan" id="Id_Pemesan"  class="form-control" value="<?php echo $row->Id_Pemesan;?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Pemesan</label>
                                                    <input name="Nama_Pemesan" id="Nama_Customer" class="form-control" value="<?php echo $row->Nama_Pemesan;?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <input name="Alamat" id="Alamat_Customer" class="form-control" placeholder="Enter Address Here" value="<?php echo $row->Alamat;?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email </label>
                                                    <input name="Email" id="Email_Customer" class="form-control" placeholder="Enter Email Here" value="<?php echo $row->Email;?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone Customer</label>
                                                    <input name="Telepon" id="Telepon" class="form-control" placeholder="Enter Phone Here" value="<?php echo $row->Telepon;?>" required>
                                                    <p id="demo"></p>
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
                                            <th>Id Customer</th>
                                            <th>Name Customer</th>
                                            <th>Address Customer</th>
                                            <th>Email Customer</th>
                                            <th>Phone Customer</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        error_reporting(0); 
                                        $no = 1;
                                        foreach ($data as $row) {?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td> <a href="<?php echo site_url('/manajer/vPesanan/'.$row->Id_Pemesan); ?>"><i><?php echo $row->Id_Pemesan;?></i></a></td>
                                            <td><?php echo $row->Nama_Pemesan;?></td>
                                            <td><?php echo $row->Alamat;?></td>
                                            <td class="center"><?php echo $row->Email;?></td>
                                            <td class="center"><?php echo $row->Telepon;?></td>
                                            <td>
                                                <a href="#myModalEdit<?php echo $row->Id_Pemesan?>" data-toggle="modal" ><i> Edit</i></a>
                                                <a href="<?php echo site_url().'/manajer/deleteCustomer/'.$row->Id_Pemesan; ?>"onclick="return confirm('Anda yakin?')" ><i>Delete</i></a>
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
                                var Nama_Customer = $(this).data('Nama_Customer');
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

                                 if(!$("#Nama_Pemesan").val())
                            {
                                alert('maaf Nama Pemesan tidak boleh kosong');
                                $("#Nama_Pemesan").focus();
                                return false;
                            }
                            if(!$("#Alamat").val())
                            {
                                alert('maaf Alamat tidak boleh kosong');
                                $("#Alamat").focus();
                                return false;
                            }
                             if(!$("#Email").val())
                            {
                                alert('maaf Email tidak boleh kosong');
                                $("#Email").focus();
                                return false;
                            }
                            
                            
                            if(!$("#Telepon").val())
                            {
                                alert('maaf Telepon tidak boleh kosong');
                                $("#Telepon").focus();
                                return false;
                            }
                             if(!("#Telepon").val.match(/^[0-9]+$/))
                            {
                                alert('maaf Telepon harus angka');
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