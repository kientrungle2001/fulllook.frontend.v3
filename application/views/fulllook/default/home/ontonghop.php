<?php $controller->js('controller/test_list.js');?>
<div id="tonghop" class="full">
	<div class="container" ng-controller="testListController">
		<section-title>Ôn luyện tổng hợp</section-title>
		<div class="row" ng-init="selectedTestPage = 0">
			<div class="section-block" ng-repeat="test in tests" ng-show="inPage($index, selectedTestPage, 30)">
				<test-block category_id="1412" />
			</div>
		</div>
		<div class="row">
			<div class="col-12 text-center">
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