<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi_model extends CI_Model
{
	public function rules()
	{
		return [
			[
				'field' => 'nama',
				'label'	=> 'Nama',
				'rules' => 'required|max_length[50]'
			],
			[
				'field' => 'stok',
				'label'	=> 'Stok',
				'rules' => 'required|integer'
			],
			[
				'field' => 'harga',
				'label'	=> 'Harga',
				'rules' => 'required|integer'
			],
		];
	}

	public function get_all()
	{
		$query = $this->db->get('tb_barang')->result();
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
			'stok_barang' => $this->input->post('qty'),
			'harga_barang' => $this->input->post('harga')
		);
		$this->db->where('id_barang', $this->input->post('id'));
		$result = $this->db->update('tb_barang', $edit);
		return $result;
	}

	public function get_details($id)
	{
		$this->db->where('id_barang', $id);
		$result = $this->db->get('tb_barang')->result();
		return $result;
	}

	public function delete($id)
	{
		$this->db->where('id_barang', $id);
		$result = $this->db->delete('tb_barang');
		return $result;
	}
}


/* End of file Prodi_model.php and path \application\models\Prodi_model.php */
