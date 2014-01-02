<?php

	define('FACEBOOK_APP_ID', '241223852666797');
	define('FACEBOOK_SECRET', 'b32fd391fd3f2f1e20e8482e0ddb16b3');

	function parse_signed_request($signed_request, $secret) {
	  list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

	  // decode the data
	  $sig = base64_url_decode($encoded_sig);
	  $data = json_decode(base64_url_decode($payload), true);

	  if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
	    error_log('Unknown algorithm. Expected HMAC-SHA256');
	    return null;
	  }

	  // check sig
	  $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
	  if ($sig !== $expected_sig) {
	    error_log('Bad Signed JSON signature!');
	    return null;
	  }

	  return $data;
	}

	function base64_url_decode($input) {
	    return base64_decode(strtr($input, '-_', '+/'));
	}

	if(isset($_REQUEST['signed_request'])) {
		$response = parse_signed_request($_REQUEST['signed_request'], FACEBOOK_SECRET);
		$uid = "notSet";
		$name = $response['registration']['name'];
		$email = $response['registration']['email'];
		$password = $response['registration']['password'];
		if(isset($response['user_id']))
			$uid = $response['user_id'];
		
		//echo $uid." ".$name." ".$email." ".$password;

		// check if user with email is present already
		$this->db->where('email',$email);
		$query1 = $this->db->get('users');

		$alreadyExisting = false;
		$facebookUser = "yes";

		// user with email already exists
		if($query1->num_rows() == 1)
		{
			if($uid != "notSet")
			{
				$this->db->where('uid',$uid);
				$this->db->where('email',$email);
				$query2 = $this->db->get('users');
				if($query2->num_rows() == 1)
				{
					// user already present, send to login page
					$alreadyExisting = true;
				}
				else
				{
					// update uid and password of user who had previously registered without facebook
					// and is not registering using facebook.
					$data['uid'] = $uid;
					$data['email'] = $email;
					$data['name'] = $name;
					$data['password'] = $password;
					$data['userIP'] = $userIP;

					$this->db->where('email',$email);
					$this->db->update('users', $data);
				}
			}
			else
			{
				$facebookUser = "no";
				$alreadyExisting = true;
			}
		}
		// new email id so new user
		else
		{
			$data['uid'] = "";
			if($uid != "notSet")
			{
				$data['uid'] = $uid;	
			}
			else
			{
				$facebookUser = "no";
				$data['uid'] = "";					
			}
			$data['email'] = $email;
			$data['name'] = $name;
			$data['password'] = $password;
			
			$data['userIP'] = $userIP;

			if($email && $name)
			$this->db->insert('users', $data);	
		}
		$data['alreadyExisting'] = $alreadyExisting;
		$data['facebookUser'] = $facebookUser;
		$this->load->view('newLogin',$data);
	}
	else {
		$this->load->view('newLogin');
	}
