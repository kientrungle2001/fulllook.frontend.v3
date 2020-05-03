<?php

interface CongTyMau {
	public function tao_dieu_phoi_vien($thuoc_tinh);
	public function tao_nhan_vien($thuoc_tinh);
	public function tao_tai_nguyen($thuoc_tinh);
	public function tao_quy_tac_dieu_phoi($thuoc_tinh);
}

interface DieuPhoiVienMau {
	public function dieu_phoi($danh_sach_nhan_vien, $danh_sach_tai_nguyen, $quy_tac_dieu_phoi);
}

interface NhanVienMau {
}

interface TaiNguyenMau {
}

interface TaiNguyenDieuPhoiMau {
}

interface QuyTacDieuPhoiMau {
	public function bat_dau_phien_lam_viec();
	public function ket_thuc_phien_lam_viec();
	public function co_the_giao_viec($nhan_vien, $tai_nguyen);
	public function thuc_thi_cong_viec($nhan_vien, $danh_sach_tai_nguyen);
	public function tong_hop_ket_qua_thuc_thi($ket_qua_thuc_thi);
}

abstract class CongTy implements CongTyMau {
}

abstract class DieuPhoiVien implements DieuPhoiVienMau {
	
	public function dieu_phoi($danh_sach_tai_nguyen, $danh_sach_nhan_vien, $quy_tac_dieu_phoi) {
		$quy_tac_dieu_phoi->bat_dau_phien_lam_viec();
		foreach($danh_sach_nhan_vien as $nhan_vien) {
			$danh_sach_tai_nguyen_dieu_phoi = [];
			foreach($danh_sach_tai_nguyen as $tai_nguyen) {
				if($quy_tac_dieu_phoi->co_the_giao_viec($nhan_vien, $tai_nguyen)) {
					$danh_sach_tai_nguyen_dieu_phoi[] = $tai_nguyen->xuat_kho();
				}
			}
			if(count($danh_sach_tai_nguyen_dieu_phoi)) {
				$ket_qua_thuc_thi = $quy_tac_dieu_phoi->thuc_thi_cong_viec($nhan_vien, $danh_sach_tai_nguyen_dieu_phoi);
				$quy_tac_dieu_phoi->tong_hop_ket_qua_thuc_thi($ket_qua_thuc_thi);
			}
		}
		$quy_tac_dieu_phoi->ket_thuc_phien_lam_viec();
	}
}

abstract class NhanVien implements NhanVienMau {
	public abstract function co_the_nhan_viec($tai_nguyen);
	
}

abstract class TaiNguyen implements TaiNguyenMau {
	public abstract function san_co();
	public abstract function xuat_kho();
}

abstract class QuyTacDieuPhoi implements QuyTacDieuPhoiMau {
	public function co_the_giao_viec($nhan_vien, $tai_nguyen) {
		return $tai_nguyen->san_co() && $nhan_vien->co_the_nhan_viec($tai_nguyen);
	}
}

abstract class TaiNguyenDieuPhoi implements TaiNguyenDieuPhoiMau {

}

class CongTyMarketing extends CongTy {
	public function tao_dieu_phoi_vien($thuoc_tinh) {
		return new DieuPhoiVienMarketing($thuoc_tinh);
	}
	public function tao_nhan_vien($thuoc_tinh) {
		return new NhanVienMarketing($thuoc_tinh);
	}
	public function tao_tai_nguyen($thuoc_tinh) {
		return new TaiNguyenMarketing($thuoc_tinh);
	}
	public function tao_quy_tac_dieu_phoi($thuoc_tinh) {
		return new QuyTacDieuPhoiMarketing($thuoc_tinh);
	}
}

class DieuPhoiVienMarketing extends DieuPhoiVien {
}

class NhanVienMarketing extends NhanVien {
	public function co_the_nhan_viec($tai_nguyen) {
		return true;
	}
}

class TaiNguyenMarketing extends TaiNguyen {
	public function san_co() {
		return true;
	}
	
	public function xuat_kho() {
		return [new TaiNguyenDieuPhoiMarketing()];
	}
}

class QuyTacDieuPhoiMarketing extends QuyTacDieuPhoi {
	public $ket_qua = [];
	public function bat_dau_phien_lam_viec() {
		$this->ket_qua = [];
	}
	
	public function ket_thuc_phien_lam_viec() {
	}
	
	public function thuc_thi_cong_viec($nhan_vien, $danh_sach_tai_nguyen_dieu_phoi) {
		return [];
	}

	public function tong_hop_ket_qua_thuc_thi($ket_qua_thuc_thi)
	{
		
	}
}

class TaiNguyenDieuPhoiMarketing extends TaiNguyenDieuPhoi {

}
$thong_tin_cong_ty = [
	'ten_cong_ty' => 'Email VN',
	'email' => 'test.email@gmail.com'
];
$thong_tin_dieu_phoi_vien = [
	'website' => 'https://test.website.com'
];
$thong_tin_nhan_vien = [
	'website' => 'https://nhanvien.website.com'
];
$thong_tin_tai_nguyen = [
	'danh_sach_may_chu' => [
		[
			'may_chu' => '192.168.1.1',
			'tai_khoan' => 'dang_nhap_1',
			'mat_khau' => 'bi_mat_1',
			'so_lan_gui_toi_da' => 100,
			'inbox_vao_hop_thu' => 'yahoo,gmail,host'
		]
	],
	'danh_sach_email' => [
		[
			'ten_danh_sach' => 'danh_sach_1',
			'loai_tru_danh_sach' => 'danh_sach_2,danh_sach_3'
		]
	]
	
];
$thong_tin_quy_tac_dieu_phoi = [
	'khoang_cach_moi_lan_gui_email' => 10, // 10 seconds
];

$danh_sach_nhan_vien_marketing = [];
$danh_sach_tai_nguyen_marketing = [];
$cong_ty_marketing = new CongTyMarketing($thong_tin_cong_ty);
$dieu_phoi_vien_marketing = $cong_ty_marketing->tao_dieu_phoi_vien($thong_tin_dieu_phoi_vien);
$danh_sach_nhan_vien_marketing[] = $cong_ty_marketing->tao_nhan_vien($thong_tin_nhan_vien);
$danh_sach_tai_nguyen_marketing[] = $cong_ty_marketing->tao_tai_nguyen($thong_tin_tai_nguyen);
$quy_tac_dieu_phoi_marketing = $cong_ty_marketing->tao_quy_tac_dieu_phoi($thong_tin_quy_tac_dieu_phoi);

$dieu_phoi_vien_marketing->dieu_phoi($danh_sach_tai_nguyen_marketing, $danh_sach_nhan_vien_marketing, $quy_tac_dieu_phoi_marketing);
