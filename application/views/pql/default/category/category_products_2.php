<?php 
$posts_model = $controller->posts_model;
$terms_model = $controller->terms_model;
$options_model = $controller->options_model;
#
$second_section_category = $options_model->get_option_tree('second_section_category');
$second_category = $terms_model->get_one($second_section_category);
$second_category_taxonomy = $terms_model->get_term_taxonomy($second_section_category);
$posts = $posts_model->get_posts(array(
	'term_taxonomy_id' => $second_category_taxonomy['term_taxonomy_id']
));

?>
	<div class="b_top">
	<h2><a href="/san-pham/<?= wpglobus($second_category['slug'])?>-c.html"><?= wpglobus($second_category['name'])?></a></h2>
	</div>
	<br>
	<!--content-box-->
	<?php foreach($posts as $post):?>
	<div class="cate2_s item_cate2 ">
		<a href="-hdpe-dmspc.html"><img src="/assets/css/pql/default/images/d2_thumb.png" width="167" height="131" border="0" alt="Phụ Tùng HDPE"></a>
		<a href="/san-pham/<?= $post['post_name']?>-p.html" class="name_cate2"><?= $post['post_title']?></a>
		<br clear="all">
	</div>
	<?php endforeach;?>
	<div style="clear:both"></div><br>