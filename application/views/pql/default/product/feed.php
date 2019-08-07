<?xml version="1.0" encoding="UTF-8"?><rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/">
<?php 
/** @var MY_Controller $controller */
/** @var Links_model $controller->links_model */
$controller->load->model('pql/terms_model', 'terms_model');
$category = $controller->terms_model->get_one($catId);
$category_taxonomy = $controller->terms_model->get_term_taxonomy($catId);
$posts = $controller->posts_model->get_posts(array(
	'term_taxonomy_id' => $category_taxonomy['term_taxonomy_id']
));
$page_title = wpglobus($category['name'], $language);
$page_url = $controller->links_model->get_product_category_link($language, $category);
$page_feed_url = $page_url . '/feed';
?>
<channel>
	<title><?= $page_title?></title>
	<atom:link href="<?= $page_feed_url?>" rel="self" type="application/rss+xml" />
	<link><?= $page_url?></link>
	<description><?= $page_title?></description>
	<lastBuildDate>
	<?= date('Y-m-d H:00:00')?>	</lastBuildDate>
	<sy:updatePeriod>
	hourly	</sy:updatePeriod>
	<sy:updateFrequency>
	1	</sy:updateFrequency>
	<generator>Feed</generator>
	<?php foreach($posts as $post):
		$img = $controller->posts_model->get_post_thumbnail_img($post);
		?>
	<item>
		<title><?= wpglobus($post['post_title'], $language)?></title>
		<link><?= $controller->links_model->get_product_link($language, $category, $post)?></link>
		<pubDate><?= $post['post_modified']?></pubDate>
		<category><![CDATA[<?= $page_title?>]]></category>
		<category><![CDATA[<?= wpglobus($post['post_content'], $language) ?>]]></category>
	<?php if($img): ?>
		
	<?php endif;?>
	</item>
<?php endforeach;?>
</channel>
</rss>