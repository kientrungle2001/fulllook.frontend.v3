<?php 
/** @var MY_Controller $controller */
/** @var Posts_model $posts_model  */
/** @var Options_model $options_model */
/** @var Links_model $links_model  */
/** @var Terms_model $terms_model */
$top_menu_items = $posts_model->get_nav_items(7);
#
$blogname = $options_model->get_blog_name();
#
$facebook = $options_model->get_facebook_url();
$twitter = $options_model->get_twitter_url();
$plus = $options_model->get_gplus_url();
$con = $options_model->get_contact_url();
#
$logo = $options_model->get_logo();
$hotline = $options_model->get_hotline();
$hotline_2 = $options_model->get_hotline_2();
$hotline_3 = $options_model->get_hotline_3();
$email = $options_model->get_email();
$instagram = $options_model->get_instagram();

$free_shipping_note = $options_model->get_free_shipping_note();
$online_order_note = $options_model->get_online_order_note();
?>
<!--slogan-->
<div id="slogan">
	<p class="text_left_top"> <?= wpglobus($free_shipping_note, $language)?></p>
	<p class="text_right_top"><?= wpglobus($online_order_note, $language)?></p>
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
		<div class="item_like_top"><a rel="nofollow" href="/" class="vn share">VN</a></div>
		<div class="item_like_top"><a rel="nofollow" href="/en" class="en share">EN</a></div>
	</div>
	<div id="logo">
		<a href="/<?= $language == 'en' ? $language : ''?>"><img src="<?= $logo?>" alt="<?= wpglobus($blogname, $language) ?>" title="<?= wpglobus($blogname, $language) ?>" border="0" /></a>
	</div>
	<div class="bt_gh" id="but_gh">
		<a href="<?= $links_model->get_language_link($language, '/cart')?>" class="cufon"><?= wpglobus('{:vi}Giỏ hàng{:}{:en}Cart{:}', $language)?></a>
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
<?php if($index > 0):?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php endif;?> <a href="<?= $links_model->get_language_link($language, $top_menu_item['_menu_item_url']) ?>"><?= wpglobus($top_menu_item['post_title'], $language) ?></a>
		<?php endforeach;?>
	</div>
	
	<div id="bg_search"></div>
	
	<form method="get" action="/tim-kiem">
		
		<input type="text" id="txts" name="tu_khoa" placeholder="<?= wpglobus('{:vi}Tìm kiếm{:}{:en}Search{:}', $language)?> ..." />
		<input type="submit" id="subs" value="" />
	</form>
	<div id="cate_title">
		<p class="cufon"><span><?= wpglobus('{:vi}Danh Mục Sản Phẩm{:}{:en}Product Catalog{:}', $language)?></span></p>
	</div>
	<?php if($hotline):?>
	<div id="login_but">
		<a href="#" class="but_log_re"><strong>Hotline:</strong> <span><?= $hotline?></span></a>   
	</div>
	<?php endif;?>
</div>