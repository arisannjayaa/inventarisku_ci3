<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('username', $post['user']);
		$this->db->where('password', sha1($post['pass']));
		$query = $this->db->get();
		return $query;
	}
}


/* End of file Auth_model.php and path \application\models\Auth_model.php */
