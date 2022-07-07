<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jurusan_model');
	}
	public function index()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$data = [
					'heading' 		=> 'Master Data Jurusan',
					'title'			=> 'Master Data Jurusan',
					'card_header'	=> 'List Data Jurusan',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Jurusan',
					'sidebar_item'	=> '',
					'jurusan'		=> $this->Jurusan_model->get_all()
				];

				$this->load->view('template/header', $data);
				$this->load->view('jurusan/index', $data);
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
					'heading' 		=> 'Tambah Data Jurusan',
					'title'			=> 'Tambah Data Jurusan',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Jurusan',
					'sidebar_item'	=> ''
				];

				$this->load->view('template/header', $data);
				$this->load->view('jurusan/tambah', $data);
				$this->load->view('template/footer');
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
				$rules = $this->Jurusan_model->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$data = [
						'heading' 		=> 'Tambah Data Jurusan',
						'title'			=> 'Master Data Jurusan',
						'card_header'	=> 'List Data Jurusan',
						'side_menu'		=> 'Master Data',
						'submenu_item'	=> 'Data Jurusan',
						'sidebar_item'	=> ''
					];

					$this->load->view('template/header', $data);
					$this->load->view('jurusan/tambah');
					$this->load->view('template/footer');
				} else {
					$this->Jurusan_model->insert();
					$this->session->set_flashdata('add_success', 'Data berhasil ditambahkan');
					redirect('jurusan');
				}
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}

	public function edit($id = null)
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$data = [
					'heading' 		=> 'Edit Data Jurusan',
					'title'			=> 'Edit Data Jurusan',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Jurusan',
					'sidebar_item'	=> '',
					'jurusan'		=> $this->Jurusan_model->get_details($id)
				];

				$this->load->view('template/header', $data);
				$this->load->view('jurusan/edit', $data);
				$this->load->view('template/footer');
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
				$rules = $this->Jurusan_model->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$data = [
						'heading' 		=> 'Edit Data Barang',
						'title'			=> 'Edit Data Barang',
						'barang'		=> $this->Jurusan_model->get_details($id)
					];
					$this->load->view('template/header', $data);
					$this->load->view('barang/edit', $data);
					$this->load->view('template/footer');
				} else {
					$this->Jurusan_model->update();
					$this->session->set_flashdata('update_success', 'Data berhasil diupdate');
					redirect('jurusan');
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
				$this->Jurusan_model->delete($id);
				$this->session->set_flashdata('delete_success', 'Data berhasil dihapus');
				redirect('jurusan');
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}
}

/* End of file Jurusan.php and path \application\controllers\Jurusan.php */
