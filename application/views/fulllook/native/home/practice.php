<?php 
$controller->js('controller/subject_list.js');
require_once FCPATH . 'curl/curl.php';
$curl = new Curl;
$response = $curl->get('http://api2.nextnobels.com/corecategories', [
	'where' => [
		'parent' => 47,
		'software' => 1,
		'status' => 1,
		'display' => 1,
		'classes' => [
			'like' => '%,5,%'
		]
	],
	'select' => 'id,name,name_vn,img,level',
	'sort' => 'ordering asc'
]);
$subjects = json_decode($response, true);
?>
<div id="practice" class="full">
	<div class="container">
		<div style="margin-bottom: 15px;" class="text-center fs40 heading">
		Luyện tập các môn
		</div>
	</div>

	<div class="practice-section container">
	<?php foreach($subjects as $subject): ?>	
		<div class="box-practice text-center">
			<a href="/practice/detail?subject_id=<?php echo $subject['id']?>" class="subjectclick" data-subject="<?php echo $subject['id']?>" data-class="5">
				<div class="white text-uppercase relative">
					<div class="full">
						<img src="http://s1.nextnobels.com<?php echo $subject['img']?>" class=" img-fluid center-block img-responsive">
					</div>
					<div class="top20 text-center full absolute"><?php echo $subject['name']?></div>
				</div>
			</a>
		</div>
	<?php endforeach;?>
	</div>
</div>