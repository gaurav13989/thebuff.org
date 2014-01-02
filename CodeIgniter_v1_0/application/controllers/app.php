<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Main application controller
class App extends CI_Controller
{
	//will be called everytime

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');

		redirect(base_url().'CodeIgniter_v1_0/index.php/v1_0');
		die();

/*		$data['logMsg'] = "";

		$is_logged_in = $this->session->userdata('is_logged_in');
		if(isset($is_logged_in))
			$data['logMsg'] = "Welcome!";
		else
			$data['logMsg'] = "login";*/
	}



	//will be by called default if no function is mentioned after the controller part i.e. app, in the url and also if index is mentioned
	public function index()
	{
		$data['logMsg'] = "";

		$is_logged_in = $this->session->userdata('is_logged_in');
		$username = $this->session->userdata('username');
		if($is_logged_in == true)
			$data['logMsg'] = 'Welcome '.$username.'! <div style="font-style:italic; display:inline;">'.anchor(base_url().'app/logout','(logout)').'</div>';
		else
			$data['logMsg'] = anchor(base_url().'app/login','Click to Login');

		$this->db->order_by("id", "desc"); 
		$this->db->limit(20);
		$data['queryHome'] = $this->db->get('home');

		$this->db->order_by("eventId", "desc"); 
		$this->db->limit(20);
		$data['queryEvents'] = $this->db->get('events');

		$this->db->order_by("noteId", "desc"); 
		$this->db->limit(20);
		$data['queryNotes'] = $this->db->get('notes');
		

		$this->load->view('home',$data);
		//menu to be loaded last
		$this->load->view('menu');
	}
	
	//will be called only if the url has contactUs after app in the url	
	public function home()
	{
		//will call the index function of this class
		$this->index();
	}

	//will be called only if the url has contactUs after app in the url
	public function contactUs()
	{
		echo "contact us page";

		//menu to be loaded last
		$this->load->view('menu');
	}

	//will be called only if the url has freeGre after app in the url
	public function freeGre()
	{
		$data['logMsg'] = "";

		$is_logged_in = $this->session->userdata('is_logged_in');
		$username = $this->session->userdata('username');
		if($is_logged_in == true)
			$data['logMsg'] = 'Welcome '.$username.'! <div style="font-style:italic; display:inline;">'.anchor(base_url().'app/logout','(logout)').'</div>';
		else
			$data['logMsg'] = anchor(base_url().'app/login','Click to Login');


		$this->load->view('freeGre',$data);
		//menu to be loaded last
		$this->load->view('menu');
	}

	//will be called only if the url has careers after app in the url

	public function careers()
	{
		$data['logMsg'] = "";

		$is_logged_in = $this->session->userdata('is_logged_in');
		$username = $this->session->userdata('username');
		if($is_logged_in == true)
			$data['logMsg'] = 'Welcome '.$username.'! <div style="font-style:italic; display:inline;">'.anchor(base_url().'app/logout','(logout)').'</div>';
		else
			$data['logMsg'] = anchor(base_url().'app/login','Click to Login');

		$this->load->view('careers',$data);
		//menu to be loaded last
		$this->load->view('menu');		
	}
	
	//will be called only if the url has feedback after app in the url
	public function feedback()
	{
		$data['logMsg'] = "";
		
		$is_logged_in = $this->session->userdata('is_logged_in');
		$username = $this->session->userdata('username');
		if($is_logged_in == true)
			$data['logMsg'] = 'Welcome '.$username.'! <div style="font-style:italic; display:inline;">'.anchor(base_url().'app/logout','(logout)').'</div>';
		else
			$data['logMsg'] = anchor(base_url().'app/login','Click to Login');

		$this->db->order_by("id", "desc"); 
		$this->db->limit(20);
		$data['query'] = $this->db->get('feedback');
		
		$this->db->select('feedbackId');
		$query = $this->db->get_where('feedbacklikesdislikes',array('userId' => $username));

		$data['feedbacks'] = $query->row_array();

		$this->load->view('feedback',$data);
		//menu to be loaded last
		$this->load->view('menu');
	}

	//will be called when the submit button on the feedback page is pressed
	public function feedback_insert()
	{
		if(sizeof($_POST) != 0)
		{
			$this->db->insert('feedback', $_POST);
		}
		redirect(base_url().'app/feedback');
	}

	//will be called only if the url has words/wordNo after app in the url
	public function words($wordNo=1)
	{
		$data['logMsg'] = "";

		$is_logged_in = $this->session->userdata('is_logged_in');
		$username = $this->session->userdata('username');
		if($is_logged_in == true)
			$data['logMsg'] = 'Welcome '.$username.'! <div style="font-style:italic; display:inline;">'.anchor(base_url().'app/logout','(logout)').'</div>';
		else
			$data['logMsg'] = anchor(base_url().'app/login','Click to Login');

		if(!is_numeric($wordNo))
			$wordNo = 1;
		if($wordNo < 1 || $wordNo > 5014)
			$wordNo = 1;

		$data['query'] = $this->db->get_where('words', array('wordNo' => $wordNo));
		
		if ($wordNo == 1) {
			$data['prev'] = "app/words/1";
		}
		else {
			$data['prev'] = "app/words/".($wordNo-1);
		}
		if ($wordNo == 5014) {
			$data['next'] = "app/words/5014";
		}
		else {
			$data['next'] = "app/words/".($wordNo+1);
		}
		
		$this->load->view('words',$data);
		//menu to be loaded last
		$this->load->view('menu');		
	}

	//will be called only if the url has knowus after app in the url
	public function knowus()
	{
		echo "know us";
		//menu to be loaded last
		$this->load->view('menu');		
	}

	public function login()
	{
		//check if logged in then redirect to home page
		$is_logged_in = $this->session->userdata('is_logged_in');
		if($is_logged_in == true)
			redirect(base_url().'app/home');


		$data["error"] = "";

		if(sizeof($_POST) != 0)
		{

			$userId = $_POST['userId'];
			$password = $_POST['password'];

			if($userId == "" || $password == "")
				$error = "Please enter all credentials for signing in!";
			else
			{
				//$this->db->select('userId');
				$query = $this->db->get_where('userbase',array('userId' => $userId,'userPassword' => $password));
				$row = $query->row_array();
				if($query->num_rows() == 1)
				{
					$data = array(
						'username' => $userId,
						'is_logged_in' => true,
						'email' => $row['userEmail']
					);

					$this->session->set_userdata($data);
					redirect(base_url().'app/home');
				}
				else
				{
					$error = "Invalid credentials! Please retry!";
				}
			}

			$data['error'] = $error;
		}

		$this->load->view('login',$data);
		$this->load->view('menu');
	}

/*	public function loginError()
	{
		//check if logged in then redirect to home page

		$valid = true;
		$error = "";

		$userId = "";
		$password = "";

		if(sizeof($_POST) != 0)
		{
			$userId = $_POST['userId'];
			$password = $_POST['password'];
		}


		$this->load->view('login',$data);
		$this->load->view('menu');
	}*/
	public function register($data = null)
	{
		//check if logged in then redirect to home page	
		$is_logged_in = $this->session->userdata('is_logged_in');
		if($is_logged_in == true)
			redirect(base_url().'app/home');
		
		if($data == null)
		{
			$data["error1"] = "";
			$data["error2"] = "";
			$data["error3"] = "";
			$data["error4"] = "";
			$data["error5"] = "";
			$data["error6"] = "";
		}
		$this->load->view('register',$data);
		$this->load->view('menu');		
	}

	public function registerError()
	{
		if(sizeof($_POST) == 0)
			redirect(base_url().'app/register');	

		$is_logged_in = $this->session->userdata('is_logged_in');
		if(isset($is_logged_in) && $is_logged_in == true)
		{
			redirect(base_url().'app/home');		
		}	
		//check if logged in then redirect to home page


		// redirect(base_url().'app/register');	
		//setting all errors to empty strings
		$valid = true;
		$error1 = "";
		$error2 = "";
		$error3 = "";
		$error4 = "";
		$error5 = "";
		$error6 = "";
		$error7 = "";
		$error8 = "";

		$userId = "";
		$password1 = "";
		$password2 = "";
		$firstName = "";
		$lastName = "";
		$email = "";
		$contact = "";

		//retrieving form fields
		if(sizeof($_POST) != 0)
		{
			$userId = $_POST['userId'];
			$password1 = $_POST['userPassword'];
			$password2 = $_POST['confirmPass'];
			$firstName = $_POST['userFirstName'];
			$lastName = $_POST['userLastName'];
			$email = $_POST['userEmail'];
			$contact = $_POST['userContact'];
		}		

		$userId = strtolower($userId);
		
		if($userId == "")
		{
			$error1 = "Please enter a user name. Alphanumeric, length 6-12";
			$valid = false;
			//echo $error1;
		}
		else if($userId == "username")
		{
			$error1 = "Please enter another user name. Alphanumeric, length 6-12";
			$valid = false;
		}
		else if(!ctype_alnum($userId))
		{
			$error1 = "Only alphanumeric values having lengths between 6 and 12 are allowed";
			$valid = false;
			//echo $error1;
		}
		else if(strlen($userId) < 6 || strlen($userId) > 12)
		{
			$error1 = "Length of your username should be between 6 and 12";
			$valid = false;	
			//echo $error1;
		}
		else
		{
			//checking if id already exists
			$this->db->select('userId');
			$query = $this->db->get_where('userbase',array('userId' => $userId));
			if($query->num_rows() != 0)
			{
				$dbUserId = $query->row('0')->userId;
				if($dbUserId == $userId)
				{
					$error1 = "User Id already exists. Please select another Id";
					$valid = false;
					//echo $error1;
				}
			}
		}

		if($password1 == "" || $password2 == "")
		{
			if($password2 == "")
				$error2 = "Please re-enter password. Length between 6 and 12";
			if($password1 == "")
				$error2 = "Please enter password. Length between 6 and 12";
			$valid = false;
		}
		else if($password1 != $password2)
		{
			$error2 = "Passwords do not match";
			$valid = false;
			//echo $error2;
		}
		else if(strlen($password1) < 6 || strlen($password1) > 12)
		{
			$error2 = "Password length should be between 6 and 12";
			$valid = false;
			//echo $error2;
		}

		if($firstName == "")
		{
			$error3 = "Please enter your first name";
			$valid = false;
			//echo $error3;
		}
		else if(!ctype_alpha($firstName))
		{
			$error3 = "Invalid first name";
			$valid = false;
			//echo $error3;
		}
		else if(strlen($firstName) > 20)
		{
			$error3 = "Maximum length of first name can be 20";
			$valid = false;
			//echo $error3;
		}

		if($lastName == "")
		{
			$error4 = "Please enter your last name";
			$valid = false;
			//echo $error4;
		}
		else if(!ctype_alpha($lastName))
		{
			$error4 = "Invalid last name";
			$valid = false;
			//echo $error4;
		}
		else if(strlen($lastName) > 20)
		{
			$error4 = "Maximum length of last name can be 20";
			$valid = false;
			//echo $error4;
		}
		
		if(strlen($contact) > 13)
		{
			$error5 = "Invalid contact. Length should be less than 13";
			$valid = false;
			//echo $error5;
		}

		if($email == "")
		{
			$error6 = "Please enter a valid email id";
			$valid = false;
			//echo $error6."asdasd";
		}
		else if(strlen($email) > 30)
		{
			$error6 = "Email id length cannot exceed 30";
			$valid = false;
			//echo $error6."asdasd";
		}
		else
		{
			$emailValid = preg_match('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^', $email);
			//echo $emailValid."<---WTF";
			if($emailValid == 0)
			{
				$error6 = "Invalid email id";
				$valid = false;
			}
		}
		if($error6 == "")
		{
			$this->db->select('userEmail');
			$query = $this->db->get_where('userbase',array('userEmail' => $email));
			if($query->num_rows() != 0)
			{
				$dbUserEmail = $query->row('0')->userEmail;
				if($dbUserEmail == $email)
				{
					$error6 = "Email id already used for registration";
					$valid = false;
					//echo $error1;
				}
			}			
		}
	
		//die();
		
		//echo $query;

		if($valid == false)
		{
			$data["error1"] = $error1;
			$data["error2"] = $error2;
			$data["error3"] = $error3;
			$data["error4"] = $error4;
			$data["error5"] = $error5;
			$data["error6"] = $error6;
			$this->register($data);
		}
		else
		{	
			$this->db->set('userId',$userId);
			$this->db->set('userPassword',$password1);
			$this->db->set('userFirstName',$firstName);
			$this->db->set('userLastName',$lastName);
			$this->db->set('userEmail',$email);
			$this->db->set('userCountry',"");
			$this->db->set('userContact',$contact);
			$this->db->insert('userbase');
			redirect(base_url().'app/login');	
		}
		
	}

	public function forgot()
	{

		$is_logged_in = $this->session->userdata('is_logged_in');
		if($is_logged_in == true)
			redirect(base_url().'app/home');


		if(sizeof($_POST) == 0)
		{
			redirect(base_url().'app/home');
		}

		$email = $_POST['email'];
		$username = "";
		$password = "";
		$this->db->select('userId,userPassword');
		$query = $this->db->get_where('userbase',array('userEmail' => $email));
		if($query->num_rows() != 0)
		{
			$username = $query->row('0')->userId;
			$password = $query->row('0')->userPassword;
		}
	/*		else
				redirect(base_url().'app/home');*/


		$config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'mail.thebuff.org',
		  'smtp_port' => 26,
		  'smtp_user' => 'donotreply@thebuff.org', // change it to yours
		  'smtp_pass' => 'gbas13989' // change it to yours
		);
		
		$this->load->library('email', $config);
		
		//VERY IMPORTANT LINE
		$this->email->set_newline("\r\n");

		$this->email->from('donotreply@thebuff.org','TheBuff.Org');
		$this->email->to($email);
		$this->email->subject('TheBuff.Org - Your Credentials');
		
		if($username == "" || $password == "")
			$this->email->message("Greetings from TheBuff\r\nSorry, but we couldn't find your credentials.\r\nVisit www.thebuff.org/app/register to register now!\r\nThanks and regards,\r\nTheBuff.Org");
		else
			$this->email->message("Greetings from TheBuff\r\nHere are your credentials\r\nUsername: ".$username."\r\n"."Password: ".$password."\r\nVisit www.thebuff.org/app/login to log in now!\r\nThanks and regards,\r\nTheBuff.Org");
		
		if($this->email->send()) {
			redirect(base_url().'app/login');
		}
		else{
			//redirect(base_url().'app/home');
			echo $this->email->print_debugger();
		}
	}

	public function logout()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if($is_logged_in)
		{
			$data = array('username' => '', 'is_logged_in' => 'false', 'email' => '');
			$this->session->unset_userdata($data);
		}
		redirect(base_url().'app/home');
	}

	public function wordsearch()
	{
		$data['logMsg'] = "";

		$is_logged_in = $this->session->userdata('is_logged_in');
		$username = $this->session->userdata('username');
		if($is_logged_in == true)
			$data['logMsg'] = 'Welcome '.$username.'! <div style="font-style:italic; display:inline;">'.anchor(base_url().'app/logout','(logout)').'</div>';
		else
			$data['logMsg'] = anchor(base_url().'app/login','Click to Login');	

		$this->load->view('wordsearch',$data);
		$this->load->view('menu');
	}

}
