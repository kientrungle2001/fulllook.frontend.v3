<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

	public function index($language = 'vi')
	{
		$data = array();
		$this->load_pql_models($data);
		#
		$blogname = $this->options_model->get_blog_name();
		$slogan = $this->options_model->get_slogan();
		$logo = $this->options_model->get_logo();
		#
		$description = $this->options_model->get_blog_description();
		if (!$description) {
			$description = $slogan;
		}
		#
		$keywords = $this->options_model->get_blog_keywords();
		#
		$page_title = wpglobus('{:vi}Trang chủ{:}{:en}Home{:}', $language) . ' | ' . wpglobus($blogname, $language);
		$page_description = wpglobus($description, $language);
		$page_keywords = wpglobus($keywords, $language);
		$data = array_merge($data, array(
			'language' 			=> $language,
			'page_title' 		=> $page_title,
			'page_description' 	=> $page_description,
			'page_keywords' 	=> $page_keywords,
			'page_image' 		=> $logo
		));

		$this->render('home', $data);
	}

	public function login_callback()
	{
		$dataUser = $this->input->get();
		$this->session->username = $dataUser['username'];
		$this->session->phone = $dataUser['phone'];
		$this->session->email = $dataUser['email'];
		$this->session->name = $dataUser['name'];
		$this->session->userId = $dataUser['userId'];
		$this->session->checkPayment = $dataUser['checkPayment'];
		$this->session->paymentDate = $dataUser['paymentDate'];
		$this->session->expiredDate = $dataUser['expiredDate'];
		header('Location: /');
	}

	public function logout()
	{
		$this->session->username = null;
		$this->session->phone = null;
		$this->session->email = null;
		$this->session->name = null;
		$this->session->userId = null;
		$this->session->checkPayment = null;
		$this->session->paymentDate = null;
		$this->session->expiredDate = null;
		header('Location: /');
	}

	public function sitemap($language = 'vi')
	{
		$data = array('language' => $language);
		$this->load_pql_models($data);
		$xml = $this->view('sitemap', $data, true);
		file_put_contents(FCPATH . 'sitemap.xml', $xml);
		echo 'sitemap.xml generated. <a href="/sitemap.xml">Link here</a>';
	}

	public function test($language = 'vi')
	{
		$post = $this->curl->get('https://mobo.com.vn/_pql/wp-json/wp/v2/posts/734?context=view');
		echo '<pre>';
		$post = json_decode($post, true);
		echo json_encode($post, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	}

	public function slug($slug, $slug2 = null)
	{
		$term = $this->terms_model->get_by_slug($slug);
		var_dump($term);
		if ($slug2) {
			$term = $this->terms_model->get_by_slug($slug2);
			var_dump($term);
		}
	}
}
