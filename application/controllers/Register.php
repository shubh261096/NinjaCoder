<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

  public function __construct()
   {
       parent::__construct();
             
      $this->load->model('RegisterModel');
   }

   public function index(){
    $this->load->view('register');
   }

   
   

   
    public function register_user(){

    $config = [
                'upload_path' => './rest_image/',
                'allowed_types' => 'gif|jpg|png|jpeg|PNG',
              ];

    $this->load->library('upload', $config);
    
    
    $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

    if ($this->form_validation->run('register_user_rules') && $this->upload->do_upload('userfile'))
                { 
                    $post = $this->input->post();

                        unset($post['submit']);
                        $data = $this->upload->data();
                        
                        $image_path = base_url("rest_image/" . $data['raw_name'] . $data['file_ext']);
                        $post['image'] = $image_path;
                        if($this->RegisterModel->addUser($post)){
                          echo "Succefully";
                                    $this->session->set_flashdata('feedback', 'Registration Succesfull! Please Sign in to Continue');
                                    $this->session->set_flashdata('feedback_class', 'alert-success');
                                   // print_r('Succefully');
                        } else {
                                    $this->session->set_flashdata('feedback', 'Sorry! Please try again.');
                                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                                   // print_r('Succefully');
                          
                        }
                                return redirect('UserLogin');  

                }
                else
                {   

                    $upload_error = $this->upload->display_errors();

                    $this->load->view('Register', compact('upload_error'));  
                }

   }
}