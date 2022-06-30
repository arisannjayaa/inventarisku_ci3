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
		$data = [
			'heading' 		=> 'Master Data Prodi',
			'title'			=> 'Master Data Prodi | InventarisKu',
			'card_header'	=> 'List Data Prodi',
			'prodi'			=> $this->Prodi_model->getAll()
		];

		$this->load->view('template/header', $data);
		$this->load->view('prodi/detail', $data);
		$this->load->view('template/footer', $data);
	}
}

/* End of file Prodi.php and path \application\controllers\Prodi.php */
