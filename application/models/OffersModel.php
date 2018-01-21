<?php
class OffersModel extends CI_Model {

   public function __construct() 
    {
        parent::__construct(); 
        $this->load->database();
    }

   public function getOffers()
   	{
	  	$this->db->select("id,flat,amount,image");
	  	$this->db->from('offers');
	  	$query = $this->db->get();

	  	if($query->num_rows() > 0) {
        return $query->result();
    	}
	  	
	}


	public function addOffers($array)
   	{
	 	return $this->db->insert('offers',$array);
	}

	public function editOffers($offer_id)
	{
		$q = $this->db->select(['id','flat','amount','image'])
					->where('id',$offer_id)
					->get('offers');

		return $q->row();	
	}

	public function updateOffers($offer_id, Array $offer)
	{
		return $this->db
				->where('id',$offer_id)
				->update('offers',$offer);
	}


	public function deleteOffers($offer_id)
	{
		return $this->db
				->where('id',$offer_id)
				->delete('offers');
	}

   
}
?>