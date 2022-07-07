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
		if ($this->session->userdata('status') != 'logged') {
			$this->load->view('auth/login');
		} else {
			redirect(base_url(''));
		}
	}

	public function cek_login()
	{
		$post = $this->input->post(null, true);
		if (isset($post['login'])) {
			$query = $this->Auth_model->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$data = [
					'status' => 'logged',
					'username' => $row->username,
					'id_user' => $row->id_user,
					'level' => $row->level
				];
				$this->session->set_userdata($data);
				$this->session->set_flashdata('logged', "Selamat Datang . $row->username");
				redirect(base_url(''));
			} else {
				$this->session->set_flashdata('gagal', 'Username atau password salah!!');
				redirect(base_url('login'));
			}
		} else {
			redirect(base_url('login'));
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	public function register()
	{
		if ($this->session->userdata('status') != 'logged') {
			$this->load->view('auth/register');
		} else {
			redirect(base_url(''));
		}
	}
}

/* End of file Auth.php and path \application\controllers\Auth.php */
