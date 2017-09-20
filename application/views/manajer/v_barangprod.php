<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Pesanan <input required name="Id_Pesanan" id="Id_Barang" type="text" value="<?php echo $idpes; ?>" readonly>
            </div>
            <!-- Modal -->
            <div>
                <?php
                if (isset($brg)) {
                    foreach ($brg as $row) {
                        ?>
                        <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="<?php echo site_url(); ?>/manager/updateCustomer">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Status Barang Produksi</h4>
                                        </div>
                                        <div class="modal-body">
                                            <!-- isimodal -->
                                            <!-- set id buat ajax di bawah -->
                                            <div class="form-group">
                                                <label>Id_Barang</label>
                                                <input required name="Id_Barang" id="Id_Pesanan" type="text" value="<?php echo $row->Id_Barang; ?>" readonly>
                                            </div>  
                                             <div class="form-group">
                                                <label>Status Kain </label>
                                                <input required name="Status_Kain" id="Status_Kain" type="text" value="<?php echo $row->Status_Kain; ?>" readonly>
                                            </div> 
                                            <div class="form-group">
                                                <label>Status Print </label>
                                                <input required name="Status_Kain" id="Status_Kain" type="text" value="<?php echo $row->Status_Print; ?>" readonly>
                                            </div>
                                              <div class="form-group">
                                                <label>Status Jahit </label>
                                                <input required name="Status_Kain" id="Status_Kain" type="text" value="<?php echo $row->Status_Jahit; ?>" readonly>
                                            </div> 
                                           
                                            <!-- isimodal -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">ok</button>
                                           
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    
                    <?php
                }
            }
            ?>
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
                                <th>Kain</th>
                                <th>Warna</th>
                                <th>Body</th>
                                <th>Lace</th>
                                <th>Jumlah</th>                             
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            error_reporting(0);
                            $no = 1;
                            foreach ($brg as $row) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>                                  
                                    <td><?php echo $row->Id_Barang; ?></td>
                                    <td><?php echo $row->Nama_Barang; ?></td>
                                    <td><?php echo $row->Kain; ?></td>
                                    <td><?php echo $row->Warna; ?></td>
                                    <td><?php echo $row->Body; ?></td>
                                    <td><?php echo $row->Lace; ?></td>
                                    <td><?php echo $row->Jumlah; ?></td>
                                      <td class="center">
                                         <a href="#modalEdit<?php echo $row->Id_Barang?>" data-toggle="modal" data-target="#myModalEdit" class="open-edit" ><i type="button" class="btn btn-outline btn-primary btn-xs"> View</i></a>
                                      </td>
                                </tr>
                            <?php } ?>
                            

                        </tbody>

                    </table>
                </div>
            </div>
            <!-- /.panel-body -->
            <script src="<?php echo base_url(); ?>template/js/jquery.js"></script>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('#dataTables-example').DataTable({
                        "orderCellsBottom": true
                    });
                });
                $(document).on("click", ".open-edit", function () {
                    var Id_Pesanan = $(this).data('Id_Pesanan');
                    var Id_Barang = $(this).data('Id_Barang');
                    var Nama_Barang = $(this).data('Nama_Barang');
                    var Kain = $(this).data('Kain');
                    var Warna = $(this).data('Warna');
                    var Body = $(this).data('Body');
                    var Lace = $(this).data('Lace');
                    var Jumlah = $(this).data('Jumlah');
                    $(".modal-body #Id_Pesanan").val(Id_Pesanan);
                    $(".modal-body #Id_Barang ").val(Id_Barang);
                    $(".modal-body #Nama_Barang").val(Nama_Barang);
                    $(".modal-body #Warna").val(Warna);
                    $(".modal-body #Body").val(Body);
                    $(".modal-body #Lace").val(Lace);
                    $(".modal-body #Jumlah").val(Jumlah);

                });
            </script>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
<!-- /.col-lg-12 -->

