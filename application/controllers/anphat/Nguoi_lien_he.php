<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nguoi_lien_he extends MY_Controller {
  function index() {
    $this->render('nguoi_lien_he/tong_quan');
  }
}