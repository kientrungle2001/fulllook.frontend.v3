<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thong_tin_han extends MY_Controller {
  function index() {
    $this->render('thong_tin_han/tong_quan');
  }
}