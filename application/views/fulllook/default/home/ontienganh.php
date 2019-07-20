<?php $controller->js('controller/english_test_list.js');?>
<div id="ontienganh" class="full" ng-controller="englishTestListController">
	<div class="container" ng-init="categoryId='1411'; loadData();">
		<section-title>Ôn luyện Tiếng anh</section-title>
		<div class="row" ng-init="selectedEnglishTestPage = 0">
			<div class="section-block" ng-repeat="test in englishTests" ng-show="inPage($index, selectedEnglishTestPage, 30)">
				<test-block category_id="1411" />
			</div>
		</div>
		<div class="row">
			<div class="col-12 text-center">
				<nav aria-label="Navigation">
					<ul class="pagination justify-content-center">
						<li class="page-item" ng-repeat="page in range(1, totalPage(englishTests.length, 30), 1)" 
						ng-click="selectEnglishTestPage(page-1)"
						ng-class="{'active': selectedEnglishTestPage == page-1}"
						><a href="#" class="page-link" onclick="return false;">{{page}}</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	
</div>	
