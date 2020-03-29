<script>
function toggle_menu() {
	jQuery('#left').toggleClass('left-open');
}
</script>
<div class="left-wrapper">
	<div class="left-toggle-button">
		<a href="#" onclick="toggle_menu()"><button> <img src="/assets/css/pql/default/images/bichvan_15.png"><img src="/assets/css/pql/default/images/bichvan_15.png"> MENU</button></a>
	</div>
	<div id="left">
		<div class="left-inner">
			<?php $controller->view('left_menu', $data); ?>
			<br>
			<div class="s_top"><?= wpglobus('{:vi}Tìm kiếm{:}{:en}Search{:}', $language) ?></div>
			<div class="s_mid">
				<form action="/tim-kiem/san-pham" method="get">
					<div class="title_search"><?= wpglobus('{:vi}Từ khóa{:}{:en}Keyword{:}', $language) ?></div>
					<div class="input_search">
						<input type="text" name="ten">
					</div>
					<div class="title_search"><?= wpglobus('{:vi}Danh Mục{:}{:en}Catalog{:}', $language) ?></div>
					<div class="input_search">
						<select name="danh_muc" id="danhmuc2">
							<?php if(0):?>
							<option value="0">---<?= wpglobus('{:vi}Danh Mục{:}{:en}Catalog{:}', $language) ?>---</option>
							<?php endif;?>
							<?php $controller->view('category/category_options', $data, false, false); ?>
						</select>
					</div>
					<div class="input_search">
						<input type="submit" value="<?= wpglobus('{:vi}Tìm kiếm{:}{:en}Search{:}', $language) ?>" id="bt_search"><br clear="all">
					</div>
				</form>
			</div>
			<!--s-box-->
			<!--s-box-->
			<!--s-box-->
			<?php $controller->view('price/price_1', $data); ?>
			<?php $controller->view('price/price_2', $data); ?>
			<?php $controller->view('price/price_3', $data); ?>
		</div>
	</div>
</div>