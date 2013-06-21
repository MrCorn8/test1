<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	function get_posts($num="20",$start="0")
	{
		$this->db->select('')->from('posts')->where('active',1)->order_by('date_added','desc')->limit($num,$start);
		//$this->db->select('')->from('posts')->where('active',1)->order_by('date_added','desc')->limit($start,$num);
		$query=$this->db->get();
		return $query->result_array();
	}

	function get_post($postID)
	{
		$this->db->select()->where(array('active'=>1,'postID'=>$postID))->order_by('date_added','desc');
		$query=$this->db->get();
		return $query->first_row('array');
	}

}

/* End of file post.php */
/* Location: ./application/models/post.php */