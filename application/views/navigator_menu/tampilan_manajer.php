 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                         <li>
                            <a href="http://localhost/BCGLD/index.php/manajer"><i class=""></i> Dashboard</a>
                        </li>
                         <li>
                                    <!-- <a href="vCustomer">View Custoer</a> -->
                                    <?= anchor("manajer/vCustomer","Pemesan") ?>
                                </li>  
                           <li>
                            <a href="#"> Pesanan <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                                          
                                <li>
                                    <!-- <a href="vCustomer">View Custoer</a> -->
                                    <?= anchor("manajer/vSttspsn","Status Pesanan") ?>
                                </li>
                                <li>
                                    <!-- <a href="vCustomer">View Custoer</a> -->
                                    <?= anchor("manajer/vproduksi","Pesanan Produksi") ?>
                                </li>
                                 <li>
                                    <!-- <a href="vCustomer">View Custoer</a> -->
                                    <?= anchor("manajer/vpackinglist","Packinglist") ?>
                                </li>
                                
                       
                            </ul>
                            
                            
                            <!-- /.nav-second-level -->
                        </li>
                           <li>
                            <a href="#"> Laporan <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                                          
                                <li>
                                    <!-- <a href="vCustomer">View Custoer</a> -->
                                   <?= anchor("manajer/Laporan","Lapor") ?>
                                </li>
                                <li>
                                    <!-- <a href="vCustomer">View Custoer</a> -->
                                    <?= anchor("manajer/vchart","Grafik Pesanan Produksi") ?>
                                </li>
                            </ul>
                            </li>
                            
                            <!-- /.nav-second-level -->
                    
                        
                    </ul> 
                            <!-- /.nav-second-level -->
                      
                   
                </div>
                <!-- /.sidebar-collapse -->
                <a href="../../../../../../../../../../../../Applications/XAMPP/htdocs/x/application/config/routes.php"></a>
            </div>
            <!-- /.navbar-static-side -->
        
        </nav>
