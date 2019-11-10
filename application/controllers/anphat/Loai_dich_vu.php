<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loai_dich_vu extends MY_Controller {
  function index() {
    $data = [
      'module' => 'loai_dich_vu',
	  'modal_size' => 'normal',
      'tieu_de' => 'Loại dịch vụ',
      'kich_co' => 12,
      'kich_co_nut_them' => 6,
      'kich_co_nut_loc' => 6,
      'truong_danh_sach' => [
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ten_loai_dich_vu',
          'tieu_de' => 'Tên Loại DV'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ma_loai_dich_vu',
          'tieu_de' => 'Mã Loại DV'
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
          'kieu_du_lieu' => 'text',
          'tieu_de' =>  'Tên Loại DV',
          'model' => 'ten_loai_dich_vu'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 24,
          'kieu_du_lieu' => 'text',
          'tieu_de' =>  'Mã Loại DV',
          'model' => 'ma_loai_dich_vu'
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