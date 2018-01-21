<?php
class UserModel extends CI_Model {

   public function __construct() 
    {
        parent::__construct(); 
        $this->load->database();
    }

   public function getUser()
   	{
	  	$this->db->select("id,fullname,phone,email");
	  	$this->db->from('user');
	  	$query = $this->db->get();
	  	if($query->num_rows() > 0) {
        return $query->result();
    	}
	}

   public function addUser($array)
   	{
	 	return $this->db->insert('user',$array);
	}

	public function editUser($user_id)
	{
		$q = $this->db->select(['id','fullname','phone','email'])
					->where('id',$user_id)
					->get('user');

		return $q->row();	
	}

	public function updateUser($user_id, Array $user)
	{
		return $this->db
				->where('id',$user_id)
				->update('user',$user);
	}


	public function deleteUser($user_id)
	{
		return $this->db
				->where('id',$user_id)
				->delete('user');
	}


}
?>