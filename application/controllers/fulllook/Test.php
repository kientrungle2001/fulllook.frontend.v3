<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller {

	public function detail()
	{
		$this->render('test/detail');
	}

	public function doing(){
		$this->render('test/detail', ['child_view' => 'test/doing']);
	}
	
}