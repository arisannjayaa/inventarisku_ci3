<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Rekening_model');
	}

	public function index()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$data = [
					'heading' 		=> 'Master Data Rekening',
					'title'			=> 'Master Data Rekening',
					'card_header'	=> 'List Data Rekening',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Rekening',
					'sidebar_item'	=> '',
					'rekening'		=> $this->Rekening_model->get_all()
				];

				$this->load->view('template/header', $data);
				$this->load->view('rekening/index', $data);
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
					'heading' 		=> 'Tambah Data Rekening',
					'title'			=> 'Tambah Data Rekening',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Rekening',
					'sidebar_item'	=> ''
				];

				$this->load->view('template/header', $data);
				$this->load->view('rekening/tambah', $data);
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
				$rules = $this->Rekening_model->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$data = [
						'heading' 		=> 'Tambah Data Rekening',
						'title'			=> 'Master Data Rekening',
						'card_header'	=> 'List Data Rekening',
						'side_menu'		=> 'Master Data',
						'submenu_item'	=> 'Data Rekening',
						'sidebar_item'	=> ''
					];

					$this->load->view('template/header', $data);
					$this->load->view('rekening/tambah');
					$this->load->view('template/footer');
				} else {
					$this->Rekening_model->insert();
					$this->session->set_flashdata('add_success', '<div class="alert alert-success">Data berhasil ditambahkan</div>');
					redirect('Rekening');
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
					'heading' 		=> 'Edit Data Rekening',
					'title'			=> 'Edit Data Rekening',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Rekening',
					'sidebar_item'	=> '',
					'Rekening'		=> $this->Rekening_model->get_details($id)
				];

				$this->load->view('template/header', $data);
				$this->load->view('Rekening/edit', $data);
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
				$rules = $this->Rekening_model->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$data = [
						'heading' 		=> 'Edit Data Barang',
						'title'			=> 'Edit Data Barang',
						'barang'		=> $this->Rekening_model->get_details($id)
					];
					$this->load->view('template/header', $data);
					$this->load->view('barang/edit', $data);
					$this->load->view('template/footer');
				} else {
					$this->Rekening_model->update();
					$this->session->set_flashdata('update_success', '<div class="alert alert-success">Data berhasil diupdate</div>');
					redirect('Rekening');
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
				$this->Rekening_model->delete($id);
				$this->session->set_flashdata('delete_success', '<div class="alert alert-danger">Data berhasil dihapus</div>');
				redirect('Rekening');
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}
}

/* End of file Rekening.php and path \application\controllers\Rekening.php */
