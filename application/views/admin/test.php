     <?php if($_POST)  { ?>
        <form name="from" method="post" target="_blank" action="<?php echo base_url('admin/add_billing/billing_reportprint');?>">                     
          <input type="hidden" name="fromdate" class="form-control "  value="<?php if($this->input->post('fromdate')){ echo $this->input->post('fromdate');}?>">      
          <input type="hidden" name="todate" class="form-control date"  value="<?php if($this->input->post('todate')){ echo $this->input->post('todate');}?>">
          <input type="hidden" name="billno" class="form-control date"  value="<?php if($this->input->post('billno')){ echo $this->input->post('billno');}?>">




          <div align="center">
           <input type="submit" name="submit" class="btn btn-primary" value="Print">

           <input type="submit" name="submit" class="btn btn-primary" value="Download">
         </div>
       </form>
       <?php   } ?> 