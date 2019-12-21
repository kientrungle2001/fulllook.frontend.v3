<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Co_quan_thue extends MY_Controller {
  function index() {
    $data = [
      'module' => 'co_quan_thue',
      'module_sub' => true,
	  'modal_size' => 'lg',
      'tieu_de' => 'Cơ quan thuế',
      'kich_co' => 12,
      'kich_co_nut_them' => 6,
      'kich_co_nut_loc' => 6,
      'truong_danh_sach' => [
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ten_co_quan_thue',
          'tieu_de' => 'Tên Cơ quan thuế'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ma_co_quan_thue',
          'tieu_de' => 'Mã Cơ quan thuế'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ma_so_thue',
          'tieu_de' => 'Mã số thuế'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.dia_chi',
          'tieu_de' => 'Địa chỉ'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.so_dien_thoai',
          'tieu_de' => 'Số điện thoại'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.email',
          'tieu_de' => 'Email'
        ]
      ],
      'truong_them_sua' => [
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Tên Cơ quan thuế',
          'model' => 'ten_co_quan_thue'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Mã Cơ quan thuế',
          'model' => 'ma_co_quan_thue'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Mã số thuế',
          'model' => 'ma_so_thue'
        ],
        [
          'loai_truong_them_sua' => 'so_xuong',
          'kich_co' => 6,
          'tieu_de' =>  'Tỉnh',
          'model' => 'id_tinh',
          'repeat' => 'tinh in danh_sach_them_sua_tinh',
          'option_label' => 'tinh.ten_dia_diem',
          'option_value' => 'tinh._id.$oid',
          'tham_so' => [
            'ten_bang' => 'dia_diem',
            'dieu_kien' => [
              'loai_dia_diem' => 'tinh',
              'trang_thai' => true
            ]
          ],
          'tham_so_thay_doi' => [
            'ten_bang' => 'dia_diem',
            'dieu_kien' => [
              'loai_dia_diem' => 'huyen',
              'trang_thai' => true
            ]
          ],
          'ten_danh_sach' => 'danh_sach_them_sua_tinh',
          'ten_danh_sach_thay_doi' => 'danh_sach_them_sua_huyen',
          'dieu_kien_thay_doi' => 'id_khu_vuc'
        ],
        [
          'loai_truong_them_sua' => 'so_xuong',
          'kich_co' => 6,
          'tieu_de' =>  'Huyện',
          'model' => 'id_huyen',
          'repeat' => 'huyen in danh_sach_them_sua_huyen',
          'option_label' => 'huyen.ten_dia_diem',
          'option_value' => 'huyen._id.$oid',
          'tham_so' => false,
          'tham_so_thay_doi' => false
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Địa chỉ',
          'model' => 'dia_chi'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Số điện thoại',
          'model' => 'so_dien_thoai'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Email',
          'model' => 'email'
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
          'option_label' => 'ban_ghi.ten_dia_diem',
          'change' => 'tai_danh_sach_huyen(ban_ghi)',
          'tham_so' => [
            'ten_bang' => 'dia_diem',
            'dieu_kien' => [
              'loai_dia_diem' => 'tinh',
              'trang_thai' => true
            ]
          ],
          'tham_so_thay_doi' => [
            'ten_bang' => 'dia_diem',
            'dieu_kien' => [
              'loai_dia_diem' => 'huyen',
              'trang_thai' => true
            ]
          ],
          'ten_danh_sach' => 'danh_sach_tinh',
          'ten_danh_sach_thay_doi' => 'danh_sach_huyen',
          'dieu_kien_thay_doi' => 'id_khu_vuc'
        ],
        [
          'loai_truong_loc' => 'so_xuong',
          'kich_co' => 12,
          'tieu_de' => 'Huyện',
          'model' => 'bo_loc.id_huyen',
          'repeat' => 'ban_ghi in danh_sach_huyen',
          'option_value' => 'ban_ghi._id.$oid',
          'option_label' => 'ban_ghi.ten_dia_diem',
          'tham_so' => false,
          'tham_so_thay_doi' => false
        ],
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
