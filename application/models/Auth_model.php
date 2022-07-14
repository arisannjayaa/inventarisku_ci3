<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

	public function rules()
	{
		return [
			[
				'field' => 'nama_lengkap',
				'label'	=> 'Nama',
				'rules' => 'required|max_length[100]',
				"errors" => [
					'required' => 'Nama tidak boleh kosong',
					'max_length' => 'Nama telalu panjang (Max 100 Karakter)',
				],
			],
			[
				'field' => 'nim',
				'label'	=> 'NIM',
				'rules' => 'required|max_length[20]',
				"errors" => [
					'required' => 'NIM tidak boleh kosong',
					'max_length' => 'NIM telalu panjang (Max 20 Karakter)',
				],
			],
			[
				'field' => 'no_telp',
				'label'	=> 'No Telepon',
				'rules' => 'required|integer|max_length[20]',
				"errors" => [
					'required' => 'No Telepon tidak boleh kosong',
					'max_length' => 'No Telepon telalu panjang (Max 20 Karakter)',
				],
			],
			[
				'field' => 'jurusan',
				'label'	=> 'Jurusan',
				'rules' => 'required',
				"errors" => [
					'required' => 'Jurusan tidak boleh kosong',
				],
			],
			[
				'field' => 'prodi',
				'label'	=> 'Prodi',
				'rules' => 'required',
				"errors" => [
					'required' => 'Prodi tidak boleh kosong',
				],
			],
			[
				'field' => 'no_telp',
				'label'	=> 'No Telepon',
				'rules' => 'required|integer|max_length[20]',
				"errors" => [
					'required' => 'No Telepon tidak boleh kosong',
					'max_length' => 'No Telepon telalu panjang (Max 20 Karakter)',
				],
			],
			[
				'field' => 'username',
				'label'	=> 'Username',
				'rules' => 'required|min_length[8]|max_length[30]',
				"errors" => [
					'required' => 'Username tidak boleh kosong',
					'min_length' => 'Username minimal (Min 8 Karakter)',
					'max_length' => 'Username telalu panjang (Max 30 Karakter)',
				],
			],
			[
				'field' => 'password',
				'label'	=> 'Password',
				'rules' => 'required|max_length[30]',
				"errors" => [
					'required' => 'Password tidak boleh kosong',
					'min_length' => 'Password minimal (Min 8 Karakter)',
					'max_length' => 'Password telalu panjang (Max 30 Karakter)',
				],
			],
			[
				'field' => 'konfirmasi_pass',
				'label'	=> 'Konfirmasi Password',
				'rules' => 'required|matches[password]',
				"errors" => [
					'required' => 'Password tidak boleh kosong',
					'matches' => 'Password tidak sama',
				],
			],
		];
	}

	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('username', $post['user']);
		$this->db->where('password', sha1($post['pass']));
		$query = $this->db->get();
		return $query;
	}

	public function register()
	{
		$insert = array(
			'nim'				=> $this->input->post('nim'),
			'nama_lengkap' 		=> $this->input->post('nama_lengkap'),
			'id_jurusan' 		=> $this->input->post('jurusan'),
			'id_prodi' 			=> $this->input->post('prodi'),
			'no_telp' 			=> $this->input->post('no_telp'),
			'username' 			=> $this->input->post('username'),
			'password' 			=> sha1($this->input->post('password')),
			'level'				=> 'mahasiswa'
		);
		$result = $this->db->insert('tb_user', $insert);
		return $result;
	}
}


/* End of file Auth_model.php and path \application\models\Auth_model.php */
