<?php 
$email = $controller->options_model->get_option_tree('email');
$hotline = $controller->options_model->get_option_tree('hotline');
$company_name = $controller->options_model->get_option_tree('company_name');
$address = $controller->options_model->get_option_tree('address');
$office_address = $controller->options_model->get_option_tree('office_address');
$tel = $controller->options_model->get_option_tree('tel');
$fax = $controller->options_model->get_option_tree('fax');
$tax_code = $controller->options_model->get_option_tree('tax_code');
$business_number = $controller->options_model->get_option_tree('business_number');
$business_author = $controller->options_model->get_option_tree('business_author');

$top_menu_items = $controller->posts_model->get_nav_items(7);

$footer_menu_items = $controller->posts_model->get_nav_items(173);
$footer_tree_menu_items = treefy($footer_menu_items, 'ID', '_menu_item_menu_item_parent');
$footer_link_items = $controller->posts_model->get_nav_items(174);
//pre($footer_link_items);
?>
<div id="foot" style="clear:both;"> 
	<div id="menu_foot"> 
		<div id="menu_f_left"> 
		<?php foreach($top_menu_items as $index => $top_menu_item):
			if(isset($top_menu_item['_menu_item_menu_item_parent']) && $top_menu_item['_menu_item_menu_item_parent']) {
				continue;
			}
			?>
<?php if($index > 0):?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php endif;?> <a href="<?= $top_menu_item['_menu_item_url']?>"><?= wpglobus($top_menu_item['post_title']) ?></a>
		<?php endforeach;?>
		</div> 
		<div style="clear:both"></div> 
	</div>
	<div id="info"> 
		<p>© Copyrights 2013 <?= $company_name?></p>
		<p>Địa chỉ: <?= $address?></p>
		<p>VPGD: <?= $office_address?></p>
		<p>Tel: <?= $tel?> - Fax: <?= $fax?></p>
		<p>Email: <?= $email?></p>
		<p>Mã số thuế: <?= $tax_code?></p>
		<p>Số đăng ký kinh doanh: <?= $business_number?></p>
		<p><?= $business_author?></p>
	</div>
	<?php foreach($footer_tree_menu_items as $footer_tree_menu_item):
	if($footer_tree_menu_item['treeLevel'] == 1): ?>
	<div class="box_end">
	<b><?= $footer_tree_menu_item['post_title']?></b>
		<ul>
			<?php 
			foreach($footer_tree_menu_item['childrenIndexes'] as $index):?>
			<li style="list-style:none">
			<a href="<?= $footer_menu_items[$index]['_menu_item_url']?>"><?= wpglobus($footer_menu_items[$index]['post_title'])?></a></li>
			<?php endforeach;?>
		</ul>
	</div>
	<?php 
	endif;
	endforeach;?>
	
 	<div class="box_end" style="text-align:center">
		<a href="/assets/css/pql/default/upload/images/nha-phan-phoi-ongtienphong.png" title="sản phẩm chính hãng Tiền Phong">
			<img src="/assets/css/pql/default/images/ongtien-phong.jpg" border="0" alt="sản phẩm chính hãng Tiền Phong" title="sản phẩm chính hãng Tiền Phong" style="width:148px"></a>
			<a href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=4171" rel="nofollow" title="THông báo"><img src="/assets/css/pql/default/images/da-dang-ky-bo-cong-thuong.png" border="0" alt="Thông báo" title="Thông báo" style="width:148px">
			</a>
	</div>
	<div style="clear:both"></div>
</div>
<div style="margin-bottom:37px;">
	<hr>
	<div class="key_w">
		<ul>
			<?php foreach($footer_link_items as $link_item):?>
			<li><a href="<?= $link_item['_menu_item_target']?>"><?= wpglobus($link_item['post_title'])?></a></li>
			<?php endforeach;?>
		</ul>
	</div>
</div>
<div id="sup_all">
	<div id="ct_sup">
		<div id="hotline_f">  <?= $hotline?></div>
		<div id="email_f"> <?= $email?></div>
		<div style="width: 430px;position: absolute;top: 11px;right: 0px;">
		<!-- AddThis Button BEGIN -->
			<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_counter addthis_pill_style"></a>
			</div>
		<!-- AddThis Button END -->
		</div>
	</div>
</div>