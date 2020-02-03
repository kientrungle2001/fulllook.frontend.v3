<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nhan_vien extends MY_Controller {
  function index() {
    $data = [
      'module' => 'nhan_vien',
	    'modal_size' => 'lg',
      'tieu_de' => 'Nhân viên',
      'kich_co' => 12,
      'kich_co_nut_them' => 6,
      'kich_co_nut_loc' => 6,
      'truong_danh_sach' => [
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ten_nhan_vien',
          'tieu_de' => 'Tên Nhân viên'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ma_nhan_vien',
          'tieu_de' => 'Mã Nhân viên'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ten_dang_nhap',
          'tieu_de' => 'Tên đăng nhập'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.mat_khau',
          'tieu_de' => 'Mật khẩu'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ngay_vao_cong_ty',
          'tieu_de' => 'Ngày vào công ty'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ngay_roi_cong_ty',
          'tieu_de' => 'Ngày rời công ty'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ghi_chu',
          'tieu_de' => 'Ghi chú'
        ],
      ],
      'truong_them_sua' => [
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Tên Nhân viên',
          'model' => 'ten_nhan_vien'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Mã Nhân viên',
          'model' => 'ma_nhan_vien'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Tên đăng nhập',
          'model' => 'ten_dang_nhap'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Mật khẩu',
          'model' => 'mat_khau'
        ],
        [
          'loai_truong_them_sua' => 'so_xuong',
          'kich_co' => 6,
          'tieu_de' =>  'Phòng ban',
          'model' => 'id_phong_ban',
          'repeat' => 'phong_ban in danh_sach_them_sua_phong_ban',
          'option_label' => 'phong_ban.ten_phong_ban',
          'option_value' => 'phong_ban._id.$oid',
          'tham_so' => [
            'ten_bang' => 'phong_ban',
            'dieu_kien' => [
              'trang_thai' => true
            ]
          ],
          'ten_danh_sach' => 'danh_sach_them_sua_phong_ban',
          'tham_so_thay_doi' => false
        ],
        [
          'loai_truong_them_sua' => 'so_xuong',
          'kich_co' => 6,
          'tieu_de' =>  'Chức vụ',
          'model' => 'id_chuc_vu',
          'repeat' => 'chuc_vu in danh_sach_them_sua_chuc_vu',
          'option_label' => 'chuc_vu.ten_chuc_vu',
          'option_value' => 'chuc_vu._id.$oid',
          'tham_so' => [
            'ten_bang' => 'chuc_vu',
            'dieu_kien' => [
              'trang_thai' => true
            ]
          ],
          'ten_danh_sach' => 'danh_sach_them_sua_chuc_vu',
          'tham_so_thay_doi' => false
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Ghi chú',
          'model' => 'ghi_chu'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Ngày vào công ty',
          'model' => 'ngay_vao_cong_ty'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Ngày rời công ty',
          'model' => 'ngay_roi_cong_ty'
        ],
      ],
      'truong_loc' => [
        [
          'loai_truong_loc' => 'so_xuong',
          'kich_co' => 12,
          'tieu_de' => 'Phòng ban',
          'model' => 'bo_loc.id_phong_ban',
          'repeat' => 'ban_ghi in danh_sach_phong_ban',
          'option_value' => 'ban_ghi._id.$oid',
          'option_label' => 'ban_ghi.ten_phong_ban',
          'tham_so' => [
            'ten_bang' => 'phong_ban',
            'dieu_kien' => [
              'trang_thai' => true
            ]
          ],
          'tham_so_thay_doi' => false,
          'ten_danh_sach' => 'danh_sach_phong_ban',
          'ten_danh_sach_thay_doi' => false,
          'dieu_kien_thay_doi' => false
        ],
        [
          'loai_truong_loc' => 'so_xuong',
          'kich_co' => 12,
          'tieu_de' => 'Chức vụ',
          'model' => 'bo_loc.id_chuc_vu',
          'repeat' => 'ban_ghi in danh_sach_chuc_vu',
          'option_value' => 'ban_ghi._id.$oid',
          'option_label' => 'ban_ghi.ten_chuc_vu',
          'tham_so' => [
            'ten_bang' => 'chuc_vu',
            'dieu_kien' => [
              'trang_thai' => true
            ]
          ],
          'tham_so_thay_doi' => false,
          'ten_danh_sach' => 'danh_sach_chuc_vu',
          'ten_danh_sach_thay_doi' => false,
          'dieu_kien_thay_doi' => false
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

  function dang_nhap() {
    $this->render('nhan_vien/dang_nhap');
  }
}