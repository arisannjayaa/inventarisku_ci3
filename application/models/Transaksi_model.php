<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
	public function get_all()
	{
		$this->db->select('nama_lengkap, tanggal_sewa, tanggal_kembali, bukti_bayar, tb_transaksi.id_transaksi, metode_bayar, status_sewa, status_bayar, sum(jumlah_sewa) as total_sewa, sum(jumlah_sewa*harga_barang) as total_harga');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_user', 'tb_user.id_user = tb_transaksi.id_user', 'inner');
		$this->db->join('tb_transaksi_detail', 'tb_transaksi_detail.id_transaksi = tb_transaksi.id_transaksi', 'inner');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_transaksi_detail.id_barang', 'inner');
		$this->db->group_by('tb_transaksi.id_transaksi');
		$query = $this->db->get()->result();
		return $query;
	}

	public function get_all_user($id)
	{
		$this->db->where('tb_transaksi.id_user', $id);
		$this->db->select('nama_lengkap, tanggal_sewa, tanggal_kembali, bukti_bayar, tb_transaksi.id_transaksi, metode_bayar, status_sewa, status_bayar, sum(jumlah_sewa) as total_sewa, sum(jumlah_sewa*harga_barang) as total_harga');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_user', 'tb_user.id_user = tb_transaksi.id_user', 'inner');
		$this->db->join('tb_transaksi_detail', 'tb_transaksi_detail.id_transaksi = tb_transaksi.id_transaksi', 'inner');
		$this->db->join('tb_barang', 'tb_barang.id_barang = tb_transaksi_detail.id_barang', 'inner');
		$this->db->group_by('tb_transaksi.id_transaksi');
		$result = $this->db->get()->result();
		return $result;
	}

	public function get_details($id)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->join('tb_user', 'tb_user.id_user = tb_transaksi.id_user', 'inner');
		$result = $this->db->get('tb_transaksi')->result();
		return $result;
	}

	public function set_status_sewa($id)
	{
		$this->db->query("update tb_transaksi set status_sewa='Dibatalkan' where id_transaksi='$id'");
	}
}


/* End of file Transaksi_model.php and path \application\models\Transaksi_model.php */
