<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
	}
	public function index()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$data = [
					'heading' 		=> 'Master Data Users',
					'title'			=> 'Master Data Users',
					'card_header'	=> 'List Data Users',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Users',
					'sidebar_item'	=> '',
					'users'		=> $this->Users_model->get_all()
				];

				$this->load->view('template/header', $data);
				$this->load->view('users/index', $data);
				$this->load->view('template/footer');
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}

	public function add()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$data = [
					'heading' 		=> 'Tambah Data Users',
					'title'			=> 'Tambah Data Users',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Users',
					'sidebar_item'	=> ''
				];

				$this->load->view('template/header', $data);
				$this->load->view('users/tambah', $data);
				$this->load->view('template/footer', $data);
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}

	public function add_proses()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$rules = $this->Users_model->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$data = [
						'heading' 		=> 'Tambah Data Users',
						'title'			=> 'Master Data Users',
						'card_header'	=> 'List Data Users',
						'side_menu'		=> 'Master Data',
						'submenu_item'	=> 'Data Users',
						'sidebar_item'	=> ''
					];

					$this->load->view('template/header', $data);
					$this->load->view('users/tambah');
					$this->load->view('template/footer', $data);
				} else {
					$this->Barang_model->insert();
					$this->session->set_flashdata('add_success', 'Data berhasil ditambahkan');
					redirect('users');
				}
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}

	public function edit($id)
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$data = [
					'heading' 		=> 'Edit Data Users',
					'title'			=> 'Edit Data Users',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Users',
					'sidebar_item'	=> '',
					'users'			=> $this->Users_model->get_details($id)
				];

				$this->load->view('template/header', $data);
				$this->load->view('users/edit', $data);
				$this->load->view('template/footer', $data);
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}

	public function edit_proses($id = null)
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$rules = $this->Users_model->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$data = [
						'heading' 		=> 'Edit Data Users',
						'title'			=> 'Edit Data Users',
						'side_menu'		=> 'Master Data',
						'submenu_item'	=> 'Data Users',
						'sidebar_item'	=> '',
						'users'			=> $this->Users_model->get_details($id)
					];
					$this->load->view('template/header', $data);
					$this->load->view('users/edit', $data);
					$this->load->view('template/footer', $data);
				} else {
					$this->Barang_model->update();
					$this->session->set_flashdata('update_success', 'Data berhasil diupdate');
					redirect('users');
				}
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}

	public function remove($id = null)
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$this->Barang_model->delete($id);
				$this->session->set_flashdata('delete_success', 'Data berhasil dihapus');
				redirect('users');
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}
}

/* End of file Users.php and path \application\controllers\Users.php */
