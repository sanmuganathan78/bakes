<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller 
{

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('loginmodel');
	}


	public function index()
	{

		if($this->session->userdata('is_logged_in')=="")
		{
			 $this->session->set_flashdata('msg','Login To Continue');
			$this->load->view('includes/login');
		}
		else
		{

			if($this->session->userdata['usertype']=='Admin')
			{
				redirect('admin/dashboard');
			}
			elseif($this->session->userdata['usertype']=='User')
			{
				redirect('site/dashboard');
			}
			else
			{
				 $this->session->set_flashdata('msg','Login To Continue');
			     $this->load->view('includes/login');
			}	

		}
		
	}



	function validate()
   {
 	
 	$usertype=$this->input->post('usertype');
 	$username=$this->input->post('username');
 	$password=$this->input->post('password');

 	
 			if($usertype=="Admin")
 			{
 				$admin=$this->loginmodel->checkadmin($username,$password,$usertype);

 				

		 			if($admin)
		 			{
			 				
			 				foreach ($admin as $row)
			 				 {

				 				
							 
					            $email=$row['email'];
					            $username=$row['username'];
					            $password=$row['password'];
					            $mobileno=$row['mobileno'];
					            $address=$row['address'];
					            $usertype=$row['usertype'];

			 			     }

			 			$data=array(
						            'email' => $email,
						            'username' => $username,
						            'password' => $password,
						            'mobileno' => $mobileno,
						            'address' =>  $address,
						            'usertype'=>$usertype,
			 						'is_logged_in'=>true);

			 			     // echo '<pre>';
			 			     // print_r($data);

			 			$this->session->set_userdata($data);
			 			redirect('admin/dashboard');
		 			 }



		 			else
		 			{
		 				$this->session->set_flashdata('msg1','Username or Password Incorrect!');
		 			    redirect('login');
		 			  
		 			}

 			}
 			else if($usertype=="User")
 			{

 				$marketing=$this->loginmodel->checkuser($username,$password,$usertype);

		 			if($marketing)
		 			{
			 				
			 				foreach ($marketing as $row)
			 				 {

				 				
							 	$userid=$row['userid'];
					            $username=$row['username'];
					            $email=$row['email'];
					            $mobileno=$row['mobileno'];
					            $usertype=$row['usertype'];
					            $profileimage=$row['profileimage'];
					          
					           

			 			     }

			 			$data=array('userid' => $userid,
						            'username' => $username,
						            'email' => $email,
						            'mobileno' => $mobileno,
						            'usertype'=>$usertype,
						            'profileimage'=>$profileimage,
						            'is_logged_in'=>true);

			 			$this->session->set_userdata($data);
			 			redirect('site/dashboard');
		 			}

		 			else
		 			{
		 				$this->session->set_flashdata('msg1','Username or Password Incorrect!');
		 			    redirect('login');
		 			  
		 			}

 			}

 			

 			else
 			{

 				 $this->session->set_flashdata('msg','Login To Continue');
			     redirect('login');

 			}

 				
		 			

 		

 }


 function logout()
    {
    	
    	$this->session->sess_destroy();
    	
    	// session_unset();

		redirect('login','refresh');
    }






}

