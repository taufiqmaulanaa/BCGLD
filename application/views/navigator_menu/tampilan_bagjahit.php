 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                            <li>
                           <?= anchor("Jahit","Dashboard") ?>
                            
                        </li>

                        </li>
                          <li>
                           <?= anchor("Jahit/vPerusahaan","Data Perusahaan Jahit") ?>   
                        </li>
                            <!-- /.nav-second-level -->
                       <li>
                            <a href="#"></i> Data Harga Jahit<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <!-- <a href="vCustomer">View Custoer</a> -->
                                    <?= anchor("Jahit/vPesananjahit","Harga Jahit") ?>
                                </li>
                                 <li>
                                    <!-- <a href="vCustomer">View Custoer</a> -->
                                    <?= anchor("Jahit/vhistorihargajahit","Histori Harga Jahit") ?>
                                </li></ul>
                        </li>

                        <li>
                            <a href="#"></i> Data Produksi Jahit<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li>
                                    <!-- <a href="vCustomer">View Custoer</a> -->
                                    <?= anchor("Jahit/vDataPesananJahit","Data Jahit Produksi") ?>
                                </li> 

                                <li>
                                    <!-- <a href="vCustomer">View Custoer</a> -->
                                    <?= anchor("Jahit/vhistoridatajahit","History Data Jahit") ?>
                                </li>   
                    </li>
                        
                       
                            <!-- /.nav-second-level -->
                      
                   
                </div>
                <!-- /.sidebar-collapse -->
                <a href="../../../../../../../../../../../../Applications/XAMPP/htdocs/x/application/config/routes.php"></a>
            </div>
</nav>