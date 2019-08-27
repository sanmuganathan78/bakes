<!DOCTYPE html>
<html>
    
<!-- Mirrored from coderthemes.com/ubold_2.1/menu_2/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Sep 2016 08:52:18 GMT -->

<?php

        $profilesgetdata=$this->db->where('status',1)->get('login')->result_array();
        foreach ($profilesgetdata as $key => $profilesgetdatas) {
            $title=$profilesgetdatas['title'];
            $logo=$profilesgetdatas['logo'];
        }

    ?>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon_1.ico">

        <title><?php echo $title;?> | Dashboard</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/morris/morris.css">

        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url();?>assets/js/modernizr.min.js"></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','http://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-69506598-1', 'auto');
          ga('send', 'pageview');
        </script>

    </head>


    <body>


        <!-- Navigation Bar-->
        <?php $this->load->view('admin/includes/header');?>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                   <!--  <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                            
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                        
                    </div>
                </div> -->


                <div class="row">
                

                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-pink pull-left">
                                <i class="md md-add-shopping-cart text-pink"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b class=""><?php echo number_format($totals);?></b></h3>
                                <p class="text-muted">Today's Sales</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                  

                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box fadeInDown animated">
                            <div class="bg-icon bg-icon-info pull-left">
                                <i class="md md-attach-money text-info"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b class=""><?php echo number_format($totalsales);?></b></h3>
                                <p class="text-muted">Total Sales</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    

                   
                </div>



              


               

            </div>
        </div>



        <!-- jQuery  -->
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/detect.js"></script>
        <script src="<?php echo base_url();?>assets/js/fastclick.js"></script>

        <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url();?>assets/js/waves.js"></script>
        <script src="<?php echo base_url();?>assets/js/wow.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>

        <script src="<?php echo base_url();?>assets/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="<?php echo base_url();?>assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/counterup/jquery.counterup.min.js"></script>

        <script src="<?php echo base_url();?>assets/plugins/morris/morris.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/raphael/raphael-min.js"></script>

        <script src="<?php echo base_url();?>assets/plugins/jquery-knob/jquery.knob.js"></script>

        <script src="<?php echo base_url();?>assets/pages/jquery.dashboard.js"></script>

        <script src="<?php echo base_url();?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>

         <script type="text/javascript">
        $(document).ready(function(){
            $('#dashboard').attr('class','has-submenu active');

        });
    </script>


    </body>

<!-- Mirrored from coderthemes.com/ubold_2.1/menu_2/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Sep 2016 08:53:18 GMT -->
</html>