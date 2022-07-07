<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'heading' 		=> 'Master Data Orders',
			'title'			=> 'Master Data Orders | InventarisKu',
			'card_header'	=> 'List Data Orders',
			'side_menu'		=> '',
			'sidebar_item'	=> 'Data Orders',
			'submenu_item'	=> '',
		];

		$this->load->view('template/header', $data);
		$this->load->view('orders/detail');
		$this->load->view('template/footer');
	}
}

/* End of file Orders.php and path \application\controllers\Orders.php */
