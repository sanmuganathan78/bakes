<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {


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
			$toda=$this->db->where('date',date('Y-m-d'))->get('addbilling')->result_array();
			$totalamount[]=array();
			foreach ($toda as $ro) {
				$totalamount[]=$ro['totalamount'];
			}
			$data['totals']=array_sum($totalamount);

			$todas=$this->db->get('addbilling')->result_array();
			$totalamounts[]=array();
			foreach ($todas as $ros) {
				$totalamounts[]=$ros['totalamount'];
			}
			$data['totalsales']=array_sum($totalamounts);

			// echo "<pre>";
			// print_r($data['totals']);

			$this->load->view('admin/dashboard',$data);
			

	}




	



}	