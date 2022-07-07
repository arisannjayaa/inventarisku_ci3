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
		$data = [
			'heading' 		=> 'Master Data Jurusan',
			'title'			=> 'Master Data Jurusan | InventarisKu',
			'card_header'	=> 'List Data Jurusan',
			'side_menu'		=> 'Master Data',
			'submenu_item'	=> 'Data Jurusan',
			'sidebar_item'	=> '',
			'jurusan'		=> $this->Jurusan_model->get_all()
		];

		$this->load->view('template/header', $data);
		$this->load->view('jurusan/detail', $data);
		$this->load->view('template/footer');
	}

	public function add()
	{
		$data = [
			'heading' 		=> 'Tambah Data Jurusan',
			'title'			=> 'Tambah Data Jurusan | InventarisKu',
			'side_menu'		=> 'Master Data',
			'submenu_item'	=> 'Data Jurusan',
			'sidebar_item'	=> ''
		];

		$this->load->view('template/header', $data);
		$this->load->view('jurusan/tambah', $data);
		$this->load->view('template/footer');
	}

	public function add_prosess()
	{
		$rules = $this->Jurusan_model->rules();
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'heading' 		=> 'Tambah Data Jurusan',
				'title'			=> 'Master Data Jurusan | InventarisKu',
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
	}

	public function edit($id)
	{
		$data = [
			'heading' 		=> 'Edit Data Jurusan',
			'title'			=> 'Edit Data Jurusan | InventarisKu',
			'side_menu'		=> 'Master Data',
			'submenu_item'	=> 'Data Jurusan',
			'sidebar_item'	=> '',
			'jurusan'		=> $this->Jurusan_model->get_details($id)
		];

		$this->load->view('template/header', $data);
		$this->load->view('jurusan/edit', $data);
		$this->load->view('template/footer');
	}

	public function edit_proses($id)
	{
		$rules = $this->Jurusan_model->rules();
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'heading' 		=> 'Edit Data Barang',
				'title'			=> 'Edit Data Barang | InventarisKu',
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
	}

	public function remove($id)
	{
		$this->Jurusan_model->delete($id);
		$this->session->set_flashdata('delete_success', 'Data berhasil dihapus');
		redirect('jurusan');
	}
}

/* End of file Jurusan.php and path \application\controllers\Jurusan.php */
