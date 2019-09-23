<?php 
/** @var MY_Controller $controller */
/** @var Links_model $controller->links_model */
$category = $controller->terms_model->get_one($catId);
$category_taxonomy = $controller->terms_model->get_term_taxonomy($catId);
$posts = $controller->posts_model->get_posts(array(
	'term_taxonomy_id' => $category_taxonomy['term_taxonomy_id']
));
?>
<?php $controller->view('left', $data);?>
<div id="right">
	
	<div class="b_top">
		<h1><?= wpglobus($category['name'], $language)?> <a href="<?= $controller->links_model->get_news_category_link($language, $category)?>/feed" style="color: brown; float:right; font-size: 0.8em;"><img src="https://cdn0.iconfinder.com/data/icons/stuttgart/32/feed.png" style="width: 16px; height: 16px; position: relative; top: 3px;"> rss</a></h1>
	</div>
	<div id="link_br">
		<a href="/<?= $language?>"><?= wpglobus('{:vi}Trang chủ{:}{:en}Home{:}', $language)?></a>
		<span>»</span>
		<a class="a_active" href="<?= $controller->links_model->get_news_category_link($language, $category) ?>"><?= wpglobus($category['name'], $language)?></a>
		<br clear="all">
	</div>

	<div id="content_new">
		
		<?php foreach($posts as $post):
			$img = $controller->posts_model->get_post_thumbnail_img($post); 
			?>
		<div id="content_n" style="border:none;">
			<div class="block_img">
				<a href="<?= $controller->links_model->get_news_link($language, $category, $post) ?>">
					<img src="<?= $controller->links_model->get_image_url($img)?>" class="thumb" border="0" alt="<?= wpglobus($post['post_title'], $language) ?>">
				</a>
			</div>
			<div id="ct_new">
				<h2 id="name_new">
					<a href="<?= $controller->links_model->get_news_link($language, $category, $post) ?>"><?= wpglobus($post['post_title'], $language) ?></a>
				</h2>
				<p id="shor_n"><?= $post['post_excerpt'] ?></p>
				<p id="xemtiep"><a href="<?= $controller->links_model->get_news_link($language, $category, $post) ?>">Xem tiếp »</a></p>
			</div>
			<div style="clear:both"></div>
		</div>
		<?php endforeach;?>
	</div>
</div>

<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "ItemList",
    "url": "<?= $controller->getNewsCatLink($category, $language)?>",
    "numberOfItems": "<?= count($posts) ?>",
	"itemListElement": <?= json_encode($jsonlds);?>
}
</script>