<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {


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

		
		$this->load->model('admin/profilemodel');
		

	}

	
	public function index()
	{

			$data['profile']=$this->db->where('status',1)->get('login')->result_array();
			$this->load->view('admin/profile',$data);
			

	}

	public function updateprofile()
	{

		if($_FILES['logo']['name']!='')
		{

			    $config['upload_path']          = './logouploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = '*';
                $config['max_width']            = '*';
                $config['max_height']           = '*';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('logo'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        foreach ($error as $aaa) {
                        	$errors=$aaa;
                        }

                        $this->session->set_flashdata('msg1',$errors);
                        redirect('admin/profile');

                     
                        

                        
                      
                }
                else
                {
                        $datas = array('upload_data' => $this->upload->data());
                       foreach ($datas as $aaa) {
                        	$logo=$aaa['file_name'];
                        }

                        $id=$this->input->post('id');
                        $data=array('title'=>$_POST['title'],
									'email'=>$_POST['email'],
									'url'=>$_POST['url'],
									'mobileno'=>$_POST['mobileno'],
									'username'=>$_POST['username'],
									'password'=>$_POST['password'],
									'address'=>$_POST['address'],
									'logo'=>$logo,
									);
                        // echo "<pre>";
                        // print_r($data);
                        // exit;
                       $result= $this->profilemodel->profileupdate($data,$id);
                       if($result==true)
                       {
                       	  $this->session->set_flashdata('msg','Profile Update Successfully');
                          redirect('admin/profile');
                       }
                       else
                       {
                       	 $this->session->set_flashdata('msg1','Profile Update Failed');
                          redirect('admin/profile');
                       }

                        

                      
                }
			
		}
		else
		{

			            $id=$this->input->post('id');
                        $data=array('title'=>$_POST['title'],
									'email'=>$_POST['email'],
									'url'=>$_POST['url'],
									'mobileno'=>$_POST['mobileno'],
									'username'=>$_POST['username'],
									'password'=>$_POST['password'],
									'address'=>$_POST['address'],
									
									);
                        // echo "<pre>";
                        // print_r($data);
                        // exit;
                       $result= $this->profilemodel->profileupdate($data,$id);
                       if($result==true)
                       {
                       	  $this->session->set_flashdata('msg','Profile Update Successfully');
                          redirect('admin/profile');
                       }
                       else
                       {
                       	 $this->session->set_flashdata('msg1','Profile Update Failed');
                          redirect('admin/profile');
                       }
			
		}
		
		        

		
	}

	



}	