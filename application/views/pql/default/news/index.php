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
	<div id="link_br">
		<a href="#">Trang chủ</a>
		<span>»</span>
		<a class="a_active" href="#">Hướng dẫn</a>
		<br clear="all">
	</div>

	<div id="content_new">
		<div id="content_n" style="border:none;">
			<div class="block_img">
				<a href="#">
					<img src="images/bich_van_2_100x150_thumb.jpg" class="thumb" border="0" alt="">
				</a>
			</div>
			<div id="ct_new">
				<p id="name_new">
					<a href="#">Hồ Sơ Năng Lực Công Ty TNHH Thương Mại Bích Vân</a><span>(4:07 PM - 04/11/2013)</span>
				</p>
				<p id="shor_n">Công ty TNHH TM Bích Vân là nhà cung ứng chuyên nghiệp các loại vật tư cho ngành xây dựng cấp thoát nước hàng đầu Việt Nam. Trải qua gần hai thập niên hoạt động và phát triển, chúng tôi đáp ứng ngày càng tốt hơn mọi nhu cầu của Quý Khách Hàng từ Bắc tới Nam.</p>
				<p id="xemtiep"><a href="#">Xem tiếp »</a></p>
			</div>
			<div style="clear:both"></div>
		</div>
		<div id="content_n">
			<div class="block_img">
				<a href="#">
					<img src="images/bich_van_2_100x150_thumb.jpg" class="thumb" border="0" alt="">
				</a>
			</div>
			<div id="ct_new">
				<p id="name_new">
					<a href="#">Hồ Sơ Năng Lực Công Ty TNHH Thương Mại Bích Vân</a><span>(4:07 PM - 04/11/2013)</span>
				</p>
				<p id="shor_n">Công ty TNHH TM Bích Vân là nhà cung ứng chuyên nghiệp các loại vật tư cho ngành xây dựng cấp thoát nước hàng đầu Việt Nam. Trải qua gần hai thập niên hoạt động và phát triển, chúng tôi đáp ứng ngày càng tốt hơn mọi nhu cầu của Quý Khách Hàng từ Bắc tới Nam.</p>
				<p id="xemtiep"><a href="#">Xem tiếp »</a></p>
			</div>
			<div style="clear:both"></div>
		</div>
	</div>
</div>