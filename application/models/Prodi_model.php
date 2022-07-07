<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi_model extends CI_Model
{
	public function rules()
	{
		return [
			[
				'field' => 'id',
				'label'	=> 'Nama',
				'rules' => 'required|max_length[4]'
			],
			[
				'field' => 'prodi',
				'label'	=> 'Nama',
				'rules' => 'required|max_length[100]'
			],
			[
				'field' => 'jurusan',
				'label'	=> 'Nama',
				'rules' => 'required|max_length[4]'
			],
		];
	}

	public function get_all()
	{
		$query = $this->db->get('tb_prodi')->result();
		return $query;
	}

	public function insert()
	{
		$insert = array(
			'id_prodi'	 => $this->input->post('id'),
			'nama_prodi' => $this->input->post('prodi'),
			'id_jurusan' => $this->input->post('jurusan')
		);
		$result = $this->db->insert('tb_prodi', $insert);
		return $result;
	}

	public function update()
	{
		$edit = array(
			'id_jurusan' => $this->input->post('jurusan'),
			'nama_prodi' => $this->input->post('prodi')
		);
		$this->db->where('id_prodi', $this->input->post('id'));
		$result = $this->db->update('tb_prodi', $edit);
		return $result;
	}

	public function get_details($id)
	{
		$this->db->where('id_prodi', $id);
		$result = $this->db->get('tb_prodi')->result();
		return $result;
	}

	public function delete($id)
	{
		$this->db->where('id_prodi', $id);
		$result = $this->db->delete('tb_prodi');
		return $result;
	}
}


/* End of file Prodi_model.php and path \application\models\Prodi_model.php */
