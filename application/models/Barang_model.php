<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
	public function rulesBarang()
	{
	}

	public function getAll()
	{
		$query = $this->db->get('tb_barang')->result();
		return $query;
	}
}


/* End of file Barang_model.php and path \application\models\Barang_model.php */
