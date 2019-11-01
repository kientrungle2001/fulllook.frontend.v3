<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chuc_vu extends MY_Controller {
  function index() {
    $this->render('chuc_vu/tong_quan');
  }
}