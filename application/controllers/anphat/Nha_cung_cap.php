<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nha_cung_cap extends MY_Controller {
  function index() {
    $this->render('nha_cung_cap/tong_quan');
  }
}