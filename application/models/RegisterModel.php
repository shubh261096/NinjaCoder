<?php
class RegisterModel extends CI_Model {

   public function __construct() 
    {
        parent::__construct(); 

        $this->load->database();
    }

   
   

	public function addUser($array)
   	{
	 	return $this->db->insert('register',$array);
	}

	

   
}
?>