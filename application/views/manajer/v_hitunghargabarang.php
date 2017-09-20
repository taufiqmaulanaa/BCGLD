<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Harga Barang
               
                
                    <!-- /.modal-dialog -->
               
                <!-- /.modal -->
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Pesanan</th>
                                <th>Id Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga Kain</th>
                                <th>Harga Print</th>
                                <th>Harga Jahit</th>
                                <th>Harga Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            error_reporting(0);
                            $no = 1;
                            foreach ($getharga as $row) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->Id_Pesanan; ?></td>
                                    <td><?php echo $row->Id_Barang; ?></td>
                                    <td><?php echo $row->Nama_Barang; ?></td>
                                    <td><?php echo $row->Harga_Kain; ?></td>
                                    <td><?php echo $row->Harga_Print; ?></td>
                                    <td><?php echo $row->Harga_Jahit; ?></td>
                                    <td>
                                        <?php
                                            $harga_kain = $row->Harga_Kain;
                                            $harga_print = $row->Harga_Print;
                                            $harga_jahit = $row->Harga_Jahit;
                                            $jumlah_harga = (($harga_kain + $harga_print + $harga_jahit)+(($harga_kain + $harga_print + $harga_jahit)*2/100));
                                            echo 'Rp. ' . number_format($jumlah_harga, 2 , ',' , '.' );
                                        ?></td>
                                    <td class="center">
                                        <a href="" data-toggle="modal" data-target="#myModalEdit" class="open-edit"
                                           data-Id_Pesanan="<?php echo $row->Id_Pesanan; ?>"
                                           data-Id_Barang="<?php echo $row->Id_Barang; ?>" 
                                           data-Nama_Barang="<?php echo $row->Nama_Barang; ?>"
                                           data-Kain="<?php echo $row->Kain; ?>"
                                           data-Warna="<?php echo $row->Warna; ?>"
                                           data-Body="<?php echo $row->Body; ?>" 
                                           data-Lace="<?php echo $row->Lace; ?>" 
                                           data-Jumlah="<?php echo $row->Jumlah; ?>" 
                                           ><i class="fa fa-edit"> Edit</i></a>
                                        <a href="<?php echo site_url() . '/manajer/deleteCustomer/' . $row->Id_Pesanan; ?>"onclick="return confirm('Anda yakin?')"> <i class="fa fa-times"></i> Delete</a>
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
                                            $(".modal-body #Id_Barang ").val(Id_Barang );
                                            $(".modal-body #Nama_Barang").val(Nama_Barang);
                                            $(".modal-body #Warna").val(Warna);
                                            $(".modal-body #Body").val(Body);
                                            $(".modal-body #Lace").val(Lace);
                                            $(".modal-body #Jumlah").val(Jumlah);

                                        });
            </script>
            <!-- /.panel-body -->
        </div>
         </div>
        <!-- /.panel -->
    </div>
    
    <!-- /.col-lg-12 -->