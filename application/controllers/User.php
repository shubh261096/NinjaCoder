<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

 public function __construct()
   {
        parent::__construct();
        $this->load->view('includes/header');
        $this->load->view('includes/footer');
        if(! $this->session->userdata('user_id'))
          return redirect('Admin');
        

        $this->load->model('UserModel');
   }

 public function index() 
  { 
    
     $query = $this->UserModel->getUser();
    $data['USERS'] = null;
    if($query){
     $data['USERS'] =  $query;
    }
     $this->load->view('Users/user', $data);

  }

 public function alluser()
  {
   	$query = $this->UserModel->getUser();
    $data['USERS'] = null;
    if($query){
     $data['USERS'] =  $query;
    }
     $this->load->view('Users/user', $data);
  }

  public function add_user(){

  $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');


  if ($this->form_validation->run('add_user_rules') == FALSE)
                {
                	$this->load->view('Users/add_user');	
                        
                }
                else
                {	
        					$post = $this->input->post();
        					unset($post['submit']);
        					if($this->UserModel->addUser($post)){
        						$this->session->set_flashdata('feedback', 'Added Succefully');
        						$this->session->set_flashdata('feedback_class', 'alert-success');
        					} else {
        						$this->session->set_flashdata('feedback', 'Not inserted');
        						$this->session->set_flashdata('feedback_class', 'alert-danger');
        					}
        					return redirect('user/alluser');    
                }

  
  }

  public function edit_user($user_id)
  {

  	$user = $this->UserModel->editUser($user_id);
  	$this->load->view('Users/edit_user', ['users'=>$user]);
  }

  public function update_user($user_id){

  	
  	$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');


  	if ($this->form_validation->run('add_user_rules') == FALSE)
                {
                	$user = $this->UserModel->editUser($user_id);
                  $this->load->view('Users/edit_user', ['users'=>$user]);	
                        
                }
                else
                {	
        					$post = $this->input->post();
        					unset($post['submit']);
        					if($this->UserModel->updateUser($user_id,$post)){
        						$this->session->set_flashdata('feedback', 'Updated Succefully');
        						$this->session->set_flashdata('feedback_class', 'alert-success');
        					} else {
        						$this->session->set_flashdata('feedback', 'Not Updated');
        						$this->session->set_flashdata('feedback_class', 'alert-danger');
        					}
        					return redirect('user/alluser');
                }
  }


  public function delete_user($user_id){
    
    if($this->UserModel->deleteUser($user_id)){
                    $this->session->set_flashdata('feedback', 'Deleted Succefully');
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                  } else {
                    $this->session->set_flashdata('feedback', 'Not deleted');
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                  }
                  return redirect('user/alluser'); 

  }


}