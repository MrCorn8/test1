<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('post');
		$data['posts']=$this->post->get_posts();
		//echo "<pre>"; print_r($data['posts']); echo "</pre>";
		$this->load->view('post_index', $data);
	}

}

/* End of file posts.php */
/* Location: ./application/controllers/posts.php */