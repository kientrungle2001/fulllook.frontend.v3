<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {

	public function index($language = 'vi'){
		$data = array('language' => $language);
		$this->load_pql_models($data);
		$this->render('news/index', $data);
	}

	public function category($language = 'vi', $catId = null){
		$data = array('language' => $language, 'catId' => $catId);
		$this->load_pql_models($data);
		$this->render('news/category', $data);
	}

	public function detail($language = 'vi', $catId = null, $newsId = null){
		$data = array('language' => $language, 'catId' => $catId, 'newsId' => $newsId);
		$this->load_pql_models($data);
		$this->render('news/detail', $data);
	}
}