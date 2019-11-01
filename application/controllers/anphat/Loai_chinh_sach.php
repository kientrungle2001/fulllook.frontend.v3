<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loai_chinh_sach extends MY_Controller {
  function index() {
    $this->render('loai_chinh_sach/tong_quan');
  }
}