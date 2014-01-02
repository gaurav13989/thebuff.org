<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Main application controller
class V1_0 extends CI_Controller
{
	//will be called everytime

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
	}
	function index()
	{
		$this->home();
	}
	function home()
	{
		$this->load->view('newHome');
	}
	function words()
	{
		$this->load->view('newWords');
	}
	function tests()
	{
		$this->load->view('tests');
	}
	function notes()
	{
		$this->load->view('newNotes');
	}
	function events()
	{
		$this->load->view('events');
	}
	function aboutus()
	{
		$this->load->view('underConstruction');
	}
	function contactus()
	{
		$this->load->view('underConstruction');
	}
	function careers()
	{
		$this->load->view('underConstruction');
	}
	function offices()
	{
		$this->load->view('underConstruction');
	}
	function feedback()
	{
		$this->load->view('underConstruction');	
	}
	function faqs()
	{
		$this->load->view('underConstruction');
	}
}