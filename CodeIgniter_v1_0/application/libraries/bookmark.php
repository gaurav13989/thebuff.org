<?php

class bookmark
{
	public function __construct()
	{
		
	}

	function markWord($email,$wordNo)
	{
		$CI =& get_instance();
		$CI->db->where('email',$email);
		$CI->db->where('wordNo',$wordNo);
		$query = $CI->db->get('bookmark');
		if($query->num_rows() == 0)
		{
			$data['email'] = $email;
			$data['wordNo'] = $wordNo;
			$CI->db->insert('bookmark',$data);
			$retVal = "added";
		}
		else
		{
			$CI->db->where('email',$email);
			$CI->db->where('wordNo',$wordNo);
			$CI->db->delete('bookmark');
			$retVal = "removed";
		}
		return $retVal;
	}

	function getStatus($email,$wordNo)
	{
		$CI =& get_instance();
		$CI->db->where('email',$email);
		$CI->db->where('wordNo',$wordNo);
		$query = $CI->db->get('bookmark');
		if($query->num_rows() > 0)
			return "y";
		else
			return "n";
	}

	function getAllBookmarks($email)
	{
		$CI =& get_instance();
		$CI->db->where('email',$email);
		$query = $CI->db->get('bookmark');
		return $query;
	}
}