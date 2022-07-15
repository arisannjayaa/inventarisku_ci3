<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_model');
	}

	public function index()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			$data = [
				'heading' 		=> 'Profile',
				'title'			=> 'Profile',
				'card_header'	=> 'Details Profile',
				'side_menu'		=> '',
				'submenu_item'	=> '',
				'sidebar_item'	=> '',
				'profile'		=> $this->Profile_model->get_all($sesi['id_user'])
			];

			$this->load->view('template/header', $data);
			$this->load->view('profile/index', $data);
			$this->load->view('template/footer');
		} else {
			redirect(base_url('login'));
		}
	}

	public function edit()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			$this->load->model('Jurusan_model');
			$this->load->model('Prodi_model');
			$id = $this->session->userdata('id_user');
			$data = [
				'heading' 		=> 'Profile',
				'title'			=> 'Profile',
				'side_menu'		=> '',
				'submenu_item'	=> '',
				'sidebar_item'	=> '',
				'profile'		=> $this->Profile_model->get_details($id),
				'jurusan'		=> $this->Jurusan_model->get_all(),
				'prodi'			=> $this->Prodi_model->get_all()
			];

			$this->load->view('template/header', $data);
			$this->load->view('profile/edit', $data);
			$this->load->view('template/footer');
		} else {
			redirect(base_url('login'));
		}
	}

	public function edit_proses()
	{
		$sesi = $this->session->userdata();
		if ($sesi['status'] == 'logged') {
			$rules = $this->Profile_model->rules();
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run() == FALSE) {
				$id = $this->session->userdata('id_user');
				$this->load->model('Jurusan_model');
				$this->load->model('Prodi_model');
				$data = [
					'heading' 		=> 'Profile',
					'title'			=> 'Profile',
					'side_menu'		=> '',
					'submenu_item'	=> '',
					'sidebar_item'	=> '',
					'profile'		=> $this->Profile_model->get_details($id),
					'jurusan'		=> $this->Jurusan_model->get_all(),
					'prodi'			=> $this->Prodi_model->get_all()
				];
				$this->load->view('template/header', $data);
				$this->load->view('profile/edit', $data);
				$this->load->view('template/footer');
			} else {
				$post = $this->input->post(null, true);
				$file_name 						= 'avatar-' . date('ymd') . '-' . substr(md5(rand()), 0, 100);
				$config['upload_path']          = FCPATH . '/public/assets/images/avatars';
				$config['allowed_types']        = 'gif|jpg|jpeg|png';
				$config['file_name']            = $file_name;
				$config['overwrite']            = true;
				$config['max_size']             = 2048; // 2MB

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					$this->Profile_model->update($post);
					$this->session->set_flashdata('add_success', '<div class="alert alert-light-success">Data berhasil diupdate</div>');
					redirect(base_url('profile'));
				} else {
					$gambar_lama = './public/assets/images/avatars/' . trim($post['gambar_lama']);
					if ($post['gambar_lama'] == 'default.png') {
						$post['gambar'] = $this->upload->data('file_name');
						$this->Profile_model->update($post);
						$this->session->set_flashdata('add_success', '<div class="alert alert-light-success">Data berhasil diupdate</div>');
						redirect(base_url('profile'));
					} else {
						unlink($gambar_lama);
						$post['gambar'] = $this->upload->data('file_name');
						$this->Profile_model->update($post);
						$this->session->set_flashdata('add_success', '<div class="alert alert-light-success">Data berhasil diupdate</div>');
						redirect(base_url('profile'));
					}
				}
			}
		} else {
			redirect(base_url('login'));
		}
	}
}

/* End of file Profile.php and path \application\controllers\Profile.php */
