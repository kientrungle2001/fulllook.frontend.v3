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
	<?php $controller->view('price/price_1', $data);?>
	<?php $controller->view('price/price_2', $data);?>
	<?php $controller->view('price/price_3', $data);?>
</div>

<div id="right">
	<?php $controller->view('slide/home_slideshow', $data);?>
	<?php $controller->view('category/category_products_1', $data);?>
	<?php $controller->view('category/category_products_2', $data);?>
	<?php $controller->view('category/category_products_3', $data);?>
	<?php $controller->view('news/home_news', $data);?>
</div>