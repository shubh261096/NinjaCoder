<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->database();
        $this->load->model('ApiModel');
        
    }


    public function getProduct($restname,$itemtype){
        $restname = urldecode($restname);
         $itemtype = urldecode($itemtype); 
		 
		 $data= $this->ApiModel->getProducts($restname,$itemtype);
    foreach($data AS $row)
    {
        $item_name = $row['item_name'];
        $description = $row['description'];
        
    }
         
         
         print_r($data); exit();
         
        echo json_encode($data);   
    }
    

}