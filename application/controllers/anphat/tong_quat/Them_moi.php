<?php
class Them_moi extends MY_Action
{
  public function execute($id_bo_thuoc_tinh)
  {
    $bo_thuoc_tinh = $this->controller->laramongo->get('bo_thuoc_tinh', [
      '_id' => $id_bo_thuoc_tinh
    ]);
    $data = [
      'id_bo_thuoc_tinh' => $bo_thuoc_tinh['_id']['$oid'],
      'ma_bo_thuoc_tinh' => $bo_thuoc_tinh['ma_bo_thuoc_tinh'],
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

    // echo '<pre>'; print_r($data); die();
    $this->controller->render('tong_quat/them_moi', $data);
  }
}
