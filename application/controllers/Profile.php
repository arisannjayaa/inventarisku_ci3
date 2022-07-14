<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_model');
	}

	public function index()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {

			$data = [
				'heading' 		=> 'Profile',
				'title'			=> 'Profile',
				'card_header'	=> 'Details Profile',
				'side_menu'		=> '',
				'submenu_item'	=> '',
				'sidebar_item'	=> '',
				'profile'		=> $this->Profile_model->get_all($sesi['id_user'])
			];

			$this->load->view('template/header', $data);
			$this->load->view('profile/index', $data);
			$this->load->view('template/footer');
		} else {
			redirect(base_url('login'));
		}
	}
}

/* End of file Profile.php and path \application\controllers\Profile.php */
