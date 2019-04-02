<?php $controller->js('controller/subject_list.js');?>
<div id="practice" class="full">
	<div class="container">
		<div style="margin-bottom: 15px;" class="text-center fs40 heading">
		Luyện tập các môn
		</div>
	</div>

	<div class="practice-section container" ng-controller="subjectListController">
		<div class="box-practice text-center" ng-repeat="subject in subjects">
			<a href="/practice/detail?subject_id={{subject.id}}" class="subjectclick" data-subject="{{subject.id}}" data-alias="{{subject.alias}}" data-class="5">
				<div class="white text-uppercase relative">
					<div class="full">
						<img ng-src="http://s1.nextnobels.com{{subject.img}}" alt="{{translate(subject, 'category.name')}}" class=" img-fluid center-block img-responsive">
					</div>
					<div class="top20 text-center full absolute">{{translate(subject, 'category.name')}}</div>
					
				</div>
			</a>
		</div>
	</div>
</div>