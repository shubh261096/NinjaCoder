<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Management extends CI_Controller{

	public function __construct()
   {
       parent::__construct();
        $this->load->view('includes/header');
        $this->load->view('includes/footer');
        if(! $this->session->userdata('user_id'))
          return redirect('Admin');
        

        $this->load->model('UserManagementModel');
   }

   public function index(){
		$this->load->view('User_Management/all_users');
   }

   public function all_users(){
   	$query = $this->UserManagementModel->getUsers();
    $data['USERS'] = null;
    if($query){
     $data['USERS'] =  $query;
    }
     $this->load->view('User_Management/all_users', $data);
   }

   public function add_users(){

	$config = [
				  'upload_path' => './rest_image/',
    			'allowed_types' => 'gif|jpg|png|jpeg|PNG',
			  ];

    $this->load->library('upload', $config);
    
    
    $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

    if ($this->form_validation->run('add_user_man_rules') && $this->upload->do_upload('userfile'))
                {
                	
                    $post = $this->input->post();
              			unset($post['submit']);
              			$data = $this->upload->data();
              			
              			$image_path = base_url("rest_image/" . $data['raw_name'] . $data['file_ext']);
              			$post['image'] = $image_path;
              			if($this->UserManagementModel->addUsers($post)){
              						$this->session->set_flashdata('feedback', 'Added Succefully');
              						$this->session->set_flashdata('feedback_class', 'alert-success');
              			} else {
              						$this->session->set_flashdata('feedback', 'Not inserted');
              						$this->session->set_flashdata('feedback_class', 'alert-danger');
              			}
              					return redirect('User_Management/all_users');       
                }
                else
                {	
                	$upload_error = $this->upload->display_errors();

                	$this->load->view('User_Management/add_users', compact('upload_error'));	
                }

   }

   public function edit_users($user_id){

    $users = $this->UserManagementModel->editUsers($user_id);
    $this->load->view('User_Management/edit_users', ['users'=>$users]);

   }

   public function update_users($user_id){

    $config = [
          'upload_path' => './rest_image/',
          'allowed_types' => 'gif|jpg|png|jpeg|PNG',
        ];

    $this->load->library('upload', $config);

    
    $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');


    if ($this->form_validation->run('add_user_man_rules') && $this->upload->do_upload('userfile') )
                {
                    $post = $this->input->post();
                    unset($post['submit']);
                    $data = $this->upload->data();
                    
                    $image_path = base_url("rest_image/" . $data['raw_name'] . $data['file_ext']);
                    $post['image'] = $image_path;
                  
                  if($this->UserManagementModel->updateUsers($user_id,$post)){
                    $this->session->set_flashdata('feedback', 'Updated Succefully');
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                  } else {
                    $this->session->set_flashdata('feedback', 'Not Updated');
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                  }
                  return redirect('User_Management/all_users');
                        
                }
                else
                { 

                  $upload_error = $this->upload->display_errors();
                  $users = $this->UserManagementModel->editUsers($user_id);
                  $this->load->view('User_Management/edit_users', ['users'=>$users, 'upload_error'=>$upload_error ]);
                  
                }
  }


  public function delete_users($user_id){
    
    if($this->UserManagementModel->deleteUsers($user_id)){
                    $this->session->set_flashdata('feedback', 'Deleted Succefully');
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                  } else {
                    $this->session->set_flashdata('feedback', 'Not deleted');
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                  }
                  return redirect('User_Management/all_users'); 

  }
}