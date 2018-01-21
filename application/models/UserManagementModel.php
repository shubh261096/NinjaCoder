<?php
class UserManagementModel extends CI_Model {

   public function __construct() 
    {
        parent::__construct(); 
        $this->load->database();
    }

    public function getTotalUser()
    {
        return $this->db->count_all('register'); 
    }

   public function getUsers()
   	{
	  	$this->db->select("id,username,email,image");
	  	$this->db->from('register');
	  	$query = $this->db->get();

	  	if($query->num_rows() > 0) {
        return $query->result();
    	}
	  	
	}


	public function addUsers($array)
   	{
	 	return $this->db->insert('register',$array);
	}

	public function editUsers($user_id)
	{
		$q = $this->db->select(['id','username','email','image'])
					->where('id',$user_id)
					->get('register');

		return $q->row();	
	}

	public function updateUsers($user_id, Array $user)
	{
		return $this->db
				->where('id',$user_id)
				->update('register',$user);
	}


	public function deleteUsers($user_id)
	{
		return $this->db
				->where('id',$user_id)
				->delete('register');
	}

   
}
?>