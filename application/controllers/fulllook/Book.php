<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends MY_Controller {
	public function index() {

	}

	public function detail() {
		$this->render('book/detail');
	}
}