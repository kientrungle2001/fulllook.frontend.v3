<?php
class Nhap_du_lieu extends MY_Action
{
  public function execute($luoc_do = 'cong_ty')
  {
    $luoc_do = $this->controller->laramongo->get('luoc_do', [
      'ma_luoc_do' => $luoc_do
    ]);
    $this->controller->render('tong_quat/nhap_du_lieu', ['luoc_do' => $luoc_do]);
  }
}