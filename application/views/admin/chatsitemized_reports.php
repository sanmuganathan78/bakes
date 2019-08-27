<!DOCTYPE html>
<html>
    
<!-- Mirrored from coderthemes.com/ubold_2.1/menu_2/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Sep 2016 08:57:16 GMT -->
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
        <title><?php echo $title;?> |Chats Itemized Reports</title>

        <!-- DataTables -->
        <link href="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();?>assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
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
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                           
                        </div>

                        <h4 class="page-title">Chats Itemized Reports</h4>
                      
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">


                                                <form name="from" method="post" action="<?php echo base_url('admin/reports/chatsitemized_report');?>">
                <table >
                
                <tr>
                  <td>
                  <div class="col-sm-12">
                  <input type="text" name="fromdate" value="<?php if($this->input->post('fromdate')){ echo $this->input->post('fromdate');}?>" class="form-control date" id=""  Placeholder="From Date">
                  </div>
                  </td>

                  <td>
                    <div class="col-sm-12">
                  <input type="text" name="todate" value="<?php if($this->input->post('todate')){ echo $this->input->post('todate');}?>" class="form-control date" id=""  Placeholder="To Date">
                  </div>
                  </td>

                   <?php
                        $item=$this->db->where('status',1)->get('chatsproduct')->result_array();?>

                       <td>
                    <div class="col-sm-12">
                <select name="itemname" id="itemname" class="form-control">
                                    <option value="">Select Item</option>
                                    <?php
                                    foreach ($item as $ue) {
                                      ?>
                                      <option value="<?php echo $ue['productname'];?>" <?php if($this->input->post('itemname')==$ue['productname']){ echo 'selected';}?>><?php echo $ue['productname'];?></option>
                                    <?php  
                                    }
                                    ?>
                                    
                                </select>
                  </div>
                  </td>
                 
                 
            
                 
                     <td>
                    <div class="col-sm-3">
                  <input type="submit" name="submit" class="btn btn-primary" value="Search">
                  </div>
                  </td>
                </tr>
                </table>
                </form>
                <br>
                        
                              
                        <div class="clearfix"></div>
                            <table id="table" class="table table-striped table-bordered">
                                 <thead>
                                  <tr>
                                  <th>S.No</th>
                                  <th>Item Name</th>
                                  <th>Qty</th>
                                  
                                 </tr>
                              </thead>


                                <tbody>
                                <?php 
                                $i=1;
                                 $qtys[]=array();
                                foreach ($itemizedreports as $row) {
                                    $qtys[]=$row['qty'];
                                 ?>  
                                <tr>
                                  <td><?php echo $i++;?></td>
                                  <td><?php echo $row['itemname'];?></td>
                                  <td><?php echo $row['qty'];?></td>
                                  
                                 </tr>
                                 <?php }?>

                                  <tfoot>
                                  <tr>
                                  <th></th>
                                 
                                  <th>Total</th>
                                  <th><?php echo number_format(array_sum($qtys),2);?></th>
                                  
                                 </tr>
                              </tfoot>
                                
                                </tbody>
                            </table>
                            <?php if($_POST)  { ?>
                     <form name="from" method="post" target="_blank" action="<?php echo base_url('admin/reports/chatsitemized_reportprint');?>">                     
                    <input type="hidden" name="fromdate" class="form-control "  value="<?php if($this->input->post('fromdate')){ echo $this->input->post('fromdate');}?>">      
                    <input type="hidden" name="todate" class="form-control date"  value="<?php if($this->input->post('todate')){ echo $this->input->post('todate');}?>">
                     <input type="hidden" name="itemname" class="form-control date"  value="<?php if($this->input->post('itemname')){ echo $this->input->post('itemname');}?>">
                   
                    
                     


                    <div align="center">
                     <input type="submit" name="submit" class="btn btn-primary" value="Print">

                    <input type="submit" name="submit" class="btn btn-primary" value="Download">
                    </div>
                    </form>
                                    <?php   } ?> 
                        </div>
                    </div>
                </div>


               


              


            


            


               


                


              
                <!-- end row -->


                <!-- Footer -->
           
                <!-- End Footer -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        


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

        <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.colVis.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

        <script src="<?php echo base_url();?>assets/pages/datatables.init.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

        <!-- App core js -->
        <script src="<?php echo base_url();?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.app.js"></script>

       <script type="text/javascript">
        $(document).ready(function(){
            $('#rep_orts').attr('class','has-submenu active');

        });
    </script>

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




    </body>

<!-- Mirrored from coderthemes.com/ubold_2.1/menu_2/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Sep 2016 08:57:31 GMT -->
</html>