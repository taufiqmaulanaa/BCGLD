
            <!-- /.navbar-static-side -->
 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                      <li>
                           <?= anchor("Perint","Dashboard") ?>
                            
                        </li>

                          </li>
                          <li>
                           <?= anchor("Perint/vPerusahaan","Data Perusahaan Print") ?>   
                        </li>
                            <!-- /.nav-second-level -->
                       <li>
                            <a href="#"></i> Data Harga Print<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <!-- <a href="vCustomer">View Custoer</a> -->
                                    <?= anchor("perint/vPesananPrint","Harga print") ?>
                                </li>
                                 <li>
                                    <!-- <a href="vCustomer">View Custoer</a> -->
                                    <?= anchor("Perint/vhistorihargaprint","Histori Harga print") ?>
                                </li></ul>
                        </li>

                        <li>
                            <a href="#"></i> Data Produksi Print<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li>
                                    <!-- <a href="vCustomer">View Custoer</a> -->
                                    <?= anchor("Perint/vPesananPrintProduksi","Data Print Produksi") ?>
                                </li> 

                                <li>
                                    <!-- <a href="vCustomer">View Custoer</a> -->
                                    <?= anchor("Perint/vhistoridataprint","History Data Print") ?>
                                </li>   
                    </li>
                        
                       
                            <!-- /.nav-second-level -->
                      
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
                <a href="../../../../../../../../../../../../Applications/XAMPP/htdocs/x/application/config/routes.php"></a>
            </div>
            <!-- /.navbar-static-side -->
        </nav>
