<?php 
/** @var MY_Controller $controller */
/** @var Links_model $links_model */
/** @var Terms_model $terms_model */
# short
$c = $controller;
#
$category = $terms_model->get_one($catId);
#
$category_taxonomy = $terms_model->get_term_taxonomy($catId);
#
$category_taxonomy_image = $options_model->get_term_taxonomy_image($category_taxonomy['term_taxonomy_id']);
#
$posts = $posts_model->get_posts(array(
	'term_taxonomy_id' => $category_taxonomy['term_taxonomy_id']
));
# child categories
$child_categories = $terms_model->get_children($catId);
#
$feed_img = 'https://cdn0.iconfinder.com/data/icons/stuttgart/32/feed.png';
?>
<?php $controller->view('left', $data); ?>
<div id="right">
	<div class="b_top">
		<h1>
			<?php $category_title = wpglobus($options_model->get_wpseo_category_title($category_taxonomy['term_taxonomy_id']), $language);
			if(!trim($category_title)) {
				$category_title = $controller->getCatName($category, $language);
			}
			?>
			<?= $category_title ?> 
			
		</h1>
		<a href="<?= $controller->getProductCatLink($category, $language, $product_categories)?>/feed" class="link_feed">
				<img src="<?= $feed_img?>"> rss
		</a>
	</div>
	<div id="link_br">
		<a href="/<?= $language?>"><?= $controller->getHomeTitle($language)?></a>
		<?php foreach($product_categories as $p_index => $p_cat):
		$p_cat_parents = [];
		for($i = 0; $i < $p_index; $i++):
			$p_cat_parents[] = $product_categories[$i];
		endfor;
		?>
		<span>»</span>
		<a class="a_active" href="<?= $controller->getProductCatLink($p_cat, $language, $p_cat_parents)?>">
			<?= $controller->getCatName($p_cat, $language)?>
		</a>
		<?php endforeach; ?>
		<br clear="all">
	</div>
	<div style="clear:both"></div>
	<div class="sub_categories">
		<?php foreach($child_categories as $cat):
			#
			$child_category_taxonomy = $terms_model->get_term_taxonomy($cat['term_id']);
			#
			$child_category_taxonomy_image = $options_model->get_term_taxonomy_image($child_category_taxonomy['term_taxonomy_id']);
			
			?>
			
			<div class="category">
				<a href="<?= $controller->getProductCatLink($cat, $language, $product_categories)?>">
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
		<?= replace_br(wpglobus($category_taxonomy['description'], $language))?>
		
	</div>
	<div class="clear"></div>
	<div class="b_top" style="margin-top: 15px;margin-bottom: 15px;">
		<div class="h2">Catalog</div>
	</div>
	<?php if(!isset($view_mode)):?>
		<table class="product-price-table">
			<tr>
				<th>STT</th>
				<th>Sản phẩm</th>
				<th>Đơn giá</th>
				<th>Tình trạng</th>
				<th>Số lượng</th>
				<th>Thêm</th>
			</tr>
	<?php endif;?>
	<?php 
	$jsonlds = [];
	foreach($posts as $post_index => $post):
		$img = $controller->getProductImage($post);
		$img_url = $links_model->get_image_url($img);
		$product_link = $controller->getProductLink($post, $category, $language, $product_categories);
		$product_title = $controller->getProductTitle($post, $language);
		$jsonlds[] = array(
			"@type" => "ListItem",
			"image"	=> $img_url,
			"url"	=> $product_link,
			"name" 	=> $product_title,
			"position" => ($post_index + 1)
		);
		?>
	<?php if(isset($view_mode) && $view_mode=='grid'):?>
	<div class="cate2_s item_cate2 h-product">
		<a href="<?= $product_link?>">
			<img title="<?= $product_title?>" src="<?= $img_url?>" width="167" height="131" border="0" class="u-photo"></a>
		<p><a href="<?= $product_link?>" class="name_cate2 p-name"><?= $product_title?></a></p>
		<br clear="all">
	</div>
	<?php else:?>
		<tr class="product-price-row">
			<td><?= $post_index + 1?></td>
			<td>
				<a href="<?= $product_link?>" class="product-image">
					<img title="<?= $product_title?>" src="<?= $img_url?>" width="64" height="auto"" border="0" class="u-photo">
				</a>
				<div class="product-info text-left">
				<p><strong><a href="<?= $product_link?>" class="name_cate2 p-name"><?= $product_title?></a></strong></p>
				<p>Thương hiệu: <?= $post['brand']?></p>
				</div>
				
				<div class="clear"></div>
			</td>
			<td><?= @$post['price']?></td>
			<td><?= @$post['stock']?></td>
			<td class="text-center"><input id="quantity-<?= $post['ID']?>" type="text" size="5" name="quantity" class="input product-quantity" style="width: 80%" value="1"></td>
			<td class="text-center"><button class="btn" onclick="add_to_cart(<?= $post['ID']?>, 
				'<?= html_escape($product_title)?>', 
				'<?= @$post['price']?>',
				'<?= html_escape($post['brand'])?>',
				'<?= html_escape($img_url)?>',
				'<?= html_escape($product_link)?>',
				'<?= html_escape(@$post['stock'])?>'
				); return false;">Đặt mua</button></td>
		</tr>
	<?php endif;?>
	<?php endforeach;?>
	<?php if(!isset($view_mode)):?></table><?php endif;?>
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

<script type="text/javascript">
	function add_to_cart(product_id, product_title, product_price, product_brand, product_image, product_link, product_stock) {
		var quantity = jQuery('#quantity-' + product_id).val();
		quantity = parseFloat(quantity);
		if(!quantity) {
			alert('Bạn cần nhập số lượng');
		} else {
			jQuery.ajax({
				url: '/cart/addToCart',
				type: 'post', dataType: 'json',
				data: {
					sku: product_id,
					name: product_title,
					quantity: quantity,
					price: product_price,
					image: product_image,
					link: product_link,
					stock: product_stock,
					brand: product_brand
				},
				success: function(resp) {
					jQuery('#but_gh .num').text(resp.total_items);
					alert('Đã thêm ' + quantity + ' ' + product_title + ' vào giỏ hàng');
				}
			});
		}
	}
</script>