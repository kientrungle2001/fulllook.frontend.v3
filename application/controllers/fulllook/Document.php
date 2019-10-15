<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends MY_Controller {

	public function index()
	{
		$this->render('document/index');
  }

  public function detail() {
    $this->render('document/detail');
  }

}