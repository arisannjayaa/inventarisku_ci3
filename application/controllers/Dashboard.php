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
		if ($this->session->userdata('login') == true) {
			$data = [
				'heading' 		=> 'Dashboard',
				'title'			=> 'Dashboard | InventarisKu'
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
