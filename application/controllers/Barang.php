<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_model');
	}

	public function index()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$data = [
					'heading' 		=> 'Master Data Barang',
					'title'			=> 'Master Data Barang',
					'card_header'	=> 'List Data Barang',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Barang',
					'sidebar_item'	=> '',
					'barang'		=> $this->Barang_model->get_all()
				];

				$this->load->view('template/header', $data);
				$this->load->view('barang/index', $data);
				$this->load->view('template/footer');
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}

	public function add()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$data = [
					'heading' 		=> 'Tambah Data Barang',
					'title'			=> 'Tambah Data Barang',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Barang',
					'sidebar_item'	=> ''
				];

				$this->load->view('template/header', $data);
				$this->load->view('barang/tambah', $data);
				$this->load->view('template/footer', $data);
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}

	public function add_proses()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$rules = $this->Barang_model->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$data = [
						'heading' 		=> 'Tambah Data Barang',
						'title'			=> 'Master Data Barang',
						'card_header'	=> 'List Data Barang',
						'side_menu'		=> 'Master Data',
						'submenu_item'	=> 'Data Barang',
						'sidebar_item'	=> ''
					];

					$this->load->view('template/header', $data);
					$this->load->view('barang/tambah');
					$this->load->view('template/footer', $data);
				} else {
					$post = $this->input->post(null, true);
					$file_name 						= 'barang-' . date('ymd') . '-' . substr(md5(rand()), 0, 100);
					$config['upload_path']          = FCPATH . '/public/assets/images/barang';
					$config['allowed_types']        = 'gif|jpg|jpeg|png';
					$config['file_name']            = $file_name;
					$config['overwrite']            = true;
					$config['max_size']             = 1024; // 1MB

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('gambar')) {
						$post['gambar'] = 'default.png';
						$this->Barang_model->insert($post);
						$this->session->set_flashdata('add_success', '<div class="alert alert-light-success">Data berhasil ditambahkan</div>');
						redirect(base_url('barang'));
					} else {
						$post['gambar'] = $this->upload->data('file_name');
						$this->Barang_model->insert($post);
						$this->session->set_flashdata('add_success', '<div class="alert alert-light-success">Data berhasil ditambahkan</div>');
						redirect(base_url('barang'));
					}
				}
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}

	public function edit($id)
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$data = [
					'heading' 		=> 'Edit Data Barang',
					'title'			=> 'Edit Data Barang',
					'side_menu'		=> 'Master Data',
					'submenu_item'	=> 'Data Barang',
					'sidebar_item'	=> '',
					'barang'		=> $this->Barang_model->get_details($id)
				];

				$this->load->view('template/header', $data);
				$this->load->view('barang/edit', $data);
				$this->load->view('template/footer', $data);
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}

	public function edit_proses($id = null)
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$rules = $this->Barang_model->rules();
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() == FALSE) {
					$data = [
						'heading' 		=> 'Edit Data Barang',
						'title'			=> 'Edit Data Barang',
						'side_menu'		=> 'Master Data',
						'submenu_item'	=> 'Data Barang',
						'sidebar_item'	=> '',
						'barang'		=> $this->Barang_model->get_details($id)
					];
					$this->load->view('template/header', $data);
					$this->load->view('barang/edit', $data);
					$this->load->view('template/footer', $data);
				} else {
					$post = $this->input->post(null, true);
					$file_name 						= 'barang-' . date('ymd') . '-' . substr(md5(rand()), 0, 100);
					$config['upload_path']          = FCPATH . '/public/assets/images/barang';
					$config['allowed_types']        = 'gif|jpg|jpeg|png';
					$config['file_name']            = $file_name;
					$config['overwrite']            = true;
					$config['max_size']             = 1024; // 1MB

					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('gambar')) {
						$this->Barang_model->update($post);
						$this->session->set_flashdata('add_success', '<div class="alert alert-light-success">Data berhasil diupdate</div>');
						redirect(base_url('barang'));
					} else {
						$gambar_lama = './public/assets/images/barang/' . trim($post['gambar_lama']);
						unlink($gambar_lama);
						$post['gambar'] = $this->upload->data('file_name');
						$this->Barang_model->update($post);
						$this->session->set_flashdata('add_success', '<div class="alert alert-light-success">Data berhasil diupdate</div>');
						redirect(base_url('barang'));
					}
				}
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}

	public function remove($id = null)
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			if ($sesi['level'] == 'admin') {
				$row = $this->db->query("select gambar_barang from tb_barang where id_barang='$id'")->row();
				$gambar = './public/assets/images/barang/' . trim($row->gambar_barang);
				unlink($gambar);
				$this->Barang_model->delete($id);
				$this->session->set_flashdata('delete_success', '<div class="alert alert-light-danger">Data berhasil dihapus</div>');
				redirect('barang');
			} else {
				redirect(base_url(''));
			}
		} else {
			redirect(base_url('login'));
		}
	}
}

/* End of file Barang.php and path \application\controllers\Barang.php */
