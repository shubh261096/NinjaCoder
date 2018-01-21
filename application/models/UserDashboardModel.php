<?php

class UserDashboardModel extends CI_model{

	public function __construct() 
    {
        parent::__construct(); 
        $this->load->database();
    }


	public function getName()
   	{
   		$id = $this->session->userdata('_id');
	  	$this->db->select("username,email");
	  	$this->db->from('register');
	  	$this->db->where('id',$id);
	  	$query = $this->db->get();

	  	if($query->num_rows() > 0) {
        return $query->result();
    	}
	  	
	}
    
    
}


?>