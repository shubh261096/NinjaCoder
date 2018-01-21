<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurants extends CI_Controller{

	public function __construct()
   {
       parent::__construct();
        $this->load->view('includes/header');
        $this->load->view('includes/footer');
        if(! $this->session->userdata('user_id'))
          return redirect('Admin');
        

        $this->load->model('RestaurantsModel');
   }

   public function index(){
		$this->load->view('Restaurants/all_restaurants');
   }

   public function all_restaurants(){
   	$query = $this->RestaurantsModel->getRestaurants();
    $data['RESTAURANTS'] = null;
    if($query){
     $data['RESTAURANTS'] =  $query;
    }
     $this->load->view('Restaurants/all_restaurants', $data);
   }

   public function add_restaurants(){

	$config = [
				  'upload_path' => './rest_image/',
    			'allowed_types' => 'gif|jpg|png|jpeg|PNG',
			  ];

    $this->load->library('upload', $config);
    
    
    $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

    if ($this->form_validation->run('restaurants_rules') && $this->upload->do_upload('userfile'))
                {
                	
                    $post = $this->input->post();
              			unset($post['submit']);
              			$data = $this->upload->data();
              			
              			$image_path = base_url("rest_image/" . $data['raw_name'] . $data['file_ext']);
              			$post['image'] = $image_path;
              			if($this->RestaurantsModel->addRestaurants($post)){
              						$this->session->set_flashdata('feedback', 'Added Succefully');
              						$this->session->set_flashdata('feedback_class', 'alert-success');
              			} else {
              						$this->session->set_flashdata('feedback', 'Not inserted');
              						$this->session->set_flashdata('feedback_class', 'alert-danger');
              			}
              					return redirect('Restaurants/all_restaurants');       
                }
                else
                {	
                	$upload_error = $this->upload->display_errors();

                	$this->load->view('Restaurants/add_restaurants', compact('upload_error'));	
                }

   }

   public function edit_restaurants($rest_id){

    $restaurants = $this->RestaurantsModel->editRestaurants($rest_id);
    $this->load->view('Restaurants/edit_restaurants', ['restaurants'=>$restaurants]);

   }

   public function update_restaurants($rest_id){

    $config = [
          'upload_path' => './rest_image/',
          'allowed_types' => 'gif|jpg|png|jpeg|PNG',
        ];

    $this->load->library('upload', $config);

    
    $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');


    if ($this->form_validation->run('restaurants_rules') && $this->upload->do_upload('userfile') )
                {
                    $post = $this->input->post();
                    unset($post['submit']);
                    $data = $this->upload->data();
                    
                    $image_path = base_url("rest_image/" . $data['raw_name'] . $data['file_ext']);
                    $post['image'] = $image_path;
                  
                  if($this->RestaurantsModel->updateRestaurants($rest_id,$post)){
                    $this->session->set_flashdata('feedback', 'Updated Succefully');
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                  } else {
                    $this->session->set_flashdata('feedback', 'Not Updated');
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                  }
                  return redirect('Restaurants/all_restaurants');
                        
                }
                else
                { 

                  $upload_error = $this->upload->display_errors();
                  $restaurants = $this->RestaurantsModel->editRestaurants($rest_id);
                  $this->load->view('Restaurants/edit_restaurants', ['restaurants'=>$restaurants, 'upload_error'=>$upload_error ]);
                  
                }
  }


  public function delete_restaurants($rest_id){
    
    if($this->RestaurantsModel->deleteRestaurants($rest_id)){
                    $this->session->set_flashdata('feedback', 'Deleted Succefully');
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                  } else {
                    $this->session->set_flashdata('feedback', 'Not deleted');
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                  }
                  return redirect('Restaurants/all_restaurants'); 

  }
}