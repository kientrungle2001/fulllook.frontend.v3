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
	'post_type' => 'post',
	'post_status' => 'publish'
), 0, 3);
$search_title = '{:en}Search Result{:}{:vi}Kết quả tìm kiếm{:}';
?>
<div>
<div class="b_top">
	<h1>
		<?= wpglobus($search_title, $language) ?></h1>
</div>
<br>
<!--content-box-->
<?php 
	$jsonlds = array();
	foreach ($posts as $post_index => $post) :
	$img = $posts_model->get_post_thumbnail_img($post);
	$jsonlds[] = array(
		"@type" => "ListItem",
		"image"	=> $links_model->get_image_url($img),
		"url"	=> $links_model->get_product_link($language, $first_category, $post),
		"name" 	=> wpglobus($post['post_title'], $language),
		"position" => ($post_index + 1)
	);
	?>
	<div class="item_cate2 h-product" itemtype="http://schema.org/Product">
		<a href="<?= $links_model->get_product_link($language, $first_category, $post)?>">
			<?php if ($img) : ?>
				<img src="<?= $links_model->get_image_url($img)?>" width="230" height="134" border="0" alt="<?= wpglobus($post['post_title'], $language)  ?>" class="u-photo">
			<?php else : ?>
				<img src="/assets/css/pql/default/images/Ong_nhua_uPVC_thumb.png" width="230" height="134" border="0" alt="<?= wpglobus($post['post_title'], $language)  ?>">
			<?php endif; ?>
		</a>
		<h3><a href="<?= $links_model->get_product_link($language, $first_category, $post)?>" class="name_cate2 p-name"><?= wpglobus($post['post_title'], $language)  ?></a></h3>
		<br clear="all">
	</div>
<?php endforeach; ?>
<div style="clear:both"></div>
<!--content-box--><br>
</div>

<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "ItemList",
    "url": "<?= $links_model->get_product_category_link($language, $first_category)?>",
    "numberOfItems": "3",
	"itemListElement": <?= json_encode($jsonlds);?>
}
</script>