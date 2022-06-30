<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->;
	}
	public function index()
	{
		$this->load->view('auth/login');
	}

	public function cek_login() {

	}
}

/* End of file Auth.php and path \application\controllers\Auth.php */
