<?php 
$email = $controller->options_model->get_option_tree('email');
$hotline = $controller->options_model->get_option_tree('hotline');
$company_name = $controller->options_model->get_option_tree('company_name');
$address = $controller->options_model->get_option_tree('address');
$office_address = $controller->options_model->get_option_tree('office_address');
$tel = $controller->options_model->get_option_tree('tel');
$fax = $controller->options_model->get_option_tree('fax');
$tax_code = $controller->options_model->get_option_tree('tax_code');
$business_number = $controller->options_model->get_option_tree('business_number');
$business_author = $controller->options_model->get_option_tree('business_author');

$top_menu_items = $controller->posts_model->get_nav_items(7);
?>
<div id="foot" style="clear:both;"> 
	<div id="menu_foot"> 
		<div id="menu_f_left"> 
		<?php foreach($top_menu_items as $index => $top_menu_item):
			if(isset($top_menu_item['_menu_item_menu_item_parent']) && $top_menu_item['_menu_item_menu_item_parent']) {
				continue;
			}
			?>
<?php if($index > 0):?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php endif;?> <a href="<?= $top_menu_item['_menu_item_url']?>"><?= wpglobus($top_menu_item['post_title']) ?></a>
		<?php endforeach;?>
		</div> 
		<div style="clear:both"></div> 
	</div>
	<div id="info"> 
		<p>© Copyrights 2013 <?= $company_name?></p>
		<p>Địa chỉ: <?= $address?></p>
		<p>VPGD: <?= $office_address?></p>
		<p>Tel: <?= $tel?> - Fax: <?= $fax?></p>
		<p>Email: <?= $email?></p>
		<p>Mã số thuế: <?= $tax_code?></p>
		<p>Số đăng ký kinh doanh: <?= $business_number?></p>
		<p><?= $business_author?></p>
	</div>
	<div class="box_end">
	<b>Thông tin chung</b>
		<ul>
			<li style="list-style:none">
			<a href="ho-so-nang-luc-cong-ty-tnhh-thuong-mai-bich-van-ctbv.html">Hồ Sơ Năng Lực</a></li>
			<li style="list-style:none">
			<a href="cong-trinh-tieu-bieu-ctbv.html">Công Trình Tiêu Biểu</a></li>
			<li style="list-style:none">
			<a href="bao-lanh-thuc-hien-hop-ctbv19.html">Bảo Lãnh Hợp Đồng</a></li>
			<li style="list-style:none">
			<a href="chinh-sach-bao-mat-thong-tin-ctbv.html">Bảo Mật Thông Tin</a></li>
			<li style="list-style:none">
			<a href="chinh-sach-bao-hanh-va-doitra-hang-hoa-ctbv.html">Chính Sách Bảo Hành</a></li>
			<li style="list-style:none">
			<a href="chinh-sach-van-chuyen-va-hinh-thuc-thanh-toan-ctbv.html">Chính Sách Vận Chuyển</a></li>
			<li style="list-style:none">
			<a href="chinh-sach-van-chuyen-va-hinh-thuc-thanh-toan-ctbv.html">Hình Thức Thanh Toán</a></li>
			<li style="list-style:none">
			<a href="chinh-sach-bao-hanh-va-doi-tra-hang-hoa-ctbv.html">Đổi-Trả Lại Hàng</a></li>
		</ul>
	</div>
	<div class="box_end"> 
	<b>Danh mục sản phẩm</b> 
		<ul>
			<li style="list-style:none"> 
			<a href="ongtien-phong-dmspc.html">Ống Nhựa Tiền Phong</a></li>
			<li style="list-style:none">
			<a href="onghdpe-dmspc.html">Ống HDPE</a></li>
			<li style="list-style:none">
			<a href="phu-tung-hdpe-dmspc.html">Phụ Kiện HDPE</a></li>
			<li style="list-style:none">
			<a href="ongupvc-dmspc.html">Ống uPVC</a></li>
			<li style="list-style:none">
			<a href="phu-tung-upvc-dmspc.html">Phụ Kiện uPVC</a></li>
			<li style="list-style:none">
			<a href="ong-nhuadmspc.html">Ống PPR</a></li>
			<li style="list-style:none">
			<a href="phu-tungdmspc.html">Phụ Kiện PPR</a></li>
			<li style="list-style:none">
			<a href="ongxoan-santo-dmspc.html">Ống Gân Xoắn HDPE</a></li>
		</ul> 
	</div>
 	<div class="box_end" style="text-align:center">
		<a href="/assets/css/pql/default/upload/images/nha-phan-phoi-ongtienphong.png" title="sản phẩm chính hãng Tiền Phong">
			<img src="/assets/css/pql/default/images/ongtien-phong.jpg" border="0" alt="sản phẩm chính hãng Tiền Phong" title="sản phẩm chính hãng Tiền Phong" style="width:148px"></a>
			<a href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=4171" rel="nofollow" title="THông báo"><img src="/assets/css/pql/default/images/da-dang-ky-bo-cong-thuong.png" border="0" alt="Thông báo" title="Thông báo" style="width:148px">
			</a>
	</div>
	<div style="clear:both"></div>
</div>
<div style="margin-bottom:37px;">
	<hr>
	<div class="key_w">
		<ul>
			<li>
			<a href="https://plus.google.com/112242528167676012178">Đại Lý Nhựa Tiền Phong</a></li>
			<li>
			<a href="onghdpe-gan-xoan-vach-dmspc.html">Ống Gân HDPE 2 Vách</a></li>
			<li>
			<a href="cong-tac-thu-nghiem-ap-luc-duong-ong-dan-nuoc-ctbv.html">Đường Ống Dẫn Nước</a></li>
			<li>
			<a href="catalogue-san-pham-ctbv.html">Catalogue Ống Nhựa</a></li>
			<li>
			<a href="ong-nuoctien-phong-ctbv.html">Ống Nước Nhựa</a></li>
			<li>
			<a href="phu-tungtien-phong-dmspc.html">Phụ Kiện Ống Nhựa</a></li>
			<li>
			<a href="cac-hinh-thuc-bao-lanh-ngan-hang-ctbv.html">Bảo Lãnh Ngân Hàng</a></li>
			<li>
			<a href="tieu-chuan-chat-luong-san-pham-ongtien-phong-ctbv.html">Tiêu Chuẩn Ống Nhựa</a></li>
			<li>
			<a href="ong-nuoc-chiu-nhiet-nong-lanhlich-su-hinh-thanh-va-phat-trien-ctbv.html">Ống Nước Nóng Lạnh</a></li>


			<li>

			<a href="he-thong-cap-thoat-nuoc-bennha-va-cong-trinh-ctbv.html">Ống Cấp Thoát nước</a></li>


			<li>

			<a href="he-thong-cap-nuoc-tu-chay-ctbv.html">Ống Nước Tự Chảy</a></li>


			<li>

			<a href="bang-bao-gia-vat-tu-nganh-nuoc.html">Vật Tư Ngành Nước</a></li>


			<li>

			<a href="nganh-cap-thoat-nuoc.html">Ngành Cấp Thoát Nước</a></li>


			<li>

			<a href="ong-cap-nuoc-pccche-thong-dan-nuoc-pccc-ctbv.html">Ống Cấp Nước PCCC</a></li>


			<li>

			<a href="danh-muc-cong-trinh-va-du-an-cap-thoat-nuoc-tai-cac-khu-cong-nghiep-ctbv.html">Nhà Cung Cấp Ống</a></li>


			<li>

			<a href="ongxoan-santo-dmspc.html">Ống Nhựa Xoắn HDPE</a></li>


			<li>

			<a href="ong-luon-day-dien-pvc-tien-phong-dmspc27.html">Ống Luồn Dây Điện</a></li>


			<li>

			<a href="huong-dan-lap-rap-phu-tung-va-han-ong-chiu-nhietctbv.html">Ống Nước Chịu Nhiệt</a></li>


			<li>

			<a href="bang-bao-gia-ong-thep-ma-kem-hoa-phat-ctbv.html">Giá Ống Mạ Kẽm</a></li>


			<li>

			<a href="bang-bao-gia-onggan-xoan-hdpe-santo-ctbv.html">Giá Ống Gân Xoắn</a></li>


			<li>

			<a href="bang-bao-gia-ong-nhuava-ctbv.html">Giá Ống Nhựa PPR</a></li>


			<li>

			<a href="bang-bao-gia-ongpvc-ctbv.html">Giá Ống Nhựa PVC</a></li>


			<li>

			<a href="bang-bao-gia-onghdpe-pe-ctbv.html">Giá Ống Nhựa HDPE</a></li>


			<li>

			<a href="bang-gia.html">Bảng Giá Ống Nhựa</a></li>


			<li>

			<a href="camphuchia-ctbv38.html">Tại Campuchia</a></li>


			<li>

			<a href="trung-quoc-ctbv.html">Tại CHND Trung Hoa</a></li>


			<li>

			<a href="lao-ctbv.html">Tại CHDCND Lào</a></li>


			<li>

			<a href="ha-tay-ctbv.html">Tại Hà Tây</a></li>


			<li>

			<a href="ba-ria-vung-tau-ctbv.html">Tại Bà Rịa Vũng Tàu</a></li>


			<li>

			<a href="tay-ninh-ctbv.html">Tại Tây Ninh</a></li>


			<li>

			<a href="binh-phuoc-ctbv.html">Tại Bình Phước</a></li>


			<li>

			<a href="nai-bien-hoa-ctbv.html">Tại Đồng Nai Biên Hòa</a></li>


			<li>

			<a href="binh-duong-ctbv.html">Tại Bình Dương</a></li>


			<li>

			<a href="long-an-ctbv.html">Tại Long An</a></li>


			<li>

			<a href="thap-ctbv.html">Tại Đồng Tháp</a></li>


			<li>

			<a href="tien-giang-ctbv.html">Tại Tiền Giang</a></li>


			<li>

			<a href="an-giang-ctbv.html">Tại An Giang</a></li>


			<li>

			<a href="ben-tre-ctbv.html">Tại Bến Tre</a></li>


			<li>

			<a href="vinh-long-ctbv.html">Tại Vĩnh Long</a></li>


			<li>

			<a href="tra-vinh-ctbv.html">Tại Trà Vinh</a></li>


			<li>

			<a href="hau-giang-ctbv.html">Tại Hậu Giang</a></li>


			<li>

			<a href="kien-giang-ctbv.html">Tại Kiên Giang</a></li>


			<li>

			<a href="soc-trang-ctbv.html">Tại Sóc Trăng</a></li>


			<li>

			<a href="bac-lieu-ctbv.html">Tại Bạc Liêu</a></li>


			<li>

			<a href="ca-mau-ctbv.html">Tại Cà Mau</a></li>


			<li>

			<a href="can-tho-ctbv.html">Tại Cần Thơ</a></li>


			<li>

			<a href="lam-ctbv.html">Tại Lâm Đồng</a></li>


			<li>

			<a href="dak-lak-ctbv.html">Tại Đắk Lắk</a></li>


			<li>

			<a href="dak-nong-ctbv.html">Tại Đăk Nông</a></li>


			<li>

			<a href="gia-lai-ctbv.html">Tại Gia Lai</a></li>


			<li>

			<a href="kon-tum-ctbv.html">Tại Kon Tum</a></li>


			<li>

			<a href="binh-thuan-ctbv.html">Tại Bình Thuận</a></li>


			<li>

			<a href="ninh-thuan-ctbv.html">Tại Ninh Thuận</a></li>


			<li>

			<a href="khanh-hoa-ctbv.html">Tại Khánh Hòa</a></li>


			<li>

			<a href="phu-yen-ctbv.html">Tại Phú Yên</a></li>


			<li>

			<a href="binh-dinh-ctbv.html">Tại Bình Định</a></li>


			<li>

			<a href="quang-ngai-ctbv.html">Tại Quảng Ngãi</a></li>


			<li>

			<a href="quang-nam-ctbv.html">Tại Quảng Nam</a></li>


			<li>

			<a href="thua-thien-hue-ctbv.html">Tại Thừa Thiên Huế</a></li>


			<li>

			<a href="quang-tri-ctbv.html">Tại Quảng Trị</a></li>


			<li>

			<a href="quang-binh-ctbv.html">Tại Quảng Bình</a></li>


			<li>

			<a href="ha-tinh-ctbv.html">Tại Hà Tĩnh</a></li>


			<li>

			<a href="nghe-an-ctbv.html">Tại Nghệ An</a></li>


			<li>

			<a href="thanh-hoa-ctbv.html">Tại Thanh Hóa</a></li>


			<li>

			<a href="hoa-binh-ctbv.html">Tại Hòa Bình</a></li>


			<li>

			<a href="dien-bien-ctbv.html">Tại Điện Biên</a></li>


			<li>

			<a href="hung-yen-ctbv.html">Tại Hưng Yên</a></li>


			<li>

			<a href="ninh-binh-ctbv.html">Tại Ninh Bình</a></li>


			<li>

			<a href="thai-binh-ctbv.html">Tại Thái Bình</a></li>


			<li>

			<a href="nam-dinh-ctbv.html">Tại Nam Định</a></li>


			<li>

			<a href="ha-nam-ctbv.html">Tại Hà Nam</a></li>


			<li>

			<a href="quang-ninh-ctbv.html">Tại Quảng Ninh</a></li>


			<li>

			<a href="bac-giang-ctbv.html">Tại Bắc Giang</a></li>


			<li>

			<a href="bac-ninh-ctbv.html">Tại Bắc Ninh</a></li>


			<li>

			<a href="vinh-phuc-ctbv.html">Tại Vĩnh Phúc</a></li>


			<li>

			<a href="phu-tho-ctbv.html">Tại Phú Thọ</a></li>


			<li>

			<a href="son-la-ctbv.html">Tại Sơn La</a></li>


			<li>

			<a href="lang-son-ctbv.html">Tại Lạng Sơn</a></li>


			<li>

			<a href="thai-nguyen-ctbv.html">Tại Thái Nguyên</a></li>


			<li>

			<a href="bac-kan-ctbv.html">Tại Bắc Kạn</a></li>


			<li>

			<a href="tuyen-quang-ctbv.html">Tại Tuyên Quang</a></li>


			<li>

			<a href="yen-bai-ctbv.html">Tại Yên Bái</a></li>


			<li>

			<a href="lao-cai-ctbv.html">Tại Lào Cai</a></li>


			<li>

			<a href="lai-chau-ctbv37.html">Tại Lai Châu</a></li>


			<li>

			<a href="cao-bang-ctbv.html">Tại Cao Bằng</a></li>


			<li>

			<a href="ha-giang-ctbv.html">Tại Hà Giang</a></li>


			<li>

			<a href="tp-ho-chi-minh-ctbv.html">Tại TP HCM</a></li>


			<li>

			<a href="da-nang-ctbv.html">Tại Đà Nẵng</a></li>


			<li>

			<a href="ha-noi-ctbv.html">Tại Hà Nội</a></li>


			<li>

			<a href="hai-duong-ctbv.html">Tại Hải Dương</a></li>


			<li>

			<a href="tong-dai-lytien-phong-tai-hai-phong-gia-tot-chinh-hang-ctbv.html">Tại Hải Phòng</a></li>
		</ul>
	</div>
</div>
<div id="sup_all">
	<div id="ct_sup">
		<div id="hotline_f">  <?= $hotline?></div>
		<div id="email_f"> <?= $email?></div>
		<div style="width: 430px;position: absolute;top: 11px;right: 0px;">
		<!-- AddThis Button BEGIN -->
			<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_counter addthis_pill_style"></a>
			</div>
		<!-- AddThis Button END -->
		</div>
	</div>
</div>