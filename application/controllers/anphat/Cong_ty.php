<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cong_ty extends MY_Controller {
  function index() {
    $this->render('cong_ty/tong_quan');
  }
}