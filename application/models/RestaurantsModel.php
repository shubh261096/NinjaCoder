<?php
class RestaurantsModel extends CI_Model {

   public function __construct() 
    {
        parent::__construct(); 
        $this->load->database();
    }

   public function getRestaurants()
   	{
	  	$this->db->select("id,restname,city,location,type,deliverytime,pickup_time,image");
	  	$this->db->from('restraunts');
	  	$query = $this->db->get();

	  	if($query->num_rows() > 0) {
        return $query->result();
    	}
	  	
	}


	public function addRestaurants($array)
   	{
	 	return $this->db->insert('restraunts',$array);
	}

	public function editRestaurants($rest_id)
	{
		$q = $this->db->select(['id','restname','city','location','type','deliverytime','pickup_time','image'])
					->where('id',$rest_id)
					->get('restraunts');

		return $q->row();	
	}

	public function updateRestaurants($rest_id, Array $rest)
	{
		return $this->db
				->where('id',$rest_id)
				->update('restraunts',$rest);
	}


	public function deleteRestaurants($rest_id)
	{
		return $this->db
				->where('id',$rest_id)
				->delete('restraunts');
	}

   
}
?>