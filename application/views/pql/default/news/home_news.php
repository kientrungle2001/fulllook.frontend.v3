<?php
$posts_model = $controller->posts_model;
$terms_model = $controller->terms_model;
$options_model = $controller->options_model;
#
$home_news_section_category = $options_model->get_option_tree('home_news_category');
$home_news_category = $terms_model->get_one($home_news_section_category);
$home_news_category_taxonomy = $terms_model->get_term_taxonomy($home_news_section_category);
$posts = $posts_model->get_posts(array(
	'term_taxonomy_id' => $home_news_category_taxonomy['term_taxonomy_id']
));
?>
<?php foreach($posts as $post):
	$img = $posts_model->get_post_thumbnail_img($post);
	?>
<div class="box_new" style="margin-left:0px">
	<div class="b_top">
	<h2 style="height:35px;overflow:hidden"><a href="<?= $controller->links_model->get_news_link($language, $home_news_category, $post)?>"><?= wpglobus($post['post_title'])?></a></h2>
	</div><br>
	<div id="content_new_home">
		<a href="<?= $controller->links_model->get_news_link($language, $home_news_category, $post)?>"><img src="http://pql.nn-center.com/_pql/wp-content/uploads/<?= $img?>" border="0" alt="<?= wpglobus($post['post_title'])?>" width="180" height="140px"> </a>
		<p style="height:162px;overflow:hidden"><?= strip_tags(wpglobus($post['post_content'], $language))?></p>
		<a href="<?= $controller->links_model->get_news_link($language, $home_news_category, $post)?>" class="detail_new_home">&gt; Chi tiết</a>
	</div>
</div>
<?php endforeach;?>