<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged' && $sesi['level'] == 'mahasiswa') {
			$this->load->model('Barang_model');
			$data = [
				'barang' => $this->Barang_model->get_all()
			];
			$this->load->view('belanja/index', $data);
		} else {
			redirect(base_url(''));
		}
	}
}

/* End of file Belanja.php and path \application\controllers\Belanja.php */
