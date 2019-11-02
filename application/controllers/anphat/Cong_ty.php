<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cong_ty extends MY_Controller {
  function index() {
    $data = [
      'module' => 'cong_ty',
      'tieu_de' => 'Công ty',
      'kich_co' => 12,
      'kich_co_nut_them' => 6,
      'kich_co_nut_loc' => 6,
      'truong_danh_sach' => [
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ten_cong_ty',
          'tieu_de' => 'Tên công ty'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ma_cong_ty',
          'tieu_de' => 'Mã công ty'
        ]
      ],
      'truong_them_sua' => [
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 12,
          'tieu_de' =>  'Tên công ty',
          'model' => 'ban_ghi_moi.ten_cong_ty'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 12,
          'tieu_de' =>  'Mã công ty',
          'model' => 'ban_ghi_moi.ma_cong_ty'
        ]
      ],
      'truong_loc' => [
        [
          'loai_truong_loc' => 'so_xuong',
          'kich_co' => 12,
          'tieu_de' => 'Tỉnh',
          'model' => 'bo_loc.id_tinh',
          'repeat' => 'ban_ghi in danh_sach_tinh',
          'option_value' => 'ban_ghi._id.$oid',
          'option_label' => 'ban_ghi.ten_dia_diem'
        ],
        [
          'loai_truong_loc' => 'so_xuong',
          'kich_co' => 12,
          'tieu_de' => 'Huyện',
          'model' => 'bo_loc.id_huyen',
          'repeat' => 'ban_ghi in danh_sach_huyen',
          'option_value' => 'ban_ghi._id.$oid',
          'option_label' => 'ban_ghi.ten_dia_diem'
        ],
        [
          'loai_truong_loc' => 'nut_bam',
          'kich_co' => 24,
          'tieu_de' => 'Loc',
          'model' => "loc_du_lieu(bo_loc); hien_thi_bo_loc = false;"
        ],
      ]
    ];
    $this->render('tong_quat/tong_quan', $data);
  }
}