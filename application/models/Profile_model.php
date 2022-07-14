<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
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

	public function get_all($id)
	{
		$query = $this->db->query("select * from tb_user inner join tb_jurusan on tb_user.id_jurusan=tb_jurusan.id_jurusan inner join tb_prodi on tb_user.id_prodi=tb_prodi.id_prodi where id_user='$id'")->row();
		return $query;
	}

	public function insert($post)
	{
		$insert = array(
			'nama_barang' 	=> $post['nama'],
			'stok_barang' 	=> $post['stok'],
			'harga_barang' 	=> $post['harga'],
			'gambar_barang' => $post['gambar'],
		);
		$this->db->insert('tb_barang', $insert);
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


/* End of file Profile_model.php and path \application\models\Profile_model.php */
