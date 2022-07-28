<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening_model extends CI_Model
{
	public function rules()
	{
		return [
			[
				'field' => 'nama',
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama Bank tidak boleh kosong'
				],
			],
			[
				'field' => 'no_rekening',
				'rules' => 'required',
				'errors' => [
					'required' => 'No Rekening tidak boleh kosong'
				],
			],
		];
	}

	public function get_all()
	{
		$query = $this->db->get('tb_rekening')->result();
		return $query;
	}

	public function insert()
	{
		$insert = array(
			'nama_bank' => $this->input->post('nama'),
			'no_rekening' => $this->input->post('no_rekening')
		);
		$result = $this->db->insert('tb_rekening', $insert);
		return $result;
	}

	public function update()
	{
		$edit = array(
			'nama_jurusan' => $this->input->post('nama')
		);
		$this->db->where('id_jurusan', $this->input->post('id'));
		$result = $this->db->update('tb_rekening', $edit);
		return $result;
	}

	public function get_details($id)
	{
		$this->db->where('id_jurusan', $id);
		$result = $this->db->get('tb_rekening')->result();
		return $result;
	}

	public function delete($id)
	{
		$this->db->where('id_jurusan', $id);
		$result = $this->db->delete('tb_rekening');
		return $result;
	}
}


/* End of file Rekening_model.php and path \application\models\Rekening_model.php */
