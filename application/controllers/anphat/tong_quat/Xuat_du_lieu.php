<?php
class Xuat_du_lieu extends MY_Action
{
  public function execute($luoc_do = 'cong_ty')
  {
    $this->controller->render('tong_quat/xuat_du_lieu', ['luoc_do' => $luoc_do]);
  }
}