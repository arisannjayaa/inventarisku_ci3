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
				$this->session->set_flashdata('logged', "Selamat Datang $row->username");
				if ($row->level == 'admin') {
					redirect(base_url(''));
				} else {
					redirect(base_url('belanja'));
				}
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
			$this->load->model('Jurusan_model');
			$this->load->model('Prodi_model');
			$data = [
				'jurusan' 	=> $this->Jurusan_model->get_all(),
				'prodi' 	=> $this->Prodi_model->get_all()
			];
			$this->load->view('auth/register', $data);
		} else {
			redirect(base_url(''));
		}
	}

	public function register_proses()
	{
		if ($this->session->userdata('status') != 'logged') {
			$rules = $this->Auth_model->rules();
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run() == FALSE) {
				$this->load->model('Jurusan_model');
				$this->load->model('Prodi_model');
				$data = [
					'jurusan' 	=> $this->Jurusan_model->get_all(),
					'prodi' 	=> $this->Prodi_model->get_all()
				];
				$this->load->view('auth/register', $data);
			} else {
				$this->Auth_model->register();
				$this->session->set_flashdata('register_sukses', 'Registrasi akun berhasil');
				redirect(base_url('login'));
			}
		} else {
			redirect(base_url(''));
		}
	}
}

/* End of file Auth.php and path \application\controllers\Auth.php */
