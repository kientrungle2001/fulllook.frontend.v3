<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller {
	public function index()
	{
		$this->render('student/index');
	}
}