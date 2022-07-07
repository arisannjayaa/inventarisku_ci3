<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}
	public function index()
	{
		if ($this->session->userdata('logged') != true) {
			$this->load->view('auth/login');
		} else {
			redirect(base_url(''));
		}
	}

	public function cek_login()
	{
		$user = $this->input->post('user');
		$pass = sha1($this->input->post('pass'));
		$validate = $this->Auth_model->get_user();
		if ($validate->num_rows() > 0) {
			$data = $validate->result();
			foreach ($data as $users) {
				if ($users->level == 'admin') {
					$this->session->set_userdata('logged', true);
					$this->session->set_userdata('username', $user);
					$this->session->set_userdata('password', $pass);
					$this->session->set_userdata('level', $users->level);
					redirect(base_url(''));
				} elseif ($users->level == 'mahasiswa') {
					$this->session->set_userdata('logged', true);
					$this->session->set_userdata('username', $user);
					$this->session->set_userdata('password', $pass);
					$this->session->set_userdata('level', $data->level);
					redirect(base_url(''));
				}
			}
		} else {
			$this->session->set_flashdata('error', 'Akun belum terdaftar');
			redirect(base_url('login'));
		}
	}
}

/* End of file Auth.php and path \application\controllers\Auth.php */
