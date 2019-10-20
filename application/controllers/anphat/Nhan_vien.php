<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nhan_vien extends MY_Controller {
  function index() {
    $this->render('nhan_vien/tong_quan');
  }
}