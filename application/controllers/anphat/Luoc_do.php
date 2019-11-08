<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Luoc_do extends MY_Controller
{
  function index()
  {
    $data = [
      'module' => 'luoc_do',
      'modal_size' => 'normal',
      'tieu_de' => 'Lược đồ',
      'kich_co' => 12,
      'kich_co_nut_them' => 6,
      'kich_co_nut_loc' => 6,
      'truong_danh_sach' => [
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ten_luoc_do',
          'tieu_de' => 'Tên Lược đồ'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ma_luoc_do',
          'tieu_de' => 'Mã Lược đồ'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.thu_tu',
          'tieu_de' => 'Thứ tự'
        ],
      ],
      'truong_them_sua' => [
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 24,
          'tieu_de' =>  'Tên Lược đồ',
          'model' => 'ten_luoc_do',
          'kieu_du_lieu' => 'text',
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 24,
          'tieu_de' =>  'Mã Lược đồ',
          'model' => 'ma_luoc_do',
          'kieu_du_lieu' => 'text',
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kieu_du_lieu' => 'number',
          'kich_co' => 24,
          'tieu_de' =>  'Thứ tự',
          'model' => 'thu_tu'
        ],
      ],
      'truong_loc' => [
        [
          'loai_truong_loc' => 'nut_bam',
          'kich_co' => 6,
          'tieu_de' => 'Thực hiện',
          'model' => "loc_du_lieu(bo_loc);"
        ],
      ]
    ];
    $this->render('tong_quat/tong_quan', $data);
  }
}
