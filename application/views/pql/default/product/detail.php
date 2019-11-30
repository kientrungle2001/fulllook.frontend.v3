<?php
/** @var MY_Controller $controller */
/** @var Links_model $controller->links_model */
#
$category = $controller->terms_model->get_one($catId);
#
$category_taxonomy = $controller->terms_model->get_term_taxonomy($catId);
#
$posts = $controller->posts_model->get_posts(array(
	'term_taxonomy_id' => $category_taxonomy['term_taxonomy_id']
));
#
$product = $controller->posts_model->get_post($productId);
?>
<?php $controller->view('left', $data); ?>
<div id="right" class="h-product">
	<div class="b_top">
		<h1 class="p-name"><?= wpglobus($product['post_title'], $language) ?></h1>
	</div>
	<div id="link_br" style="margin:0px;border:none">
		<a href="/<?= $language?>"><?= $controller->getHomeTitle($language)?></a>
		<span>»</span>
		<a class="p-category" href="<?= $controller->links_model->get_product_category_link($language, $category)?>"><?= wpglobus($category['name'], $language) ?></a>
		<span>»</span>
		<a class="a_active p-name u-url" href="<?= $controller->links_model->get_product_link($language, $category, $product)?>"><?= wpglobus($product['post_title'], $language) ?></a>
	</div>
	<br clear="all">
	<div id="info_cate">
		<div id="img_cate">
			<?php 
			$img = $controller->posts_model->get_post_thumbnail_img($product);
			?>
			<img class="u-photo" title="<?= wpglobus($product['post_title'],$language)?>" 
				src="<?= $controller->links_model->get_image_url($img)?>">
		</div>
		<div id="text-cate">
			<table class="price_table">
				<tr>
					<th>Mã sản phẩm: </th>
					<td><?= $product['sku']?></td>
				</tr>
				<tr>
					<th>Giá: </th>
					<td><?= $product['price']?></td>
				</tr>
				<tr>
					<th>Thương hiệu: </th>
					<td><?= $product['brand']?></td>
				</tr>
				<tr>
					<th>Xuất xứ: </th>
					<td><?= $product['origin']?></td>
				</tr>
				<tr>
					<th>Tình trạng: </th>
					<td><?= $product['stock']?></td>
				</tr>
				<tr>
					<th>Thêm vào giỏ: </th>
					<td>
						Số lượng: <input type="text" name="quantity" id="quantity" size="3" value="1"> <button onclick="addToCart('<?= $product['sku']?>', '<?= wpglobus($product['post_title'], $language) ?>', '<?= $product['price']?>');">Đặt mua</button>
					</td>
				</tr>
			</table>
		</div>
		<hr class="clear" />
		
		<div class="e-description clear"><?= replace_br(wpglobus($product['post_content'], $language))?></div>
		
	</div>
	<div style="clear:both"></div>
	<div id="product-comments">
	<div class="fb-comments" data-href="<?= SITE_PROTOCOL?><?= $_SERVER['HTTP_HOST']?><?= $_SERVER['REQUEST_URI']?>" data-width="100%" data-numposts="5"></div>
	</div>
</div>

<?php
$jsonld = array(
	"@context" => "http://schema.org",
	"@type" => "Product",
	"description" => wpglobus($product['post_content'], $language),
	"name" => wpglobus($product['post_title'], $language),
	"image" => $controller->links_model->get_image_url($img),
	"url" => $controller->links_model->get_product_link($language, $category, $product)	
);
?>
<script type="application/ld+json">
<?= json_encode($jsonld)?>
</script>
<style>
.price_table tr td, .price_table tr th{
	border-bottom: 1px solid #ccc;
}

.price_table tr th {
	text-align: left;
}

.price_table tr th:before {
	content: ' ';
	display: inline-block;
	width: 16px;
	height: 9px;
	background: url('/assets/css/pql/default/images/bichvan_15.png') no-repeat;
}

.price_table tr td {
	color: #f96302;
}
#quantity {
	width: 60px;
}
</style>
<script>
	function addToCart(sku, name, price) {
		var quantity = jQuery('#quantity').val();
		quantity = parseFloat(quantity);
		jQuery.ajax({
			url: '/cart/addToCart',
			type: 'post',
			dataType: 'json',
			data: {
				sku: sku, name: name, price: price, quantity: quantity
			},
			success: function(resp) {
				jQuery('#but_gh .num').text(resp);
				alert('Bạn đã đặt hàng thành công');
			}
		});
	}
</script>