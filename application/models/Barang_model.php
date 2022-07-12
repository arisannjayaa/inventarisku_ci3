<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
	public function rules()
	{
		return [
			[
				'field' => 'nama',
				'rules' => 'required|max_length[50]',
				'errors' => [
					'required' => 'Nama tidak boleh kosong',
					'max_length' => 'Nama telalu panjang (Max 50 Karakter)'
				],
			],
			[
				'field' => 'stok',
				'rules' => 'required|integer',
				'errors' => [
					'required' => 'Stok tidak boleh kosong'
				],
			],
			[
				'field' => 'harga',
				'rules' => 'required|integer',
				'errors' => [
					'required' => 'Harga tidak boleh kosong'
				],
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
			'stok_barang' => $this->input->post('stok'),
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


/* End of file Barang_model.php and path \application\models\Barang_model.php */
