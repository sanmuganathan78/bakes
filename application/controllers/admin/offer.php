<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offer extends CI_Controller {


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

		
		//$this->load->model('loginmodel');
		

	}

	
	public function index()
	{


			$this->load->view('admin/offer');
			

	}

	



}	