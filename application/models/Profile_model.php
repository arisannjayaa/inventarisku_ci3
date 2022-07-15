<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{
	public function rules()
	{
		return [
			[
				'field' => 'nama_lengkap',
				'rules' => 'required|max_length[100]',
				"errors" => [
					'required' => 'Nama tidak boleh kosong',
					'max_length' => 'Nama telalu panjang (Max 100 Karakter)',
				],
			],
			[
				'field' => 'nim',
				'rules' => 'required|max_length[20]',
				"errors" => [
					'required' => 'NIM tidak boleh kosong',
					'max_length' => 'NIM telalu panjang (Max 20 Karakter)',
				],
			],
			[
				'field' => 'no_telp',
				'rules' => 'required|integer|max_length[20]',
				"errors" => [
					'required' => 'No Telepon tidak boleh kosong',
					'max_length' => 'No Telepon telalu panjang (Max 20 Karakter)',
				],
			],
			[
				'field' => 'email',
				'rules' => 'required|valid_email',
				"errors" => [
					'required' => 'Email tidak boleh kosong',
					'valid_email' => 'Email yang anda masukkan tidak valid'
				],
			],
			[
				'field' => 'agama',
				'rules' => 'required|max_length[20]',
				"errors" => [
					'required' => 'Agama tidak boleh kosong',
					'max_length' => 'Agama telalu panjang (Max 20 Karakter)'
				],
			],
			[
				'field' => 'alamat',
				'rules' => 'required',
				"errors" => [
					'required' => 'Alamat tidak boleh kosong',
				],
			],
			[
				'field' => 'jenis_kelamin',
				'rules' => 'required',
				"errors" => [
					'required' => 'Jenis Kelamin tidak boleh kosong'
				],
			],
		];
	}

	public function get_all($id)
	{
		$query = $this->db->query("select * from tb_user inner join tb_jurusan on tb_user.id_jurusan=tb_jurusan.id_jurusan inner join tb_prodi on tb_user.id_prodi=tb_prodi.id_prodi where id_user='$id'")->row();
		return $query;
	}

	public function update($post)
	{
		if ($post['gambar'] == null) {
			$edit = array(
				'nim' 				=> $post['nim'],
				'nama_lengkap' 		=> $post['nama_lengkap'],
				'id_jurusan' 		=> $post['id_jurusan'],
				'id_prodi' 			=> $post['id_prodi'],
				'no_telp' 			=> $post['no_telp'],
				'email' 			=> $post['email'],
				'agama' 			=> $post['agama'],
				'alamat' 			=> $post['alamat'],
				'jenis_kelamin' 	=> $post['jenis_kelamin'],
				'tanggal_lahir' 	=> $post['tanggal_lahir']
			);
		} else {
			$edit = array(
				'nim' 				=> $post['nim'],
				'nama_lengkap' 		=> $post['nama_lengkap'],
				'id_jurusan' 		=> $post['id_jurusan'],
				'id_prodi' 			=> $post['id_prodi'],
				'no_telp' 			=> $post['no_telp'],
				'email' 			=> $post['email'],
				'agama' 			=> $post['agama'],
				'alamat' 			=> $post['alamat'],
				'jenis_kelamin' 	=> $post['jenis_kelamin'],
				'tanggal_lahir' 	=> $post['tanggal_lahir'],
				'avatar' 			=> $post['gambar']
			);
		}
		$this->db->where('id_user', $post['id']);
		$this->db->update('tb_user', $edit);
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


/* End of file Profile_model.php and path \application\models\Profile_model.php */
