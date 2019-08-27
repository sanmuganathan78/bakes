<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chatsproductmodel extends CI_Model {

	var $table = 'chatsproduct';
	var $column = array('productid','productname','rate'); //set column field database for order and search
	var $order = array('id' => 'asc'); // default order 

	public function __construct()
	{
		parent::__construct();
		
	}

	private function _get_datatables_query()
	{
		
				$this->db->from($this->table);

		$i = 0;
		$this->db->or_like('productid',$_POST['search']['value']);
		$this->db->or_like('productname',$_POST['search']['value']);
		$this->db->or_like('rate',$_POST['search']['value']);
				
			
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by('id', $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
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

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

	


}
