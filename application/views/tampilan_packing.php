
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>template/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>template/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url();?>template/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url();?>template/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>template/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>template/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Beachgold Lifestyle</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              <li class="dropdown">
                   <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <b style="color:red"><?php 
                        $sql=mysql_fetch_array(mysql_query("select count(*) as notif from barang  where status_notif = 9" ));
                        echo $sql['notif'] 
                        ?> </b><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                            <?php
                            $resultNotif=mysql_query("select * from barang join Pesanan using (Id_Pesanan)  where status_notif=9 ");
                            while ($row=mysql_fetch_array($resultNotif,MYSQL_BOTH)) {
                                echo '<li class="divider"></li>
                                <li>
                                    <a href="'.site_url().'/packing/vbarangpacking/'.$row[0].'/status">
                                        <div>
                                            <strong style="color:orange">1 Barang Pesanan Baru  '.$row[0].'</strong>
                                            
                                        </div>
                                    <div>'.$row[2].' dengan status '.$row[25].'</div>
                                    </a>
                                </li>';
                            }
                            ?>   
                    </ul>

                    <!-- /.dropdown-alerts -->
                </li>
                  
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
               
                <!-- /.dropdown -->
               
                <!-- /.dropdown -->
                
                         <li><i class="fa fa-users"> <?php 
                        $sql=mysql_fetch_array(mysql_query("select username as akun from akun where roll='packing'"));
                        echo $sql['akun']
                        ?></i></li>
                    
                        <li><i class=""></i><?= anchor("packing/logout","Log Out") ?>
                            
                        </li>
                    
                    <!-- /.dropdown-user -->
              
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

           <?php echo $this->load->view('navigator_menu/tampilan_bagpackinglist')?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $judul; ?> </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php $this->load->view($content)?>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>template/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>template/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>template/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>template/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>template/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Notifications - Use for reference -->
    <script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    // popover demo
    $("[data-toggle=popover]")
        .popover()
    </script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

    <!-- Page-Level Demo Scripts - Notifications - Use for reference -->
    <script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    // popover demo
    $("[data-toggle=popover]")
        .popover()
    </script>

</body>

</html>