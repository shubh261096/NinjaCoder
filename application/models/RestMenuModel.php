<?php
class RestMenuModel extends CI_Model {

   public function __construct() 
    {
        parent::__construct(); 
        $this->load->database();
    }

   public function getMenu()
   	{
	  	$query = $this->db->get('restaurant_menu');
	  	if($query->num_rows() > 0) {
        return $query->result();
    	}
	}

   public function addMenu($array)
   	{
	 	return $this->db->insert('restaurant_menu',$array);
	}

	public function editMenu($menu_id)
	{
		$q = $this->db->select(['id','rest_name','item_type','item_name','price','description'])
					->where('id',$menu_id)
					->get('restaurant_menu');

		return $q->row();	
	}

	public function updateMenu($menu_id, Array $menu)
	{
		return $this->db
				->where('id',$menu_id)
				->update('restaurant_menu',$menu);
	}


	public function deleteMenu($menu_id)
	{
		return $this->db
				->where('id',$menu_id)
				->delete('restaurant_menu');
	}


}
?>