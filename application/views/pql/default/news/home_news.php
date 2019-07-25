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
		<h2 style="height:35px;overflow:hidden"><?= wpglobus($post['post_title'])?></h2>
	</div><br>
	<div id="content_new_home">
		<a href="#/gia-ongbang-gia-san-pham-catalogue-ctbv.html"><img src="http://pql.nn-center.com/_pql/wp-content/uploads/<?= $img?>" border="0" alt="<?= wpglobus($post['post_title'])?>" width="180" height="140px"> </a>
		<p style="height:162px;overflow:hidden">Công ty CP Nhựa Thiếu Niên Tiền Phong luôn đi đầu trong lĩnh vực công nghệ mới cũng như đầu tư máy móc thiết bị hiện đại nhằm đem đến cho khách hàng các sản phẩm ống nhựa có chất lượng cao nhằm đáp ứng các nhu cầu của khách hàng như cam kết trong chính sách chất lượng sản phẩm của công ty đã đề ra:</p>
		<a href="#/gia-ongbang-gia-san-pham-catalogue-ctbv.html" class="detail_new_home">&gt; Chi tiết</a>
	</div>
</div>
<?php endforeach;?>