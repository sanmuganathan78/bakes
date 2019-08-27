<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_Product extends CI_Controller {


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

		
		$this->load->model('admin/productmodel','person');
		

	}

	
	public function index()
	{


			$this->load->view('admin/add_product');
			

	}

		public function checkproductname()
	{
		$productname=$this->input->post('productname');

		$data=$this->db->where('productname',$productname)->get('addproduct')->result_array();
		//echo $category;
		if($data)
		{
			echo 'Yes';
		}
		else
		{

		}
	}

	


	public function addproductid()
	{

		$query_update1 =mysql_query("SELECT * FROM addproduct ORDER BY id DESC LIMIT 1");

		while($row = mysql_fetch_array($query_update1))
  
		 	{
		 		$productid=$row['productid'];
		 		

		   }
 		

	@$bond_no = $productid;
        if(is_null($bond_no)){
          $new_bond_noo = 'PR-001'; 
        } else {
          $old_bond_noo = str_split($bond_no,1);
          @$va = (string)($old_bond_noo[3].$old_bond_noo[4].$old_bond_noo[5])+1;  
          $bond_length = strlen($va);
          if($bond_length == 1){
            $new_bond_noo = 'PR-00'.$va;  
          } 
          else if($bond_length == 2)
          {  
            $new_bond_noo = 'PR-0'.$va; 
          }
          else if($bond_length == 3)
          {  
            $new_bond_noo = 'PR-'.$va; 
          }
        }

        $productids=$new_bond_noo;
      
        echo $productids;


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
			$row[] = $person->productid;
			$row[] = $person->productname;
			$row[] = $person->rate;
					

			
			$row[] = '<a  class="mb-xs mt-xs mr-xs btn btn-success" href="javascript:void()" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
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

	public function ajax_delete($id)
	{
		$this->person->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	public function ajax_add()
	{
		$this->_validate();

		$query_update1 =mysql_query("SELECT * FROM addproduct ORDER BY id DESC LIMIT 1");

		while($row = mysql_fetch_array($query_update1))
  
		 	{
		 		$productid=$row['productid'];
		 		

		   }
 		

	@$bond_no = $productid;
        if(is_null($bond_no)){
          $new_bond_noo = 'PR-001'; 
        } else {
          $old_bond_noo = str_split($bond_no,1);
          @$va = (string)($old_bond_noo[3].$old_bond_noo[4].$old_bond_noo[5])+1;  
          $bond_length = strlen($va);
          if($bond_length == 1){
            $new_bond_noo = 'PR-00'.$va;  
          } 
          else if($bond_length == 2)
          {  
            $new_bond_noo = 'PR-0'.$va; 
          }
          else if($bond_length == 3)
          {  
            $new_bond_noo = 'PR-'.$va; 
          }
        }

        $productids=$new_bond_noo;
      
        
		$data = array(
			  
				'productid'=>$productids,
				'productname'=>$this->input->post('productname'),
				'rate'=>$this->input->post('rate'),
				'status' =>1,
			);
		$insert = $this->person->save($data);
		echo json_encode(array("status" => TRUE));




		
	}

	public function ajax_update()
	{
		$this->_validate();

   $data = array(
			    'productid'=>$this->input->post('productid'),
				'productname'=>$this->input->post('productname'),
				'rate'=>$this->input->post('rate'),
				'status' =>1,
			);
		$this->person->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));

   

	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('productname') == '')
		{
			$data['inputerror'][] = 'productname';
			$data['error_string'][] = 'Product Name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('rate') == '')
		{
			$data['inputerror'][] = 'rate';
			$data['error_string'][] = 'Rate is required';
			$data['status'] = FALSE;
		}

		

		
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}



	



}	