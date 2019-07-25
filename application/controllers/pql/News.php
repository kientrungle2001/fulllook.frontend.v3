<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {

	public function index($language = 'vi'){
		$this->render('news/index', array('language' => $language));
	}

	public function category($language = 'vi', $catId){
		$this->render('news/category', array('language' => $language, 'catId' => $catId));
	}

	public function detail($language = 'vi', $newsId){
		$this->render('news/detail', array('language' => $language, 'newsId' => $newsId));
	}
}