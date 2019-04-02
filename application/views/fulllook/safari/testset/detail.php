<?php 
$controller->js('controller/test_set_detail.js')
?>
<div class="full practice pt-4 pb-5" ng-controller="testSetDetailController">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-3">
				<div class="main-shadow full">
					<div class="full">
						<div style="border-radius: 5px 0px 0px 0px;"
							class="nav-link text-center title-pr text-white bg-primary">
							{{translate(category, 'category.name')}}</div>
					</div>
					<?php $controller->view('testset/list', $data); ?>
				</div>

			</div>
			<div class="col-xs-12 col-md-9">
				<div class="main-shadow full">
					<?php $controller->view($child_view, $data)?>
					<img class="img-fluid full" src="http://tdn.nextnobels.com/assets/images/bg-huongdan.png" />
				</div>
			</div>
		</div>
	</div>
</div>

<style>
.text-white {color: white !important;}
.list-group-test-set-item {background-color: #bbb;}
.list-group-test-set-item.active {background-color: #fbd65b;}
.list-group-item.sub-active {background-color: #ffe693;}
.list-group-item.sub-active > a {color: #333;}
.inline {display: inline;}
</style>
