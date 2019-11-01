<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loai_dich_vu extends MY_Controller {
  function index() {
    $this->render('loai_dich_vu/tong_quan');
  }
}