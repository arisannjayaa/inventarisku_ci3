<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
	public function get_all()
	{
		$this->db->select('nama_lengkap, tanggal_sewa, tanggal_kembali, bukti_bayar, tb_transaksi.id_transaksi, tb_transaksi.id_user, metode_bayar, status_sewa, status_bayar, sum(jumlah_sewa) as total_sewa, sum(jumlah_sewa*harga_barang) as total_harga');
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

	public function set_status_sewa_user($id)
	{
		$this->db->query("update tb_transaksi set status_sewa='Dibatalkan' where id_transaksi='$id'");
	}

	public function get_data_user_sewa($transaksi, $user)
	{
		$query = $this->db->query("select tb_transaksi.id_transaksi, nama_lengkap, nim, nama_jurusan, nama_prodi, alamat, metode_bayar, tanggal_sewa, tanggal_kembali   from tb_transaksi
		inner join tb_user on tb_transaksi.id_user = tb_user.id_user
		inner join tb_jurusan on tb_user.id_jurusan = tb_jurusan.id_jurusan
		inner join tb_prodi on tb_jurusan.id_jurusan = tb_prodi.id_jurusan
		inner join tb_transaksi_detail on tb_transaksi.id_transaksi=tb_transaksi_detail.id_transaksi
		inner join tb_barang on tb_transaksi_detail.id_barang = tb_barang.id_barang where tb_transaksi.id_transaksi='$transaksi' and tb_transaksi.id_user='$user' group by tb_transaksi.id_user;")->row();
		return $query;
	}

	public function get_data_pesanan($transaksi, $user)
	{
		$query = $this->db->query("select nama_barang, jumlah_sewa, harga_barang as harga_sewa, sum(jumlah_sewa*harga_barang) as total, sum(jumlah_sewa) from tb_transaksi
		inner join tb_transaksi_detail on tb_transaksi.id_transaksi=tb_transaksi_detail.id_transaksi
		inner join tb_barang on tb_transaksi_detail.id_barang = tb_barang.id_barang where tb_transaksi.id_transaksi='$transaksi' and id_user='$user' group by nama_barang;")->result();
		return $query;
	}
}


/* End of file Transaksi_model.php and path \application\models\Transaksi_model.php */
