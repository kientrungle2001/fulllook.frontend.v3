<div class="do-practice full" ng-show="vocabulary.trial == 1 || checkIsPaid()">
	<div class="name-detail text-center">
		{{vocabulary.title}}
	</div>
</div>

<div class="do-practice full" ng-hide="vocabulary.trial == 1 || checkIsPaid()">
	<h2 class="text-center guide">Bạn phải <a href="/about#guide">mua phần mềm</a> mới được xem bài học này</h2>
</div>

<div class="do-practice full" ng-show="vocabulary.trial == 1 || checkIsPaid()">
<div class="text-justify pt-2 adjust-table table-responsive" mathjax-bind="parseTranslate(vocabulary.content)"></div>
</div>