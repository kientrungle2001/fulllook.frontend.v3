<?php
class Nhap_du_lieu extends MY_Action
{
  public function execute($luoc_do = 'cong_ty')
  {
    $this->controller->render('cong_ty/nhap_du_lieu');
  }
}