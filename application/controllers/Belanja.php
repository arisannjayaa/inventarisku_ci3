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
		$this->db->query("update tb_barang set stok_barang=stok_barang-1 where id_barang='$id'");
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

	public function cekout_pesanan()
	{
		$data = $this->input->post();
		$file_name 						= 'transaksi-' . date('ymd') . '-' . substr(md5(rand()), 0, 100);
		$config['upload_path']          = FCPATH . '/public/assets/upload/transaksi';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['file_name']            = $file_name;
		$config['overwrite']            = true;
		$config['max_size']             = 1024; // 1MB

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('bukti_bayar')) {
			$data['bukti_bayar'] = $this->upload->data('file_name');
			$insert_1 = [
				'id_user'			=> $this->session->userdata('id_user'),
				'tanggal_sewa' 		=> $data['tanggal_sewa'],
				'tanggal_kembali' 	=> $data['tanggal_kembali'],
				'metode_bayar'		=> $data['metode_bayar'],
				'bukti_bayar'		=> $data['bukti_bayar'],
				'keterangan'		=> $data['keterangan'],
			];

			$this->db->insert('tb_transaksi', $insert_1);
			$id_transaksi = $this->db->insert_id();

			foreach ($this->cart->contents() as $cart) {
				$insert_2 = array(
					'id_transaksi' => $id_transaksi,
					'id_barang' => $cart['id'],
					'jumlah_sewa' => $cart['qty']
				);
				$this->db->insert('tb_transaksi_detail', $insert_2);
			}

			$this->cart->destroy();
			$this->session->set_flashdata('cekout_sukses', '<div class="alert alert-light-success">Silahkan ambil barang yang kamu sewa ditempat penyewaan :)</div>');
			redirect(base_url('belanja'));
		}
	}

	public function remove_cart()
	{
		$this->cart->destroy();
		redirect('belanja');
	}
}

/* End of file Belanja.php and path \application\controllers\Belanja.php */
