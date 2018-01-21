<?php

class DashboardModel extends CI_model{

	public function __construct() 
    {
        parent::__construct(); 
        $this->load->database();
    }

    public function getTotalUser()
    {
        return $this->db->count_all('user'); 
    }

    public function getTotalRestaurant()
    {
        return $this->db->count_all('restraunts'); 
    }

    public function getTotalOrder()
    {
        return $this->db->count_all('orders'); 
    }

    public function getTotalOffer()
    {
        return $this->db->count_all('offers'); 
    }
}


?>