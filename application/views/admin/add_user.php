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
        <title><?php echo $title;?> | User List</title>

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

                        <h4 class="page-title">User List</h4>
                      
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                              
                             <div class="col-sm-6">
                                        <div class="m-b-30">
                                            <button  id="addToTable" onclick="add_person()" class="btn btn-default waves-effect waves-light">Add User <i class="fa fa-plus"></i></button>

                                            <button type="button" onclick="reload_table()" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh</button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                            <table id="table" class="table table-striped table-bordered">
                                 <thead>
                                  <tr>
                                  <th>S.No</th>
                                  <th>Id</th>
                                  <th>Name</th>
                                  <th>Mobile No</th>
                                  <th>User Name</th>
                                  <th>Password</th>
                                   <th>Edit</th>
                                  <th>Delete</th>
                                 </tr>
                              </thead>


                                <tbody>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


               


              


            


            


               


                


              
                <!-- end row -->


                <!-- Footer -->
           
                <!-- End Footer -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        <div class="modal fade" id="modal_form" role="dialog">
                                        <div class="modal-dialog"> 
                                            <div class="modal-content"> 
                                                <div class="modal-header"> 
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                                    <h4 class="modal-title">Add User</h4> 
                                                </div> 
                                               <form action="#"  id="form" method="post"> 
                                                <input type="hidden" value="" name="id"/> 
                                                <div class="modal-body"> 
                                                      <div class="form-group">
                                                      <label for="userName">User Id*</label>
                                                      <input type="text" name="userid"   class="form-control" readonly id="userid">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="emailAddress">Name*</label>
                                                      <input type="text" name="name"  placeholder="Enter Name" class="form-control" id="name">
                                                      <span class="help-block"></span>
                                                    </div>

                                                     <div class="form-group">
                                                      <label for="emailAddress">Address*</label>
                                                      <textarea name="address"  placeholder="Enter Address" class="form-control" id="address" cols="5"></textarea> 
                                                      <span class="help-block"></span>
                                                    </div>

                                                     <div class="form-group">
                                                      <label for="emailAddress">Mobile No*</label>
                                                      <input type="text" name="mobileno"  placeholder="Enter Mobile No" class="form-control" id="mobileno">
                                                      <span class="help-block"></span>
                                                    </div>

                                                     <div class="form-group">
                                                      <label for="emailAddress">Email*</label>
                                                      <input type="email" name="email"  placeholder="Enter Email" class="form-control" id="email">
                                                      <span class="help-block"></span>
                                                    </div>

                                                     <div class="form-group">
                                                       <div class="col-md-6">
                                                      <label for="emailAddress">Profile Image*</label>
                                                      <input type="file" name="profileimage"  placeholder="Enter Email" class="form-control" id="profileimage">
                                                      <span class="help-block"></span>
                                                      </div>
                                                     <div class="col-md-6">
                                                    <span class='uploadimages'></span>
                                                    </div>

                                                    </div>
                                                    <div class="clearfix"></div>

                                                     <div class="form-group">
                                                      <label for="emailAddress">User Name*</label>
                                                      <input type="text" name="username" onblur="checkuserid()"  placeholder="Enter User Name" class="form-control" id="username">
                                                      <span class="help-block"></span>
                                                      <div class="valid"></div>
                                                    </div>

                                                     <div class="form-group">
                                                      <label for="emailAddress">Password*</label>
                                                      <input type="password" name="password"  placeholder="Enter Password" class="form-control" id="password">
                                                      <span class="help-block"></span>

                                                    </div>
                                                    
                                                </div> 
                                                <div class="modal-footer"> 
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                                                    <button type="button" id="btnSave" class="btn btn-info waves-effect waves-light">Submit</button> 
                                                </div> 
                                                </form>
                                            </div> 
                                        </div>
                                    </div><!-- /.modal -->


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

        <!-- App core js -->
        <script src="<?php echo base_url();?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.app.js"></script>

       <script type="text/javascript">
        $(document).ready(function(){
            $('#adduser').attr('class','has-submenu active');

        });
    </script>

    <script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/add_user/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

   

    //datepicker
    // $('.datepicker').datepicker({
    //     autoclose: true,
    //     format: "yyyy-mm-dd",
    //     todayHighlight: true,
    //     orientation: "top auto",
    //     todayBtn: true,
    //     todayHighlight: true,  
    // });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});



function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.modal-body').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add User'); // Set Title to Bootstrap modal title
      $('.uploadimages').hide();
      $('.uploadss').hide();

    $.post('<?php echo base_url();?>admin/add_user/adduserid',function(data){

        $('#userid').val(data);

    });


   
  
     
}

function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.modal-body').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


   

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('admin/add_user/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
             $('.uploadss').show();
            $('.uploadimages').show();

            $('[name="id"]').val(data.id);
            $('[name="userid"]').val(data.userid);
            $('[name="name"]').val(data.name);
            $('[name="address"]').val(data.address);
            $('[name="mobileno"]').val(data.mobileno);
            $('[name="email"]').val(data.email);
            $('[name="username"]').val(data.username);
            $('[name="password"]').val(data.password);
            //$('[name="profileimage"]').val(data.profileimage);
             $('.uploadimages').html(" <a href='#'' class='thumbnail' data-toggle='modal' data-target='#lightbox'> <img class='img-responsive img-circle' style='width: 75px; height: 75px;' src='<?php echo base_url();?>uploads/"+data.profileimage+"'></a>");
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title


             

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}



function delete_person(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('admin/add_user/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}



function checkuserid()
{
    var username=$('#username').val();

    //alert(category);

     $.post('<?php echo base_url();?>admin/add_user/checkusername',{'username':username},function (data){

        //alert(data);

        if(data)
        {
            $('.valid').html('<div style="color:red;"><i class="fa fa-times-circle-o"></i> Already exists</div>');
            $('#username').val('');
        }
        else
        {
            $('.valid').html('<div style="color:green;"><i class="fa fa-check-circle-o"></i> Ok</div>');
        }

    });
}

</script>

<script type="text/javascript">
    $(document).ready(function(){
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

              $("#btnSave").click(function() {


 $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('admin/add_user/ajax_add')?>";
    } else {
        url = "<?php echo site_url('admin/add_user/ajax_update')?>";
    }

            //alert('Done');
        // $('.img_pre').attr('src','<?php echo base_url(); ?>uploads/ProgressBar.gif');
        var formData = new FormData($('#form')[0]);
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
             dataType: "JSON",
            //async: false,

          
            success: function(data) {

                //alert(data);
                
                if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 





             },
         error: function(data){

           
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

            },
            cache: false,
            contentType: false,
            processData: false
        });

        return false;
    });


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

<!-- Mirrored from coderthemes.com/ubold_2.1/menu_2/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Sep 2016 08:57:31 GMT -->
</html>