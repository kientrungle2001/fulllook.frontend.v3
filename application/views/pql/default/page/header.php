<?php 
$posts_model = $controller->posts_model;
$options_model = $controller->options_model;
#
$top_menu_items = $posts_model->get_nav_items(7);
$facebook = $posts_model->get_option('travel[facebook-link]');
$twitter = $posts_model->get_option('travel[twitter-link]');
$plus = $posts_model->get_option('travel[gplus-link]');
$con = $posts_model->get_option('travel[con-link]');
#
$hotline = $options_model->get_option_tree('hotline');
$email = $options_model->get_option_tree('email');
$instagram = $options_model->get_option_tree('instagram');
?>
<!--slogan-->
<div id="slogan">
	<p class="text_left_top">Miễn phí vận chuyển đến chân công trình và dự án trên toàn quốc</p>
	<p class="text_right_top">Đặt hàng trực tuyến / nhận hàng trực tiếp</p>
</div>
<!--slogan-->
<!--top-->
<div id="top">
	<div id="like_top">
		<?php if($facebook):?>
		<div class="item_like_top"><a rel="nofollow" href="<?= $facebook['value']?>" target="_blank" class="face share"></a></div>
		<?php endif;?>
		<?php if($twitter): ?>
		<div class="item_like_top"><a rel="nofollow" href="<?= $twitter['value']?>" target="_blank" class="twi share"></a></div>
		<?php endif;?>
		<?php if($plus): ?>
		<div class="item_like_top"><a rel="nofollow" href="<?= $plus['value']?>" target="_blank" class="g share"></a></div>
		<?php endif; ?>
	</div>
	<div id="logo">
		<a href="#"><img src="/assets/css/pql/default/images/nhua-tien-phong.png" alt="Nhựa tiền phong" title="Nhà phân phối ống nhựa tiền Phong" border="0" /></a>
	</div>
	<div class="bt_gh" id="but_gh">
		<a href="gio-hang.html" class="cufon">Giỏ Hàng</a>
		<span id="num_order">(</span>
		<span id="num_order" class="num">0</span>
		<span id="num_order" style="padding-right:3px">)</span>
	</div>
	<div id="menu_s">
		<?php foreach($top_menu_items as $index => $top_menu_item):
			if(isset($top_menu_item['_menu_item_menu_item_parent']) && $top_menu_item['_menu_item_menu_item_parent']) {
				continue;
			}
			?>
<?php if($index > 0):?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php endif;?> <a href="<?= $top_menu_item['_menu_item_url']?>"><?= wpglobus($top_menu_item['post_title']) ?></a>
		<?php endforeach;?>
	</div>
	<div id="bg_search"></div>
	<form method="post" action="#">
		<input type="text" id="txts" name="txts" placeholder="Tìm kiếm ..." />
		<select name="cate_top" id="cate_top" class="cufon" style="display:none;">
			<option value="0">Danh mục</option>
		</select>
		<input type="submit" id="subs" value="" />
	</form>
	<div id="cate_title">
		<p class="cufon"><span>Danh Mục Sản Phẩm</span></p>
	</div>
	<?php if($hotline):?>
	<div id="login_but">
		<a href="#" class="but_log_re">Hotline: <?= $hotline?></a>
	</div>
		<?php endif;?>
</div>