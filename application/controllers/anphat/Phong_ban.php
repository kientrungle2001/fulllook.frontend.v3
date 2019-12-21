<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phong_ban extends MY_Controller {
  function index() {
    $data = [
      'module' => 'phong_ban',
      'modal_size' => 'normal',
        'tieu_de' => 'Phòng ban',
        'kich_co' => 12,
        'kich_co_nut_them' => 6,
        'kich_co_nut_loc' => 6,
        'truong_danh_sach' => [
          [
            'loai_truong_tieu_de' => 'van_ban',
            'loai_truong_danh_sach' => 'van_ban',
            'model' => 'ban_ghi.ten_phong_ban',
            'tieu_de' => 'Tên Phòng ban'
          ],
          [
            'loai_truong_tieu_de' => 'van_ban',
            'loai_truong_danh_sach' => 'van_ban',
            'model' => 'ban_ghi.ma_phong_ban',
            'tieu_de' => 'Mã Phòng ban'
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
            'tieu_de' =>  'Tên Phòng ban',
            'model' => 'ten_phong_ban'
          ],
          [
            'loai_truong_them_sua' => 'van_ban',
            'kich_co' => 24,
            'tieu_de' =>  'Mã Phòng ban',
            'model' => 'ma_phong_ban'
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