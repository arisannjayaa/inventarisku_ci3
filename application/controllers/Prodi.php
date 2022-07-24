<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Prodi_model');
	}

	public function index()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$data = [
					'heading' 		=> 'Master Data Prodi',
					'title'			=> 'Master Data Prodi',
					'card_header'	=> 'List Data Prodi',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Prodi',
					'sidebar_item'	=> '',
					'prodi'		=> $this->Prodi_model->get_all()
				];

				$this->load->view('template/header', $data);
				$this->load->view('prodi/index', $data);
				$this->load->view('template/footer', $data);
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
				$this->load->model('Jurusan_model');
				$data = [
					'heading' 		=> 'Tambah Data Prodi',
					'title'			=> 'Tambah Data Prodi',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Prodi',
					'sidebar_item'	=> '',
					'jurusan'		=> $this->Jurusan_model->get_all()
				];

				$this->load->view('template/header', $data);
				$this->load->view('Prodi/tambah', $data);
				$this->load->view('template/footer', $data);
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}

	public function add_prosess()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$rules = $this->Prodi_model->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$data = [
						'heading' 		=> 'Tambah Data Prodi',
						'title'			=> 'Master Data Prodi',
						'card_header'	=> 'List Data Prodi',
						'side_menu'		=> 'Master Data',
						'submenu_item'	=> 'Data Prodi',
						'sidebar_item'	=> '',
					];

					$this->load->view('template/header', $data);
					$this->load->view('Prodi/tambah');
					$this->load->view('template/footer', $data);
				} else {
					$this->Prodi_model->insert();
					$this->session->set_flashdata('add_success', '<div class="alert alert-success">Data berhasil ditambahkan</div>');
					redirect('prodi');
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
				$this->load->model('Jurusan_model');
				$data = [
					'heading' 		=> 'Edit Data Prodi',
					'title'			=> 'Edit Data Prodi',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Prodi',
					'sidebar_item'	=> '',
					'prodi'			=> $this->Prodi_model->get_details($id),
					'jurusan'		=> $this->Jurusan_model->get_all()
				];

				$this->load->view('template/header', $data);
				$this->load->view('prodi/edit', $data);
				$this->load->view('template/footer', $data);
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}

	public function edit_proses($id)
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$rules = $this->Prodi_model->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$data = [
						'heading' 		=> 'Edit Data Barang',
						'title'			=> 'Edit Data Barang',
						'side_menu'		=> 'Master Data',
						'submenu_item'	=> 'Data Prodi',
						'sidebar_item'	=> '',
						'prodi'			=> $this->Prodi_model->get_details($id)
					];
					$this->load->view('template/header', $data);
					$this->load->view('prodi/edit', $data);
					$this->load->view('template/footer', $data);
				} else {
					$this->Prodi_model->update();
					$this->session->set_flashdata('update_success', '<div class="alert alert-success">Data berhasil diupdate</div>');
					redirect('prodi');
				}
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}

	public function remove($id)
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$this->Prodi_model->delete($id);
				$this->session->set_flashdata('delete_success', '<div class="alert alert-danger">Data berhasil dihapus</div>');
				redirect('prodi');
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}
}

/* End of file Prodi.php and path \application\controllers\Prodi.php */
