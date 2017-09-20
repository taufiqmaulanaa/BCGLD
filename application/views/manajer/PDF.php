<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               Status Pesanan
               
                <!-- Modal -->
          
                <!-- modal edit -->
                <!-- Modal -->
                
                <!-- /.modal -->
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                       
                        <tbody>
                            <?php
                            error_reporting(0);
                            $no = 1;
                            foreach ($get_pesanan as $row => $value) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?=  ucwords($row) ?></td>
                                    <td>:<?=$value?><td>
                                   
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
                                            var Nama_Pemesan = $(this).data('Nama_Pemesan');
                                            var Tgl_Pesanan= $(this).data('Tgl_Pesanan');
                                            var Harga = $(this).data('Harga');
                                            $(".modal-body #Id_Pesanan").val(Id_Pesanan);
                                            $(".modal-body #Nama_Pemesan").val(Nama_Pemesan);
                                            $(".modal-body #Tgl_Pesanan").val(Tgl_Pesanan);
                                            $(".modal-body #Harga").val(Harga);
                                            
                                        });
            </script>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>