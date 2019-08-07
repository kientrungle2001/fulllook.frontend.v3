<?php
$controller->view('left', $data);
$category = $controller->terms_model->get_one($catId);
$category_taxonomy = $controller->terms_model->get_term_taxonomy($catId);
$posts = $controller->posts_model->get_posts(array(
	'term_taxonomy_id' => $category_taxonomy['term_taxonomy_id']
));
$product = $controller->posts_model->get_post($productId);
?>
<div id="right" class="h-product">
	<div class="b_top">
		<h2 class="p-name"><?= wpglobus($product['post_title'], $language) ?></h2>
	</div>
	<div id="link_br" style="margin:0px;border:none">
		<a href="/"><?= wpglobus('{:vi}Trang chủ{:}{:en}Home{:}', $language)?></a>
		<span>»</span>
		<a class="p-category" href="<?= $controller->links_model->get_product_category_link($language, $category)?>"><?= wpglobus($category['name'], $language) ?></a>
		<span>»</span>
		<a class="a_active p-name u-url" href="<?= $controller->links_model->get_product_link($language, $category, $product)?>"><?= wpglobus($product['post_title'], $language) ?></a>
		<br clear="all">
		<div id="info_cate">
			<div id="img_cate">
				<?php 
				$img = $controller->posts_model->get_post_thumbnail_img($product);
				?>
				<img class="u-photo" title="<?= wpglobus($product['post_title'],$language)?>" 
					src="<?= $controller->links_model->get_image_url($img)?>">
			</div>
			<div id="text-cate" class="e-description">
				<?= wpglobus($product['post_content'], $language)?>	
			</div>
			
		</div>
	</div>
	<div style="clear:both"></div>
</div>