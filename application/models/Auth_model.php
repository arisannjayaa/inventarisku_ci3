<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	public function get_user()
	{
		$query = $this->db->query('select * from tb_user');
		return $query;
	}

	public function validate_user($user)
	{
		$query = $this->db->query("select * from tb_user where username='$user'");
	}
}


/* End of file Auth_model.php and path \application\models\Auth_model.php */
