<?php 
require_once FCPATH . 'curl/curl.php';
$curl = new Curl;
$response = $curl->post('http://api2.nextnobels.com/common/getTests', [
	'categoryId' => 1411
]);
$tests = json_decode($response, true);
?>
<div id="ontienganh" class="full">
	<div class="container">
		<div class="text-center heading mt-2 mb-4 text-white fs40">
		Ôn luyện Tiếng anh
		</div>
	</div>
	<div class="container">
		<div class="row">

			<?php foreach($tests as $test):?>
			<div class="col-xs-12 col-md-2">
				<a href="/test/detail?test_id=<?php echo $test['id']?>&category_id=1411">
					<div class="btn ltth full mb-3 btn-primary"> <?php echo $test['name']?>
						<?php if(isset($test['trial']) && $test['trial']): ?>
						<span class="badge badge-pill badge-danger">Free</span>
					<?php endif;?>
					</div>
				</a>
			</div>
			<?php endforeach; ?>

		</div>
	</div>
	
</div>	
