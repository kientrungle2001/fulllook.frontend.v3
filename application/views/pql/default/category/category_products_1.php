<?php
$posts_model = $controller->posts_model;
$terms_model = $controller->terms_model;
$options_model = $controller->options_model;
$links_model = $controller->links_model;
#
$first_section_category = $options_model->get_option_tree('first_section_category');
$first_category = $terms_model->get_one($first_section_category);
$first_category_taxonomy = $terms_model->get_term_taxonomy($first_section_category);
$posts = $posts_model->get_posts(array(
	'term_taxonomy_id' => $first_category_taxonomy['term_taxonomy_id'],
	'post_type' => 'post',
	'post_status' => 'publish'
), 0, 3);
?>
<div itemscope itemtype="http://schema.org/ItemList">
<div class="b_top">
	<h2><a itemprop="url" href="<?= $links_model->get_product_category_link($language, $first_category)?>"><?= wpglobus($first_category['name'], $language) ?></a></h2>
</div>
<br>
<!--content-box-->
<?php foreach ($posts as $post) :
	$img = $posts_model->get_post_thumbnail_img($post);
	?>
	<div class="item_cate2 h-product" itemtype="http://schema.org/Product">
		<a itemprop="url" href="<?= $links_model->get_product_link($language, $first_category, $post)?>">
			<?php if ($img) : ?>
				<img src="<?= $links_model->get_image_url($img)?>" width="230" height="134" border="0" alt="<?= wpglobus($post['post_title'], $language)  ?>" class="u-photo" itemprop="image">
			<?php else : ?>
				<img src="/assets/css/pql/default/images/Ong_nhua_uPVC_thumb.png" width="230" height="134" border="0" alt="<?= $post['post_title'] ?>" itemprop="image">
			<?php endif; ?>
		</a>
		<h3><a href="<?= $links_model->get_product_link($language, $first_category, $post)?>" class="name_cate2 p-name" itemprop="name"><?= wpglobus($post['post_title'], $language)  ?></a></h3>
		<br clear="all">
	</div>
<?php endforeach; ?>
<div style="clear:both"></div>
<!--content-box--><br>
</div>