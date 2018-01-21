<?php

$config = [
  
  		'add_user_rules' => [
  									[
						  				'field' => 'fullname',
						  				'label' => 'Full Name',
						  				'rules' => 'trim|required|max_length[20]'
						  			],
						  			[
						  				'field' => 'phone',
						  				'label' => 'Phone Number',
						  				'rules' => 'trim|required|numeric|max_length[10]|regex_match[/^[0-9]{10}$/]'

						  			],
						  			[
						  				'field' => 'email',
						  				'label' => 'Email Address',
						  				'rules' => 'trim|required|valid_email'

						  			],
						  			[
						  				'field' => 'password',
						  				'label' => 'Password',
						  				'rules' => 'trim|required'
						  			]
  							],


  		'login_rules' => [
						  			[
						  				'field' => 'email',
						  				'label' => 'Email Address',
						  				'rules' => 'trim|required|valid_email'

						  			],
						  			[
						  				'field' => 'password',
						  				'label' => 'Password',
						  				'rules' => 'trim|required'
						  			]
  						],

  		'upload_rules' => [
						  			[
						  				'field' => 'flat',
						  				'label' => 'Flat',
						  				'rules' => 'trim|required'

						  			],
						  			[
						  				'field' => 'amount',
						  				'label' => 'Amount',
						  				'rules' => 'trim|required'
						  			]
  						],
		'restaurants_rules' => [
						  			[
						  				'field' => 'restname',
						  				'label' => 'Restaurant Name',
						  				'rules' => 'trim|required'

						  			],
						  			[
						  				'field' => 'city',
						  				'label' => 'City',
						  				'rules' => 'trim|required'
						  			],
						  			[
						  				'field' => 'location',
						  				'label' => 'Location',
						  				'rules' => 'trim|required'
						  			],
						  			[
						  				'field' => 'type',
						  				'label' => 'Type',
						  				'rules' => 'trim|required'
						  			],
						  			[
						  				'field' => 'deliverytime',
						  				'label' => 'Delivery time',
						  				'rules' => 'trim|required'
						  			],
						  			[
						  				'field' => 'pickup_time',
						  				'label' => 'PickUp time',
						  				'rules' => 'trim|required'
						  			]
  						],
		'menu_rules' => [
						  			[
						  				'field' => 'rest_name',
						  				'label' => 'Restaurant Name',
						  				'rules' => 'trim|required'

						  			],
						  			[
						  				'field' => 'item_type',
						  				'label' => 'Item Type',
						  				'rules' => 'trim|required'
						  			],
						  			[
						  				'field' => 'item_name',
						  				'label' => 'Item Name',
						  				'rules' => 'trim|required'
						  			],
						  			[
						  				'field' => 'price',
						  				'label' => 'Price',
						  				'rules' => 'trim|required'
						  			],
						  			[
						  				'field' => 'description',
						  				'label' => 'Description',
						  				'rules' => 'trim|required'
						  			]
						  			
  						],
  		'register_user_rules' => [
  									[
						  				'field' => 'username',
						  				'label' => 'User Name',
						  				'rules' => 'trim|required|max_length[20]'
						  			],
						  			[
						  				'field' => 'email',
						  				'label' => 'Email Address',
						  				'rules' => 'trim|required|valid_email'

						  			],
						  			[
						  				'field' => 'password',
						  				'label' => 'Password',
						  				'rules' => 'trim|required'
						  			],
						  			[
						  				'field' => 'pass_confirm',
						  				'label' => 'Confirm Password',
						  				'rules' => 'trim|required|matches[password]'

						  			]
  							],

  		'add_user_man_rules' => [
  									[
						  				'field' => 'username',
						  				'label' => 'User Name',
						  				'rules' => 'trim|required|max_length[20]'
						  			],
						  			[
						  				'field' => 'email',
						  				'label' => 'Email Address',
						  				'rules' => 'trim|required|valid_email'

						  			],
  							]


];

?>