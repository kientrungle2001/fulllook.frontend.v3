<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

	public function index($language = 'vi'){
		$data = array('language' => $language);
		$this->load_pql_models($data);
		$this->render('contact/index', $data);
	}
}