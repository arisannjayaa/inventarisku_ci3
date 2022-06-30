<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	public function cek_login()
	{
	}

	public function rules()
	{
		return [
			[
				'field' => 'username',
				'label' => 'Username or Email',
				'rules' => 'required'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|max_length[255]'
			]
		];
	}

	public function getUser()
	{
		$query = $this->db->get('tb_user');
		if ($query->nums_row() > 0) {
			return true;
		} else {
			return false;
		}
	}
}


/* End of file Auth_model.php and path \application\models\Auth_model.php */
