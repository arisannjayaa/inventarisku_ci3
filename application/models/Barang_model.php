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

	public function insert($post)
	{
		$insert = array(
			'nama_barang' 			=> $post['nama'],
			'stok_barang' 			=> $post['stok'],
			'harga_barang' 			=> $post['harga'],
			'keterangan_barang' 	=> $post['keterangan'],
			'gambar_barang' 		=> $post['gambar']
		);
		$this->db->insert('tb_barang', $insert);
	}

	public function update($post)
	{
		if ($post['gambar'] == null) {
			$edit = array(
				'nama_barang' 			=> $post['nama'],
				'stok_barang' 			=> $post['stok'],
				'harga_barang' 			=> $post['harga'],
				'keterangan_barang' 	=> $post['keterangan']
			);
		} else {
			$edit = array(
				'nama_barang' 			=> $post['nama'],
				'stok_barang' 			=> $post['stok'],
				'harga_barang' 			=> $post['harga'],
				'keterangan_barang' 	=> $post['keterangan'],
				'gambar_barang' 		=> $post['gambar']
			);
		}
		$this->db->where('id_barang', $post['id']);
		$this->db->update('tb_barang', $edit);
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
