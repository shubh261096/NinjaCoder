<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RestMenu extends CI_Controller {

 public function __construct()
   {
        parent::__construct();
        $this->load->view('includes/header');
         $this->load->view('includes/footer');
        if(! $this->session->userdata('user_id'))
          return redirect('Admin');
        

        $this->load->model('RestMenuModel');
   }

 public function index() 
  { 
    $query = $this->RestMenuModel->getMenu();
     $data['MENU'] = null;
      if($query){
     $data['MENU'] =  $query;
    }
    $this->load->view('RestMenu/all_menu', $data);

  }

 public function all_menu()
  {
      
     $query = $this->RestMenuModel->getMenu();
     $data['MENU'] = null;
      if($query){
     $data['MENU'] =  $query;
    }
     $this->load->view('RestMenu/all_menu', $data);
  }

  public function add_menu(){

  $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');


  if ($this->form_validation->run('menu_rules') == FALSE)
                {
                	$this->load->view('RestMenu/add_menu');	
                        
                }
                else
                {	
        					$post = $this->input->post();
        					unset($post['submit']);
        					if($this->RestMenuModel->addMenu($post)){
        						$this->session->set_flashdata('feedback', 'Added Succefully');
        						$this->session->set_flashdata('feedback_class', 'alert-success');
        					} else {
        						$this->session->set_flashdata('feedback', 'Not inserted');
        						$this->session->set_flashdata('feedback_class', 'alert-danger');
        					}
        					return redirect('RestMenu/all_menu');    
                }

  
  }

  public function edit_menu($menu_id)
  {

  	$menu = $this->RestMenuModel->editMenu($menu_id);
  	$this->load->view('RestMenu/edit_menu', ['menu'=>$menu]);
  }

  public function update_menu($menu_id){

  	
  	$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');


  	if ($this->form_validation->run('menu_rules') == FALSE)
                {
                	$menu = $this->RestMenuModel->editMenu($menu_id);
                  $this->load->view('RestMenu/edit_menu', ['menu'=>$menu]);	
                        
                }
                else
                {	
        					$post = $this->input->post();
        					unset($post['submit']);
        					if($this->RestMenuModel->updateMenu($menu_id,$post)){
        						$this->session->set_flashdata('feedback', 'Updated Succefully');
        						$this->session->set_flashdata('feedback_class', 'alert-success');
        					} else {
        						$this->session->set_flashdata('feedback', 'Not Updated');
        						$this->session->set_flashdata('feedback_class', 'alert-danger');
        					}
        					return redirect('RestMenu/all_menu');
                }
  }


  public function delete_menu($menu_id){
    
    if($this->RestMenuModel->deleteMenu($menu_id)){
                    $this->session->set_flashdata('feedback', 'Deleted Succefully');
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                  } else {
                    $this->session->set_flashdata('feedback', 'Not deleted');
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                  }
                  return redirect('RestMenu/all_menu'); 

  }


}