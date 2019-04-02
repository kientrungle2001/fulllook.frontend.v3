<div>
	<div class="text-center">
		<div class="time">
			<img src="http://fulllook.com.vn/Themes/Songngu3/skin/images/watch.png">
			<div id="countdown" class="num-time robotofont" style="color: rgb(255, 0, 0);">
				{{remaining.minutes}}:{{remaining.seconds}}</div>
		</div>
	</div>
	<?php $controller->view('test/questions', $data)?>
	<?php $controller->view('test/result', $data)?>
</div>