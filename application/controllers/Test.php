<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'judul'  => 'home',
			'text' 	 => 'ini halaman dashboard'
		];

		$this->load->view('template/header', $data);
		$this->load->view('parser/test2', $data);
		$this->load->view('template/footer', $data);
	}

	public function shorcuts()
	{
		$data = [
			'judul'  => 'home',
			'text' 	 => 'ini halaman shorcuts'
		];

		$this->load->view('template/header', $data);
		$this->load->view('parser/test2', $data);
		$this->load->view('template/footer', $data);
	}

	public function overview()
	{
		$data = [
			'judul'  => 'home',
			'text' 	 => 'ini halaman overview'
		];

		$this->load->view('template/header', $data);
		$this->load->view('parser/test2', $data);
		$this->load->view('template/footer', $data);
	}

	public function events()
	{
		$data = [
			'judul'  => 'home',
			'text' 	 => 'ini halaman events'
		];

		$this->load->view('template/header', $data);
		$this->load->view('parser/test2', $data);
		$this->load->view('template/footer', $data);
	}

	public function tempt()
	{
		$data = [
			'judul' 	=> 'help',
			'text' 		=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus totam laborum facilis earum consequatur nulla illo nihil rerum exercitationem, esse aspernatur. Temporibus ullam fugiat maiores, natus inventore cum ad quisquam!
			Asperiores laboriosam optio nisi ipsa sunt aspernatur cum necessitatibus dicta fugit culpa, consequuntur reprehenderit sequi dolores provident iusto natus hic, vel illo beatae quis voluptatem repellat totam vero nobis. Modi.
			Quaerat est minima qui iusto, impedit beatae atque labore ullam quos ea, ipsa dolore consequatur a eum doloribus pariatur, illum officia sequi molestiae? Dolor nemo tenetur amet debitis similique optio.
			Voluptates incidunt odit tempora porro placeat nemo? Ipsa rem blanditiis facilis, minima magnam perspiciatis, accusamus qui unde iure labore dolores quaerat est temporibus quia odit perferendis fuga. Cupiditate, veniam quos?
			Illo beatae, animi dicta commodi pariatur laborum, molestias nostrum amet cupiditate culpa nulla iure vitae, adipisci harum laudantium illum eos. Vel cumque modi necessitatibus neque. Dolorum quae in asperiores alias.
			Esse rerum enim facilis cupiditate consequuntur recusandae, nisi in voluptatibus nulla molestias quidem quaerat corporis earum necessitatibus. Necessitatibus a exercitationem, odio voluptate perferendis, dignissimos ad eos voluptatem labore architecto numquam.
			Veniam unde, adipisci accusamus voluptatem id esse enim dolorem! Veritatis consequatur, eaque, fugiat sed repudiandae odio, molestias ducimus suscipit eius neque vel alias! Doloremque quos voluptas rem culpa pariatur eum?
			Reprehenderit laboriosam, laborum molestias repellat omnis suscipit sequi unde, at voluptates esse tenetur dolor dolores fugiat autem. Placeat corporis magnam dolor accusamus, eveniet, dignissimos quo repellat, ex sapiente pariatur tenetur!
			Dicta, temporibus odit molestiae deleniti ex, repudiandae praesentium rem aspernatur perferendis esse, optio earum ullam maiores eum sunt natus. Quisquam odio consequuntur earum asperiores odit et architecto iusto facilis temporibus?
			Optio debitis repudiandae illo accusantium maiores sequi quos omnis saepe doloremque enim. Dicta vitae, quidem asperiores rem porro debitis fugiat tenetur beatae provident non ex natus quasi dolores laboriosam sequi!',
			'footer'	=> 'ini footer help'
		];

		$this->load->view('template/header', $data);
		$this->load->view('parser/help', $data);
		$this->load->view('template/footer', $data);
	}

	public function temp()
	{
		$template = 'Hello, {firstname} {lastname}';
		$data = array(
			'title' 		=> 'Ms',
			'firstname' => 'Ayu',
			'lastname' 	=> 'Tari'
		);

		$this->parser->parse_string($template, $data);
	}

	public function temp2()
	{
		$template = 'Hello, {degrees} {firstname} {lastname} {titles} {degree} {/titles}';
		$data = array(
			'degrees' 	=> 'Ms',
			'firstname' => 'Ayu',
			'lastname' 	=> 'Tari',
			'titles' 		=> array(
				array('degree' => 'S.kom'),
				array('degree' => 'M.kom')
			)
		);
		$this->parser->parse_string($template, $data);
	}

	public function temp3()
	{
		$data = array(
			'blog_title' 		=> 'My Blog Title',
			'blog_heading' 	=> 'My Blog Heading',
		);

		$string = $this->parser->parse('parser/test', $data);
	}

	public function temp4()
	{
		$data = array(
			'blog_title' 		=> 'Web Lanjut',
			'blog_heading' 	=> 'Belajar Web Lanjut',
			'blog_entries' 	=> array(
				array(
					'title' => 'materi 1',
					'body' 	=> 'crud'
				)
			)
		);

		$string = $this->parser->parse('parser/test', $data);
	}
}


/* End of file Test.php */
/* Location: ./application/controllers/Test.php */
