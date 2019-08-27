  <?php

        $profilesgetdata=$this->db->where('status',1)->get('login')->result_array();
        foreach ($profilesgetdata as $key => $profilesgetdatas) {
            $title=$profilesgetdatas['title'];
            $logo=$profilesgetdatas['logo'];
        }

    ?>


    <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- Logo container-->
                    <div class="logo">
                        <a href="<?php echo base_url();?>admin/dashboard" class="logo"><span><?php echo $title;?></span></a>
                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">

                        <ul class="nav navbar-nav navbar-right pull-right">
                        
                          

                            <li class="dropdown navbar-c-items">
                                <a href="#" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url();?>assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle">&nbsp;<span style="color:white;"><?php echo $this->session->userdata['usertype'];?></span> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url();?>admin/profile"><i class="ti-user text-custom m-r-10"></i> Profile</a></li>
                                   
                                    <li><a href="<?php echo base_url();?>login/logout"><i class="ti-power-off text-danger m-r-10"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>

                </div>
            </div>

            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                        <li id="dashboard">
                                <a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i><span> Dashboard </span> </a>
                        </li>
                         
                            <li id="addproduct" class="has-submenu">
                                <a href="#"><i class="fa fa-product-hunt"></i> <span>Add Product </span> </a>

                                  <ul class="submenu">
                                            <li><a href="<?php echo base_url();?>admin/add_product">Add Bakes Product</a></li>

                                            <li><a href="<?php echo base_url();?>admin/chats_product">Add Chats Product</a></li>
                                           
                                           
                                        </ul>
                            </li>

                            <li id="addstock">
                                <a href="<?php echo base_url();?>admin/add_stock"><i class="md md-local-grocery-store"></i> <span> Add Stock </span> </a>
                            </li>

                            <li id="addbilling">
                                <a href="<?php echo base_url();?>admin/add_billing"><i class="ion-cash"></i></i> <span> Bakes </span> </a>
                            </li>

                            <li id="billingreports">
                                <a href="<?php echo base_url();?>admin/add_billing/billing_reports"><i class="fa fa-sliders"></i><span> Bakes Reports </span> </a>
                            </li>

                            <li id="addchats">
                                <a href="<?php echo base_url();?>admin/add_chats"><i class="ion-cash"></i></i> <span> Chats </span> </a>
                            </li>

                            <li id="chatsreports">
                                <a href="<?php echo base_url();?>admin/add_chats/chats_reports"><i class="fa fa-sliders"></i><span>Chats Reports </span> </a>
                            </li>

                            <li id="adduser">
                                <a href="<?php echo base_url();?>admin/add_user"><i class="icon-user"></i></i> <span> Add User </span> </a>
                            </li>

                           <!--  <li id="off_er">
                                <a href="<?php echo base_url();?>admin/offer"><i class="fa fa-reddit"></i><span> Offer </span> </a>
                            </li> -->

                            <li id="rep_orts" class="has-submenu">
                                <a href="#"><i class="md md-list"></i> <span>Reports </span> </a>
                                <ul class="submenu">
                                            <li><a href="<?php echo base_url();?>admin/reports/itemized_reports">Bakes Itemized Reports</a></li>

                                             <li><a href="<?php echo base_url();?>admin/reports/chatsitemized_reports">Chats Itemized Reports</a></li>

                                            <li><a href="<?php echo base_url();?>admin/reports/purchase_reports">Bakes Purchase Reports</a></li>
                                            <li><a href="<?php echo base_url();?>admin/reports/customer_reports">Customer Reports</a></li>
                                           
                                        </ul>
                            </li>
                          


                        </ul>
                        <!-- End navigation menu        -->
                    </div>
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>