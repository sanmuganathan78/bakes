<?php

        $profilesgetdata=$this->db->where('status',1)->get('login')->result_array();
        foreach ($profilesgetdata as $key => $profilesgetdatas) {
            $title=$profilesgetdatas['title'];
            $logo=$profilesgetdatas['logo'];
             $address=$profilesgetdatas['address'];
             $mobileno=$profilesgetdatas['mobileno'];
        }

    ?>
<table width="724" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;">
  <tr>
    <td height="117" align="center" style="border-bottom:1px solid black;"><p><img  src="<?php echo base_url();?>logouploads/<?php echo $logo;?>" alt="DDD"></p>
      <p style="margin-top: -22px; font-size: 12px;"><strong><?php echo $address;?></strong></p>
       <p style="margin-top: -10px; font-size: 12px;"><strong>Mobile :(+91)-<?php echo $mobileno;?> </strong></p></td>
  </tr>

</table>

<table width="724" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;">
  <tr style="font-size: 14px;">
    <td height="35" width="222" align="left" style="border-bottom:1px solid black;"><strong>Billing   Report</strong></td>
    <td height="35" width="424" align="center" style="border-bottom:1px solid black;"><strong><?php if(@$fromdate){?>From Date :<?php echo $fromdate;?><?php } ?><?php if(@$todate){?>To Date :<?php echo $todate;?><?php } ?></strong></td>
    <td height="35" width="64" align="right" style="border-bottom:1px solid black;"><strong></strong></td>
  </tr>
</table>

<table width="724" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
  <tr>
    <td width="43" height="29" align="left" style="border-bottom:1px solid black;"><strong>S.No</strong></td>
    <td width="116" align="left" style="border-bottom:1px solid black;"><strong>Date</strong></td>
    <td width="97" align="left" style="border-bottom:1px solid black;"><strong>Bill No</strong></td>
    <td width="186" align="left" style="border-bottom:1px solid black;"><strong>Customer Name</strong></td>
     <td width="144" align="left" style="border-bottom:1px solid black;"><strong>No of Items</strong></td>
     <td width="112" align="right" style="border-bottom:1px solid black;"><strong>Total Amount</strong></td>
  </tr>
  <?php 
    $i=1;
     $totalamount[]=array();
    foreach ($billingreports as $row) {
      $noofitemss=explode('||',$row['itemname']);
      $noofitems=count($noofitemss);
      $totalamount[]=$row['totalamount'];
      ?>  

  <tr>

    <td height="22" align="left" style="border-bottom:1px dotted black;"><strong><?php echo $i++;?></strong></td>
    <td align="left" style="border-bottom:1px dotted black;"><strong><?php echo date('d/m/Y',strtotime(str_replace('-','/',$row['date'])));?></strong></td>
    <td align="left" style="border-bottom:1px dotted black;"><strong><?php echo $row['billno'];?></strong></td>
    <td align="left" style="border-bottom:1px dotted black;"><strong><?php echo $row['customername'];?></strong></td>
    <td align="left" style="border-bottom:1px dotted black;"><strong><?php echo $noofitems;?></strong></td>
    <td align="right" style="border-bottom:1px dotted black;"><strong><?php echo $row['totalamount'];?></strong></td>
  </tr>
  <?php }?>
  <tfoot>
   <tr>
    <td width="43" height="29" align="left" style="border-bottom:1px solid black;"><strong></strong></td>
    <td width="116" align="left" style="border-bottom:1px solid black;"><strong></strong></td>
    <td width="97" align="left" style="border-bottom:1px solid black;"><strong></strong></td>
    <td width="186" align="left" style="border-bottom:1px solid black;"><strong></strong></td>
     <td width="144" align="left" style="border-bottom:1px solid black;"><strong>Total Amount</strong></td>
     <td width="112" align="right" style="border-bottom:1px solid black;"><strong><?php echo number_format(array_sum($totalamount),2);?></strong></td>
  </tr>
  </tfoot>
 
</table>

  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    window.print();
  });
</script>