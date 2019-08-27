<!DOCTYPE html>
<html>
    
<!-- Mirrored from coderthemes.com/ubold_2.1/menu_2/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Sep 2016 08:58:12 GMT -->
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

        <title><?php echo $title;?>  | Login</title>

        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/pages.css" rel="stylesheet" type="text/css" />
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

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class=" card-boxss">
            <div class="panel-heading"> 
                <h3 class="text-center"> <strong class="text-custom" style="font-size: 48px; color: rgba(255, 255, 255, 0.93);"><?php echo $title;?></strong> </h3>
            </div> 


                 <?php $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?>

                <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php print_r($msg);?>                      
                </div>
                <?php }?>
                
                      <?php $msg = $this->session->flashdata('msg1'); if((isset($msg)) && (!empty($msg))) { ?>     
                <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php print_r($msg);?>          
                </div>
                <?php }?>


            <div class="panel-body">
            <form class="form-horizontal m-t-20" method="post" action="<?php echo base_url();?>login/validate">

                <div class="form-group ">
                    <div class="col-xs-12">
                       <select  class="form-control"  autocomplete="off" name="usertype" > 
                        <option value="">Select Usertype</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" name="username" required="" placeholder="Username">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" required="" placeholder="Password">
                    </div>
                </div>

           
                
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit"><strong>Account Log In</strong></button>
                    </div>
                </div>

             
            </form> 
            
            </div>   
            </div>                              
           
            
        </div>
        
        

        
        <script>
            var resizefunc = [];
        </script>

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


        <script src="<?php echo base_url();?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.app.js"></script>
    
    </body>

<!-- Mirrored from coderthemes.com/ubold_2.1/menu_2/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Sep 2016 08:58:12 GMT -->
</html>