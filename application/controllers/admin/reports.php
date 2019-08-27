<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {


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

		
		$this->load->model('admin/reportsmodel');
		

	}

	
	public function index()
	{


			//$this->load->view('admin/dashboard');
			

	}

	public function itemized_reports()
	{
		
             $data['itemizedreports']=$this->db->where('status',1)->group_by('itemname')->select('itemname')->select('date')->select_sum('qty')->get('itemizedstock')->result_array();




        $this->load->view('admin/itemized_reports',$data);
	}

	 public function itemized_report()
    {
            $data['itemizedreports']=$this->reportsmodel->search_itemized();
            
            $this->load->view('admin/itemized_reports',$data);
    }


    public function chatsitemized_reports()
  {
    
             $data['itemizedreports']=$this->db->where('status',1)->group_by('itemname')->select('itemname')->select('date')->select_sum('qty')->get('chatitemizedstock')->result_array();




        $this->load->view('admin/chatsitemized_reports',$data);
  }

   public function chatsitemized_report()
    {
            $data['itemizedreports']=$this->reportsmodel->search_chatsitemized();
            
            $this->load->view('admin/chatsitemized_reports',$data);
    }

	public function purchase_reports()
	{
		$data['purchasereports']=$this->db->where('status',1)->get('purchaseitem')->result_array();
        $this->load->view('admin/purchase_reports',$data);
	}

	 public function purchase_report()
    {
            $data['purchasereports']=$this->reportsmodel->search_purchase();
            
            $this->load->view('admin/purchase_reports',$data);
    }

	public function customer_reports()
	{
		$data['customerreports']=$this->db->where('status',1)->where('customername !=', '')->get('addbilling')->result_array();
        $this->load->view('admin/customer_reports',$data);
	}

	 public function itemized_reportprint()
    {   
        $submit=$this->input->post('submit');

        if($submit=='Print')
        {
           $data['itemizedreports']=$this->reportsmodel->search_itemized();
            $data['fromdate']=$this->input->post('fromdate');
            $data['todate']=$this->input->post('todate');
            
            $this->load->view('admin/itemized_reportprint',$data);
            
         }

            
        elseif($submit=='Download')
        {
            $this->load->helper('download');
            $this->load->library('mpdf');
            $itemizedreports=$this->reportsmodel->search_itemized();
            $fromdate=$this->input->post('fromdate');
            $todate=$this->input->post('todate');

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

            $html='<table width="600" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;">
  <tr>
    <td height="117" align="center" style="border-bottom:1px solid black;"><p><img  src="'.base_url().'logouploads/'. $logo.'" alt="DDD"></p>
      <p style="margin-top: -22px; font-size: 12px;"><strong>'. $address.'</strong></p>
    <p style="margin-top: -10px; font-size: 12px;"><strong>Mobile :(+91)-'. $mobileno.' </strong></p></td>
  </tr>

</table>

<table width="600" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;">
  <tr style="font-size: 14px;">
    <td height="35" width="222" align="left" style="border-bottom:1px solid black;"><strong>Itemized   Report</strong></td>
    <td height="35" width="424" align="center" style="border-bottom:1px solid black;"><strong>';  if(@$fromdate)
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

<table width="600" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
  <tr>
    <td width="57" height="29" align="left" style="border-bottom:1px solid black;"><strong>S.No</strong></td>
   
    <td width="287" align="left" style="border-bottom:1px solid black;"><strong>Item Name</strong></td>
    <td width="86" align="center" style="border-bottom:1px solid black;"><strong>Qty</strong></td>
  </tr>';
  
    $i=1;
    $qtys[]=array();
                                foreach ($itemizedreports as $row) {
                                    $qtys[]=$row['qty'];
    
      $html.='<tr>

    <td height="22" align="left" style="border-bottom:1px dotted black;"><strong>'. $i++.'</strong></td>
    
    <td align="left" style="border-bottom:1px dotted black;"><strong>'. $row['itemname'].'</strong></td>
    <td align="center" style="border-bottom:1px dotted black;"><strong>'. $row['qty'].'</strong></td>
  </tr>';
   }
      $html.='<tfoot>
                                  <tr>
                                  <th></th>
                                  
                                  <th align="right">Total</th>
                                  <th align="center">'. number_format(array_sum($qtys),2).'</th>
                                  
                                 </tr>
                              </tfoot>

 
</table>'; 

                  $mpdf->WriteHTML($html);  
                    $filename=date('Y-m-d-').'Itemized Reports.pdf';
                    $content = $mpdf->Output($filename, 'D');

                    force_download($filename,$content); 
        }
    }



     public function chatsitemized_reportprint()
    {   
        $submit=$this->input->post('submit');

        if($submit=='Print')
        {
           $data['itemizedreports']=$this->reportsmodel->search_chatsitemized();
            $data['fromdate']=$this->input->post('fromdate');
            $data['todate']=$this->input->post('todate');
            
            $this->load->view('admin/chatsitemized_reportprint',$data);
            
         }

            
        elseif($submit=='Download')
        {
            $this->load->helper('download');
            $this->load->library('mpdf');
            $itemizedreports=$this->reportsmodel->search_chatsitemized();
            $fromdate=$this->input->post('fromdate');
            $todate=$this->input->post('todate');

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

            $html='<table width="600" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;">
  <tr>
    <td height="117" align="center" style="border-bottom:1px solid black;"><p><img  src="'.base_url().'logouploads/'. $logo.'" alt="DDD"></p>
      <p style="margin-top: -22px; font-size: 12px;"><strong>'. $address.'</strong></p>
    <p style="margin-top: -10px; font-size: 12px;"><strong>Mobile :(+91)-'. $mobileno.' </strong></p></td>
  </tr>

</table>

<table width="600" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;">
  <tr style="font-size: 14px;">
    <td height="35" width="222" align="left" style="border-bottom:1px solid black;"><strong>Chats Itemized   Report</strong></td>
    <td height="35" width="424" align="center" style="border-bottom:1px solid black;"><strong>';  if(@$fromdate)
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

<table width="600" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
  <tr>
    <td width="57" height="29" align="left" style="border-bottom:1px solid black;"><strong>S.No</strong></td>
   
    <td width="287" align="left" style="border-bottom:1px solid black;"><strong>Item Name</strong></td>
    <td width="86" align="center" style="border-bottom:1px solid black;"><strong>Qty</strong></td>
  </tr>';
  
    $i=1;
    $qtys[]=array();
                                foreach ($itemizedreports as $row) {
                                    $qtys[]=$row['qty'];
    
      $html.='<tr>

    <td height="22" align="left" style="border-bottom:1px dotted black;"><strong>'. $i++.'</strong></td>
    
    <td align="left" style="border-bottom:1px dotted black;"><strong>'. $row['itemname'].'</strong></td>
    <td align="center" style="border-bottom:1px dotted black;"><strong>'. $row['qty'].'</strong></td>
  </tr>';
   }
      $html.='<tfoot>
                                  <tr>
                                  <th></th>
                                  
                                  <th align="right">Total</th>
                                  <th align="center">'. number_format(array_sum($qtys),2).'</th>
                                  
                                 </tr>
                              </tfoot>

 
</table>'; 

                  $mpdf->WriteHTML($html);  
                    $filename=date('Y-m-d-').'Chats Itemized Reports.pdf';
                    $content = $mpdf->Output($filename, 'D');

                    force_download($filename,$content); 
        }
    }

	

	 public function purchase_reportprint()
    {   
        $submit=$this->input->post('submit');

        if($submit=='Print')
        {
            $data['purchasereports']=$this->reportsmodel->search_purchase();
            $data['fromdate']=$this->input->post('fromdate');
            $data['todate']=$this->input->post('todate');
            
            $this->load->view('admin/purchase_reportprint',$data);
            
         }

            
        elseif($submit=='Download')
        {
            $this->load->helper('download');
            $this->load->library('mpdf');
            $purchasereports=$this->reportsmodel->search_purchase();
            $fromdate=$this->input->post('fromdate');
            $todate=$this->input->post('todate');

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
        foreach ($profilesgetdata as  $profilesgetdatas) {
            $title=$profilesgetdatas['title'];
            $logo=$profilesgetdatas['logo'];
             $address=$profilesgetdatas['address'];
             $mobileno=$profilesgetdatas['mobileno'];
        }

            $html='<table width="600" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;">
  <tr>
    <td height="117" align="center" style="border-bottom:1px solid black;"><p><img  src="'.base_url().'logouploads/'. $logo.'" alt="DDD"></p>
      <p style="margin-top: -22px; font-size: 12px;"><strong>'. $address.'</strong></p>
    <p style="margin-top: -10px; font-size: 12px;"><strong>Mobile :(+91)-'. $mobileno.' </strong></p></td>
  </tr>

</table>

<table width="600" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;">
  <tr style="font-size: 14px;">
    <td height="35" width="222" align="left" style="border-bottom:1px solid black;"><strong>Purchase Report</strong></td>
    <td height="35" width="424" align="center" style="border-bottom:1px solid black;"><strong>';  if(@$fromdate)
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

<table width="600" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
  <tr>
    <td width="57" height="29" align="left" style="border-bottom:1px solid black;"><strong>S.No</strong></td>
    <td width="152" align="left" style="border-bottom:1px solid black;"><strong>Date</strong></td>
    <td width="287" align="left" style="border-bottom:1px solid black;"><strong>Item Name</strong></td>
    <td width="86" align="center" style="border-bottom:1px solid black;"><strong>Qty</strong></td>
  </tr>';
  
    $i=1;
    $qtys[]=array();
                                foreach ($purchasereports as $row) {
                                    $qtys[]=$row['openingstock'];
    
      $html.='<tr>

    <td height="22" align="left" style="border-bottom:1px dotted black;"><strong>'. $i++.'</strong></td>
    <td align="left" style="border-bottom:1px dotted black;"><strong>'. date('d/m/Y',strtotime(str_replace('-','/',$row['date']))).'</strong></td>
    <td align="left" style="border-bottom:1px dotted black;"><strong>'. $row['item'].'</strong></td>
    <td align="center" style="border-bottom:1px dotted black;"><strong>'. $row['openingstock'].'</strong></td>
  </tr>';
   }
      $html.='<tfoot>
                                  <tr>
                                  <th></th>
                                  <th></th>
                                  <th align="right">Total</th>
                                  <th align="center">'. number_format(array_sum($qtys),2).'</th>
                                  
                                 </tr>
                              </tfoot>

 
</table>'; 

                  $mpdf->WriteHTML($html);  
                    $filename=date('Y-m-d-').'Purchase Reports.pdf';
                    $content = $mpdf->Output($filename, 'D');

                    force_download($filename,$content); 
        }
    }




}	