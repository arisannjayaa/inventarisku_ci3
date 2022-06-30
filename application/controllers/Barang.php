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
			'barang'		=> $this->Barang_model->getAll()
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
}

/* End of file Barang.php and path \application\controllers\Barang.php */
