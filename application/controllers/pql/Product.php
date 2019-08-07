<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

	public function index($language = 'vi'){
		$data = array('language' => $language);
		$this->load_pql_models($data);
		$this->render('product/index', $data);
	}

	public function category($language = 'vi', $catId = null){
		$data = array('language' => $language, 'catId' => $catId);
		$this->load_pql_models($data);
		$this->render('product/category', $data);
	}

	public function feed($language = 'vi', $catId = null){
		$data = array('language' => $language, 'catId' => $catId);
		$this->load_pql_models($data);
		header("Content-type: text/xml");
		$this->view('product/feed', $data);
	}

	public function detail($language = 'vi', $catId = null, $productId = null){
		$data = array('language' => $language, 'catId' => $catId, 'productId' => $productId);
		$this->load_pql_models($data);
		$this->render('product/detail', $data);
	}
}