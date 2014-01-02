<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Main application controller
class Ct2013 extends CI_Controller
{
	//will be called everytime

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->home();
	}

	function home()
	{
		$this->load->view('ct2013view');
	}
}