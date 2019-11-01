<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chinh_sach_dich_vu extends MY_Controller {
  function index() {
    $this->render('chinh_sach_dich_vu/tong_quan');
  }
}