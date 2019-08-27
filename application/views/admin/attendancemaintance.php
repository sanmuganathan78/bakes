<?php

        $profilesgetdata=$this->db->where('status',1)->get('login')->result_array();
        foreach ($profilesgetdata as $key => $profilesgetdatas) {
            $title=$profilesgetdatas['title'];
            $logo=$profilesgetdatas['logo'];
        }

    ?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

       <title><?php echo $title;?> | Profile</title>

          <link href="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        
        <link href="<?php echo base_url();?>assets/plugins/bootstrapvalidator/src/css/bootstrapValidator.css" rel="stylesheet" type="text/css" />

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

        
    </head>


    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">

           <?php $this->load->view('admin/includes/header');?> 

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

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
                <?php }

               $mate=$this->db->where('status',1)->get('additem')->result_array();

                ?>

                    <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Profile</h4>
                               <!--  <ol class="breadcrumb">
                                    <li><a href="#">Ubold</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Form Validation</li>
                                </ol> -->
                            </div>
                        </div>
                        

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            
                            <?php 
                                            foreach ($profile as $row) {
                                               
                                            ?>
                            <form method="post" action="<?php echo base_url();?>admin/settings/updateprofile" id="form_sample_1" enctype="multipart/form-data" data-parsley-validate novalidate>
                            <div class="col-md-6">
                                <div class="form-group">
                                 <input type="hidden" name="id"  value="<?php echo $row['id'];?>">
                                                <label for="userName">Company Name<span class="text-danger">*</span></label>
                                                <input type="text" name="title"  value="<?php echo $row['title'];?>" data-parsley-minlength="2" parsley-trigger="change" data-parsley-maxlength="12"  required placeholder="Enter Company Name" class="form-control" id="title">
                                            </div>

                                             <div class="form-group">
                                                <label>Email<span class="text-danger">*</span></label>
                                                <div>
                                                    <input type="email" name="email" class="form-control" required value="<?php echo $row['email'];?>" parsley-type="email" placeholder="Enter a valid e-mail"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>URL</label>
                                                <div>
                                                    <input parsley-type="url" type="url" name="url" class="form-control" value="<?php echo $row['url'];?>" placeholder="URL"/>
                                                            <span class="help-block"> e.g: http://www.demo.com or http://demo.com </span>
                                                </div>
                                            </div>
                                         
                                            <div class="form-group">
                                                <label>Mobile No<span class="text-danger">*</span></label>
                                                <div>
                                                    <input data-parsley-type="number" type="text" name="mobileno" value="<?php echo $row['mobileno'];?>" class="form-control" data-parsley-minlength="10" data-parsley-maxlength="10" required placeholder="Enter Mobile No"/>
                                                </div>
                                            </div>
                                

                              
                                </div>
                                <div class="col-md-6">
                                  
                                  <div class="form-group">
                                                <label for="userName">User Name<span class="text-danger">*</span></label>
                                                <input type="text" value="<?php echo $row['username'];?>" name="username" parsley-trigger="change" required placeholder="Enter Username" data-parsley-minlength="4" class="form-control" id="title">
                                    </div>

                                            <div class="form-group">
                                                <label for="userName">Password<span class="text-danger">*</span></label>
                                                <input type="password" name="password" parsley-trigger="change" value="<?php echo $row['password'];?>" required placeholder="Enter Password" data-parsley-minlength="6" class="form-control" id="title">
                                            </div>

                                            <div class="form-group">
                                                <label for="userName">Address<span class="text-danger">*</span></label>
                                                 <textarea name="address"   cols="6"  parsley-trigger="change" required class="form-control"><?php echo $row['address'];?></textarea>
                                            </div>


                                            <div class="form-group col-md-12">
                                                <div class="col-md-6">
                                                      <label for="userName">Logo<span class="text-danger">*</span></label>
                                                     <label class="file">
                                                      <input type="file" id="logo" name="logo" value="<?php echo $row['logo'];?>">
                                                      <span class="file-custom"></span>
                                                  </label>
                                                </div>
                                                 <div class="col-md-6">
                                                 
                                                   <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox"> 
                                                   <img style="height: 108px; width: 100%;" src="<?php echo base_url();?>logouploads/<?php echo $row['logo'];?>" alt="...">
                                                    </a>
                                                 </div>
                                            </div>

                                <div class="form-group text-right m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                        Cancel
                                    </button>
                                </div>
                                </div>
                            </form>
                             <?php }?>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                    </div>

                </div>




           


                <!-- Footer -->
                
                <!-- End Footer -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        <div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>
        <div class="modal-content">
            <div class="modal-body">
                <img src="" alt="" />
            </div>
        </div>
    </div>
</div>

<style type="text/css">
  #lightbox .modal-content {
    display: inline-block;
    text-align: center;   
}

#lightbox .close {
    opacity: 1;
    color: rgb(255, 255, 255);
    background-color: rgb(25, 25, 25);
    padding: 5px 8px;
    border-radius: 30px;
    border: 2px solid rgb(255, 255, 255);
    position: absolute;
    top: -15px;
    right: -55px;
    
    z-index:1032;
}
</style>



        <!-- jQuery  -->
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
         <script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.js"></script>


        <script src="<?php echo base_url();?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.app.js"></script>

         <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/parsleyjs/dist/parsley.min.js"></script>
        
        
        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>

         <script>
$( "#settings" ).addClass( "active" );
$('#settings2').attr("class","active");
$('.settings').attr("style","display: block;");

</script>

        <script type="text/javascript">
          $(document).ready(function() {
    var $lightbox = $('#lightbox');
    
    $('[data-target="#lightbox"]').on('click', function(event) {
        var $img = $(this).find('img'), 
            src = $img.attr('src'),
            alt = $img.attr('alt'),
            css = {
                'maxWidth': $(window).width() - 100,
                'maxHeight': $(window).height() - 100
            };
    
        $lightbox.find('.close').addClass('hidden');
        $lightbox.find('img').attr('src', src);
        $lightbox.find('img').attr('alt', alt);
        $lightbox.find('img').css(css);
    });
    
    $lightbox.on('shown.bs.modal', function (e) {
        var $img = $lightbox.find('img');
            
        $lightbox.find('.modal-dialog').css({'width': $img.width()});
        $lightbox.find('.close').removeClass('hidden');
    });
});
        </script>

       

    </body>

<!-- Mirrored from coderthemes.com/ubold_2.1/menu_2/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Sep 2016 08:56:58 GMT -->
</html>