<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Main application controller
class Gre extends CI_Controller
{
	//will be called everytime

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('getip');
		$this->load->library('bookmark');
	}
	function index()
	{
		$this->home();
	}

	function home()
	{
		$this->load->view('newHome');
	}

	// register and login/logout functions -- begin

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'gre/home');
	}

	function login()
	{
		$logged_in = $this->session->userdata('name');
		if($logged_in)
			redirect(base_url().'gre/home');
		$data['showLogin'] = "true";
		$data['userIP'] = $this->getip->getRealIpAddr();
		$this->load->view('temp',$data);
	}

	function authenticate()
	{
		$logged_in = $this->session->userdata('name');
		if($logged_in)
			redirect(base_url().'gre/home');
		$data['showLogin'] = "true";
		$this->load->view('newRegister',$data);
	}

	function setUserIn()
	{
		if(sizeof($_POST) < 1 || sizeof($_POST) > 2)
		{
			redirect(base_url().'gre/login');
		}
		else
		{
			if(sizeof($_POST) == 1)
			{
				$uid = $_POST['uid'];
				$this->db->where('uid', $uid);
				$query = $this->db->get('users');
				if($query->num_rows() != 1)
				{
					echo "<div class='alreadyExisting' style='margin-bottom: 0px; width: 350px;'>";
					echo "We found that you have not registered with us yet. ";
					echo "<a href='".base_url('gre/authenticate')."'>Click here to register!</a>";
					echo "</div>";
				}
				else
				{
					$data['uid'] = $uid;
					$data['logged_in'] = "y";
					foreach ($query->result() as $row) {
						$data['email'] = $row->email;
						$data['name'] = $row->name;
					}
					$this->session->set_userdata($data);
					echo "<meta http-equiv=\"refresh\" content=\"1;\" URL=\"".base_url('gre/home')."\"/>";
				}
			}
			else
			{
				$email = $_POST['email'];
				$password = $_POST['password'];

				$this->db->where('email', $email);
				$this->db->where('password', $password);

				$query = $this->db->get('users');
				if($query->num_rows() != 1)
				{
					echo "<div class='alreadyExisting' style='color: red; margin-bottom: 0px; width: 200px;'>";
					echo "Invalid credentials!";
					echo "</div>";
				}
				else
				{
					$data['uid'] = "notAFacebookUser";
					$data['logged_in'] = "y";
					$data['email'] = $email;
					foreach ($query->result() as $row) {
						$data['name'] = $row->name;
					}					
					$this->session->set_userdata($data);
					echo "<meta http-equiv=\"refresh\" content=\"1;\" URL=\"".base_url('gre/home')."\"/>";
				}
			}
		}
	}
	// register and login functions -- end

	//word functions
		//page generating words
	function words($wordNo = 1)
	{
		//$totalNumOfWordsInDb = 4495;
		$totalNumOfWordsInDb = 3758;

		if(!is_numeric($wordNo))
			$wordNo = 1;
		if($wordNo < 1 || $wordNo > $totalNumOfWordsInDb)
			$wordNo = 1;

		$query= $this->db->get_where('words', array('wordNo' => $wordNo));

		// Starts here
		$row1 = $query->first_row();
		$startAlp = substr($row1->word, 0, 1);
		$wordNo = $row1->wordNo;

		$this->db->like('word', $startAlp, 'after');
		$this->db->order_by("wordNo", "asc");
		$query2 = $this->db->get('words');

		$firstRow = $query2->first_row();
		$lastRow = $query2->last_row();
		
		$firstWordNo = $firstRow->wordNo;
		$lastWordNo = $lastRow->wordNo;

		$alpWordNo = $wordNo - $firstWordNo + 1;
		$alpTotalWords = $lastWordNo - $firstWordNo + 1;

		$data['startAlp'] = $startAlp;
		$data['alpWordNo'] = $alpWordNo;
		$data['alpTotalWords'] = $alpTotalWords;
		$this->load->library('bookmark');
		
		$logged_in = $this->session->userdata('logged_in');
		$email = $this->session->userdata('email');
		if($logged_in && $logged_in == "y")
			$data['bookmark'] = $this->bookmark->getStatus($email,$wordNo);
		
		// Ends here

		$data['query'] = $query;
		if ($wordNo == 1) {
			$data['prev'] = "gre/words/$totalNumOfWordsInDb";
		}
		else {
			$data['prev'] = "gre/words/".($wordNo-1);
		}
		if ($wordNo == $totalNumOfWordsInDb) {
			$data['next'] = "gre/words/1";
		}
		else {
			$data['next'] = "gre/words/".($wordNo+1);
		}
		$this->load->view('newWords',$data);
	}
	function gotoWord()
	{
		if(sizeof($_POST) == 0)
		{
			redirect(base_url().'gre/words/1');
		}
		$this->db->limit(1);
		$this->db->where('word',$_POST['word']);
		$query = $this->db->get('words');
		$wordNo = "1";
		if($query->num_rows() == 1)
		{
			foreach ($query->result() as $row) {
				$wordNo = $row->wordNo;
			}
		}
		else
		{
			$wordNo = "1";
		}
		redirect(base_url().'gre/words/'.$wordNo);
	}
	function wordSearch()
	{
		if(sizeof($_POST) != 1)
		{
			redirect(base_url('gre/words/1'));
		}
		$word = $_POST['word'];

		$this->db->like('word', $word, 'after');
		$this->db->order_by("word", "asc");
		$this->db->limit(5);
		$query = $this->db->get('words');

		foreach ($query->result() as $row)
		{
			echo '<div class="wildCard">'.$row->word.'</div>';
		}
	}
	function tests()
	{
		$logged_in = $this->session->userdata('logged_in');
		if(!$logged_in)
			redirect(base_url().'gre/login');		

		$data['noChat'] = "no";
		$this->load->view('tests',$data);
	}
	function notes()
	{
		$this->load->view('newNotes');
	}
	function note($page = "welcome")
	{
		$this->db->where('viewStatus', 1);
		$this->db->where('noteShortName', $page);
		$query = $this->db->get('notes');
		if($query->num_rows() == 1){
			$data['q'] = $query;
			$data['title'] = $query->row()->noteTitle;
			$this->load->view('note',$data);
		}
		else {
			show_404();
		}
	}
	function events()
	{
		$this->db->where('viewStatus','show');
		$this->db->order_by("eventDate", "asc");
		$data['query'] = $this->db->get('events');

		$this->load->view('events',$data);
	}
	function aboutus()
	{
		$this->load->view('aboutus');
	}

	function contactus()
	{
		$this->load->view('underConstruction');
	}
	function careers()
	{
		$this->load->view('newCareers');
	}
	function offices()
	{
		$this->load->view('offices');
	}
	function feedback()
	{
		$this->db->where('viewStatus','show');
		$this->db->order_by("date", "desc");
		$data['query'] = $this->db->get('feedback');

		$this->load->view('newFeedback',$data);	
	}
	function faqs()
	{
		$this->db->where('viewStatus','show');
		//$this->db->order_by("date", "desc");
		$data['q'] = $this->db->get('faqs');

		$this->load->view('faqs', $data);
	}
	function edit($str = "template")
	{
		//die();
		if($str != "template")
		{
			$data["q"] = $this->db->get($str);
			$this->load->view($str.'edit',$data);
		}
		else
			$this->load->view($str.'edit');	
	}
	function insert($table = "invalid")
	{
		//die();
		if($table == "invalid")
		{
			redirect(base_url().'gre/edit');	
		}
		else if(sizeof($_POST) != 0)
		{
			if($table == "chat")
			{
				$_POST['userIP'] = $this->getip->getRealIpAddr();;
			}
			$this->db->insert($table, $_POST);
		}
		redirect(base_url().'gre/edit/'.$table);
	}
	function update($table = "invalid", $id = "99999")
	{
		//die();
		if($table == "invalid")
		{
			redirect(base_url().'gre/edit');	
		}
		else if(sizeof($_POST) != 0)
		{
			$temp = "id";
			if($table == "events")
			{	
				$temp = "eventId";
			}
			else if($table == "faqs")
			{
				$temp = "faqId";
			}
			else if($table == "notes")
			{
				$temp = "noteId";	
			}
			else if($table == "tests")
			{
				$temp = "testId";	
			}
			else if($table == "chat")
			{
				$temp = "chatId";
			}
			else if($table == "users")
			{
				$temp = "email";
				$id = $_POST['email'];	
			}
			else if($table == "words")
			{
				$temp = "wordNo";
				$id = $_POST['wordNo'];	
			}			
			$this->db->where($temp,$id);
			$this->db->update($table, $_POST);
			echo "y";
		}
		else
			redirect(base_url().'gre/edit/'.$table);
	}
	function delete($table = "invalid", $id = "99999")
	{
		//die();
		if($table == "invalid")
		{
			redirect(base_url().'gre/edit');	
		}
		else if(sizeof($_POST) != 0)
		{
			$temp = "id";
			if($table == "events")
			{	
				$temp = "eventId";
			}
			else if($table == "faqs")
			{
				$temp = "faqId";
			}
			else if($table == "notes")
			{
				$temp = "noteId";	
			}
			else if($table == "tests")
			{
				$temp = "testId";	
			}
			else if($table == "chat")
			{
				$temp = "chatId";
			}
			else if($table == "users")
			{
				$temp = "email";
				$id = $_POST['email'];
			}
			else if($table == "words")
			{
				$temp = "wordNo";
				$id = $_POST['wordNo'];
			}
			$this->db->where($temp,$id);
			$this->db->delete($table);
			echo "y";
		}
		else
			redirect(base_url().'gre/edit/'.$table);
	}

	function recordfeedback()
	{
		if(sizeof($_POST) != 0)
		{
			if(!ctype_space($_POST['name']) || !ctype_space($_POST['name']))
			{
				if(strlen($_POST['name']) < 21 && strlen($_POST['name']) > 0 && strlen($_POST['comment']) < 250 && strlen($_POST['comment']) > 0)
				{
					$nam = $_POST['name'];
					$comm = $_POST['comment'];
					$_POST['viewStatus'] = "hide";
					$this->db->insert('feedback', $_POST);

					// Sending email
					$this->load->library('email');
			        $this->email->set_newline("\r\n");
			        $config['protocol'] = 'smtp';
			        $config['smtp_host'] = 'mail.thebuff.org';
			        $config['smtp_port'] = '26';
			        $config['smtp_user'] = 'admin@thebuff.org';
			        $config['smtp_from_name'] = 'TheBuff.Org';
			        $config['smtp_pass'] = 'gbas13989';
			        $config['wordwrap'] = TRUE;
			        $config['newline'] = "\r\n";
			        $config['mailtype'] = 'html';                       

			        $this->email->initialize($config);

			        $this->email->from($config['smtp_user'], $config['smtp_from_name']);
			        $this->email->to("feedbacks@thebuff.org");
			        $this->email->subject("New Feedback");
			        $this->email->message("New feedback by: ".$nam."<br/> Feedback: ".$comm."<br/> Please remember to approve the feedback so that it can be published on the website.");

			        if($this->email->send()) {
			            echo "";        
			        } else {
			            echo "";
			        } 
			        // email sent :P hopefully
				}
			}	
		}
		echo "";
	}
	function recordChat()
	{
		$logged_in = $this->session->userdata('logged_in');
		if(!$logged_in || $logged_in != "y")
		{
			echo "<meta http-equiv=\"refresh\" content=\"0;url=".base_url('gre/login')."\">";
			die();
		}

		if(sizeof($_POST) == 1)
		{
			$chat = $_POST['chat'];
			$pass = true;
			if(strpos($chat,"--") !== false || strpos($chat,"<") !== false || strpos($chat,">") !== false || strpos($chat,"script") !== false)
			{
				$checkWords = array("--", ">", "<", "script");
				$chat = str_replace($checkWords, "****", $chat);
				$pass = false;
			}


			$data['chatFor'] = $this->session->userdata('email');
			$data['name'] = $this->session->userdata('name');
			$data['chat'] = $chat;
			$data['userIP'] = $this->getip->getRealIpAddr();

			$viewStatus = "show";

			if(!$pass)
				$viewStatus = "hide";

			$data['viewStatus'] = $viewStatus;
			$this->db->insert('chat', $data);

			// send email to adming after chat
			$this->load->library('email');
	        $this->email->set_newline("\r\n");
	        $config['protocol'] = 'smtp';
	        $config['smtp_host'] = 'mail.thebuff.org';
	        $config['smtp_port'] = '26';
	        $config['smtp_user'] = 'admin@thebuff.org';
	        $config['smtp_from_name'] = 'TheBuff.Org - Chat';
	        $config['smtp_pass'] = 'gbas13989';
	        $config['wordwrap'] = TRUE;
	        $config['newline'] = "\r\n";
	        $config['mailtype'] = 'html';                       

	        $this->email->initialize($config);

	        $this->email->from($config['smtp_user'], $config['smtp_from_name']);
	        $this->email->to("chat@thebuff.org");
	        $this->email->subject("New Query/Comment - ".$this->session->userdata('name'));
	        $this->email->message("Query/Comment: ".$chat);
	        $this->email->send();
			// email sent
		}
		echo "success";
	}
	function getChat()
	{
		$logged_in = $this->session->userdata('logged_in');
		if(!$logged_in || $logged_in != "y")
		{
			echo "<meta http-equiv=\"refresh\" content=\"0;url=".base_url('gre/login')."\">";
			die();
		}
		if(sizeof($_POST) == 1)
		{
			$chatId = $_POST['chatId'];
			$this->db->where('chatFor',$this->session->userdata('email'));
			$this->db->where('viewStatus','show');
			$this->db->where('chatId > ',$chatId);
			$this->db->order_by('chatId');
			$query = $this->db->get('chat');

			foreach($query->result() as $row){
				echo '<div class="chatItem">
					  <div class="chatId">'.$row->chatId.'</div>
					  <div class="userName">'.ucwords($row->name).'</div>
					  <div class="chatTime">at '.date('H:i', strtotime($row->time) + 11.5 * 3600)." on ".date('d-m-Y', strtotime($row->time) + 11.5 * 3600).' (IST)</div>
					  <div class="clear"></div>
					  <div class="chatText">'.$row->chat.'</div>
					  </div>';
			}
			echo "";
		}
		else
			echo "";
	}

	function changeWord()
	{
		//$totalNumOfWordsInDb = 4495;
		$totalNumOfWordsInDb = 3758;
		if(sizeof($_POST) != 1)
		{
			echo "<meta http-equiv=\"refresh\" content=\"0;url=".base_url('gre/home')."\">";
			die();
		}

		$wordNo = $_POST['wordNo'];

		if(!is_numeric($wordNo))
			$wordNo = 1;
		if($wordNo < 1)
			$wordNo = $totalNumOfWordsInDb;
		else if($wordNo > $totalNumOfWordsInDb)
			$wordNo = 1;

		$query= $this->db->get_where('words', array('wordNo' => $wordNo));

		// Starts here
		$row1 = $query->first_row();
		$startAlp = substr($row1->word, 0, 1);
		$wordNo = $row1->wordNo;

		$this->db->like('word', $startAlp, 'after');
		$this->db->order_by("wordNo", "asc");
		$query2 = $this->db->get('words');

		$firstRow = $query2->first_row();
		$lastRow = $query2->last_row();
		
		$firstWordNo = $firstRow->wordNo;
		$lastWordNo = $lastRow->wordNo;

		$alpWordNo = $wordNo - $firstWordNo + 1;
		$alpTotalWords = $lastWordNo - $firstWordNo + 1;
			
		$this->load->library('bookmark');
		
		$logged_in = $this->session->userdata('logged_in');
		$email = $this->session->userdata('email');
		if($logged_in && $logged_in == "y")
			$bookmark = $this->bookmark->getStatus($email,$wordNo);

		foreach($query->result() as $word)
		{
			echo "<div style='display: none;' id='wordNoStar'>".$word->wordNo."</div>";
			echo "<div id='wordNo' style='position: absolute; font-size:12px; font-style: italic;'><div id='wordNo1' style='display: none; width: 100px;'>".$word->wordNo." / $totalNumOfWordsInDb (all)</div><div id='wordNo2' style='position: absolute; top: 0px; left: 0px; width: 100px;'>".$alpWordNo." / ".$alpTotalWords." (".$startAlp.")</div></div>";
			if($logged_in && $logged_in == "y")
			{	
				// echo "<div id='bookmark' style='position: absolute; top: 100px; right: 80px;'>";
				if($bookmark == "y")
				{
					echo "<div style='display: none;' id='bk'>y</div>";
					// echo "<img id='marked' src='/images/bookmarkgreen.png' width='30' height='30'/>";
				}
				else if($bookmark == "n")
				{
					echo "<div style='display: none;' id='bk'>n</div>";
					// echo "<img id='unmarked' src='/images/bookmark.png' width='30' height='30'/>";
				}
				// echo "</div>";
			}
			$wordMeaning = $word->meaning;
			$wordMeaning = strtolower($wordMeaning);

			echo 	"<div style='display: table-cell; vertical-align: middle; text-align: center;'>";
			echo 	"<div id='word'><a target='_blank' href='http://www.merriam-webster.com/dictionary/".$word->word."'>".$word->word."</a></div>";
			echo 	"<div id='usage'><img src='/images/audio.png' width='25px' height='25px' id='audioWord' title='".$word->word."' style='cursor: pointer;'/></div>";
			echo 	"<div id='meaning' style='font-size: 16px;'>".str_replace("ex.", "Ex.",str_replace(";", "<br/>", $wordMeaning))."</div>";
			echo 	"<div id='sentence'>".$word->sentence."</div>";
			echo "</div>";
		}
	}
	function bookmark()
	{
		$logged_in = $this->session->userdata('logged_in');
		if($logged_in && $logged_in == "y")
		{
			if(sizeof($_POST) > 0)
			{
				$email = $this->session->userdata('email');
				$this->load->library('bookmark');
				echo $this->bookmark->markWord($email,$_POST['wordNo']);
			}
			else
			{
				echo "invalid";
			}
		}
		else
		{
			echo "invalid";
		}
	}
	function bookmarks()
	{
		die();
		$logged_in = $this->session->userdata('logged_in');
		if(sizeof($_POST) > 0 || !$logged_in || $logged_in != "y")
		{
			redirect(base_url().'gre/home');
			die();
		}
		$email = $this->session->userdata('email');
		// $this->db->where('email',$email);
		$this->db->order_by('wordNo');
		$data['query'] = $this->db->get('bookmark');
		$this->load->view('bookmarks',$data);
	}
	function getFeedbackContent()
	{
		$this->load->view('feedbackPopUp');	
	}

	function practice()
	{
		$this->load->view('practice');
	}
	function getPractice($type = "default", $no = "1")
	{
		if($type == "default")
		{
			show_404();
		}
		if($type == "textCompletion")
		{
			$data['no'] = $no;
			$this->load->view("textCompletion", $data);
		}
	}
}