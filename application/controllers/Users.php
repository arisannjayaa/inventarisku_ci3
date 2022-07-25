<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
	}
	public function index()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$data = [
					'heading' 		=> 'Master Data Users',
					'title'			=> 'Master Data Users',
					'card_header'	=> 'List Data Users',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Users',
					'sidebar_item'	=> '',
					'users'		=> $this->Users_model->get_all()
				];

				$this->load->view('template/header', $data);
				$this->load->view('users/index', $data);
				$this->load->view('template/footer');
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}

	public function remove($id = null)
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$this->Barang_model->delete($id);
				$this->session->set_flashdata('delete_success', 'Data berhasil dihapus');
				redirect('users');
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}
}

/* End of file Users.php and path \application\controllers\Users.php */
