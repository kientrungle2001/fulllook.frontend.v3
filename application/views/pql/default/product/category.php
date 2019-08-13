<?php 
/** @var MY_Controller $controller */
/** @var Links_model $controller->links_model */
$controller->view('left', $data);
$category = $controller->terms_model->get_one($catId);
$category_taxonomy = $controller->terms_model->get_term_taxonomy($catId);
$posts = $controller->posts_model->get_posts(array(
	'term_taxonomy_id' => $category_taxonomy['term_taxonomy_id']
));
?>
<div id="right" itemscope itemtype="http://schema.org/ItemList">
	<div class="b_top">
		<h1 itemprop="name"><?= wpglobus($category['name'], $language)?> <a href="<?= $controller->links_model->get_product_category_link($language, $category)?>/feed" style="color: brown; float:right; font-size: 0.8em;"><img src="https://cdn0.iconfinder.com/data/icons/stuttgart/32/feed.png" style="width: 16px; height: 16px; position: relative; top: 3px;"> rss</a></h1>
	</div>
	<div id="link_br" style="margin:0px;border:none">
		<a href="/"><?= wpglobus('{:vi}Trang chủ{:}{:en}Home{:}', $language)?></a>
		<span>»</span>
		<a itemprop="url" class="a_active" href="<?= $controller->links_model->get_product_category_link($language, $category)?>"><?= wpglobus($category['name'], $language)?></a>
		<br clear="all">
	</div>
	<div style="clear:both"></div>
	<?php foreach($posts as $post):
		$img = $controller->posts_model->get_post_thumbnail_img($post);
		?>
	<div class="cate2_s item_cate2 h-product" itemprop="itemListElement" itemtype="http://schema.org/Product">
		<a href="<?= $controller->links_model->get_product_link($language, $category, $post)?>">
			<img title="<?= wpglobus($post['post_title'],$language)?>" src="<?= $controller->links_model->get_image_url($img)?>" width="167" height="131" border="0" class="u-photo" itemprop="image"></a>
		<h2><a href="<?= $controller->links_model->get_product_link($language, $category, $post)?>" class="name_cate2 p-name" itemprop="name"><?= wpglobus($post['post_title'],$language)?></a></h2>
		<br clear="all">
	</div>
	<?php endforeach;?>
</div>