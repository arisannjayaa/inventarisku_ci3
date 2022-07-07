<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_model');
	}

	public function index()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$data = [
					'heading' 		=> 'Master Data Barang',
					'title'			=> 'Master Data Barang',
					'card_header'	=> 'List Data Barang',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Barang',
					'sidebar_item'	=> '',
					'barang'		=> $this->Barang_model->get_all()
				];

				$this->load->view('template/header', $data);
				$this->load->view('barang/index', $data);
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
					'heading' 		=> 'Tambah Data Barang',
					'title'			=> 'Tambah Data Barang',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Barang',
					'sidebar_item'	=> ''
				];

				$this->load->view('template/header', $data);
				$this->load->view('barang/tambah', $data);
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
				$rules = $this->Barang_model->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$data = [
						'heading' 		=> 'Tambah Data Barang',
						'title'			=> 'Master Data Barang',
						'card_header'	=> 'List Data Barang',
						'side_menu'		=> 'Master Data',
						'submenu_item'	=> 'Data Barang',
						'sidebar_item'	=> ''
					];

					$this->load->view('template/header', $data);
					$this->load->view('barang/tambah');
					$this->load->view('template/footer', $data);
				} else {
					$this->Barang_model->insert();
					$this->session->set_flashdata('add_success', 'Data berhasil ditambahkan');
					redirect('barang');
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
					'heading' 		=> 'Edit Data Barang',
					'title'			=> 'Edit Data Barang',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Barang',
					'sidebar_item'	=> '',
					'barang'		=> $this->Barang_model->get_details($id)
				];

				$this->load->view('template/header', $data);
				$this->load->view('barang/edit', $data);
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
				$rules = $this->Barang_model->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$data = [
						'heading' 		=> 'Edit Data Barang',
						'title'			=> 'Edit Data Barang',
						'side_menu'		=> 'Master Data',
						'submenu_item'	=> 'Data Barang',
						'sidebar_item'	=> '',
						'barang'		=> $this->Barang_model->get_details($id)
					];
					$this->load->view('template/header', $data);
					$this->load->view('barang/edit', $data);
					$this->load->view('template/footer', $data);
				} else {
					$this->Barang_model->update();
					$this->session->set_flashdata('update_success', 'Data berhasil diupdate');
					redirect('barang');
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
				redirect('barang');
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}
}

/* End of file Barang.php and path \application\controllers\Barang.php */
