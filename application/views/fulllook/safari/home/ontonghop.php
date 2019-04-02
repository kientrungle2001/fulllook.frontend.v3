<?php $controller->js('controller/test_list.js');?>
<div id="tonghop" class="full">
	<div class="container">
		<div class="text-center heading mt-2 mb-4 text-white  fs40">
		Ôn luyện tổng hợp
		</div>
	</div>
	<div class="container" ng-controller="testListController">
		<div class="row" ng-init="selectedTestPage = 0">
			<div class="col-xs-12 col-md-2" ng-repeat="test in tests" ng-show="inPage($index, selectedTestPage, 30)">
			<a href="/test/detail?test_id={{test.id}}&category_id=1412">
				<div class="btn ltth full mb-3 btn-primary">{{translate(test, 'test.name')}}
				<span ng-show="test.trial==1" class="badge badge-pill badge-danger">Free</span>
				</div>
				
			</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 text-center">
				<nav aria-label="Navigation">
					<ul class="pagination justify-content-center">
						<li class="page-item" ng-repeat="page in range(1, totalPage(tests.length, 30), 1)" 
						ng-click="selectTestPage(page-1)"
						ng-class="{'active': selectedTestPage == page-1}"
						><a href="#" class="page-link" onclick="return false;">{{page}}</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>	