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
			$total_qty = 0;
			foreach ($this->cart->contents() as $belanja) {
				$total_qty += $belanja['qty'];
			}
			$this->load->model('Barang_model');
			$data = [
				'barang' => $this->Barang_model->get_all(),
				'belanja' => $total_qty,
				'title' => 'Belanja',
				'heading' => 'List inventaris yang bisa kamu sewa :)'
			];
			$this->load->view('belanja/header', $data);
			$this->load->view('belanja/index', $data);
			$this->load->view('belanja/footer');
		} else {
			redirect(base_url(''));
		}
	}

	public function addcart($id)
	{
		$this->db->where('id_barang', $id);
		$barang = $this->db->get('tb_barang')->result_array();
		$data = [
			'id' 		=> $barang[0]['id_barang'],
			'qty' 		=> 1,
			'price' 	=> $barang[0]['harga_barang'],
			'name'		=> $barang[0]['nama_barang'],
			'img'		=> $barang[0]['gambar_barang']
		];
		$this->cart->insert($data);
		redirect('belanja');
	}

	public function keranjang()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged' && $sesi['level'] == 'mahasiswa') {
			$this->load->model('Barang_model');
			$total_qty = 0;
			foreach ($this->cart->contents() as $belanja) {
				$total_qty += $belanja['qty'];
			}
			$data = [
				'barang' => $this->Barang_model->get_all(),
				'cart'	=> $this->cart->contents(),
				'belanja' => $total_qty,
				'title' => 'Keranjang',
				'heading' => 'Keranjang'
			];
			$this->load->view('belanja/header', $data);
			$this->load->view('belanja/cart', $data);
			$this->load->view('belanja/footer');
		} else {
			redirect(base_url(''));
		}
	}

	public function remove_cart()
	{
		$this->cart->destroy();
		redirect('belanja');
	}
}

/* End of file Belanja.php and path \application\controllers\Belanja.php */
