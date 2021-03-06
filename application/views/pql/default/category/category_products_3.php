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
$child_categories = $terms_model->get_children($third_section_category);
 // print_r($child_categories);
// die();
?>
<div>
<div class="b_top">
	<h2><a href="<?= $links_model->get_product_category_link($language, $third_category)?>"><?= wpglobus($third_category['name'], $language) ?></a></h2>
</div>
<br>
<!--content-box-->
<?php 
	$jsonlds = array();
	if(false):
	foreach ($posts as $post_index => $post) :
	$img = $posts_model->get_post_thumbnail_img($post);
	$jsonlds[] = array(
		"@type" => "ListItem",
		"image"	=> $links_model->get_image_url($img),
		"url"	=> $links_model->get_product_link($language, $third_category, $post),
		"name" 	=> wpglobus($post['post_title'], $language),
		"position" => ($post_index + 1)
	);
	?>
	<div class="item_cate2 h-product" itemtype="http://schema.org/Product">
		<a href="<?= $links_model->get_product_link($language, $third_category, $post)?>">
			<?php if ($img) : ?>
				<img src="<?= $links_model->get_image_url($img)?>" width="230" height="134" border="0" alt="<?= wpglobus($post['post_title'], $language)  ?>" class="u-photo">
			<?php else : ?>
				<img src="/assets/css/pql/default/images/Ong_nhua_uPVC_thumb.png" width="230" height="134" border="0" alt="<?= wpglobus($post['post_title'], $language)  ?>">
			<?php endif; ?>
		</a>
		<h3><a href="<?= $links_model->get_product_link($language, $third_category, $post)?>" class="name_cate2 p-name"><?= wpglobus($post['post_title'], $language)  ?></a></h3>
		<br clear="all">
	</div>
<?php endforeach;
endif;
foreach($child_categories as $index => $cat):
	if($index >= 8) continue;
	// print_r($cat); die();
	#
$category_taxonomy = $terms_model->get_term_taxonomy($cat['term_id']);
#
$category_taxonomy_image = $options_model->get_term_taxonomy_image($category_taxonomy['term_taxonomy_id']);
?>
<div class="item_cate2 h-product" itemtype="http://schema.org/Product">
		<a href="<?= $links_model->get_product_category_link($language, $cat, $third_category)?>">
				<div style="width: 240px; height: 148px; overflow: hidden;">
				<img src="<?= $category_taxonomy_image?>" width="230" height="134" border="0" alt="<?= wpglobus($cat['name'], $language)  ?>">
				</div>
		</a>
		<h3><a href="<?= $links_model->get_product_category_link($language, $cat, $third_category)?>" class="name_cate2 p-name"><?= wpglobus($cat['name'], $language)  ?></a></h3>
		<br clear="all">
	</div>
<?php
endforeach;
 ?>
<div style="clear:both"></div>
<!--content-box--><br>
</div>

<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "ItemList",
    "url": "<?= $links_model->get_product_category_link($language, $third_category)?>",
    "numberOfItems": "3",
	"itemListElement": <?= json_encode($jsonlds);?>
}
</script>