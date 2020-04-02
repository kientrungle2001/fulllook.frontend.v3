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
		<div id="text-cate-detail">
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
						Số lượng: <input type="text" name="quantity" id="quantity-<?= $product['ID']?>" size="3" value="1"> 
						<button onclick="add_to_cart('<?= $product['ID']?>', 
						'<?= wpglobus($product['post_title'], $language) ?>', 
						'<?= $product['price']?>', 
						'<?= $product['brand']?>', 
						'<?= $controller->links_model->get_image_url($img)?>', 
						'<?= $controller->links_model->get_product_link($language, $category, $product)?>',
						'<?= wpglobus($product['post_title'], $language) ?>',
						'<?= $product['stock']?>');">Đặt mua</button>
					</td>
				</tr>
			</table>
		</div>
		<hr class="clear" />
		<div id="product-description">
			<div class="product-tabs">
				<div class="tab-description product-tab product-tab-active" data-tab-index="0">Thông số kỹ thuật</div>
				<div class="tab-comment product-tab" data-tab-index="1">Đánh giá sản phẩm</div>
				<div class="clear"></div>
			</div>
			<div class="product-tab-contents">
				<div class="product-tab-content product-tab-content-active">
					<div class="e-description clear"><?= replace_br(wpglobus($product['post_content'], $language))?></div>	
				</div>
				<div class="product-tab-content">
					<div id="product-comments">
						<div class="fb-comments" data-href="<?= SITE_PROTOCOL?><?= $_SERVER['HTTP_HOST']?><?= $_SERVER['REQUEST_URI']?>" data-width="100%" data-numposts="5"></div>
					</div>
				</div>
			</div>
		</div>

		<div id="other-products">
			<div class="product-tabs">
				<div class="product-tab product-tab-active">Sản phẩm khác</div>
			</div>
			<div class="product-tab-contents">
				<div class="product-tab-content product-tab-content-active">
					Sản phẩm khác
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
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
<script>
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
	$(document).ready(function(){
		$('#img_cate').zoom({
			magnify: 1
		});

		$('.product-tab').click(function(evt) {
			var $this = $(this);
			var tabIndex = $this.data('tab-index');
			$('.product-tab').removeClass('product-tab-active');
			$this.addClass('product-tab-active');
			$('.product-tab-content').removeClass('product-tab-content-active');
			$('.product-tab-content:eq('+tabIndex+')').addClass('product-tab-content-active');
		});
	});
</script>