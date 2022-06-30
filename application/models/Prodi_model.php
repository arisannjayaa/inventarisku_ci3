<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi_model extends CI_Model
{
	public function getall()
	{
		$query = $this->db->get('tb_barang')->result();
		return $query;
	}
}


/* End of file Prodi_model.php and path \application\models\Prodi_model.php */
