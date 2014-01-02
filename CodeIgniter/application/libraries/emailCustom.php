<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class EmailCustom
{
	
/*		public function __construct()
	{
		# code...
		parent::__construct();

	}*/

	function sendEmail()
	{
		

		$this->email->set_newline("\r\n");

		$this->email->from('thebuff.org@gmail.com','TheBuff.Org');
		$this->email->to('gaurav13989@gmail.com');
		
		$this->email->subject('this is an email test');

		$this->email->message('Its working. With attachment :D!');

		//Attaching files
		//$path = $this->config->item('server_root');
		//$file = $path . '/CodeIgniter/attachments/attachment1.txt';
		//$this->email->attach($file);

		if($this->email->send())
		{
			echo 'your email was sent fool. :D';
		}
		else
		{
			show_error($this->email->print_debugger());
		}
	}
}

