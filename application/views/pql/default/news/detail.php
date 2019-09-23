<?php
$controller->view('left', $data);
$category = $controller->terms_model->get_one($catId);
$category_taxonomy = $controller->terms_model->get_term_taxonomy($catId);
$posts = $controller->posts_model->get_posts(array(
	'term_taxonomy_id' => $category_taxonomy['term_taxonomy_id']
));
$news = $controller->posts_model->get_post($newsId);
?>
<div id="right" class="h-news">
	<div class="b_top">
		<h1 class="p-name"><?= wpglobus($news['post_title'], $language) ?></h1>
	</div>
	<div id="link_br" style="margin:0px;border:none">
		<a href="/<?= $language?>"><?= wpglobus('{:vi}Trang chủ{:}{:en}Home{:}', $language)?></a>
		<span>»</span>
		<a class="p-category" href="<?= $controller->links_model->get_news_category_link($language, $category)?>"><?= wpglobus($category['name'], $language) ?></a>
		<span>»</span>
		<a class="a_active p-name u-url" href="<?= $controller->links_model->get_news_link($language, $category, $news)?>"><?= wpglobus($news['post_title'], $language) ?></a>
		
	</div>
	<br clear="all">
	<div id="info_cate">
		<div id="img_cate">
			<?php 
			$img = $controller->posts_model->get_post_thumbnail_img($news);
			?>
			<img class="u-photo" title="<?= wpglobus($news['post_title'],$language)?>" 
				src="<?= $controller->links_model->get_image_url($img)?>">
		</div>
		<div id="text-cate" class="e-description">
			<?= replace_br(wpglobus($news['post_content'], $language))?>	
		</div>
		
	</div>
	<div style="clear:both"></div>
	<div id="news-comments">
	<div class="fb-comments" data-href="http://<?= $_SERVER['HTTP_HOST']?><?= $_SERVER['REQUEST_URI']?>" data-width="100%" data-numposts="5"></div>
	</div>
</div>

<?php
$jsonld = array(
	"@context" => "http://schema.org",
	"@type" => "Article",
	"description" => wpglobus($news['post_content'], $language),
	"headline" => wpglobus($news['post_title'], $language),
	"image" => $controller->links_model->get_image_url($img),
	"url" => $controller->links_model->get_news_link($language, $category, $news),
	"author" => "MOBO",
	"publisher"	=> array(
		"@type" => "Organization",
		"name" => 'MOBO',
		"logo" => "http://pql.nn-center.com/_pql/wp-content/uploads/2019/07/mo-bo.jpg" 
	),
	"dateModified" => $news['post_modified'],
	"datePublished" => $news['post_modified'],
	"mainEntityOfPage" => array(
		"@type" => "WebPage",
		"@id" => $controller->links_model->get_news_link($language, $category, $news)
	),
);
?>
<script type="application/ld+json">
<?= json_encode($jsonld)?>
</script>