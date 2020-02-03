<?php
class Chi_tiet extends MY_Action
{
  public function execute($id)
  {
    $bo_thuoc_tinh = $this->controller->laramongo->get('bo_thuoc_tinh', [
      'ma_bo_thuoc_tinh' => 'bo_thuoc_tinh_cong_ty'
    ]);
    $data = [
      'module' => $bo_thuoc_tinh['luoc_do']['ma_luoc_do'],
      'module_sub' => false,
      'modal_size' => 'lg',
      'tieu_de' => $bo_thuoc_tinh['ten_bo_thuoc_tinh'],
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
      'truong_danh_sach' => [],
      'truong_loc' => [],
      'truong_them_sua' => []
    ];
    foreach ($bo_thuoc_tinh['danh_sach_thuoc_tinh'] as $thuoc_tinh_cua_bo_thuoc_tinh) {
      $thuoc_tinh = $thuoc_tinh_cua_bo_thuoc_tinh['thuoc_tinh'];
      if ($thuoc_tinh_cua_bo_thuoc_tinh['trang_thai']) {
        if (isset($thuoc_tinh['cau_hinh_danh_sach'])) {
          $data['truong_danh_sach'][] = $thuoc_tinh['cau_hinh_danh_sach'];
        }

        if (isset($thuoc_tinh['cau_hinh_them_sua'])) {
          $data['truong_them_sua'][] = $thuoc_tinh['cau_hinh_them_sua'];
        }

        if (isset($thuoc_tinh['cau_hinh_loc'])) {
          $data['truong_loc'][] = $thuoc_tinh['cau_hinh_loc'];
        }
      }
    }
    
    $data['truong_loc'][] = [
      'loai_truong_loc' => 'nut_bam',
      'kich_co' => 3,
      'tieu_de' => 'Thực hiện',
      'model' => "loc_du_lieu(bo_loc);"
    ];

    $cong_ty = $this->controller->laramongo->get('cong_ty', $id);
    
    if(isset($cong_ty['id_nhan_vien']) && $cong_ty['id_nhan_vien']) {
      $cong_ty['nhan_vien'] = $this->controller->laramongo->get('nhan_vien', $cong_ty['id_nhan_vien']);
    } else {
      $cong_ty['nhan_vien'] = null;
    }
    if(isset($cong_ty['id_tinh']) && $cong_ty['id_tinh']) {
      $cong_ty['tinh'] = $this->controller->laramongo->get('tinh_thanh_pho', ['id' => $cong_ty['id_tinh']]);
    } else {
      $cong_ty['tinh'] = null;
    }
    if(isset($cong_ty['id_huyen']) && $cong_ty['id_huyen']) {
      $cong_ty['huyen'] = $this->controller->laramongo->get('quan_huyen', ['id' => $cong_ty['id_huyen']]);
    } else {
      $cong_ty['huyen'] = null;
    }
    if(isset($cong_ty['id_nha_cung_cap']) && $cong_ty['id_nha_cung_cap']) {
      $cong_ty['nha_cung_cap'] = $this->controller->laramongo->get('nha_cung_cap', $cong_ty['id_nha_cung_cap']);
    } else {
      $cong_ty['nha_cung_cap'] = null;
    }
    if(isset($cong_ty['id_loai_danh_sach']) && $cong_ty['id_loai_danh_sach']) {
      $cong_ty['loai_danh_sach'] = $this->controller->laramongo->get('loai_danh_sach', $cong_ty['id_loai_danh_sach']);
    } else {
      $cong_ty['loai_danh_sach'] = null;
    }
    if(isset($cong_ty['id_danh_sach_khai_thac']) && $cong_ty['id_danh_sach_khai_thac']) {
      $cong_ty['danh_sach_khai_thac'] = $this->controller->laramongo->get('danh_sach_khai_thac', $cong_ty['id_danh_sach_khai_thac']);
    } else {
      $cong_ty['danh_sach_khai_thac'] = null;
    }
    $data['cong_ty'] = $cong_ty;
    //echo '<pre>'; print_r($data); die();
    $this->controller->render('cong_ty/chi_tiet', $data);
  }
}
