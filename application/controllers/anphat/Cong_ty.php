<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cong_ty extends MY_Controller
{
  function index()
  {
    $data = [
      'module' => 'cong_ty',
      'module_sub' => false,
      'modal_size' => 'lg',
      'tieu_de' => 'Công ty',
      'kich_co' => 24,
      'kich_co_nut_them' => 6,
      'kich_co_nut_loc' => 6,
      'du_lieu_tai_tu_dong' => [
        [
          'ten_danh_sach' => 'danh_sach_tinh_thanh_pho',
          'goi_du_lieu' => [
            'ten_bang' => 'tinh_thanh_pho',
            'sap_xep' => 'id',
            'thu_tu' => 'asc'
          ]
        ],
        [
          'ten_danh_sach' => 'danh_sach_nhan_vien',
          'goi_du_lieu' => [
            'ten_bang' => 'nhan_vien',
            'sap_xep' => '_id',
            'thu_tu' => 'desc'
          ]
        ],
        [
          'ten_danh_sach' => 'danh_sach_nha_cung_cap',
          'goi_du_lieu' => [
            'ten_bang' => 'nha_cung_cap',
            'sap_xep' => 'id',
            'thu_tu' => 'asc'
          ]
        ],
        [
          'ten_danh_sach' => 'danh_sach_loai_danh_sach',
          'goi_du_lieu' => [
            'ten_bang' => 'loai_danh_sach',
            'sap_xep' => 'id',
            'thu_tu' => 'asc'
          ]
        ],
        [
          'ten_danh_sach' => 'danh_sach_danh_sach_khai_thac',
          'goi_du_lieu' => [
            'ten_bang' => 'danh_sach_khai_thac',
            'sap_xep' => 'id',
            'thu_tu' => 'asc'
          ]
        ],
      ],
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
          'loai_truong_danh_sach' => 'tham_chieu_tinh',
          'model' => 'ban_ghi.id_tinh',
          'tieu_de' => 'Tỉnh/TP'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'tham_chieu_huyen',
          'id_field' => 'id',
          'model' => 'ban_ghi.id_huyen',
          'tham_chieu' => 'id_huyen',
          'gia_tri_tham_chieu' => 'ten_dia_diem',
          'danh_sach_tham_chieu' => 'danh_sach_tham_chieu_huyen',
          //'ten_bang' => 'quan_huyen',
          'tieu_de' => 'Quận huyện'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'tham_chieu',
          'model' => 'ban_ghi.id_nhan_vien',
          'tham_chieu' => 'id_nhan_vien',
          'gia_tri_tham_chieu' => 'ten_nhan_vien',
          'danh_sach_tham_chieu' => 'danh_sach_nhan_vien',
          //'ten_bang' => 'quan_huyen',
          'tieu_de' => 'Nhân viên'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'tham_chieu',
          'model' => 'ban_ghi.id_nha_cung_cap',
          'tham_chieu' => 'id_nha_cung_cap',
          'gia_tri_tham_chieu' => 'ten_nha_cung_cap',
          'danh_sach_tham_chieu' => 'danh_sach_nha_cung_cap',
          //'ten_bang' => 'quan_huyen',
          'tieu_de' => 'Nhà cung cấp'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'tham_chieu',
          'model' => 'ban_ghi.id_loai_danh_sach',
          'tham_chieu' => 'id_loai_danh_sach',
          'gia_tri_tham_chieu' => 'ten_loai_danh_sach',
          'danh_sach_tham_chieu' => 'danh_sach_loai_danh_sach',
          //'ten_bang' => 'quan_huyen',
          'tieu_de' => 'Loại danh sách'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'tham_chieu',
          'model' => 'ban_ghi.id_danh_sach_khai_thac',
          'tham_chieu' => 'id_danh_sach_khai_thac',
          'gia_tri_tham_chieu' => 'ten_danh_sach_khai_thac',
          'danh_sach_tham_chieu' => 'danh_sach_danh_sach_khai_thac',
          //'ten_bang' => 'quan_huyen',
          'tieu_de' => 'Danh sách khai thác'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ghi_chu',
          'tieu_de' => 'Ghi chú'
        ],
        [
          'loai_truong_tieu_de' => 'van_ban',
          'loai_truong_danh_sach' => 'van_ban',
          'model' => 'ban_ghi.ngay_lien_he',
          'tieu_de' => 'Ngày liên hệ'
        ]
      ],
      'truong_them_sua' => [
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Tên công ty',
          'model' => 'ten_cong_ty',
          'kieu_du_lieu' => 'text'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Mã công ty',
          'model' => 'ma_cong_ty',
          'kieu_du_lieu' => 'text'
        ],
        [
          'loai_truong_them_sua' => 'van_ban',
          'kich_co' => 6,
          'tieu_de' =>  'Mã số thuế',
          'model' => 'ma_so_thue',
          'kieu_du_lieu' => 'text'
        ],
        [
          'loai_truong_them_sua' => 'so_xuong_tinh_thanh_pho',
          'kich_co' => 6
        ],
        [
          'loai_truong_them_sua' => 'so_xuong_quan_huyen',
          'kich_co' => 6
        ],
        [
          'loai_truong_them_sua' => 'so_xuong',
          'kich_co' => 6,
          'tieu_de' => 'Nhân viên',
          'model' => 'id_nhan_vien',
          'repeat' => 'nhan_vien in danh_sach_nhan_vien',
          'option_value' => 'nhan_vien._id.$oid',
          'option_label' => 'nhan_vien.ten_nhan_vien'
        ],
        [
          'loai_truong_them_sua' => 'so_xuong',
          'kich_co' => 6,
          'tieu_de' => 'Loại danh sách',
          'model' => 'id_loai_danh_sach',
          'repeat' => 'loai_danh_sach in danh_sach_loai_danh_sach',
          'option_value' => 'loai_danh_sach._id.$oid',
          'option_label' => 'loai_danh_sach.ten_loai_danh_sach'
        ],
        [
          'loai_truong_them_sua' => 'so_xuong',
          'kich_co' => 6,
          'tieu_de' => 'Danh sách khai thác',
          'model' => 'id_danh_sach_khai_thac',
          'repeat' => 'danh_sach_khai_thac in danh_sach_danh_sach_khai_thac',
          'option_value' => 'danh_sach_khai_thac._id.$oid',
          'option_label' => 'danh_sach_khai_thac.ten_danh_sach_khai_thac'
        ],
        [
          'loai_truong_them_sua' => 'so_xuong',
          'kich_co' => 6,
          'tieu_de' => 'Nhà cung cấp',
          'model' => 'id_nha_cung_cap',
          'repeat' => 'nha_cung_cap in danh_sach_nha_cung_cap',
          'option_value' => 'nha_cung_cap._id.$oid',
          'option_label' => 'nha_cung_cap.ten_nha_cung_cap'
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
          'tieu_de' =>  'Ngày liên hệ',
          'model' => 'ngay_lien_he'
        ]
      ],
      'truong_loc' => [
        [
          'loai_truong_loc' => 'so_xuong_tinh_thanh_pho',
          'kich_co' => 4,
        ],
        [
          'loai_truong_loc' => 'so_xuong_quan_huyen',
          'kich_co' => 4
        ],
        [
          'loai_truong_loc' => 'so_xuong',
          'kich_co' => 4,
          'tieu_de' => 'Nhân viên',
          'repeat' => 'nhan_vien in danh_sach_nhan_vien',
          'option_value' => 'nhan_vien._id.$oid',
          'option_label' => 'nhan_vien.ten_nhan_vien',
          'model' => "bo_loc.id_nhan_vien"
        ],
        [
          'loai_truong_loc' => 'so_xuong',
          'kich_co' => 4,
          'tieu_de' => 'Loại danh sách',
          'repeat' => 'loai_danh_sach in danh_sach_loai_danh_sach',
          'option_value' => 'loai_danh_sach._id.$oid',
          'option_label' => 'loai_danh_sach.ten_loai_danh_sach',
          'model' => "bo_loc.id_loai_danh_sach"
        ],
        [
          'loai_truong_loc' => 'so_xuong',
          'kich_co' => 4,
          'tieu_de' => 'Danh sách khai thác',
          'repeat' => 'danh_sach_khai_thac in danh_sach_danh_sach_khai_thac',
          'option_value' => 'danh_sach_khai_thac._id.$oid',
          'option_label' => 'danh_sach_khai_thac.ten_danh_sach_khai_thac',
          'model' => "bo_loc.id_danh_sach_khai_thac"
        ],
        [
          'loai_truong_loc' => 'so_xuong',
          'kich_co' => 4,
          'tieu_de' => 'Nhà cung cấp',
          'repeat' => 'nha_cung_cap in danh_sach_nha_cung_cap',
          'option_value' => 'nha_cung_cap._id.$oid',
          'option_label' => 'nha_cung_cap.ten_nha_cung_cap',
          'model' => "bo_loc.id_nha_cung_cap"
        ],
        [
          'loai_truong_loc' => 'nut_bam',
          'kich_co' => 4,
          'tieu_de' => 'Thực hiện',
          'model' => "loc_du_lieu(bo_loc);"
        ],
      ]
    ];
    $this->render('tong_quat/tong_quan', $data);
  }

  function danh_sach() {
    require_once 'tong_quat/Danh_sach.php';
    $danh_sach = new Danh_sach();
    return $this->call_action($danh_sach, 'cong_ty');
  }

  public function chi_tiet($id)
  {
    require_once 'cong_ty/Chi_tiet.php';
    $chi_tiet = new Chi_tiet();
    return $this->call_action($chi_tiet, $id);
  }

  public function them_moi($id_bo_thuoc_tinh = null) {
    require_once 'cong_ty/Them_moi.php';
    $them_moi = new Them_moi();
    return $this->call_action($them_moi, $id_bo_thuoc_tinh);
  }

  public function sua_doi($id, $id_bo_thuoc_tinh = null) {
    require_once 'cong_ty/Sua_doi.php';
    $sua_doi = new Sua_doi();
    return $this->call_action($sua_doi, $id, $id_bo_thuoc_tinh);
  }

  public function nhap_du_lieu() {
    require_once 'cong_ty/Nhap_du_lieu.php';
    $nhap_du_lieu = new Nhap_du_lieu();
    return $this->call_action($nhap_du_lieu, 'cong_ty');
  }

  public function xuat_du_lieu() {
    require_once 'cong_ty/Xuat_du_lieu.php';
    $xuat_du_lieu = new Xuat_du_lieu();
    return $this->call_action($xuat_du_lieu, 'cong_ty');
  }
}
