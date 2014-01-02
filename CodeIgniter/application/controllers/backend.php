<?php

class Backend extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
	}

	function index()
	{
		$backendLoggedIn = $this->session->userdata('backendLoggedIn');
		if($backendLoggedIn == false)
		{
			redirect(base_url().'backend/login');			
		}
		$this->load->view('backendMenu');
		$this->load->view('logoutButton');
	}

	function home()
	{
		$backendLoggedIn = $this->session->userdata('backendLoggedIn');
		if($backendLoggedIn == true)
		{
			$this->load->view('backendMenu');
			//
			$this->load->view('backendhome');
			//
			$this->load->view('logoutButton');
		}
		else
		{
			redirect(base_url().'backend/login');
		}
	}

	function events()
	{
		$backendLoggedIn = $this->session->userdata('backendLoggedIn');
		if($backendLoggedIn == true)
		{
			$this->load->view('backendMenu');
			//
			$this->load->view('backendevents');
			//
			$this->load->view('logoutButton');
		}
		else
		{
			redirect(base_url().'backend/login');
		}
	}

	function notes()
	{
		$backendLoggedIn = $this->session->userdata('backendLoggedIn');
		if($backendLoggedIn == true)
		{
			$this->load->view('backendMenu');
			//
			$this->load->view('backendnotes');
			//
			$this->load->view('logoutButton');
		}
		else
		{
			redirect(base_url().'backend/login');
		}
	}

	function userbase()
	{
		$backendLoggedIn = $this->session->userdata('backendLoggedIn');
		if($backendLoggedIn == true)
		{
			$this->load->view('backendMenu');
			//
			$this->load->view('backenduserbase');
			//
			$this->load->view('logoutButton');
		}
		else
		{
			redirect(base_url().'backend/login');
		}
	}

	function feedback()
	{
		$backendLoggedIn = $this->session->userdata('backendLoggedIn');
		if($backendLoggedIn == true)
		{
			
			$this->load->view('backendMenu');
			//
			$this->load->view('backendfeedback');
			//
			$this->load->view('logoutButton');
		}
		else
		{
			redirect(base_url().'backend/login');
		}
	}

	function login()
	{
		$password = "";
		if(sizeof($_POST) != 0 && isset($_POST['pass']))
		{
			$password = $_POST['pass'];
			if($password == "thegreatbuff" || $password == "letsfreetheworld")
			{
				$data = array(
					'backendLoggedIn' => true
				);
				$this->session->set_userdata($data);
			}
		}
		else
		{

		}

		$backendLoggedIn = $this->session->userdata('backendLoggedIn');
		if($backendLoggedIn == true)
		{
			redirect(base_url().'backend/home');
			//$this->load->view('home');	
		}
		else
		{
			//redirect(base_url().'backend/login');
			$this->load->view('backendLogin');
		}
	}

	function logout()
	{
		$data = array(
			'backendLoggedIn' => false
		);
		$this->session->set_userdata($data);

		$this->login();
	}
}