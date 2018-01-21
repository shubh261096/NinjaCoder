<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


include APPPATH.'libraries/twitteroauth.php';

$config['consumer_key'] = "6dIMPa90X5Enw6oSBPiWOFQfa";
$config['consumer_secret'] = "Oe6KZUrrHqTOxH5W6LedggjSttgUcIyIlSB9VyiymnSVTnFjQn";
$config['access_token'] = "3695533399-vAm0cUHhAIBQO0wVJo97mHjdFQitRRyqG7XfNsO";
$config['access_token_secret'] = "ChiTCAwd2vklgBzgdHo6DAOnA6PANPMARJyVhBwR83CvI";



$twitter = new TwitterOAuth($config['consumer_key'],$config['consumer_secret'],$config['access_token'] ,$config['access_token_secret']);





?>


