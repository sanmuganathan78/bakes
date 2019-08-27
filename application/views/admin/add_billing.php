<!DOCTYPE html>
<html>
    
<!-- Mirrored from coderthemes.com/ubold_2.1/menu_2/tables-jsgrid.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Sep 2016 08:57:41 GMT -->
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
         <title><?php echo $title;?> | BIlling</title>


        <!-- JsGrid css -->
        <link href="<?php echo base_url();?>assets/plugins/jsgrid/css/jsgrid.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/plugins/jsgrid/css/jsgrid-theme.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
         <link rel="stylesheet" href="<?php echo base_url();?>assets/autocomplete/jquery-ui.css">

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

                       
                       
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12" style="margin-top: -35px;">
                        <div class="card-box" style="margin-bottom: -25px;">

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
                            
                            <form  id="form_sample_1" method="post"  data-parsley-validate novalidate>

                            <input type="hidden" name="billnos" value="<?php echo $billnos;?>"  class="form-control" id="billno">
                           
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <h4 class="m-t-0 header-title"><b>Bill No&nbsp;
                                    :&nbsp; <?php echo $billnos;?></b></h4>
                                </div>

                                <div class="col-md-4">
                                 <input type="text" name="" placeholder="Customer Name"   class="form-control" id="customernames">
                                </div>

                                <div class="col-md-4">
                                   <input type="text" placeholder="Mobile No" data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-type="number" name=""    class="form-control" id="mobilenos">
                                </div>
                                        
                                        <table class="table m-0 ">

                                            <thead>
                                                <tr>
                                                    <th>Item Name</th>
                                                    <th>Qty</th>
                                                    <th>Rate</th>
                                                    <th>Amount</th>
                                                    <th>Add</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    
                                                    <td><input type="text" name="itemname"  parsley-trigger="change" required  class="form-control" id="itemname"></td>
                                                    <td><input type="text" name="qty"  parsley-trigger="change" required  class="form-control decimal" id="qty"></td>
                                                    <td><input type="text" name="rate" readonly=""  class="form-control" id="rate"></td>
                                                    <td><input type="text" name="jkl" data-parsley-minlength="2" readonly=""   class="form-control" id="amount"></td>
                                                    <td><div id="submit"><button id="submits" type="button" class="btn btn-icon  waves-effect waves-light btn-success"> <i class="fa fa-plus"></i> </button></div></td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                      
                                

                                </div>    
                                
                            
                            </form>
                            
                            <div class="clearfix"></div>
                        </div>

                    </div>
                    </div>


                  <form method="post" action="<?php echo base_url();?>admin/add_billing/addbill" target="_blank" onsubmit="setTimeout(function () { location.href = '<?php echo base_url();?>admin/add_billing'; })">
                        <input type="hidden" name="customername" placeholder="Customer Name"   class="form-control" id="customername">
                        <input type="hidden" placeholder="Mobile No" data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-type="number" name="mobileno"    class="form-control" id="mobileno">
                    <div class="row" >
                    <div class="col-md-12">
                        <div class="card-box" >
                                                  
                            <div class="col-md-12" >
                                 
                                   <div class="col-md-8">
                                     <div class="tabless" style="height: 300px; overflow-y: scroll;">
                                       <table class="table m-0">

                                            <thead>
                                                <tr>
                                                   
                                                    <th>Item Name</th>
                                                    <th>Qty</th>
                                                    <th>Rate</th>
                                                    <th>Amount</th>
                                                    <th>Cancel</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                             <input type="hidden" name="itemnames[]" class="form-control" value=""  id="">
                                              <input type="hidden" name="qtys[]" class="form-control" value=""  id="">
                                               <input type="hidden" name="rates[]" class="form-control" value=""  id="">
                                            <input type="hidden" name="amounts[]" class="form-control" value=""  id="">
                                            <tbody id="lists"></tbody>

                                            </tbody>
                                          </table>




                                     </div>
                                
                                 
                                    </div>


                                    
                            <input type="hidden" name="billno" value="<?php echo $billnos;?>"  class="form-control" id="billno">
                                      <div class="col-md-4">

                                      <div class="col-md-4 ">
                                      <label>Sub Total</label>
                                      </div>
                                      <div class="col-md-8">
                                      <input type="text" name="subtotal" readonly=""   class="form-control" id="subtotal">
                                      </div>
                                      <div class="clearfix"></div>
                                      <br>

                                       <div class="col-md-4">
                                      <label>Dis %</label>
                                      </div>
                                      <div class="col-md-8">
                                      <div class="col-md-4">
                                      <input type="text" name="discount"  class="form-control decimal" id="discount">
                                      </div>
                                       <div class="col-md-8">
                                      <input type="text" name="discountamount" readonly=""  class="form-control" id="discountamount">
                                      </div>
                                      </div>

                                       <div class="clearfix"></div>
                                      <br>

                                       <div class="col-md-4">
                                      <label>Adjustment</label>
                                      </div>
                                      <div class="col-md-8">
                                      <input type="text" name="adjustment"    class="form-control decimal" id="adjustment">
                                      </div>

                                       <div class="clearfix"></div>
                                      <br>

                                       <div class="col-md-5" style="text-align: center;">
                                      <label style="font-size: 30px; color: rgb(9, 119, 10);">Total &nbsp; :</label>
                                      </div>
                                      <div class="col-md-7">
                                      <input type="hidden" name="totalamount" readonly=""   class="form-control" id="totalamount">
                                      <span class="totalamount" style="font-size: 35px; font-weight: bold; color: rgb(9, 119, 10);">0.00</span>
                                      </div>


                                       <div class="clearfix"></div>
                                      <br>

                                       <div class="col-md-4">
                                      <label></label>
                                      </div>
                                      <div class="col-md-8">
                                        <button class="btn btn-primary btn-lg waves-effect waves-light" type="submit">
                                        Make Print
                                    </button>
                                   <!--  <button type="reset" class="btn btn-default btn-lg waves-effect waves-light m-l-5">
                                        Cancel
                                    </button> -->
                                      </div>
                                     
                                    </div>


                                    

                                </div>    
                                
                            
                         
                            
                            <div class="clearfix"></div>
                        </div>

                    </div>
                    </div>

                      </form>
            

                <!-- Footer -->
               
                <!-- End Footer -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->








        <!-- jQuery  -->
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

        <!-- Parsly js -->
        <script type="text/javascript" src="<?php echo base_url();?>assets/plugins/parsleyjs/parsley.min.js"></script>

        <!-- App core js -->
        <script src="<?php echo base_url();?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>

       <script type="text/javascript">
        $(document).ready(function(){
            $('#addbilling').attr('class','has-submenu active');

        });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){

  //     $('#submits').click(function(){
  //        var itemname = $('#itemname').val();
  //   localStorage.setItem('itemname', itemname);
  //   // return false;
  // // alert(itemname);
  // $('#customername').html(localStorage.getItem('itemname'));

  //     });

//         reload_table();

//        $("#form_sample_1").submit(function(){



//     dataString = $("#form_sample_1").serialize();

//       $.ajax({
//         type: "POST",
//         url: "<?php echo base_url();?>admin/add_billing/add_billproducts",
//         data: dataString,

//         beforeSend: function() {
//         // setting a timeout
//         $('#submit').html('<button type="submit" disabled class="btn btn-icon  waves-effect waves-light btn-success"> <i class="fa fa-spin fa-spinner"></i> </button>');

//     },

//         success: function(data){

//                    $('#submit').html('<button type="submit" class="btn btn-icon  waves-effect waves-light btn-success"> <i class="fa fa-plus"></i> </button>');
//                   reload_table();


//               $('#itemname').val('');
//               $('#qty').val('');
//               $('#rate').val('');
//               $('#amount').val('');
//               $('#itemname').focus();
//               if(data=='no')
//               {
//                 alert('Item added Failed');
//               }

//         // // $('#world').hide();
//         //  $('.results').html(data); 

//         }

//         });

//         return false;  //stop the actual form post !important!






// }); 

    });
      
    </script>
    <script type="text/javascript">
      // function reload_table()
      // {
      //   var billno=$('#billno').val();
      //   $.post('<?php echo base_url();?>admin/add_billing/view_table',{'billno':billno},function(data){
      //     $('.tabless').html(data);
      //   });
      // }

// function delete_itemdetails(id)
// {


//     if(confirm('Are you sure delete this item?'))
//     {
//         // ajax delete data to database
//         $.ajax({
//             url : "<?php echo site_url('admin/add_billing/delete_itemdetails')?>/"+id,
//             type: "POST",
//             success: function(data)
//             {
//               reload_table();
//                $('#discountamount').val('');
//                $('#discount').val('');
//                 $('#adjustment').val('');
//               var sub_tot=0;
//                         $('input[name^="amounts"]').each(function(){
//                                 sub_tot +=Number($(this).val());          
//                                 var fina=sub_tot.toFixed(2);
//                                   $('#subtotal').val(fina);         
//                                 $('#totalamount').val(fina);
//                                 $('.totalamount').html(fina);       
                                                              
//                                 });
//               //$('#form_sample_1')[0].reset();

//               if(data=='no')
//               {
//                 alert('Item added Failed');
//               }
                
//                 // reload_table();
//             },
           
//         });

//     }
// }
    </script>
    <script language="JavaScript" type="text/javascript">

function ontime() {
  now=new Date();
  hour=now.getHours();
  min=now.getMinutes();
  sec=now.getSeconds();

if (min<=9) { min="0"+min; }
if (sec<=9) { sec="0"+sec; }
if (hour>12) { hour=hour-12; add="PM"; }
else { hour=hour; add="AM"; }
if (hour==12) { add="PM"; }

$(".time").val (((hour<=9) ? "0"+hour : hour) + ":" + min + ":" + sec + " " + add);
$(".time").html (((hour<=9) ? "0"+hour : hour) + ":" + min + ":" + sec + " " + add);





setTimeout("ontime()", 1000);
}
window.onload = ontime;

</script> 
<script type="text/javascript">
  $(document).ready(function(){

//qty keyup--------------------

     $('#qty').keyup(function(){

       
     
                   var itemname=$('#itemname').val();
                   var rate=$('#rate').val();
                var qty=$('#qty').val();
                var amount=$('#amount').val();
                 var discount=$('#discount').val();

                 var a=0;
                 var b=0;
                 var c=0;
                 var d=0;
               
            
                   if(qty=='')
                  {

                    
                      $('#amount').val(0);
                     


                  }

                if(qty)
                  {

                      var a=parseFloat(rate)*parseFloat(qty);
                      var a1=a.toFixed(2);
                      $('#amount').val(a1);
                     

                  }

            $.post('<?php echo base_url();?>admin/add_billing/checkstock',{'itemname':itemname,'qty':qty},function(data){
                if(data)
                {
                  alert('Invalid Qty');
                  $('#qty').val('');
                   $('#amount').val('');
                  $('#qty').focus();
                  return false;

                }

            });      

     

       });


     //discount keyup--------------------

     $('#discount').keyup(function(){

       var discountss=$('#discount').val();

        if(discountss=='')
          {
            $('#discountamount').val('');
          }


                var rate=$('#rate').val();
                var qty=$('#qty').val();
                var amounts=$('#amounts').val();
                var discount=$('#discount').val();
                var adjustment=$('#adjustment').val();

                 var a=0;
                 var b=0;
                 var c=0;
                 var d=0;
                 var e=0;
               
              
            
                   var sub_tot=0;
                          $('input[name^="amounts"]').each(function(){
                                  sub_tot +=Number($(this).val());          
                                  var fina=sub_tot.toFixed(2);  
                                    $('#subtotal').val(fina);       
                                 $('#totalamount').val(fina);
                                $('.totalamount').html(fina);         
                                                                
                                  });   
                

                 
                          

                if(discount)
                  {

                    var sub_tot=0;
                          $('input[name^="amounts"]').each(function(){
                                  sub_tot +=Number($(this).val());          
                                  var fina=sub_tot.toFixed(2);  
                                    $('#subtotal').val(fina);       
                                 $('#totalamount').val(fina);
                                $('.totalamount').html(fina);         
                                                                
                                  });   
                    
                      var d=((parseFloat(sub_tot)*parseFloat(discount))/100);
                      var d1=d.toFixed(2);
                  $('#discountamount').val(d1);
                  var d2=parseFloat(sub_tot) - parseFloat(d);
                  var d3=d2.toFixed(2);
                             
                            $('#totalamount').val(d3);
                             $('.totalamount').html(d3);
                  
                  }
                   else
                      {
                        $('#discountamount').val('');
                                  
                      }  

                  if(adjustment)
                  {

                    
                      if(discount)
                      {
                          var e=parseFloat(d3)+parseFloat(adjustment);
                          var e1=e.toFixed(2);
                         $('#totalamount').val(e1);
                          $('.totalamount').html(e1);
                     }
                    else
                    {
                       var sub_tot=0;
                          $('input[name^="amounts"]').each(function(){
                                  sub_tot +=Number($(this).val());          
                                  var fina=sub_tot.toFixed(2);  
                                    $('#subtotal').val(fina);       
                                 $('#totalamount').val(fina);
                                $('.totalamount').html(fina);         
                                                                
                                  });   
                          var e=parseFloat(sub_tot)+parseFloat(adjustment);
                          var e1=e.toFixed(2);
                         $('#totalamount').val(e1);
                          $('.totalamount').html(e1);
                    }
                  
                  
                  }

                 

   

     

       });

       $('#adjustment').keyup(function(){

       


                var rate=$('#rate').val();
                var qty=$('#qty').val();
                var amounts=$('#amounts').val();
                var discount=$('#discount').val();
                 var adjustment=$('#adjustment').val();

                 var a=0;
                 var b=0;
                 var c=0;
                 var d=0;
                 var e=0;
               
              
            

                

                   var sub_tot=0;
                          $('input[name^="amounts"]').each(function(){
                                  sub_tot +=Number($(this).val());          
                                  var fina=sub_tot.toFixed(2);  
                                    $('#subtotal').val(fina);       
                                 $('#totalamount').val(fina);
                                $('.totalamount').html(fina);         
                                                                
                                  });   
                          

                if(discount)
                  {

                    var sub_tot=0;
                          $('input[name^="amounts"]').each(function(){
                                  sub_tot +=Number($(this).val());          
                                  var fina=sub_tot.toFixed(2);  
                                    $('#subtotal').val(fina);       
                                 $('#totalamount').val(fina);
                                $('.totalamount').html(fina);         
                                                                
                                  });   
                    
                      var d=((parseFloat(sub_tot)*parseFloat(discount))/100);
                      var d1=d.toFixed(2);
                  $('#discountamount').val(d1);
                  var d2=parseFloat(sub_tot) - parseFloat(d);
                  var d3=d2.toFixed(2);
                             
                            $('#totalamount').val(d3);
                             $('.totalamount').html(d3);
                  
                  }
                   else
                      {
                        $('#discountamount').val('');
                                  
                      } 


                   if(adjustment)
                  {

                    
                      if(discount)
                      {
                          var e=parseFloat(d3)+parseFloat(adjustment);
                          var e1=e.toFixed(2);
                         $('#totalamount').val(e1);
                          $('.totalamount').html(e1);
                     }
                    else
                    {
                       var sub_tot=0;
                          $('input[name^="amounts"]').each(function(){
                                  sub_tot +=Number($(this).val());          
                                  var fina=sub_tot.toFixed(2);  
                                    $('#subtotal').val(fina);       
                                 $('#totalamount').val(fina);
                                $('.totalamount').html(fina);         
                                                                
                                  });   
                          var e=parseFloat(sub_tot)+parseFloat(adjustment);
                          var e1=e.toFixed(2);
                         $('#totalamount').val(e1);
                         $('.totalamount').html(e1);
                    }
                  
                  
                  }
                   

                 

   

     

       });


 

//----------------------------------------     

//autocomplete ----itemname-----------------
  $( "#itemname").autocomplete({

          source: function(request, response) {
            $.ajax({ 
              url: "<?php echo base_url();?>admin/add_billing/searchitem",
              data: { itemname: $("#itemname").val()},
              dataType: "json",
              type: "POST",
              success: function(data){              
      // alert(data);
      response(data);
      }    
      });
          },
        });

  //-------------------------------------
  //itemchange & blur fuunction-----------------
   $('#itemname').change(function(){
    var itemname=$('#itemname').val();
    $.post('<?php echo base_url();?>admin/add_billing/searchrate',{'itemname':itemname},function(data){

      var obj=jQuery.parseJSON(data);
            $('#rate').val(obj.rate);
            $('#qty').focus();



    });

   });

    $('#itemname').blur(function(){
    var itemname=$('#itemname').val();
    $.post('<?php echo base_url();?>admin/add_billing/searchrate',{'itemname':itemname},function(data){

      var obj=jQuery.parseJSON(data);
            $('#rate').val(obj.rate);
              $('#qty').focus();

    });

   });
//------------------------------------------
  });


</script>
<script type="text/javascript">
$('.decimal').keyup(function(){
    var val = $(this).val();
    if(isNaN(val)){
         val = val.replace(/[^0-9\.-]/g,'');
         if(val.split('.').length>2) 
          val =val.replace(/\.+$/,"");
    }
    $(this).val(val); 
});
</script>


<script type="text/javascript">

$(document).keypress(function(e){
    if (e.which == 13){
        $("#submits").click();
    }
});

       $("#submits").click(function(){      
                         //Added a button with class of clear instead of a table row with id of clear
                  var itemname = $('#itemname').val();
                  var qty = $('#qty').val(); 

        if(itemname=='')  
        {
            alert('please Enter Item name');
            $('#itemname').focus();
            return false;
            
        } 
        else if(qty=='')
        {
           alert('please Enter Qty');
           $('#qty').focus();
            return false;
             
        }
        else
        {



                         var itemname = $('#itemname').val();
                         var qty = $('#qty').val();
                         var rate = $('#rate').val();
                         var amount = $('#amount').val();

      $('#lists').append('<tr><td>'+ itemname +'</td><td>'+ qty +'</td><td>'+ rate +'</td><td>'+ amount +'<input type="hidden" name="itemnames[]" class="form-control" value="'+ itemname +'"  id="itemname"><input type="hidden" name="qtys[]" class="form-control" value="'+ qty +'"  id="qty"><input type="hidden" name="rates[]" class="form-control" value="'+ rate +'"  id="rate"><input type="hidden" name="amounts[]" class="form-control" value="'+ amount +'"  id="amount"></td><td><a href="javascript:void()" title="Delete"  class="btn btn-icon  waves-effect waves-light btn-danger clear"> <i class="fa fa-remove"></i> </a></td></tr>'); 

                                                
               var lists = $('#lists').html(); 
                localStorage.setItem('lists', lists);
                $('#itemname').focus();

                 $('#itemname').val('');
                 $('#qty').val('');
                 $('#rate').val('');
                 $('#amount').val('');

                      $("#discountamount").val("");
                        $("#discount").val("");
                         $("#adjustment").val("");
                         
                             var sub_tot=0;
                          $('input[name^="amount"]').each(function(){
                                  sub_tot +=Number($(this).val());          
                                  var fina=sub_tot.toFixed(2);  
                                    $('#subtotal').val(fina);       
                                 $('#totalamount').val(fina);
                                $('.totalamount').html(fina);         
                                                                
                                  });  

               
                        $('.clear').click(function(){
   
                    $(this).parents("tr").remove();
                     var amounts=$('.amounts').val('');
            
                           $("#discountamount").val("");
                           $("#discount").val("");
                           $("#adjustment").val("");
                             

                  
                                var sub_tot=0;
                            $('input[name^="amounts"]').each(function(){
                                    sub_tot +=Number($(this).val()); 
                                    //alert(sub_tot);         
                                    var fina=sub_tot.toFixed(2);  
                                      $('#subtotal').val(fina);       
                                   $('#totalamount').val(fina);
                                  $('.totalamount').html(fina);         
                                                                  
                                    });
                         

            });

        }                
            });


          $('#customernames').keyup(function(){
            var customernames=$('#customernames').val();
            $('#customername').val(customernames);

          });
           $('#mobilenos').keyup(function(){
            var mobilenos=$('#mobilenos').val();
            $('#mobileno').val(mobilenos);

          });
</script>
<script src="<?php echo base_url();?>assets/autocomplete/jquery-ui.js"></script>
    </body>

<!-- Mirrored from coderthemes.com/ubold_2.1/menu_2/tables-jsgrid.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Sep 2016 08:57:43 GMT -->
</html>