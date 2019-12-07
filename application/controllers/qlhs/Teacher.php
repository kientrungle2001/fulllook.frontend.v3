<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends MY_Controller {
	public function index()
	{
		$this->render('teacher/index');
	}

	public function muster() {
		$this->render('teacher/muster');
	}

	public function report() {
		$this->render('teacher/report');
  }
}