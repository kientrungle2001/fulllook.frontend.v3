<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Practice extends MY_Controller {

	public function detail()
	{
		$this->render('practice/detail');
	}

	public function topic(){
		$this->render('practice/detail', ['child_view' => 'practice/topic']);
	}

	public function exercise(){
		$this->render('practice/detail', ['child_view' => 'practice/exercise']);
	}

	public function doing(){
		$this->render('practice/detail', ['child_view' => 'practice/doing']);
	}

	public function vocabulary() {
		$this->render('practice/detail', ['child_view' => 'practice/vocabulary', 'is_vocabulary' => true]);
	}
}