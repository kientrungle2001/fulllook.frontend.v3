<?php
$posts_model = $controller->posts_model;
$terms_model = $controller->terms_model;
$options_model = $controller->options_model;
$links_model = $controller->links_model;
#
$third_section_category = $options_model->get_option_tree('third_section_category');
$third_category = $terms_model->get_one($third_section_category);
$third_category_taxonomy = $terms_model->get_term_taxonomy($third_section_category);
$posts = $posts_model->get_posts(array(
	'term_taxonomy_id' => $third_category_taxonomy['term_taxonomy_id'],
	'post_type' => 'post',
	'post_status' => 'publish'
), 0, 3);

?>
<div>
<div class="b_top">
	<h2><a href="<?= $links_model->get_product_category_link($language, $third_category);?>"><?= wpglobus($third_category['name'], $language) ?></a></h2>
</div>
<br>
<!--content-box-->
<?php foreach ($posts as $post) :
	$img = $posts_model->get_post_thumbnail_img($post);
	?>
	<div class="cate2_s item_cate2 h-product">
		<a href="<?= $links_model->get_product_link($language, $third_category, $post)?>">
			<?php if ($img) : ?>
				<img src="<?= $links_model->get_image_url($img) ?>" width="230" height="134" border="0" alt="<?= wpglobus($post['post_title'], $language) ?>" class="u-photo">
			<?php else : ?>
				<img src="/assets/css/pql/default/images/Ong_nhua_uPVC_thumb.png" width="230" height="134" border="0" alt="<?= $post['post_title'] ?>">
			<?php endif; ?>
		</a>
		<h3><a href="<?= $links_model->get_product_link($language, $third_category, $post)?>" class="name_cate2 p-name"><?= wpglobus($post['post_title'], $language) ?></a></h3>
		<br clear="all">
	</div>
<?php endforeach; ?>
<div style="clear:both"></div><br>
</div>