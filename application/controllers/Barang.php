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
			'barang'		=> $this->Barang_model->get_all()
		];

		$this->load->view('template/header', $data);
		$this->load->view('barang/detail', $data);
		$this->load->view('template/footer', $data);
	}

	public function add()
	{
		$data = [
			'heading' 		=> 'Tambah Data Barang',
			'title'			=> 'Tambah Data Barang | InventarisKu'
		];

		$this->load->view('template/header', $data);
		$this->load->view('barang/tambah', $data);
		$this->load->view('template/footer', $data);
	}

	public function add_prosess()
	{
		$rules = $this->Barang_model->rules();
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('barang/tambah');
		} else {
			$this->Barang_model->insert();
			redirect('barang');
		}
	}

	public function edit($id)
	{
		$data = [
			'heading' 		=> 'Edit Data Barang',
			'title'			=> 'Edit Data Barang | InventarisKu',
			'barang'		=> $this->Barang_model->get_details($id)
		];

		$this->load->view('template/header', $data);
		$this->load->view('barang/edit', $data);
		$this->load->view('template/footer', $data);
	}

	public function edit_prosess($id)
	{
		$rules = $this->Barang_model->rules();
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			$data['barang'] = $this->Barang_model->get_details($id);
			$this->load->view('barang/edit', $data);
		} else {
			$this->Barang_model->update();
			redirect('barang');
		}
	}
}

/* End of file Barang.php and path \application\controllers\Barang.php */
