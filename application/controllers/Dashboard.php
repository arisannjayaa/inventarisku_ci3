<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('status') == 'logged') {
			$data = [
				'heading' 		=> 'Dashboard',
				'title'			=> 'Dashboard',
				'side_menu'		=> '',
				'submenu_item'	=> '',
				'sidebar_item'	=> 'Dashboard',
				'user'			=> $this->db->get('tb_user')->num_rows(),
				'transaksi'		=> $this->db->get('tb_transaksi')->num_rows(),
				'barang'		=> $this->db->get('tb_barang')->num_rows(),
				'prodi'			=> $this->db->get('tb_prodi')->num_rows(),
			];

			$this->load->view('template/header', $data);
			$this->load->view('dashboard/index');
			$this->load->view('template/footer');
		} else {
			redirect(base_url('login'));
		}
	}
}

/* End of file Dashboard.php and path \application\controllers\Dashboard.php */
