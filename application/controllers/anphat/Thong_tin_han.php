<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thong_tin_han extends MY_Controller {
  function index() {
    $this->render('thong_tin_han/tong_quan');
  }

  function danh_sach() {
    require_once 'thong_tin_han/Danh_sach.php';
    $danh_sach = new Danh_sach();
    return $this->call_action($danh_sach, 'thong_tin_han');
  }
}