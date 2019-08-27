<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profilemodel extends CI_Model 
{

	

	public function profileupdate($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('login',$data);
		return $this->db->affected_rows() !=1 ? false:true; 
	}



	

	



	




}

	