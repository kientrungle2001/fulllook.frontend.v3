<?php 
/** @var MY_Controller $controller */
/** @var Links_model $controller->links_model */
?>
<?php 
$contact_title = $controller->options_model->get_option_tree('contact_title');
$contact_content = $controller->options_model->get_option_tree('contact_content');
$controller->view('left', $data);?>
<div id="right">
	<div class="b_top">
		<h1 id="name_new"><?= wpglobus($contact_title, $language)?></h1>
	</div>
	<div id="link_br">
	<a href="/<?= $language?>"><?= wpglobus('{:vi}Trang chủ{:}{:en}Home{:}', $language)?></a>
		<span>»</span>
		<a class="a_active" href="<?= $controller->links_model->get_language_link($language, '/lien-he') ?>">
		<?= wpglobus('{:vi}Liên hệ{:}{:en}Contact{:}', $language)?>
		</a>
		<br clear="all">
	</div>

	<div id="content_new">
		
		<div id="content_n" style="border:none;">
			<div id="ct_new">
				<p id="shor_n">
				<?= wpglobus($contact_content, $language)?>
				</p>
			</div>
			<div style="clear:both"></div>
		</div>
	</div>
</div>