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
		$data = [
			'heading' 		=> 'Master Data Barang',
			'title'			=> 'Master Data Barang | InventarisKu',
			'card_header'	=> 'List Data Barang',
			'side_menu'		=> 'Master Data',
			'submenu_item'	=> 'Data Barang',
			'sidebar_item'	=> '',
			'barang'		=> $this->Barang_model->get_all()
		];

		$this->load->view('template/header', $data);
		$this->load->view('barang/detail', $data);
		$this->load->view('template/footer');
	}

	public function add()
	{
		$data = [
			'heading' 		=> 'Tambah Data Barang',
			'title'			=> 'Tambah Data Barang | InventarisKu',
			'side_menu'		=> 'Master Data',
			'submenu_item'	=> 'Data Barang',
			'sidebar_item'	=> ''
		];

		$this->load->view('template/header', $data);
		$this->load->view('barang/tambah', $data);
		$this->load->view('template/footer', $data);
	}

	public function add_proses()
	{
		$rules = $this->Barang_model->rules();
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'heading' 		=> 'Tambah Data Barang',
				'title'			=> 'Master Data Barang | InventarisKu',
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
	}

	public function edit($id)
	{
		$data = [
			'heading' 		=> 'Edit Data Barang',
			'title'			=> 'Edit Data Barang | InventarisKu',
			'side_menu'		=> 'Master Data',
			'submenu_item'	=> 'Data Barang',
			'sidebar_item'	=> '',
			'barang'		=> $this->Barang_model->get_details($id)
		];

		$this->load->view('template/header', $data);
		$this->load->view('barang/edit', $data);
		$this->load->view('template/footer', $data);
	}

	public function edit_proses($id)
	{
		$rules = $this->Barang_model->rules();
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'heading' 		=> 'Edit Data Barang',
				'title'			=> 'Edit Data Barang | InventarisKu',
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
	}

	public function remove($id)
	{
		$this->Barang_model->delete($id);
		$this->session->set_flashdata('delete_success', 'Data berhasil dihapus');
		redirect('barang');
	}
}

/* End of file Barang.php and path \application\controllers\Barang.php */
