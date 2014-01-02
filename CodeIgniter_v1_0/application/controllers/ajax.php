<?php

class ajax extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		if(sizeof($_POST) == 0)
		{
			redirect(base_url().'app');
		}
	}

	public function index()
	{
		echo "this is index. check the url";
	}

	public function testUserName()
	{
		if(sizeof($_POST) == 0)
		{
			redirect(base_url().'app');
		}
		$value = $_POST['value'];
		$this->db->select('userId');
		$query = $this->db->get_where('userbase',array('userId' => $value));
		if($query->num_rows() != 0)
		{
			$dbUserId = $query->row('0')->userId;
			if($dbUserId == $value)
			{
				echo "User Id already exists. Please select another Id";
			}
			else
				echo "";
		}
	}

	public function testEmail()
	{
		if(sizeof($_POST) == 0)
		{
			redirect(base_url().'app');
		}
		$value = $_POST['value'];
		$this->db->select('userEmail');
		$query = $this->db->get_where('userbase',array('userEmail' => $value));
		if($query->num_rows() != 0)
		{
			$dbUserEmail = $query->row('0')->userEmail;
			if($dbUserEmail == $value)
			{
				echo "Email id already used for registration";
			}
			else
				echo "";
		}
	}

	public function like()
	{
		/*if(sizeof($_POST) == 0)
		{
			redirect(base_url().'app/home');
		}*/

		$is_logged_in = $this->session->userdata('is_logged_in');
		if($is_logged_in == true)
		{
			$fid = $_POST['fid'];
			$opr = $_POST['opr'];
			$type = $_POST['type'];
			$username = $this->session->userdata('username');

			$query = $this->db->get_where('feedbacklikesdislikes',array('userId' => $username,'feedbackId' => $fid));
			$query2 = $this->db->get_where('feedback',array('id' => $fid));
			
			$row = $query->row_array();
			$row2 = $query2->row_array();

			
			if($query->num_rows() == 1)
			{
				if($row['likeDislike'] != $opr)
				{
					$this->db->where('id', $fid);
					if($opr == 'like')
					{
						$this->db->set('feedbackLikes', 'feedbackLikes+1', FALSE);
						$this->db->set('feedbackDislikes', 'feedbackDislikes-1', FALSE);
					}
					else if($opr == 'dislike')
					{
						$this->db->set('feedbackLikes', 'feedbackLikes-1', FALSE);
						$this->db->set('feedbackDislikes', 'feedbackDislikes+1', FALSE);					
					}
					$this->db->update('feedback');

					$this->db->where('userId', $username);
					$this->db->where('feedbackId', $fid);
					$this->db->update('feedbacklikesdislikes',array('likeDislike' => $opr));
				}
			}
			else
			{
				$this->db->where('id', $fid);
				if($opr == 'like')
				{
					$this->db->set('feedbackLikes', 'feedbackLikes+1', FALSE);
				}
				else if($opr == 'dislike')
				{
					$this->db->set('feedbackDislikes', 'feedbackDislikes+1', FALSE);					
				}
				$this->db->update('feedback');

				$insert_data = array(
					'userId' => $username,
					'feedbackId' => $fid,
					'likeDislike' => $opr
				);
				$this->db->insert('feedbacklikesdislikes',$insert_data);
			}

			$query = $this->db->get_where('feedbacklikesdislikes',array('userId' => $username,'feedbackId' => $fid));
			$query2 = $this->db->get_where('feedback',array('id' => $fid));
			
			$row = $query->row_array();
			$row2 = $query2->row_array();


			if($row['likeDislike'] == "like")
				echo '<div class="notLikeDislike">&#9786;</div><div class="dislike">&#9785;</div>';
			else if($row['likeDislike'] == 'dislike')
				echo '<div class="like">&#9786;</div><div class="notLikeDislike">&#9785;</div>';				

			echo '<div class="likes">'.$row2['feedbackLikes'].'-likes</div> <div class="dislikes">'.$row2['feedbackDislikes'].'-dislikes</div> ';
		}
		else
			echo '<meta http-equiv="refresh" content="0;url='.base_url().'app/login">';
	}

	public function search()
	{
		if(sizeof($_POST) == 0)
		{
			redirect(base_url().'app');
		}
		$word = $_POST['word'];

		$this->db->like('word', $word, 'after');
		$data['query'] = $this->db->get('words');
		
		// /echo $query->num_rows();
		$this->load->view('wordlist',$data);
	}
}