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
				$this->session->set_flashdata('logged', "<div class=\"alert alert-light-success\">Selamat datang $row->username</div>");
				if ($row->level == 'admin') {
					redirect(base_url(''));
				} else {
					redirect(base_url('belanja'));
				}
			} else {
				$this->session->set_flashdata('gagal', '<div class="alert alert-danger">Username atau password salah</div>');
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
				$this->session->set_flashdata('register_sukses', '<div class="alert alert-success">Registrasi akun berhasil</div>');
				redirect(base_url('login'));
			}
		} else {
			redirect(base_url(''));
		}
	}

	public function reset_password()
	{
		$this->load->view('auth/reset_password');
	}

	public function reset_password_proses()
	{
		$id = $this->session->userdata('id_user');
		$post = $this->input->post();
		$query = $this->db->query("select password from tb_user where id_user='$id'")->row();
		if ($query->password == sha1($post['pass_lama'])) {
			if ($post['pass_baru'] == $post['konfirmasi_pass_baru']) {
				$this->db->query("update tb_user set password=sha1('$post[pass_baru]') where id_user='$id'");
				$this->session->sess_destroy();
				$this->session->set_flashdata('ganti_pass_sukses', '<div class="alert alert-light-success">Password berhasil diganti, silahkan login kembali</div>');
				redirect(base_url('login'));
			} else {
				$this->session->set_flashdata('konfirmasi_pass_salah', '<div class="alert alert-light-danger">Konfirmasi password tidak sama</div>');
				redirect(base_url('reset-password'));
			}
		} else {
			$this->session->set_flashdata('pass_lama_salah', '<div class="alert alert-light-danger">Password lama salah!!</div>');
			redirect(base_url('reset-password'));
		}
	}
}

/* End of file Auth.php and path \application\controllers\Auth.php */
