<?php 
/** @var MY_Controller $controller */
/** @var Links_model $controller->links_model */
/** @var Terms_model $controller->terms_model */
# short
$c = $controller;
#
$category = $controller->terms_model->get_one($catId);
#
$category_taxonomy = $controller->terms_model->get_term_taxonomy($catId);
#
$category_taxonomy_image = $options_model->get_term_taxonomy_image($category_taxonomy['term_taxonomy_id']);
#
$posts = $controller->posts_model->get_posts(array(
	'term_taxonomy_id' => $category_taxonomy['term_taxonomy_id']
));
# child categories
$child_categories = $controller->terms_model->get_children($catId);
#
$feed_img = 'https://cdn0.iconfinder.com/data/icons/stuttgart/32/feed.png';
?>
<?php $controller->view('left', $data); ?>
<div id="right">
	<div class="b_top">
		<h1>
			<?= $controller->getCatName($category, $language)?> 
			<a href="<?= $controller->getProductCatLink($category, $language)?>/feed" class="link_feed">
				<img src="<?= $feed_img?>"> rss
			</a>
		</h1>
	</div>
	<div id="link_br">
		<a href="/<?= $language?>"><?= $controller->getHomeTitle($language)?></a>
		<span>»</span>
		<a class="a_active" href="<?= $controller->getProductCatLink($category, $language)?>">
			<?= $controller->getCatName($category, $language)?>
		</a>
		<br clear="all">
	</div>
	<div style="clear:both"></div>
	<div class="sub_categories">
		<?php foreach($child_categories as $cat):
			#
			$child_category_taxonomy = $controller->terms_model->get_term_taxonomy($cat['term_id']);
			#
			$child_category_taxonomy_image = $options_model->get_term_taxonomy_image($child_category_taxonomy['term_taxonomy_id']);
			
			?>
			
			<div class="category">
				<a href="<?= $controller->getProductCatLink($cat, $language)?>">
					<?php if($child_category_taxonomy_image):?>
					<img src="<?= $child_category_taxonomy_image;?>" />
					<?php else:?>
					<img src="<?= $category_taxonomy_image;?>" />
					<?php endif;?>
					
					<span><?= $controller->getCatName($cat, $language)?></span>
					<div class="clear"></div>
				</a>
			</div>
		<?php endforeach;?>
	</div>
	<div class="clear"></div>
	<hr />
	<div id="text-cate" style="padding-left: 15px; padding-right: 15px;">
		<?= $category_taxonomy['description']?>
	</div>
	<div class="b_top" style="margin-top: 15px;margin-bottom: 15px;">
		<h2>Catalog</h2>
	</div>
	
	<?php 
	$jsonlds = [];
	foreach($posts as $post_index => $post):
		$img = $controller->getProductImage($post);
		$img_url = $links_model->get_image_url($img);
		$product_link = $controller->getProductLink($post, $category, $language);
		$product_title = $controller->getProductTitle($post, $language);
		$jsonlds[] = array(
			"@type" => "ListItem",
			"image"	=> $img_url,
			"url"	=> $product_link,
			"name" 	=> $product_title,
			"position" => ($post_index + 1)
		);
		?>
	<div class="cate2_s item_cate2 h-product">
		<a href="<?= $product_link?>">
			<img title="<?= $product_title?>" src="<?= $img_url?>" width="167" height="131" border="0" class="u-photo"></a>
		<h2><a href="<?= $product_link?>" class="name_cate2 p-name"><?= $product_title?></a></h2>
		<br clear="all">
	</div>
	<?php endforeach;?>
</div>

<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "ItemList",
    "url": "<?= $controller->getProductCatLink($category, $language)?>",
    "numberOfItems": "<?= count($posts) ?>",
	"itemListElement": <?= json_encode($jsonlds);?>
}
</script>