<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class UserDashboard extends CI_Controller{

	public function __construct()
   {
        parent::__construct();
        $this->load->view('includes/header_user');
        $this->load->view('includes/footer_user');
        if(! $this->session->userdata('_id'))
          return redirect('UserLogin');
        
        $this->config->load('twitter');

        $this->load->model('UserDashboardModel');
        $this->load->library('twitteroauth');
        require_once APPPATH.'third_party/OAuth.php';

        
        
        
   }

 public function index() 
  { 
    $this->load->view('Dashboard/user_dashboard');
 
  }


  public function getVal(){
    
  $consumer_key = "6dIMPa90X5Enw6oSBPiWOFQfa";
  $consumer_secret = "Oe6KZUrrHqTOxH5W6LedggjSttgUcIyIlSB9VyiymnSVTnFjQn";
  $access_token = "3695533399-vAm0cUHhAIBQO0wVJo97mHjdFQitRRyqG7XfNsO";
  $access_token_secret = "ChiTCAwd2vklgBzgdHo6DAOnA6PANPMARJyVhBwR83CvI";

  $twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);
    
  $query = $this->input->post('keyword');
    
  $data['tweets'] = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q='.$query. '&lang=en&tweet_mode=extended&truncated=false&result_type=recent&count=300');
  

  $this->load->view('Dashboard/user_dashboard', $data);
  
  
  }



	
}