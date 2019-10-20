<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dia_diem extends MY_Controller {
  function index() {
    $this->render('dia_diem/tong_quan');
  }
}