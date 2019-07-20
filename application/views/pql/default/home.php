<div id="left">
	
	<?php $controller->view('left_menu', $data); ?>
	<br>
	<div class="s_top">Tìm kiếm</div>
	<div class="s_mid">
		<form action="#/sanpham/timkiem" method="post">
			<div class="title_search">Từ khóa</div>
			<div class="input_search">
				<input type="text" name="ten">
			</div>
			<div class="title_search">Loại sản phẩm</div>
			<div class="input_search">
				<select name="danhmuc1" id="danhmuc1">
					<option value="0">---Loại sản phẩm-------------------------------------</option>
					<option value="12">Ống Nhựa Tiền Phong</option>
					<option value="15">Phụ Tùng Nhựa Tiền Phong</option>
					<option value="17">Ống Luồn Dây Cáp Điện</option>
					<option value="19">Bồn Nước - Bình Nước</option>
					<option value="18">Ống Thép - Ống Gang</option>
					<option value="13">Van Vòi Nước</option>
				</select>
			</div>
			<div class="title_search">Danh mục</div>
			<div class="input_search">
				<select name="danhmuc2" id="danhmuc2">
					<option value="0">---Danh mục---</option>
					<?php $controller->view('category/category_options', $data); ?>
				</select>
			</div>
			<div class="input_search">
				<input type="submit" value="Tìm kiếm" id="bt_search"><br clear="all">
			</div>
		</form>
	</div>
	<!--s-box-->
	<!--s-box-->
	<!--s-box-->
	<!--s-box-->
	<div class="s_top"><a href="#/bang-gia.html">Bảng Giá</a></div><br>
	<p class="new_left" style="background:none">
		<a href="#/gia-ongbang-gia-san-pham-catalogue-ctbv.html">Giá ống nhựa, Bảng Giá Sản Phẩm &amp; Catalogue</a>
	</p>
	<br>
	<!--s-box-->
	<!--s-box-->
	<div class="s_top"><a href="-vat-tu-nganh-nuoc.html">Bảng Báo Giá Vật Tư Ngành Nước</a></div><br>
	<p class="new_left" style="background:none">
		<a href="-ong-nhuava-ctbv.html">Bảng Báo Giá Ống Nhựa PPR và Phụ Kiện</a>
	</p>
	<p class="new_left"><a href="-onghdpe-pe-ctbv.html">Bảng Báo Giá Ống Nhựa HDPE PE100</a></p>
	<p class="new_left"><a href="-onghdpe-ctbv.html">Bảng Báo Giá Phụ Kiện Ống Nhựa HDPE</a></p>
	<p class="new_left"><a href="-ongpvc-ctbv.html">Bảng Báo Giá Ống Nhựa PVC</a></p>
	<p class="new_left"><a href="-ongpvc-ctbv.html">Bảng Báo Giá Phụ Kiện Ống Nhựa PVC</a></p>
	<br>
	<!--s-box-->
	<!--s-box-->
	<div class="s_top"><a href="#/nganh-cap-thoat-nuoc.html">Ngành Cấp Thoát Nước</a></div><br>
	<p class="new_left" style="background:none">
		<a href="#/phong-thuy-va-he-thong-cap-thoat-nuoc-ctbv.html">Phong thủy và hệ thống cấp thoát nước</a>
	</p>
	<p class="new_left">
		<a href="#/cong-tac-thu-nghiem-ap-luc-duong-ong-dan-nuoc-ctbv.html">Công Tác Thử Nghiệm Áp Lực Đường Ống Dẫn Nước</a>
	</p>
	<p class="new_left">
		<a href="#/tong-hop-cac-tai-lieu-giao-trinh-tieu-chuan-ky-thuat-he-thong-cap-thoat-nuoc-ctbv.html">Tổng Hợp Các Tài Liệu-Giáo Trình-Tiêu Chuẩn Kỹ Thuật Hệ Thống Cấp Thoát Nước</a>
	</p>
	<p class="new_left">
		<a href="#/he-thong-cap-thoat-nuoc-bennha-va-cong-trinh-ctbv.html">Hệ thống cấp thoát nước bên trong nhà và công trình</a>
	</p>
	<p class="new_left">
		<a href="#/cac-khai-niem-co-ban-ve-he-thong-ongtuoi-nuoc-ctbv.html">Các Khái Niệm Cơ Bản về Hệ Thống Ống Nhựa Tưới Nước</a>
	</p>
	<br>
</div>

<div id="right">
	<div id="wap_slider">
		<div class="slider-wrapper theme-default">
			<div id="slider_s" class="nivoSlider" style="position: relative; height: 257px; background: url(&quot;/assets/css/pql/default/images/cong-trinh-cap-thoat-nuoc-tieu-bieu.jpg&quot;) no-repeat;">
				<a href="#/cong-trinh-tieu-bieu-ctbv.html" class="nivo-imageLink" style="display: block;"><img src="/assets/css/pql/default/images/cong-trinh-cap-thoat-nuoc-tieu-bieu.jpg" width="790" height="257" border="0" alt="Bích Vân" style="display: none;"></a>
				<div class="nivo-caption" style="opacity: 0;">
					<p></p>
				</div>
				<div class="nivo-directionNav" style="display: none;">
					<a class="nivo-prevNav">Prev</a><a class="nivo-nextNav">Next</a></div>
				<div class="nivo-controlNav">
					<a class="nivo-control active" rel="0">1</a>
				</div>
			</div>
		</div>
	</div>
	
	<?php $controller->view('category/category_products_1', $data);?>
	<?php $controller->view('category/category_products_2', $data);?>
	<?php $controller->view('category/category_products_3', $data);?>
	
	<div class="box_new" style="margin-left:0px">
		<div class="b_top">
			<h2 style="height:35px;overflow:hidden">Giá ống nhựa, Bảng Giá Sản Phẩm &amp; Catalogue</h2>
		</div><br>
		<div id="content_new_home">
			<a href="#/gia-ongbang-gia-san-pham-catalogue-ctbv.html"><img src="/assets/css/pql/default/images/bachacdeuFunNong.jpg" border="0" alt="Giá ống nhựa, Bảng Giá Sản Phẩm &amp; Catalogue" width="180" height="140px"> </a>
			<p style="height:162px;overflow:hidden">Công ty CP Nhựa Thiếu Niên Tiền Phong luôn đi đầu trong lĩnh vực công nghệ mới cũng như đầu tư máy móc thiết bị hiện đại nhằm đem đến cho khách hàng các sản phẩm ống nhựa có chất lượng cao nhằm đáp ứng các nhu cầu của khách hàng như cam kết trong chính sách chất lượng sản phẩm của công ty đã đề ra:</p>
			<a href="#/gia-ongbang-gia-san-pham-catalogue-ctbv.html" class="detail_new_home">&gt; Chi tiết</a>
		</div>
	</div>
	<div class="box_new">
		<div class="b_top">
			<h2 style="height:35px;overflow:hidden">Tiêu Chuẩn Chất Lượng Sản Phẩm Ống Nhựa Tiền Phong</h2>
		</div><br>
		<div id="content_new_home">
			<a href="#/tieu-chuan-chat-luong-san-pham-ongtien-phong-ctbv.html"><img src="/assets/css/pql/default/images/nhua-tien-phong2.jpg" border="0" alt="Tiêu Chuẩn Chất Lượng Sản Phẩm Ống Nhựa Tiền Phong" width="180" height="140px"> </a>
			<p style="height:162px;overflow:hidden">Công ty CP Nhựa Thiếu Niên Tiền Phong luôn đi đầu trong lĩnh vực công nghệ mới cũng như đầu tư máy móc thiết bị hiện đại nhằm đem đến cho khách hàng các sản phẩm ống nhựa có chất lượng cao nhằm đáp ứng các nhu cầu của khách hàng như cam kết trong chính sách chất lượng sản phẩm của công ty đã đề ra: </p>
			<a href="#/tieu-chuan-chat-luong-san-pham-ongtien-phong-ctbv.html" class="detail_new_home">&gt; Chi tiết</a>
		</div>
	</div>
</div>