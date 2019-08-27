
<script type="text/javascript">
var save_method; //for save method string
var table;

$(document).ready(function() {

    get_table_datas();
     $.ajax({
            type: "GET",
            url: "<?php echo base_url();?>admin/add_billing/get_billnos",
            data:{'get_all_billnos':1}, 
            beforeSend :function(){
                $("#billno option:gt(0)").remove(); 
                $('#billno').find("option:eq(0)").html("Please wait..");              
            },                         
            success: function (data) {          
                $('#billno').find("option:eq(0)").html("Select Bill No");
                    
                var obj=jQuery.parseJSON(data);
                $(obj).each(function(){
                    var option = $('<option />');
                    option.attr('value', this.value).text(this.label);           
                    $('#billno').append(option);                    
                });                  
                /*ends */

            }
        });

    $('.date').datepicker({
     'format':'dd-mm-yyyy',
    autoclose: true,
    todayHighlight: true

    });



    $('#search').click(function(){
    get_table_datas();
    });

    $('#reset').click(function(){
        $('#from_date').val('');
        $('#to_date').val('');
        $('#billno').val('');
    get_table_datas1();
    });



    $('#print').click(function(){
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        var billno = $('#billno').val();

        $.post('<?php echo base_url();?>admin/add_billing/billing_reportprints',{'from_date':from_date,'to_date':to_date,'billno':billno},function(data){

            window.open('<?php echo base_url();?>admin/add_billing/billing_reportprint', '_blank');

        });
    
    });

     $('#download').click(function(){
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        var billno = $('#billno').val();

        $.post('<?php echo base_url();?>admin/add_billing/billing_reportdownload',{'from_date':from_date,'to_date':to_date,'billno':billno},function(data){

            window.open('<?php echo base_url();?>admin/add_billing/billing_reportprint', '_blank');

        });
    
    });



  });


 







function get_table_datas()
{
  
var from_date = $('#from_date').val();
var to_date = $('#to_date').val();
var billno = $('#billno').val();


    //datatables
    table = $('#table').DataTable({ 
        "processing": true, //Feature control the processing indicator.
          "bDestroy": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url()?>admin/add_billing/ajax_list/@"+from_date+'/@'+to_date+'/@'+billno,
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
}

function get_table_datas1()
{
  
var from_date = '';
var to_date = '';
var billno = '';


    //datatables
    table = $('#table').DataTable({ 
        "processing": true, //Feature control the processing indicator.
          "bDestroy": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo site_url()?>admin/add_billing/ajax_list/@"+from_date+'/@'+to_date+'/@'+billno,
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
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
  }

</script>
</body>
</html>