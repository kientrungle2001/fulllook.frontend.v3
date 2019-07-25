<?php
$posts_model = $controller->posts_model;
$terms_model = $controller->terms_model;
$options_model = $controller->options_model;
#
$first_section_category = $options_model->get_option_tree('first_section_category');
$first_category = $terms_model->get_one($first_section_category);
$first_category_taxonomy = $terms_model->get_term_taxonomy($first_section_category);
$posts = $posts_model->get_posts(array(
	'term_taxonomy_id' => $first_category_taxonomy['term_taxonomy_id']
));
?>
<div class="b_top">
	<h2><a href="/san-pham/<?= wpglobus($first_category['slug']) ?>-c.html"><?= wpglobus($first_category['name']) ?></a></h2>
</div>
<br>
<!--content-box-->
<?php foreach ($posts as $post) :
	$img = $posts_model->get_post_thumbnail_img($post);
	?>
	<div class="item_cate2">
		<a href="dmspc.html">
			<?php if ($img) : ?>
				<img src="http://pql.nn-center.com/_pql/wp-content/uploads/<?= $img ?>" width="230" height="134" border="0" alt="<?= $post['post_title'] ?>">
			<?php else : ?>
				<img src="/assets/css/pql/default/images/Ong_nhua_uPVC_thumb.png" width="230" height="134" border="0" alt="<?= $post['post_title'] ?>">
			<?php endif; ?>
		</a>
		<a href="/san-pham/<?= $post['post_name'] ?>-p.html" class="name_cate2"><?= $post['post_title'] ?></a>
		<br clear="all">
	</div>
<?php endforeach; ?>
<div style="clear:both"></div>
<!--content-box--><br>