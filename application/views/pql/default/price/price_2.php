<!--s-box-->
<?php
$category_id = $options_model->get_option_tree('second_sidebar_category');
$category = $controller->terms_model->get_one($category_id);
$category_taxonomy = $controller->terms_model->get_term_taxonomy($category_id);
$posts = $controller->posts_model->get_posts(array(
	'term_taxonomy_id' => $category_taxonomy['term_taxonomy_id']
));

?>
<div class="s_top"><a href="<?= $controller->links_model->get_news_category_link($language, $category)?>"><?= wpglobus($category['name'], $language)?></a></div><br>
<?php foreach($posts as $post):?>
<p class="new_left" style="background:none">
	<a href="<?= $controller->links_model->get_news_link($language, $category, $post) ?>"><?= wpglobus($post['post_title'], $language) ?></a>
</p>
<?php endforeach;?>
<br>
<!--s-box-->