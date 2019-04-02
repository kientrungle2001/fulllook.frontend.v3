<?php $controller->js('controller/real_test_set_list.js');?>
<div class="full bg3" ng-controller="realTestSetListController">
	<div class="text-white text-center mt-2 mb-3  heading">
		Đề thi Trần Đại Nghĩa các năm
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-6" ng-repeat="testSet in realTestSets">
				<div class="box-tdn bg-white full-xs">
					<h3 class="text-center head-tdn"><a href="/testSet/detail?category_id=1414&test_set_id={{testSet.id}}">{{translate(testSet, 'test.name')}}</a></h3>
					<div class="box-body">
						<div class="link-box text-center" ng-repeat="test in testSet.children | orderBy: 'ordering'">
							<a href="/testSet/detail?category_id=1414&test_set_id={{testSet.id}}&test_id={{test.id}}" class="text-color">
								{{translate(test, 'test.name')}}
								<span ng-show="test.trial==1" class="badge badge-pill badge-danger">Free</span>
							</a>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>