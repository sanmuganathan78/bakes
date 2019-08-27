<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_stock extends CI_Controller {


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

		
		$this->load->model('admin/stock_model','person');

		

	}

	
	public function index()
	{

		
			
			

			$this->load->view('admin/add_stock');
			
           
		
	}

	


	public function ajax_list()
	{
		$list = $this->person->get_datatables();
		$data = array();
		$no = $_POST['start'];
		$a=1;
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $a++;
			$row[] = $person->item;
			$row[] = $person->balance;
					

			
			// $row[] = '<a  class="mb-xs mt-xs mr-xs btn btn-success" href="javascript:void()" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
				$row[] = '<a class="mb-xs mt-xs mr-xs btn btn-danger" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
		
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

	public function ajax_edit($id)
	{
		$data = $this->person->get_by_id($id);
		
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();

		$data1 = array(
			   	 'date'=>date('Y-m-d'),
			     'item' =>$this->input->post('item'),
			     'openingstock' =>$this->input->post('openingstock'),
			     'status' =>1,
			);

		$this->db->insert('purchaseitem',$data1);

		

		$ite=$this->db->where('item',$_POST['item'])->get('addstock')->result_array();
		if($ite)
		{
			$openingstocks=$this->input->post('openingstock');
			foreach ($ite as $as) 
			{
				$openingstock=$as['openingstock'];
				$balance=$as['balance'];
			}

			$opening_stock=$openingstock+$openingstocks;
			if($balance!='')
			{
				$balances=$balance+$openingstocks;
			}
			else
			{
				$balances=$openingstocks;
			}
			
			$data = array(
			   	 'date'=>date('Y-m-d'),
			     'item' =>$this->input->post('item'),
			     'openingstock' =>$opening_stock,
			     'balance' =>$balances,
			    'status' =>1,
			);
		$this->person->update(array('item' => $this->input->post('item')), $data);
		echo json_encode(array("status" => TRUE));


		}
		else
		{

			$data = array(
			   	 'date'=>date('Y-m-d'),
			     'item' =>$this->input->post('item'),
			     'openingstock' =>$this->input->post('openingstock'),
			     'balance' =>$this->input->post('openingstock'),
			    'status' =>1,
			);
		$insert = $this->person->save($data);
		echo json_encode(array("status" => TRUE));

		}

		
	}

	public function ajax_update()
	{
		$this->_validate();

		
		
		$data = array(
			    'item' =>$this->input->post('item'),
			    'openingstock' =>$this->input->post('openingstock'),
			     'balance' =>$this->input->post('openingstock'),
			    'status' =>1,
			);
		$this->person->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->person->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('item') == '')
		{
			$data['inputerror'][] = 'item';
			$data['error_string'][] = 'Item is required';
			$data['status'] = FALSE;
		}

		

		if($this->input->post('openingstock') == '')
		{
			$data['inputerror'][] = 'openingstock';
			$data['error_string'][] = 'Opening Stock is required';
			$data['status'] = FALSE;
		}

		
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	
	

	

	public function purchasereports()
	{
		$data['stocks']=$this->db->get('purchaseitem')->result_array();
		$this->load->view('admin/purchasereports',$data);
	}

	public function purchase_reports()
	{
		$this->load->model('admin/stock_model');
		$data['stocks']=$this->stock_model->search_purchase();
		$this->load->view('admin/purchasereports',$data);
	}

	

	



}	