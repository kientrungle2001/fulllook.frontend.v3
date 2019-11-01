<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dich_vu extends MY_Controller {
  function index() {
    $this->render('dich_vu/tong_quan');
  }
}