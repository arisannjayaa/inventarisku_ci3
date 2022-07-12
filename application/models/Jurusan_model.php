<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan_model extends CI_Model
{
	public function rules()
	{
		return [
			[
				'field' => 'id',
				'rules' => 'required|max_length[2]',
				'errors' => [
					'required' => 'Kode Jurusan tidak boleh kosong',
					'max_length' => 'Nama telalu panjang (Max 2 Karakter)'
				],
			],
			[
				'field' => 'jurusan',
				'rules' => 'required|max_length[2]',
				'errors' => [
					'required' => 'Nama Jurusan tidak boleh kosong',
					'max_length' => 'Nama telalu panjang (Max 2 Karakter)'
				],
			],
		];
	}

	public function get_all()
	{
		$query = $this->db->get('tb_jurusan')->result();
		return $query;
	}

	public function insert()
	{
		$insert = array(
			'id_jurusan' => $this->input->post('id'),
			'nama_jurusan' => $this->input->post('nama')
		);
		$result = $this->db->insert('tb_jurusan', $insert);
		return $result;
	}

	public function update()
	{
		$edit = array(
			'nama_jurusan' => $this->input->post('nama')
		);
		$this->db->where('id_jurusan', $this->input->post('id'));
		$result = $this->db->update('tb_jurusan', $edit);
		return $result;
	}

	public function get_details($id)
	{
		$this->db->where('id_jurusan', $id);
		$result = $this->db->get('tb_jurusan')->result();
		return $result;
	}

	public function delete($id)
	{
		$this->db->where('id_jurusan', $id);
		$result = $this->db->delete('tb_jurusan');
		return $result;
	}
}


/* End of file Jurusan_model.php and path \application\models\Jurusan_model.php */
