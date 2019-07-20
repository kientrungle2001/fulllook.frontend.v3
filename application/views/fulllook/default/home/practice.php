<?php $controller->js('controller/subject_list.js');?>
<div id="practice" class="full">
	<div class="container">
		<div class="practice-title">
		Luyện tập các môn
		</div>
	</div>

	<div class="container" ng-controller="subjectListController">
		<div class="row">
			<div class="box-practice-outer" ng-repeat="subject in subjects">
				<a href="/practice/detail?subject_id={{subject.id}}">
					<div class="box-practice-inner">
						<div class="box-practice-img">
							<img ng-src="http://s1.nextnobels.com{{subject.img}}" alt="{{translate(subject, 'category.name')}}" class="img-fluid">
						</div>
						<div class="box-practice-title">{{translate(subject, 'category.name')}}</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>