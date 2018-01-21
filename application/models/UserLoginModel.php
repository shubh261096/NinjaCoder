<?php

class UserLoginModel extends CI_model{

	public function __construct() 
    {
        parent::__construct(); 
        $this->load->database();
    }

    public function validate_login($email,$password)
    {
    	$q = $this->db->where(['email'=>$email, 'password'=>$password])
    				  ->from('register')	
    				  ->get();

    	if($q->num_rows()){
    		return $q->row()->id;
       	} else{
       		return FALSE;
       	}
    }
}


?>