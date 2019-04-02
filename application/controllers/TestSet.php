<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestSet extends MY_Controller {

	public function detail()
	{
		$this->render('testset/detail', ['child_view' => 'testset/testset']);
	}

	public function test()
	{
		$this->render('testset/detail', ['child_view' => 'testset/test']);
	}

	public function doing(){
		$this->render('testset/detail', ['child_view' => 'testset/doing']);
	}

	public function writting(){
		$this->render('testset/detail', ['child_view' => 'testset/writting']);
	}
	
}