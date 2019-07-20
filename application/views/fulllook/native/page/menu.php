<?php $controller->js('controller/subject_list.js');?>
<nav class="navbar fix-menu navbar-expand-lg container-fluid main-menu mt-2 bg-white">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		<i class="fa fa-bars text-primary" aria-hidden="true"></i>
	</button>
	<div class="collapse navbar-collapse" id="navigation">
		<ul class="nav navbar-nav">
			<li class="nav-item">
				<a href="/" class="nav-link">Trang chủ</a>
			</li>
			<li class="nav-item dropdown">
				<a href="/about" data-toggle="dropdown" class="nav-link dropdown-toggle">Về phần mềm</a>
				<ul class="dropdown-menu">
					<li style="padding-left: 25px;"><a href="/about">Giới thiệu</a></li>
					<li><a href="/about#guide">Hướng dẫn mua</a></li>
					<li><a href="/news_list.php?id=147">Hướng dẫn sử dụng</a></li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link">Chọn Ngôn Ngữ</a>
				<ul class="dropdown-menu">
					<li style="padding-left: 25px;" ng-click="language='en';selectLanguage('en')"><a href="#">Tiếng
							Anh</a></li>
					<li><a href="#" ng-click="language='vn';selectLanguage('vn')">Tiếng Việt</a></li>
					<li><a href="#" ng-click="language='ev';selectLanguage('ev')">Song Ngữ</a></li>
				</ul>
			</li>

			<li class="nav-item dropdown" ng-controller="subjectListController">
				<a href="/#practice" class="nav-link dropdown-toggle">Luyện các môn</a>
				<div class="dropdown-menu mega pr-3">
					<div class="box-practice pr-0 text-center" ng-repeat="subject in subjects">
						<a href="/detail.php?subject_id={{subject.id}}" class="subjectclick"
							data-subject="{{subject.id}}" data-alias="{{subject.name}}" data-class="5">
							<div style="font-size: 16px;" class="white text-uppercase relative">
								<div class="full">
									<img ng-src="http://s1.nextnobels.com{{subject.img}}" alt="{{subject.name}}"
										class=" img-fluid center-block">
								</div>
								<div class="text-mega text-center full absolute">{{translate(subject, 'category.name')}}
								</div>
							</div>
						</a>
					</div>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="/#ontienganh">Luyện tiếng anh</a>
				<div style="right: 0px !important; left: auto;" class="mega dropdown-menu  p-3">
					<div class="row pl-3" ng-init="selectedEnglishTestPage = 0">
						<div class="col-xs-12 col-md-2 pl-0" ng-repeat="test in englishTests"
							ng-show="inPage($index, selectedEnglishTestPage, 30)">
							<a href="/test.php?test_id={{test.id}}&category_id=1411">
								<div class="btn text-lta full mb-3 btn-primary">{{translate(test,'test.name')}}
									{{test.trial? ' - Free': ''}}</div>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 text-center">
							<nav aria-label="Navigation">
								<ul class="pagination justify-content-center">
									<li class="page-item"
										ng-repeat="page in range(1, totalPage(englishTests.length, 30), 1)"
										ng-click="selectEnglishTestPage(page-1)"
										ng-class="{'active': selectedEnglishTestPage == page-1}"><a href="#"
											class="page-link" onclick="return false;">{{page}}</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="/#tonghop">Luyện tổng hợp</a>
				<div style="right: 0px !important; left: auto;" class="mega dropdown-menu  p-3">
					<div class="row pl-3" ng-init="selectedTestPage = 0">
						<div class="col-xs-12 pl-0 col-md-2" ng-repeat="test in tests"
							ng-show="inPage($index, selectedTestPage, 30)">
							<a href="/test.php?test_id={{test.id}}&category_id=1412">
								<div class="btn text-lta full mb-3 btn-primary">{{translate(test, 'test.name')}}
									{{test.trial? ' - Free': ''}}</div>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 text-center">
							<nav aria-label="Navigation">
								<ul class="pagination text-lta justify-content-center">
									<li class="page-item" ng-repeat="page in range(1, totalPage(tests.length, 30), 1)"
										ng-click="selectTestPage(page-1)"
										ng-class="{'active': selectedTestPage == page-1}"><a href="#" class="page-link"
											onclick="return false;">{{page}}</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a href="/#thithu" class="nav-link dropdown-toggle">Thi thử Trần Đại Nghĩa</a>
				<div style="right: 0px !important; left: auto;" class="mega dropdown-menu  p-3">
					<div class="row" ng-init="selectedTestSetPage = 0">
						<div class="w20p full-xs" ng-repeat="testSet in testSets | orderBy: 'ordering'"
							ng-show="inPage($index, selectedTestSetPage, 15)">
							<a class="full btn btn-primary mb-3 text-lta"
								href="/testSet.php?category_id=1413&test_set_id={{testSet.id}}">{{translate(testSet, 'test.name')}}</a>

						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 text-center">
							<nav aria-label="Navigation">
								<ul class="pagination text-lta justify-content-center">
									<li class="page-item"
										ng-repeat="page in range(1, totalPage(testSets.length, 15), 1)"
										ng-click="selectTestSetPage(page-1)"
										ng-class="{'active': selectedTestSetPage == page-1}"><a href="#"
											class="page-link" onclick="return false;">{{page}}</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</li>

		</ul>
	</div>
</nav>