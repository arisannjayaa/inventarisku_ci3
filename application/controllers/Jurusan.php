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
			'prodi'			=> $this->Jurusan_model->get_all()
		];

		$this->load->view('template/header', $data);
		$this->load->view('jurusan/detail', $data);
		$this->load->view('template/footer', $data);
	}
}

/* End of file Jurusan.php and path \application\controllers\Jurusan.php */
