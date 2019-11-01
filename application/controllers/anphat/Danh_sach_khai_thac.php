<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Danh_sach_khai_thac extends MY_Controller {
  function index() {
    $this->render('danh_sach_khai_thac/tong_quan');
  }
}