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
