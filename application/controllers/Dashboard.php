<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	public function __construct()
   {
        parent::__construct();
        $this->load->view('includes/header');
        $this->load->view('includes/footer');
        if(! $this->session->userdata('user_id'))
          return redirect('Admin');
        

        $this->load->model('DashboardModel');
        $this->load->model('UserManagementModel');

   }

 public function index() 
  { 
    $data['user_count'] = $this->UserManagementModel->getTotalUser();
    $data['restaurant_count'] = $this->DashboardModel->getTotalRestaurant();
    $data['order_count'] = $this->DashboardModel->getTotalOrder();
    $data['offer_count'] = $this->DashboardModel->getTotalOffer();


    $this->load->view('Dashboard/dashboard', $data);

  }



	
}