<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{

	public function get_all()
	{
		$this->db->where('level !=', 'admin');
		$this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_user.id_jurusan', 'inner');
		$this->db->join('tb_prodi', 'tb_prodi.id_prodi = tb_user.id_prodi', 'inner');
		$query = $this->db->get('tb_user')->result();
		return $query;
	}

	public function insert()
	{
		$insert = array(
			'nama_barang' => $this->input->post('nama'),
			'stok_barang' => $this->input->post('stok'),
			'harga_barang' => $this->input->post('harga')
		);
		$result = $this->db->insert('tb_barang', $insert);
		return $result;
	}

	public function update()
	{
		$edit = array(
			'nama_barang' => $this->input->post('nama'),
			'stok_barang' => $this->input->post('stok'),
			'harga_barang' => $this->input->post('harga')
		);
		$this->db->where('id_barang', $this->input->post('id'));
		$result = $this->db->update('tb_barang', $edit);
		return $result;
	}

	public function get_details($id)
	{
		$this->db->where('id_user', $id);
		$result = $this->db->get('tb_user')->result();
		return $result;
	}

	public function delete($id)
	{
		$this->db->where('id_barang', $id);
		$result = $this->db->delete('tb_barang');
		return $result;
	}
}


/* End of file Users_model.php and path \application\models\Users_model.php */
