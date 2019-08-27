<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_billing extends CI_Controller {


	public function __construct()
	{

		parent::__construct();
		if($this->session->userdata('is_logged_in')=='')
		{
			 $this->session->set_flashdata('msg','Login To Continue');
			redirect('login');
		}
		else
		{
			if($this->session->userdata['usertype']=='Admin')
			{
				
			}
			else
			{
				$this->session->set_flashdata('msg','Login To Continue');
			     redirect('login/logout');
			}
		}

		
		$this->load->model('admin/billingmodel');
    $this->load->model('admin/billingmodel','person');
        date_default_timezone_set('Asia/Kolkata');
		

	}

	
	public function index()
	{

            $query_update1 =mysql_query("SELECT * FROM addbilling ORDER BY id DESC LIMIT 1");

        while($row = mysql_fetch_array($query_update1))
  
            {
                $billno=$row['billno'];
                

           }
        

    @$bond_no = $billno;
        if(is_null($bond_no)){
          $new_bond_noo = 'BN-00001'; 
        } else {
          $old_bond_noo = str_split($bond_no,1);
          @$va = (string)($old_bond_noo[3].$old_bond_noo[4].$old_bond_noo[5].$old_bond_noo[6].$old_bond_noo[7])+1;  
          $bond_length = strlen($va);
          if($bond_length == 1){
            $new_bond_noo = 'BN-0000'.$va;  
          } 
          else if($bond_length == 2)
          {  
            $new_bond_noo = 'BN-000'.$va; 
          }
          else if($bond_length == 3)
          {  
            $new_bond_noo = 'BN-00'.$va; 
          }
           else if($bond_length == 4)
          {  
            $new_bond_noo = 'BN-0'.$va; 
          }
           else if($bond_length == 5)
          {  
            $new_bond_noo = 'BN-'.$va; 
          }
        }

        $data['billnos']=$new_bond_noo;
      
        

			$this->load->view('admin/add_billing',$data);
			

	}


        public function searchitem()
  {

     $productname=$this->input->post('itemname');

    $result=$this->db->where('status',1)->like('productname',$productname)->get('addproduct')->result();

    

            $name       =  array();
            foreach ($result as $d) {
            $json_array             = array();
            $json_array['value']    = $d->productname;
            $json_array['label']    = $d->productname;
            $name[]             = $json_array;
            }
            echo json_encode($name);
                    

   }



    public function searchrate()
  {

     $productname=$this->input->post('itemname');

    $data=$this->db->where('status',1)->where('productname',$productname)->get('addproduct')->result_array();

    

            if($data)
        {
        
                foreach ($data as $e) 
                {
                    
                    
                    $data['rate']=number_format($e['rate'],2,'.','');
                   
                    

                }

                
           
        }

        else
        {
            
            $data['rate']='';
           
        }

        

       echo $output=json_encode($data);
                    

   }

   public function checkstock()
   {
    $itemname=$this->input->post('itemname');
    $qty=$this->input->post('qty');

    $getdata=$this->db->where('item',$itemname)->get('addstock')->result_array();
        foreach ($getdata as $row) 
        {
           $qtys=$row['balance'];
        }
        if($qty > $qtys)
        {
           $html="high";
        }
        else
        {
            $html="";
        }
        echo $html;

   }







	

    public function addbill()
    {
        $query_update1 =mysql_query("SELECT * FROM addbilling ORDER BY id DESC LIMIT 1");

        while($row = mysql_fetch_array($query_update1))
  
            {
                $billno=$row['billno'];
                

           }
        

    @$bond_no = $billno;
        if(is_null($bond_no)){
          $new_bond_noo = 'BN-00001'; 
        } else {
          $old_bond_noo = str_split($bond_no,1);
          @$va = (string)($old_bond_noo[3].$old_bond_noo[4].$old_bond_noo[5].$old_bond_noo[6].$old_bond_noo[7])+1;  
          $bond_length = strlen($va);
          if($bond_length == 1){
            $new_bond_noo = 'BN-0000'.$va;  
          } 
          else if($bond_length == 2)
          {  
            $new_bond_noo = 'BN-000'.$va; 
          }
          else if($bond_length == 3)
          {  
            $new_bond_noo = 'BN-00'.$va; 
          }
           else if($bond_length == 4)
          {  
            $new_bond_noo = 'BN-0'.$va; 
          }
           else if($bond_length == 5)
          {  
            $new_bond_noo = 'BN-'.$va; 
          }
        }

        $billnos=$new_bond_noo;


         $customername=$this->input->post('customername');
          $mobileno=$this->input->post('mobileno');
        $subtotal=$this->input->post('subtotal');
        $discount=$this->input->post('discount');
        $discountamount=$this->input->post('discountamount');
        $adjustment=$this->input->post('adjustment');
        $totalamount=$this->input->post('totalamount');

        $itemname=implode('||',array_filter($_POST['itemnames']));
        $qty=implode('||',array_filter($_POST['qtys']));
        $rate=implode('||',array_filter($_POST['rates']));
        $amount=implode('||',array_filter($_POST['amounts']));

                  

       
        if($itemname)
        {   
                    
               
                $data=array('date'=>date('Y-m-d'),
                            'time'=>date('g:i:s: A'),
                            'usertype'=>'Admin',
                            'billno'=>$billnos,
                            'customername'=>$customername,
                            'mobileno'=>$mobileno,
                            'itemname'=>$itemname,
                            'qty'=>$qty,
                            'rate'=>$rate,
                            'amount'=>$amount,
                            'subtotal'=>$subtotal,
                            'discount'=>$discount,
                            'discountamount'=>$discountamount,
                            'adjustment'=>$adjustment,
                            'totalamount'=>$totalamount,
                            'status'=>1);
                $result=$this->billingmodel->billadd($data);
                if($result==true)
                {

                     $itemnames=explode('||',$itemname);
                    $qtys=explode('||',$qty);
                    $count=count($itemnames);

                for($i = 0; $i< $count ; $i++)
                {
                    //stock less------------
                        $this->db->where('item',$itemnames[$i]);
                        $wq=$this->db->get('addstock')->result(); //get quantity 
                        
                        foreach($wq as $q)
                            
                        $balance= $q->balance - $qtys[$i];
                        //echo $balance;exit;
                        //echo $balance; 

                        
                        $this->db->where('item',$itemnames[$i]);
                        $this->db->update('addstock',array('balance'=>$balance));
                        $str = $this->db->last_query();

                  }      
                    //itemised stock statment-------------------------- 

                   
                    $counts=count($itemnames);
                    $itemnameas=$itemnames;
                    $qtyas=$qtys;
                    
                for($j = 0; $j< $counts ; $j++)
                {

                    $dataas=array('date'=>date('Y-m-d'),
                    'usertype'=>'Admin',
                    'billno'=>$billnos,
                    'itemname'=>$itemnameas[$j],
                    'qty'=>$qtyas[$j],
                    'status'=>1
                    );

                    // echo "<pre>";
                    // print_r($dataas);
                
                $this->db->insert('itemizedstock',$dataas);
                $strs = $this->db->last_query();

                }





                    $this->session->set_flashdata('msg','Bill added Successfully');
                    redirect('admin/add_billing/print_bill');

                }
                else
                {
                    $this->session->set_flashdata('msg1','Bill added Failed');
                    redirect('admin/add_billing');
                }
              

        }
        else
        {
                  $this->session->set_flashdata('msg1','Please Add Item');
                    redirect('admin/add_billing');
        }
       


    }

    public function print_bill()
    {
        $data['printsdata']=$this->db->order_by('id','DESC')->limit('1')->get('addbilling')->result_array();
       $this->load->view('admin/printbill',$data);
    }


    public function billing_reports()
    {
        $data['billingreports']=$this->db->where('status',1)->get('addbilling')->result_array();
        $this->load->view('admin/billing_reports',$data);
    }


     public function billing_report()
    {
            $data['billingreports']=$this->billingmodel->search_billing();
            
            $this->load->view('admin/billing_reports',$data);
    }

     public function billing_reportprints()
              { 

                $fromdate=$this->input->post('fromdate');
                $todate=$this->input->post('todate');
                $billno=$this->input->post('billno');

               $data=array(
                        'bakes_fromdate' => $fromdate,
                        'bakes_todate' => $todate,
                        'bakes_billno' => $billno,
                        'bakes_bill_format' =>'Bill_Print',
                       );
               $this->session->set_userdata($data);

              }

                public function billing_reportdownload()
              { 

                $fromdate=$this->input->post('fromdate');
                $todate=$this->input->post('todate');
                $billno=$this->input->post('billno');

               $data=array(
                        'bakes_fromdate' => $fromdate,
                        'bakes_todate' => $todate,
                        'bakes_billno' => $billno,
                        'bakes_bill_format' =>'Bill_Download',
                       );
               $this->session->set_userdata($data);

              }

   

    public function billing_reportprint()
    {   
        $bill_format=$this->session->userdata('bakes_bill_format');                
                
                if($bill_format=='Bill_Print')
                {
                  $data['billingreports']=$this->billingmodel->search_billing();
                  $data['fromdate']=$this->session->userdata('bakes_fromdate');
                  $data['todate']=$this->session->userdata('bakes_todate');

                  $this->load->view('admin/billing_reportprint',$data);
                  
                 }
                
                elseif($bill_format=='Bill_Download')
                {
                  $this->load->helper('download');
                  $this->load->library('mpdf');
                  $billingreports=$this->billingmodel->search_billing();
                  $fromdate=$this->session->userdata('bakes_fromdate');
                  $todate=$this->session->userdata('bakes_todate');

            $mpdf = new mPDF('L',  // mode - default ''
                            'A4',    // format - A4, for example, default ''
                            0,     // font size - default 0
                            '',    // default font family
                            10,    // margin_left
                            10,    // margin right
                            16,     // margin top
                            16,    // margin bottom
                            9,     // margin header
                            9,     // margin footer
                            'L'); 

             $profilesgetdata=$this->db->where('status',1)->get('login')->result_array();
        foreach ($profilesgetdata as $key => $profilesgetdatas) {
            $title=$profilesgetdatas['title'];
            $logo=$profilesgetdatas['logo'];
             $address=$profilesgetdatas['address'];
             $mobileno=$profilesgetdatas['mobileno'];
        }

            $html='<table width="724" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;">
  <tr>
    <td height="117" align="center" style="border-bottom:1px solid black;"><p><img src="'.base_url().'logouploads/'. $logo.'" alt="DDD"></p>
      <p style="margin-top: -22px; font-size: 12px;"><strong>'. $address.'</strong></p>
       <p style="margin-top: -10px; font-size: 12px;"><strong>Mobile :(+91)-'. $mobileno.' </strong></p></td>
  </tr>

</table>

<table width="724" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;">
  <tr style="font-size: 14px;">
    <td height="35" width="222" align="left" style="border-bottom:1px solid black;"><strong>Billing   Report</strong></td>
    <td height="35" width="424" align="center" style="border-bottom:1px solid black;"><strong>';
                      if(@$fromdate)
                      {
                        $html.='From Date :'. $fromdate.'';
                      } 
                       if(@$todate){

                        $html.='To Date :'. $todate.''; 

                       } 

                    $html.='</strong></td>
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
  </tr>';
 
    $i=1;
     $totalamount[]=array();
    foreach ($billingreports as $row) {
      $noofitemss=explode('||',$row['itemname']);
      $noofitems=count($noofitemss);
      $totalamount[]=$row['totalamount'];
     

   $html.='<tr>

    <td height="22" align="left" style="border-bottom:1px dotted black;"><strong>'. $i++.'</strong></td>
    <td align="left" style="border-bottom:1px dotted black;"><strong>'. date('d/m/Y',strtotime(str_replace('-','/',$row['date']))).'</strong></td>
    <td align="left" style="border-bottom:1px dotted black;"><strong>'. $row['billno'].'</strong></td>
    <td align="left" style="border-bottom:1px dotted black;"><strong>'. $row['customername'].'</strong></td>
    <td align="left" style="border-bottom:1px dotted black;"><strong>'. $noofitems.'</strong></td>
    <td align="right" style="border-bottom:1px dotted black;"><strong>'. $row['totalamount'].'</strong></td>
  </tr>';
   }
   $html.='<tfoot>
   <tr>
    <td width="43" height="29" align="left" style="border-bottom:1px solid black;"><strong></strong></td>
    <td width="116" align="left" style="border-bottom:1px solid black;"><strong></strong></td>
    <td width="97" align="left" style="border-bottom:1px solid black;"><strong></strong></td>
    <td width="186" align="left" style="border-bottom:1px solid black;"><strong></strong></td>
     <td width="144" align="left" style="border-bottom:1px solid black;"><strong>Total Amount</strong></td>
     <td width="112" align="right" style="border-bottom:1px solid black;"><strong>'. number_format(array_sum($totalamount),2).'</strong></td>
  </tr>
  </tfoot>
 
</table>'; 

                  $mpdf->WriteHTML($html);  
                    $filename=date('Y-m-d-').'Billing Reports.pdf';
                    $content = $mpdf->Output($filename, 'D');

                    force_download($filename,$content); 
        }
    }



    public function ajax_list()
  {
    $list = $this->person->get_datatables();
    $data = array();
    $no = $_POST['start'];
    $a=1;
     $totalamount[]=array();
    foreach ($list as $person) {

      $noofitemss=explode('||',$person->itemname);
      $noofitems=count($noofitemss);
      $totalamount[]=$person->totalamount;
      $no++;
      $row = array();
      $row[] = $a++;
      $row[] = date('d/m/Y',strtotime(str_replace('-','/',$person->date)));
      $row[] = $person->billno;
      $row[] = $person->customername;
      $row[] = $noofitems;
      $row[] = $person->totalamount;
      $row[] = '<a  class="btn btn-purple btn-custom btn-rounded waves-effect waves-light"  href="javascript:void()" title="View" onclick="edit_person('."'".$person->id."'".')">View</a>';
   
      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->person->count_all(),
            "recordsFiltered" => $this->person->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }


   public function viewbilling()
      {
        $id=$this->input->post('id');
        $data=$this->db->where('id',$id)->get('addbilling')->result_array();
        if($data)
        {
          foreach ($data as $row) {

              

            $html='<div class="row">
                  <table class="table m-0">
                      <thead>
                      <tr>
                          <th>S.No</th>
                          <th>Item Name</th>
                          <th>Qty</th>
                          <th>Rate</th>
                          <th>Amount</th>
                       </tr>   
                      </thead>
                      <tbody>';
              $itemname=explode('||',$row['itemname']);
              $qty=explode('||',$row['qty']);
              $rate=explode('||',$row['rate']);
              $amount=explode('||',$row['amount']);
              $count=count($itemname);
                       $a=1;
                      for ($i=0; $i < $count; $i++) { 
                                                  
                  $html.='<tr>
                          <td>'.$a++.'</td>
                          <td>'.$itemname[$i].'</td>
                          <td>'.$qty[$i].'</td>
                          <td>'.$rate[$i].'</td>
                          <td>'.$amount[$i].'</td>
                      </tr>';
                     
                     }
                          
                      $html.='</tbody>
                  </table>
              </div>
              <div class="row">
                  <div class="col-md-4">
                      
                  </div>
                  <div class="col-md-4">
                      
                  </div>
                  <div class="col-md-4">
                      
                          <label for="field-6" class="control-label">Sub Total</label>&nbsp;:&nbsp;
                          <label for="field-6" class="control-label">'.$row["subtotal"].'</label>
                          
                      
                  </div>
                  <div class="col-md-4">
                      
                  </div>
                  <div class="col-md-4">
                      
                  </div>
                  <div class="col-md-4">
                      
                          <label for="field-6" class="control-label">Dis %</label>&nbsp;:&nbsp;
                          <label for="field-6" class="control-label">'.$row["discount"].'</label>
                          &nbsp;&nbsp;&nbsp;
                          <label for="field-6" class="control-label">'.$row["discountamount"].'</label>
                          
                      
                  </div>
                  <div class="col-md-4">
                      
                  </div>
                  <div class="col-md-4">
                      
                  </div>
                  <div class="col-md-4">
                      
                          <label for="field-6" class="control-label">Adjustment</label>&nbsp;:&nbsp;
                          <label for="field-6" class="control-label">'.$row["adjustment"].'</label>
                          
                      
                  </div>
                  <div class="col-md-4">
                      
                  </div>
                  <div class="col-md-4">
                      
                  </div>
                  <div class="col-md-4">
                      
                          <label for="field-6" class="control-label">Total</label>&nbsp;:&nbsp;
                          <label for="field-6" class="control-label">'.$row["totalamount"].'</label>
                          
                      
                  </div>
              </div>';
            
          }
        }
        else
        {
          $html='';
        }


        echo $html;

      }


	



}	