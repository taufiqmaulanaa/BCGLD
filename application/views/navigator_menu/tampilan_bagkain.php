 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                       <li>
                           <?= anchor("Kain","Dashboard") ?>
                            
                        </li>
                          <li>
                           <?= anchor("Kain/vPerusahaan","Data Perusahaan Kain") ?>   
                        </li>
                            <!-- /.nav-second-level -->
                       <li>
                            <a href="#"></i> Data Harga Kain<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <!-- <a href="vCustomer">View Custoer</a> -->
                                    <?= anchor("Kain/vPesananKain","Harga Kain") ?>
                                </li>
                                 <li>
                                    <!-- <a href="vCustomer">View Custoer</a> -->
                                    <?= anchor("Kain/vhistorihargakain","Histori Harga Kain") ?>
                                </li></ul>
                        </li>

                        <li>
                            <a href="#"></i> Data Produksi Kain<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li>
                                    <!-- <a href="vCustomer">View Custoer</a> -->
                                    <?= anchor("Kain/vPesananKainProduksi","Data Kain Produksi") ?>
                                </li> 

                                <li>
                                    <!-- <a href="vCustomer">View Custoer</a> -->
                                    <?= anchor("Kain/vhistoridatakain","History Data Kain") ?>
                                </li>   
                         </li>

                      
                </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- jQuery -->
    