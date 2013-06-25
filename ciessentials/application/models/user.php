<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();
	}

	function create_user($data)
	{
		$this->db->insert('users', $data);
	}

	function login($username,$password)
	{
		$where = array('username' => $username,
			'password' => sha1($password)
		);
		$this->db->select('*')->from('users')->where($where);
		$query=$this->db->get();
		return $query->first_row('array');
	}

}

/* End of file user.php */
/* Location: ./application/models/user.php */