<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_user extends CI_Controller {


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

		
		$this->load->model('admin/usermodel','person');
		

	}

	
	public function index()
	{


			$this->load->view('admin/add_user');
			

	}

	public function checkusername()
	{
		$username=$this->input->post('username');

		$data=$this->db->where('username',$username)->get('adduser')->result_array();
		//echo $category;
		if($data)
		{
			echo 'Yes';
		}
		else
		{

		}
	}


	public function adduserid()
	{

		$query_update1 =mysql_query("SELECT * FROM adduser ORDER BY id DESC LIMIT 1");

		while($row = mysql_fetch_array($query_update1))
  
		 	{
		 		$userid=$row['userid'];
		 		

		   }
 		

	@$bond_no = $userid;
        if(is_null($bond_no)){
          $new_bond_noo = 'US-001'; 
        } else {
          $old_bond_noo = str_split($bond_no,1);
          @$va = (string)($old_bond_noo[3].$old_bond_noo[4].$old_bond_noo[5])+1;  
          $bond_length = strlen($va);
          if($bond_length == 1){
            $new_bond_noo = 'US-00'.$va;  
          } 
          else if($bond_length == 2)
          {  
            $new_bond_noo = 'US-0'.$va; 
          }
          else if($bond_length == 3)
          {  
            $new_bond_noo = 'US-'.$va; 
          }
        }

        $userids=$new_bond_noo;
      
        echo $userids;


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
			$row[] = $person->userid;
			$row[] = $person->name;
			$row[] = $person->mobileno;
			$row[] = $person->username;
			$row[] = $person->password;
			

			
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

		$query_update1 =mysql_query("SELECT * FROM adduser ORDER BY id DESC LIMIT 1");

		while($row = mysql_fetch_array($query_update1))
  
		 	{
		 		$userid=$row['userid'];
		 		

		   }
 		

	@$bond_no = $userid;
        if(is_null($bond_no)){
          $new_bond_noo = 'US-001'; 
        } else {
          $old_bond_noo = str_split($bond_no,1);
          @$va = (string)($old_bond_noo[3].$old_bond_noo[4].$old_bond_noo[5])+1;  
          $bond_length = strlen($va);
          if($bond_length == 1){
            $new_bond_noo = 'US-00'.$va;  
          } 
          else if($bond_length == 2)
          {  
            $new_bond_noo = 'US-0'.$va; 
          }
          else if($bond_length == 3)
          {  
            $new_bond_noo = 'US-'.$va; 
          }
        }

        $userids=$new_bond_noo;
      
        //echo $engineerids;
        //echo $salespersonids;


         $config['upload_path'] = './uploads';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '*';
		$config['max_width']  = '*';
		$config['max_height']  = '*';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('profileimage'))
		{
			$err = array('error' => $this->upload->display_errors());

			// echo"<pre>";
			// print_r($err);


				foreach ($err as $a) {
					$errors=$a;
					
				}
				
				$datas['inputerror'][] = 'profileimage';
				$datas['error_string'][] = $errors;
				$datas['status'] = FALSE;
				echo json_encode($datas);
			    exit();
			  
			//echo $data='<div style="color: red; font-weight: bold;">'.$errors.'</div>';
			// // $this->load->view('upload_form', $error);
		}
		else
		{
			  $uplod = array('upload_data' => $this->upload->data());
			  foreach ($uplod as $b) {

			  	$profiles=$b['file_name'];

			  }
	



		$data = array(
			    
			   
				
				'userid'=>$userids,
				'name'=>$this->input->post('name'),
				'address'=>$this->input->post('address'),
				'mobileno' => $this->input->post('mobileno'),
				'email' => $this->input->post('email'),
				'profileimage' => $profiles,
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'usertype'=>'User',
				'status' =>1,
			);
		$insert = $this->person->save($data);
		echo json_encode(array("status" => TRUE));

	}


		
	}

	public function ajax_update()
	{
		$this->_validate();


	 $config['upload_path'] = './uploads';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '*';
		$config['max_width']  = '*';
		$config['max_height']  = '*';

		$this->load->library('upload', $config);

		

	if($_FILES['profileimage']['name']=='')
	{

		

		if ($this->upload->do_upload('profileimage'))
		{
			$err = array('error' => $this->upload->display_errors());

			// echo"<pre>";
			// print_r($err);


				foreach ($err as $a) {
					$errors=$a;
					
				}
				

				$datas['inputerror'][] = 'profileimage';
				$datas['error_string'][] = $errors;
				$datas['status'] = FALSE;
				echo json_encode($datas);
			    exit();
			  
			//echo $data='<div style="color: red; font-weight: bold;">'.$errors.'</div>';
			// // $this->load->view('upload_form', $error);
		}
		else
		{
			  $uplod = array('upload_data' => $this->upload->data());
			  foreach ($uplod as $b) {

			  	$profiles=$b['file_name'];

			  }	

	
		$data = array(
			    'userid'=>$this->input->post('userid'),
				'name'=>$this->input->post('name'),
				'address'=>$this->input->post('address'),
				'mobileno' => $this->input->post('mobileno'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'usertype'=>'User',
				'status' =>1,
			);
		$this->person->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));

    }
	}

	else
	{



		if (!$this->upload->do_upload('profileimage'))
		{
			$err = array('error' => $this->upload->display_errors());

			// echo"<pre>";
			// print_r($err);


				foreach ($err as $a) {
					$errors=$a;
					
				}

				
				$datas['inputerror'][] = 'profileimage';
				$datas['error_string'][] = $errors;
				$datas['status'] = FALSE;
				echo json_encode($datas);
			    exit();
				
			  
			//echo $data='<div style="color: red; font-weight: bold;">'.$errors.'</div>';
			// // $this->load->view('upload_form', $error);
		}
		else
		{
			  $uplod = array('upload_data' => $this->upload->data());
			  foreach ($uplod as $b) {

			  	$profiles=$b['file_name'];

			  }



			 
		$data = array(
			    'userid'=>$this->input->post('userid'),
				'name'=>$this->input->post('name'),
				'address'=>$this->input->post('address'),
				'mobileno' => $this->input->post('mobileno'),
				'email' => $this->input->post('email'),
				'profileimage' => $profiles,
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'usertype'=>'User',
				'status' =>1,
			);
		$this->person->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));


		}



   }	  


	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('name') == '')
		{
			$data['inputerror'][] = 'name';
			$data['error_string'][] = 'Name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('address') == '')
		{
			$data['inputerror'][] = 'address';
			$data['error_string'][] = 'Address is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('mobileno') == '')
		{
			$data['inputerror'][] = 'mobileno';
			$data['error_string'][] = 'Mobile no is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('email') == '')
		{
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Email is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('username') == '')
		{
			$data['inputerror'][] = 'username';
			$data['error_string'][] = 'Username is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('password') == '')
		{
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'password is required';
			$data['status'] = FALSE;
		}



		
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}



	



}	