<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billingmodel extends CI_Model {

var $table = 'addbilling';
	var $column_order = array(null, 'billno','customername','totalamount'); //set column field database for datatable orderable
	var $column_search = array('billno','customername','totalamount'); //set column field database for datatable searchable 
	var $order = array('id' => 'asc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		//add custom filter here
		if($this->input->post('fromdate'))
		{
			$this->db->where('date >=',date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('fromdate')))));
		}
		if($this->input->post('todate'))
		{
			$this->db->where('date <=',date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('todate')))));
		}
		if($this->input->post('billno'))
		{
			$this->db->where('billno',$this->input->post('billno'));
		}
		

		$this->db->from($this->table);
		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					//$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				// if(count($this->column_search) - 1 == $i) //last loop
				// 	$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}




	

	
	public function billproductsadd($data)
	{
		$this->db->insert('addproductbilling', $data);
		return $this->db->affected_rows()!=1 ? false:true;
	}

	public function itemdetails_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('addproductbilling');
		return $this->db->affected_rows()!=1 ? false:true;
	}

	public function billadd($data)
	{
		$this->db->insert('addbilling', $data);
		return $this->db->affected_rows()!=1 ? false:true;
	}

	public function search_billing()
	{
		
	
		if($this->session->userdata('bakes_fromdate')!="")
		{
			$fromdate=date('Y-m-d',strtotime(str_replace('/','-',$this->session->userdata('bakes_fromdate'))));   
		}
		else
		{
			$fromdate='';
		}
		if($this->session->userdata('bakes_todate')!="")
		{
			$todate=date('Y-m-d',strtotime(str_replace('/','-',$this->session->userdata('bakes_todate'))));
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

		if(@$this->session->userdata('bakes_billno'))
		{


			$this->db->where('billno',$this->session->userdata('bakes_billno'));
		}



		return $query=$this->db->get('addbilling')->result_array();



		return $query->result_array();




	}

	


}
