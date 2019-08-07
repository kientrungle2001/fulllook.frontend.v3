<div id="left">
	
	<?php $controller->view('left_menu', $data); ?>
	<br>
	<div class="s_top"><?= wpglobus('{:vi}Tìm kiếm{:}{:en}Search{:}', $language)?></div>
	<div class="s_mid">
		<form action="#/sanpham/timkiem" method="post">
			<div class="title_search"><?= wpglobus('{:vi}Từ khóa{:}{:en}Keyword{:}', $language)?></div>
			<div class="input_search">
				<input type="text" name="ten">
			</div>
			<div class="title_search"><?= wpglobus('{:vi}Danh Mục{:}{:en}Catalog{:}', $language)?></div>
			<div class="input_search">
				<select name="danhmuc2" id="danhmuc2">
					<option value="0">---<?= wpglobus('{:vi}Danh Mục{:}{:en}Catalog{:}', $language)?>---</option>
					<?php $controller->view('category/category_options', $data); ?>
				</select>
			</div>
			<div class="input_search">
				<input type="submit" value="<?= wpglobus('{:vi}Tìm kiếm{:}{:en}Search{:}', $language)?>" id="bt_search"><br clear="all">
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