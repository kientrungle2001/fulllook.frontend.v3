<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
  function index() {
    $this->render('test/grid/thap');
  }
}