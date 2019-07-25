<?php
$home_slide = $controller->options_model->get_option_tree('home_slide');
$home_slides = $controller->options_model->get_option_tree('home_slides');
?>
<div id="wap_slider">
		<div class="slider-wrapper theme-default">
			
			<div id="slider_s" class="nivoSlider" style="position: relative; height: 257px; background: url(&quot;<?= $home_slide?>&quot;) no-repeat;">
			<?php foreach($home_slides as $slide):?>
				<a href="<?= $slide['link']?>" class="nivo-imageLink" style="display: block;"><img src="<?= $slide['image']?>" width="790" height="257" border="0" alt="<?= $slide['title']?>" style="display: none;"></a>
			<?php endforeach?>
				<div class="nivo-caption" style="opacity: 0;">
					<p></p>
				</div>
				<div class="nivo-directionNav" style="display: none;">
					<a class="nivo-prevNav">Prev</a><a class="nivo-nextNav">Next</a></div>
				<div class="nivo-controlNav">
					<a class="nivo-control active" rel="0">1</a>
				</div>
			</div>
		</div>
	</div>