<?php

        $profilesgetdata=$this->db->where('status',1)->get('login')->result_array();
        foreach ($profilesgetdata as $key => $profilesgetdatas) {
            $title=$profilesgetdatas['title'];
            $logo=$profilesgetdatas['logo'];
             $address=$profilesgetdatas['address'];
             $mobileno=$profilesgetdatas['mobileno'];
        }

    ?>
<table width="600" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;">
  <tr>
    <td height="117" align="center" style="border-bottom:1px solid black;"><p><img  src="<?php echo base_url();?>logouploads/<?php echo $logo;?>" alt="DDD"></p>
      <p style="margin-top: -22px; font-size: 12px;"><strong><?php echo $address;?></strong></p>
    <p style="margin-top: -10px; font-size: 12px;"><strong>Mobile :(+91)-<?php echo $mobileno;?> </strong></p></td>
  </tr>

</table>

<table width="600" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;">
  <tr style="font-size: 14px;">
    <td height="35" width="222" align="left" style="border-bottom:1px solid black;"><strong>Chats Itemized   Report</strong></td>
    <td height="35" width="424" align="center" style="border-bottom:1px solid black;"><strong><?php if(@$fromdate){?>From Date :<?php echo $fromdate;?><?php } ?><?php if(@$todate){?>To Date :<?php echo $todate;?><?php } ?></strong></td>
    <td height="35" width="64" align="right" style="border-bottom:1px solid black;"><strong></strong></td>
  </tr>
</table>

<table width="600" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
  <tr>
    <td width="57" height="29" align="left" style="border-bottom:1px solid black;"><strong>S.No</strong></td>
   
    <td width="287" align="left" style="border-bottom:1px solid black;"><strong>Item Name</strong></td>
    <td width="86" align="center" style="border-bottom:1px solid black;"><strong>Qty</strong></td>
  </tr>
  <?php 
    $i=1;
    $qtys[]=array();
                                foreach ($itemizedreports as $row) {
                                    $qtys[]=$row['qty'];
    
     ?>  

  <tr>

    <td height="22" align="left" style="border-bottom:1px dotted black;"><strong><?php echo $i++;?></strong></td>
   
    <td align="left" style="border-bottom:1px dotted black;"><strong><?php echo $row['itemname'];?></strong></td>
    <td align="center" style="border-bottom:1px dotted black;"><strong><?php echo $row['qty'];?></strong></td>
  </tr>
  <?php }?>
     <tfoot>
                                  <tr>
                                  
                                  <th></th>
                                  <th align="right">Total</th>
                                  <th align="center"><?php echo number_format(array_sum($qtys),2);?></th>
                                  
                                 </tr>
                              </tfoot>

 
</table>

  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    window.print();
  });
</script>