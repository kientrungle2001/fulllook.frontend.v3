<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index($language = 'vi'){
		$data = array();
		$this->load_pql_models($data);
		#
		$blogname = $this->options_model->get_blogname();
		$slogan = $this->options_model->get_slogan();
		#
		$page_title = 'Trang chủ | ' . wpglobus($blogname['value'], $language);
		$page_description = wpglobus($slogan['value'], $language);
		$page_keywords = '';
		$data = array_merge($data, array(
			'language' => $language,
			'page_title' => $page_title,
			'page_description' => $page_description,
			'page_keywords' => $page_keywords
		));
		
		$this->render('home', $data);
	}

	public function login_callback() {
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

	public function logout() {
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
}