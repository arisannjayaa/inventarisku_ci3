<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
	public function get_all()
	{
		$this->db->select('nama_lengkap, tanggal_sewa, tanggal_kembali, bukti_bayar, id_transaksi, metode_bayar, status_sewa, status_bayar');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_user', 'tb_user.id_user = tb_transaksi.id_user', 'inner');
		$query = $this->db->get()->result();
		return $query;
	}

	public function get_details($id)
	{
		$this->db->where('id_transaksi', $id);
		$result = $this->db->get('tb_transaksi')->result();
		return $result;
	}
}


/* End of file Transaksi_model.php and path \application\models\Transaksi_model.php */
