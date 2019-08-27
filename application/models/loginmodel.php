<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginmodel extends CI_Model 
{

	

	public function checkadmin($username,$password,$usertype)
	{
		$this->db->where('usertype',$usertype);
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get('login')->result_array(); 
	}



	public function checkuser($username,$password,$usertype)
	{
		$this->db->where('usertype',$usertype);
		$this->db->where('userid',$username);
		$this->db->where('password',$password);
		return $this->db->get('adduser')->result_array(); 
	}

	



	




}

	