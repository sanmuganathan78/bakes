<!DOCTYPE html>
<html>
    
<!-- Mirrored from coderthemes.com/ubold_2.1/menu_2/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Sep 2016 08:56:58 GMT -->
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
        <!-- App Favicon icon -->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.html">
        <!-- App Title -->
        <title><?php echo $title;?> | Offer</title>

        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
         <link href="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

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
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                            
                        </div>

                        <h4 class="page-title">Offer</h4>
                        
                    </div>
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

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            
                          
                            <form method="post" action="#" id="form_sample_1" enctype="multipart/form-data" data-parsley-validate novalidate>
                            <div class="col-md-6">
                                
                                            <div class="form-group">
                                                <label>Mobile No<span class="text-danger">*</span></label>
                                                <div>
                                                    <input data-parsley-type="number" type="text" name="mobileno"  class="form-control" data-parsley-minlength="10" data-parsley-maxlength="10" required placeholder="Enter Mobile No"/>
                                                </div>
                                            </div>

                                              <div class="form-group">
                                                <label for="userName">Offer<span class="text-danger">*</span></label>
                                                 <textarea name="address" data-parsley-maxlength="150"   cols="6"  parsley-trigger="change" required class="form-control"></textarea>
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

                                <div class="col-md-6">
                                 <table id="table" class="table table-striped table-bordered">
                                 <thead>
                                  <tr>
                                  <th>S.No</th>
                                  <th>Date</th>
                                  <th>Mobile no</th>
                                  <th>Offer</th>
                                 
                                 </tr>
                              </thead>


                                <tbody>
                              
                                <tr>
                                <td>1</td>
                                <td>06/09/2016</td>
                                <td>9865163926</td>
                                <td>5-15% discount</td> 
                                 </tr>
                               
                                
                                </tbody>
                            </table>

                                </div>


                               
                        
                            
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

       
        <script src="<?php echo base_url();?>assets/pages/datatables.init.js"></script>

        <!-- Parsly js -->
        <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/parsleyjs/parsley.min.js"></script>

        <!-- App core js -->
        <script src="<?php echo base_url();?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.app.js"></script>

         <script type="text/javascript">


$(document).ready(function() {

    $('#table').DataTable();

    $('.date').datepicker({
     dateFormat:"dd-mm-yyyy",
     autoclose: true,
    todayHighlight: true

     });
        
      
    });

 
        
      
   

   


</script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
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