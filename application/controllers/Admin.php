<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

	public function __construct()
   {
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->model('userLoginModel');
   }

	public function index(){
        if( $this->session->userdata('user_id'))
          return redirect('Dashboard');
        else if($this->session->userdata('_id'))
          return redirect('UserDashboard');
		$this->load->view('login');
	}

	public function login(){
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run('login_rules') == FALSE)
                {
                	$this->load->view('login');	
                        
                }
                else
                {
                	$email = $this->input->post('email');
                	$password = $this->input->post('password');
                	$login_id = $this->AdminModel->validate_login($email,$password);
        			if($login_id)
        			{
        				$this->session->set_userdata('user_id',$login_id);
        				return redirect('Dashboard');		
        			} else {
                        $this->session->set_flashdata('login_failed', 'Invalid Username or Password');
        				return redirect('Admin');
        			}
                }
	}

	public function logout(){
		$this->session->unset_userdata('user_id');
		return redirect('Admin');
	}


    
}