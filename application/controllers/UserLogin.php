<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserLogin extends CI_Controller{

	public function __construct()
   {
        parent::__construct();
        $this->load->model('UserLoginModel');
   }

	public function index(){
        if( $this->session->userdata('_id'))
          return redirect('UserDashboard');
		$this->load->view('user_login');
	}

	public function user_login(){
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run('login_rules') == FALSE)
                {
                	$this->load->view('user_login');	
                        
                }
                else
                {
                	$email = $this->input->post('email');
                	$password = $this->input->post('password');
                	$login_id = $this->UserLoginModel->validate_login($email,$password);
        			if($login_id)
        			{
                        $session_data = array(
                                            '_id'  => $login_id,
                                            'email'=> $email
                                    );

        				$this->session->set_userdata($session_data);
        				return redirect('UserDashboard');		
        			} else {
                        $this->session->set_flashdata('login_failed', 'Invalid Username or Password');
        				return redirect('UserLogin');
        			}
                }
	}

	public function logout(){
		$this->session->unset_userdata('_id');
		return redirect('UserLogin');
	}


    
}