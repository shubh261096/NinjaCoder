<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller{

	public function __construct()
   {
       parent::__construct();
        $this->load->view('includes/header');
        $this->load->view('includes/footer');
        if(! $this->session->userdata('user_id'))
          return redirect('Admin');
        

        $this->load->model('OffersModel');
   }

   public function index(){
		$this->load->view('Offers/all_offers');
   }

   public function alloffers(){
   	$query = $this->OffersModel->getOffers();
    $data['OFFERS'] = null;
    if($query){
     $data['OFFERS'] =  $query;
    }
     $this->load->view('Offers/all_offers', $data);
   }

   public function addoffers(){

	$config = [
				'upload_path' => './offerimage/',
    			'allowed_types' => 'gif|jpg|png|jpeg|PNG',
			  ];

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    
    $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

    if ($this->form_validation->run('upload_rules') && $this->upload->do_upload('userfile'))
                {
                	
                    $post = $this->input->post();
        			unset($post['submit']);
        			$data = $this->upload->data();
        			echo "<pre>";
        			$image_path = base_url("offerimage/" . $data['raw_name'] . $data['file_ext']);
        			$post['image'] = $image_path;
        			if($this->OffersModel->addOffers($post)){
        						$this->session->set_flashdata('feedback', 'Added Succefully');
        						$this->session->set_flashdata('feedback_class', 'alert-success');
        					} else {
        						$this->session->set_flashdata('feedback', 'Not inserted');
        						$this->session->set_flashdata('feedback_class', 'alert-danger');
        					}
        					return redirect('Offers/alloffers');       
                }
                else
                {	
                	$upload_error = $this->upload->display_errors();

                	$this->load->view('Offers/add_offers', compact('upload_error'));	
                }


   	


   }
   
   public function edit_offers($offer_id){

    $offer = $this->OffersModel->editOffers($offer_id);
    $this->load->view('Offers/edit_offers', ['offers'=>$offer]);

   }

   public function update_offers($offer_id){

    $config = [
        'upload_path' => './offerimage/',
          'allowed_types' => 'gif|jpg|png|jpeg|PNG',
        ];

    $this->load->library('upload', $config);

    
    $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');


    if ($this->form_validation->run('upload_rules') && $this->upload->do_upload('userfile') )
                {
                    $post = $this->input->post();
                    unset($post['submit']);
                    $data = $this->upload->data();
                    
                    $image_path = base_url("offerimage/" . $data['raw_name'] . $data['file_ext']);
                    $post['image'] = $image_path;
                  
                  if($this->OffersModel->updateOffers($offer_id,$post)){
                    $this->session->set_flashdata('feedback', 'Updated Succefully');
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                  } else {
                    $this->session->set_flashdata('feedback', 'Not Updated');
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                  }
                  return redirect('Offers/alloffers');
                        
                }
                else
                { 

                  $upload_error = $this->upload->display_errors();
                  $offer = $this->OffersModel->editOffers($offer_id);
                  $this->load->view('Offers/edit_offers', ['offers'=>$offer, 'upload_error'=>$upload_error ]);
                  
                }
  }


  public function delete_offers($offer_id){
    
    if($this->OffersModel->deleteOffers($offer_id)){
                    $this->session->set_flashdata('feedback', 'Deleted Succefully');
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                  } else {
                    $this->session->set_flashdata('feedback', 'Not deleted');
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                  }
                  return redirect('Offers/alloffers'); 

  }
}