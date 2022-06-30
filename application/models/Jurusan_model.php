<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan_model extends CI_Model
{
	public function getall()
	{
		$query = $this->db->get('tb_barang')->result();
		return $query;
	}
}


/* End of file Jurusan_model.php and path \application\models\Jurusan_model.php */
