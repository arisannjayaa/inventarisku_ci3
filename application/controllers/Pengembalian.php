<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengembalian_model');
	}

	public function index()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$data = [
					'heading' 		=> 'Data Pengembalian',
					'title'			=> 'Data Pengembalian',
					'card_header'	=> 'List Pengembalian',
					'side_menu'		=> '',
					'submenu_item'	=> '',
					'sidebar_item'	=> 'Data Pengembalian',
					'pengembalian'	=> $this->Pengembalian_model->get_all()
				];

				$this->load->view('template/header', $data);
				$this->load->view('pengembalian/index', $data);
				$this->load->view('template/footer');
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}

	public function transaksi_kembali($id)
	{
		$result = $this->db->query("select tb_transaksi_detail.id_barang, jumlah_sewa from tb_transaksi 
									inner join tb_transaksi_detail on tb_transaksi.id_transaksi = tb_transaksi_detail.id_transaksi  
									inner join tb_barang on tb_transaksi_detail.id_barang = tb_barang.id_barang
									where tb_transaksi_detail.id_transaksi='$id'")->result();
		foreach ($result as $kembali) {
			$this->db->query("update tb_barang set stok_barang=stok_barang+'$kembali->jumlah_sewa' where id_barang='$kembali->id_barang'");
		}
		$this->db->query("update tb_transaksi set status_sewa='Kembali' where id_transaksi='$id'");
		redirect(base_url('pengembalian'));
	}
}

/* End of file Pengembalian.php and path \application\controllers\Pengembalian.php */
