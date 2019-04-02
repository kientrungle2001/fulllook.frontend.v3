<ul class="list-group full vocabulary">
	<li class="list-group-item list-group-test-set-item" ng-repeat="testSet in testSets"
		ng-class="{'active': testSet.id == test_set_id}" style="padding: 0">

		<a href="/testSet/detail?category_id={{category_id}}&test_set_id={{testSet.id}}" style="padding: 15px; display: inline-block;"><?php if(@$_GET['showDebug']):?>#{{testSet.id}}
			<?php endif;?>{{translate(testSet, 'test.name')}} {{testSet.trial ? ' - Free': ''}}</a>


		<ul class="list-group" style="margin: 0;">
			<li class="list-group-item" ng-repeat="test in testSet.children"
				style="border: none !important;"
				ng-class="{'active sub-active': test.id == test_id}">
				<a href="/testSet/test?category_id={{category_id}}&test_set_id={{testSet.id}}&test_id={{test.id}}" style="border: none;">&nbsp;&nbsp;&nbsp;&nbsp;<?php if(@$_GET['showDebug']):?>#{{test.id}}
					<?php endif;?> {{translate(test, 'test.name')}}
					{{test.trial ? ' - Free': ''}}</a>
			</li>
		</ul>
	</li>
</ul>