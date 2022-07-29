<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_model');
	}

	public function index()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			$transaksi = $this->Transaksi_model->get_all();
			$data = [
				'heading' 		=> 'Data Transaksi',
				'title'			=> 'Data Transaksi',
				'card_header'	=> 'List Transaksi',
				'side_menu'		=> '',
				'submenu_item'	=> '',
				'sidebar_item'	=> 'Data Transaksi',
				'transaksi'		=> $transaksi
			];

			$this->load->view('template/header', $data);
			$this->load->view('transaksi/index', $data);
			$this->load->view('template/footer');
		} else {
			redirect(base_url('login'));
		}
	}

	public function transaksi_batal($id)
	{

		$result = $this->db->query("select tb_transaksi_detail.id_barang, jumlah_sewa from tb_transaksi 
									inner join tb_transaksi_detail on tb_transaksi.id_transaksi = tb_transaksi_detail.id_transaksi 
									inner join tb_barang on tb_transaksi_detail.id_barang = tb_barang.id_barang
									where tb_transaksi_detail.id_transaksi='$id'")->result();
		foreach ($result as $cancel) {
			$this->db->query("update tb_barang set stok_barang=stok_barang+'$cancel->jumlah_sewa' where id_barang='$cancel->id_barang'");
		}
		$this->Transaksi_model->set_status_sewa_user($id);
		redirect(base_url('transaksi'));
	}

	public function status_sewa_bayar()
	{
		$post = $this->input->post();
		$data = [
			'status_sewa' => $post['status_sewa'],
			'status_bayar' => $post['status_bayar']
		];
		$this->db->where('id_transaksi', $post['id_transaksi']);
		$this->db->update('tb_transaksi', $data);
		redirect(base_url('transaksi'));
	}

	public function detail($transaksi, $user)
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin' || $sesi['level'] == 'mahasiswa') {
				$data = [
					'heading' 		=> 'Data Transaksi',
					'title'			=> 'Data Transaksi',
					'card_header'	=> '',
					'side_menu'		=> '',
					'submenu_item'	=> '',
					'sidebar_item'	=> 'Data Transaksi',
					'barang'		=> $this->Transaksi_model->get_data_pesanan($transaksi, $user),
					'user'			=> $this->Transaksi_model->get_data_user_sewa($transaksi, $user)
				];


				$this->load->view('template/header', $data);
				$this->load->view('transaksi/detail');
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
