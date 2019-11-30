<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loai_thuoc_tinh extends MY_Controller {
  function index() {
    $data = [
      'module' => 'loai_thuoc_tinh',
      'modal_size' => 'normal',
        'tieu_de' => 'Loại Thuộc tính',
        'kich_co' => 24,
        'kich_co_nut_them' => 3,
        'kich_co_nut_loc' => 3,
        'du_lieu_tinh' => [
          'danh_sach_pham_vi_loai_thuoc_tinh' => [
            [
              'value' => 'truong_danh_sach',
              'label' => 'Trường danh sách'
            ],
            [
              'value' => 'truong_loc',
              'label' => 'Trường lọc'
            ],
            [
              'value' => 'truong_them_sua',
              'label' => 'Trường thêm sửa'
            ],
          ]
        ],
        'truong_danh_sach' => [
          [
            'loai_truong_tieu_de' => 'van_ban',
            'loai_truong_danh_sach' => 'van_ban',
            'model' => 'ban_ghi.ten_loai_thuoc_tinh',
            'tieu_de' => 'Tên Loại Thuộc tính'
          ],
          [
            'loai_truong_tieu_de' => 'van_ban',
            'loai_truong_danh_sach' => 'van_ban',
            'model' => 'ban_ghi.ma_loai_thuoc_tinh',
            'tieu_de' => 'Mã Loại Thuộc tính'
          ],
          [
            'loai_truong_tieu_de' => 'van_ban',
            'loai_truong_danh_sach' => 'van_ban',
            'model' => 'ban_ghi.pham_vi_loai_thuoc_tinh',
            'tieu_de' => 'Phạm vi Loại Thuộc tính'
          ],
          [
            'loai_truong_tieu_de' => 'van_ban',
            'loai_truong_danh_sach' => 'van_ban',
            'model' => 'ban_ghi.loai_thuoc_tinh_goc',
            'tieu_de' => 'Loại Thuộc tính gốc(true/false)'
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
            'tieu_de' =>  'Tên Loại Thuộc tính',
            'model' => 'ten_loai_thuoc_tinh'
          ],
          [
            'loai_truong_them_sua' => 'van_ban',
            'kich_co' => 24,
            'kieu_du_lieu' => 'text',
            'tieu_de' =>  'Mã Loại Thuộc tính',
            'model' => 'ma_loai_thuoc_tinh'
          ],
          [
            'loai_truong_them_sua' => 'van_ban',
            'kich_co' => 24,
            'kieu_du_lieu' => 'text',
            'tieu_de' =>  'Phạm vi Loại Thuộc tính',
            'model' => 'pham_vi_loai_thuoc_tinh'
          ],
          [
            'loai_truong_them_sua' => 'doan_viet',
            'kich_co' => 24,
            'kieu_du_lieu' => 'textarea',
            'tieu_de' =>  'Tham số Loại Thuộc tính',
            'model' => 'tham_so_loai_thuoc_tinh'
          ],
          [
            'loai_truong_them_sua' => 'van_ban',
            'kich_co' => 24,
            'kieu_du_lieu' => 'checkbox',
            'tieu_de' =>  'Loại Thuộc tính gốc',
            'model' => 'loai_thuoc_tinh_goc'
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
            'loai_truong_loc' => 'so_xuong',
            'kich_co' => 3,
            'tieu_de' => 'Phạm vi loại thuộc tính',
            'repeat' => 'ban_ghi in du_lieu_tinh.danh_sach_pham_vi_loai_thuoc_tinh',
            'option_label' => 'ban_ghi.label',
            'option_value' => 'ban_ghi.value',
            'model' => 'bo_loc.pham_vi_loai_thuoc_tinh'
          ],
          [
            'loai_truong_loc' => 'nut_bam',
            'kich_co' => 3,
            'tieu_de' => 'Thực hiện',
            'model' => "loc_du_lieu(bo_loc);"
          ],
        ]
      ];
      $this->render('tong_quat/tong_quan', $data);
  }
}