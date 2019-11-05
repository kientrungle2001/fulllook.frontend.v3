<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dich_vu extends MY_Controller {
  function index() {
    $data = [
      'module' => 'dich_vu',
      'module_sub' => false,
	  'modal_size' => 'lg',
      'tieu_de' => 'Dịch vụ',
      'kich_co' => 12,
      'kich_co_nut_them' => 6,
      'kich_co_nut_loc' => 6,
      'truong_danh_sach' => [
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ten_dich_vu',
          'tieu_de' => 'Tên Dịch vụ'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ma_dich_vu',
          'tieu_de' => 'Mã Dịch vụ'
        ],
		[
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.phi_dich_vu',
          'tieu_de' => 'Phí Dịch vụ'
        ],
		[
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.hinh_thuc_dich_vu',
          'tieu_de' => 'Hình thức dịch vụ'
        ],
      ],
      'truong_them_sua' => [
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Tên Dịch vụ',
          'model' => 'ten_dich_vu'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Mã Dịch vụ',
          'model' => 'ma_dich_vu'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Phí dịch vụ',
          'model' => 'phi_dich_vu'
        ],
        [
          'loai_truong_them_sua' => 'so_xuong',
          'kich_co' => 6,
          'tieu_de' =>  'Nhà cung cấp',
          'model' => 'id_nha_cung_cap',
          'repeat' => 'nha_cung_cap in danh_sach_them_sua_nha_cung_cap',
          'option_label' => 'nha_cung_cap.ten_nha_cung_cap',
          'option_value' => 'nha_cung_cap._id.$oid',
          'tham_so' => [
            'ten_bang' => 'nha_cung_cap',
            'dieu_kien' => [
              'trang_thai' => true
            ]
          ],
		  'tham_so_thay_doi' => false,
          'ten_danh_sach' => 'danh_sach_them_sua_nha_cung_cap',
        ],
        [
          'loai_truong_them_sua' => 'so_xuong',
          'kich_co' => 6,
          'tieu_de' =>  'Loại dịch vụ',
          'model' => 'id_loai_dich_vu',
          'repeat' => 'loai_dich_vu in danh_sach_them_sua_loai_dich_vu',
          'option_label' => 'loai_dich_vu.ten_loai_dich_vu',
          'option_value' => 'loai_dich_vu._id.$oid',
          'tham_so' => [
            'ten_bang' => 'loai_dich_vu',
            'dieu_kien' => [
              'trang_thai' => true
            ]
          ],
		  'tham_so_thay_doi' => false,
          'ten_danh_sach' => 'danh_sach_them_sua_loai_dich_vu',
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Hình thức dịch vụ',
          'model' => 'hinh_thuc_dich_vu'
        ]
      ],
      'truong_loc' => [
        [
          'loai_truong_loc' => 'so_xuong',
          'kich_co' => 12,
          'tieu_de' => 'Nhà cung cấp',
          'model' => 'bo_loc.id_nha_cung_cap',
          'repeat' => 'ban_ghi in danh_sach_nha_cung_cap',
          'option_value' => 'ban_ghi._id.$oid',
          'option_label' => 'ban_ghi.ten_nha_cung_cap',
          'tham_so' => [
            'ten_bang' => 'nha_cung_cap',
            'dieu_kien' => [
              'trang_thai' => true
            ]
          ],
          'ten_danh_sach' => 'danh_sach_nha_cung_cap',
          'dieu_kien_thay_doi' => 'id_nha_cung_cap'
        ],
        [
          'loai_truong_loc' => 'so_xuong',
          'kich_co' => 12,
          'tieu_de' => 'Loại dịch vụ',
          'model' => 'bo_loc.id_loai_dich_vu',
          'repeat' => 'ban_ghi in danh_sach_loai_dich_vu',
          'option_value' => 'ban_ghi._id.$oid',
          'option_label' => 'ban_ghi.ten_loai_dich_vu',
          'tham_so' => [
            'ten_bang' => 'loai_dich_vu',
            'dieu_kien' => [
              'trang_thai' => true
            ]
          ],
          'ten_danh_sach' => 'danh_sach_loai_dich_vu',
          'dieu_kien_thay_doi' => 'id_loai_dich_vu'
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