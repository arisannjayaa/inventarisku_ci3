<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$data = [
					'heading' 		=> 'Data Transaksi',
					'title'			=> 'Data Transaksi',
					'card_header'	=> '',
					'side_menu'		=> '',
					'submenu_item'	=> '',
					'sidebar_item'	=> 'Data Transaksi',
				];

				$this->load->view('template/header', $data);
				$this->load->view('template/footer');
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}
}

/* End of file Transaksi.php and path \application\controllers\Transaksi.php */
