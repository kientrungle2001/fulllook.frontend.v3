<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MY_Controller {
	public function detail() {
		$this->render('article/detail');
	}
	public function category() {
		$this->render('article/category');
	}
}