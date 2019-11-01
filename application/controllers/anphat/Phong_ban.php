<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phong_ban extends MY_Controller {
  function index() {
    $this->render('phong_ban/tong_quan');
  }
}