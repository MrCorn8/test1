<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	function login()
	{
		$data['error']=0;
		if ($_POST) {
			$this->load->model('user');
			$username=$this->input->post('username',true);
			$password=$this->input->post('password',true);
			$user=$this->user->login($username,$password);
			if (!$user) {
				$data['error']=1;
			} else {
				$this->session->set_userdata( 'userID',$user['userID'] );
				$this->session->set_userdata( 'user_type',$user['user_type'] );
				redirect(base_url().'posts');
			}
			
		}
		$this->load->view('header');
		$this->load->view('login', $data);
		$this->load->view('footer');
	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */