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
        <title><?php echo $title;?> | Chats Reports</title>

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

                        <h4 class="page-title">Chats Reports</h4>
                      
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">


               <form id="form-filter" class="form-horizontal">
                <table >
                
                <tr>
                  <td>
                  <div class="col-sm-12">
                  <input type="text" name="fromdate" class="form-control date" id="fromdate"  Placeholder="From Date">
                  </div>
                  </td>

                  <td>
                    <div class="col-sm-12">
                  <input type="text" name="todate" class="form-control date" id="todate"  Placeholder="To Date">
                  </div>
                  </td>
                 
               <?php 
                 

                    $quo=$this->db->get('addchats')->result_array();
                  ?>
                 

             
                  <td>
                    <div class="col-sm-12">
                 <select class="form-control" name="billno" id="billno" >
                          <option value="">Select Bill No</option>
                          <?php foreach ($quo as $as)
                           {
                          ?>
                          <option value="<?php echo $as["billno"];?>"><?php echo $as["billno"];?></option>
                          <?php
                          }
                          ?>
                          
                         
                          
                  </select>
                  </div>
                  </td>

                    
                 
                     <td>
                    
                            <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                      
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
                                  <th>Date</th>
                                  <th>Bill No</th>
                                  <th>Customer Name</th>
                                  <th>No of Items</th>
                                  <th>Total Amount</th>
                                  <th>Options</th>
                                 </tr>
                              </thead>


                                <tbody>
                                
                                
                                </tbody>
                            </table>

        <div align="center">
         <button id="print" class="btn btn-primary" value="Print">Print</button>

       <button id="download" class="btn btn-primary" value="Print">Download</button>
        </div>

                        </div>
                    </div>
                </div>

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


         <div id="view_billing" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Details</h4>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <div class="viewdetails"></div>
                                          
                                        </div>
                                       
                                    </div>
                                </div>
                            </div><!-- /.modal -->



        



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
            $('#chatsreports').attr('class','has-submenu active');

        });
    </script>

    <script type="text/javascript">


$(document).ready(function() {

    //$('#table').DataTable();

    $('.date').datepicker({
     dateFormat:"dd-mm-yyyy",
     autoclose: true,
    todayHighlight: true

     });
        
      
    });


</script>


<script type="text/javascript">

var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        'bnDestroy' :true,
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/add_chats/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {
                data.fromdate = $('#fromdate').val();
                data.todate = $('#todate').val();
                data.billno = $('#billno').val();
               
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload(null,false);  //just reload table
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload(null,false);  //just reload table
    });



     $('#print').click(function(){
        var fromdate = $('#fromdate').val();
        var todate = $('#todate').val();
        var billno = $('#billno').val();

        $.post('<?php echo base_url();?>admin/add_chats/billing_reportprints',{'fromdate':fromdate,'todate':todate,'billno':billno},function(data){

            window.open('<?php echo base_url();?>admin/add_chats/chats_reportprint', '_blank');

        });
    
    });

     $('#download').click(function(){
        var fromdate = $('#fromdate').val();
        var todate = $('#todate').val();
        var billno = $('#billno').val();

        $.post('<?php echo base_url();?>admin/add_chats/billing_reportdownload',{'fromdate':fromdate,'todate':todate,'billno':billno},function(data){

            window.open('<?php echo base_url();?>admin/add_chats/chats_reportprint');

        });
    
    });

});

function edit_person(id)
{

    //alert(id);

     $.post('<?php echo base_url();?>admin/add_chats/viewbilling',{'id':id},function(data){

        $('.viewdetails').html(data);

         $('#view_billing').modal('show');

     });
   

}


</script>







    </body>

<!-- Mirrored from coderthemes.com/ubold_2.1/menu_2/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Sep 2016 08:57:31 GMT -->
</html>