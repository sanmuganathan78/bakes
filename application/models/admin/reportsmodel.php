<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportsmodel extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
		
	}

	
	
		public function search_itemized()
	{
		   

		 if($this->input->post('fromdate')!="")
        {
         $fromdate=date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('fromdate'))));   
        }
        else
        {
            $fromdate='';
        }
        if($this->input->post('todate')!="")
        {
             $todate=date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('todate'))));
        }
        else
        {
             $todate='';
        }



        if(@$fromdate)
          {

 			  	         	
          	  $this->db->where('status',1);
              $this->db->where('date >=',$fromdate);
              $this->db->group_by('itemname');
              $this->db->select('itemname');
              $this->db->select('date');
              $this->db->select_sum('qty');
              
          }

          if(@$todate)
          {

	          	         	
	            $this->db->where('status',1);
              $this->db->where('date <=',$todate);
              $this->db->group_by('itemname');
              $this->db->select('itemname');
              $this->db->select('date');
              $this->db->select_sum('qty');	
	          
          }

          if(@$_POST['itemname'])
          {

                        
              $this->db->where('status',1);  
              $this->db->where('itemname',$_POST['itemname']);
              $this->db->group_by('itemname');
              $this->db->select('itemname');
              $this->db->select('date');
              $this->db->select_sum('qty');
          }

          

         
                    	   $this->db->where('status',1);  
                        $this->db->group_by('itemname');
                        $this->db->select('itemname');
                        $this->db->select('date');
                        $this->db->select_sum('qty');	
         return $query=$this->db->get('itemizedstock')->result_array();
  

      
       return $query->result_array();




	}

    public function search_chatsitemized()
  {
       

     if($this->input->post('fromdate')!="")
        {
         $fromdate=date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('fromdate'))));   
        }
        else
        {
            $fromdate='';
        }
        if($this->input->post('todate')!="")
        {
             $todate=date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('todate'))));
        }
        else
        {
             $todate='';
        }



        if(@$fromdate)
          {

                    
              $this->db->where('status',1);
              $this->db->where('date >=',$fromdate);
              $this->db->group_by('itemname');
              $this->db->select('itemname');
              $this->db->select('date');
              $this->db->select_sum('qty');
              
          }

          if(@$todate)
          {

                        
              $this->db->where('status',1);
              $this->db->where('date <=',$todate);
              $this->db->group_by('itemname');
              $this->db->select('itemname');
              $this->db->select('date');
              $this->db->select_sum('qty'); 
            
          }

          if(@$_POST['itemname'])
          {

                        
              $this->db->where('status',1);  
              $this->db->where('itemname',$_POST['itemname']);
              $this->db->group_by('itemname');
              $this->db->select('itemname');
              $this->db->select('date');
              $this->db->select_sum('qty');
          }

          

         
                         $this->db->where('status',1);  
                        $this->db->group_by('itemname');
                        $this->db->select('itemname');
                        $this->db->select('date');
                        $this->db->select_sum('qty'); 
         return $query=$this->db->get('chatitemizedstock')->result_array();
  

      
       return $query->result_array();




  }

		public function search_purchase()
	{
		   

		 if($this->input->post('fromdate')!="")
        {
         $fromdate=date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('fromdate'))));   
        }
        else
        {
            $fromdate='';
        }
        if($this->input->post('todate')!="")
        {
             $todate=date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('todate'))));
        }
        else
        {
             $todate='';
        }



        if(@$fromdate)
          {
 			  	         	
          	  
              $this->db->where('date >=',$fromdate);
          }

          if(@$todate)
          {

	          	         	
	          	
	          $this->db->where('date <=',$todate);
          }

           if(@$_POST['itemname'])
          {

                        
              
            $this->db->where('item',$_POST['itemname']);
          }

         
          	           		
         return $query=$this->db->get('purchaseitem')->result_array();
  

      
       return $query->result_array();




	}

	


}
