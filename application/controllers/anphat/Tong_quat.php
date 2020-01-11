<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tong_quat extends MY_Controller
{

  function danh_sach($ma_luoc_do) {
    require_once 'tong_quat/Danh_sach.php';
    $danh_sach = new Danh_sach();
    return $this->call_action($danh_sach, $ma_luoc_do);
  }

  public function chi_tiet($ma_luoc_do, $id)
  {
    require_once 'tong_quat/Chi_tiet.php';
    $chi_tiet = new Chi_tiet();
    return $this->call_action($chi_tiet, $id);
  }

  public function them_moi($ma_luoc_do, $id_bo_thuoc_tinh = null) {
    require_once 'tong_quat/Them_moi.php';
    $them_moi = new Them_moi();
    return $this->call_action($them_moi, $id_bo_thuoc_tinh);
  }

  public function sua_doi($ma_luoc_do, $id, $id_bo_thuoc_tinh = null) {
    require_once 'tong_quat/Sua_doi.php';
    $sua_doi = new Sua_doi();
    return $this->call_action($sua_doi, $id, $id_bo_thuoc_tinh);
  }

  public function nhap_du_lieu($ma_luoc_do) {
    require_once 'tong_quat/Nhap_du_lieu.php';
    $nhap_du_lieu = new Nhap_du_lieu();
    return $this->call_action($nhap_du_lieu, $ma_luoc_do);
  }

  public function xuat_du_lieu($ma_luoc_do) {
    require_once 'tong_quat/Xuat_du_lieu.php';
    $xuat_du_lieu = new Xuat_du_lieu();
    return $this->call_action($xuat_du_lieu, $ma_luoc_do);
  }
}
