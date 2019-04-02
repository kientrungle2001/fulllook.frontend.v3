<div>
	<div class="container-fluid">
		<div mathjax-bind="sub_topic.content"></div>
		<!-- Start Questions -->
		<div ng-repeat="question in questions">
			<div class="question full">
				<div class="item cau">
					<div class="stt">Câu: {{$index+1}}</div>
					<span id="sound-{{question.id}}" class="btn volume fa fa-volume-up" 
							ng-click="read_question( question.id );" ng-show="question.hasAudio"></span>
				</div>

				<div class="nobel-list-md choice">
					<div class="row">
						<div class="col-xs-12" ng-show="language != 'vn'">
							<div class="ptnn-title full text-justify" mathjax-bind="formatWritting(question.name)"></div>
						</div>
						<div class="col-xs-12" ng-show="language == 'vn' || language == 'ev'">
							<div class="ptnn-title full text-justify" mathjax-bind="formatWritting(question.name_vn)"></div>
						</div>
					</div>
					
					<a href="#mobile-explan-{{question.id}}" class="explanation top10 btn btn-success btn-show-exp"
						data-toggle="collapse" ng-show="showAnswer">Xem lí giải
					</a>

					<div id="mobile-explan-{{question.id}}" class="collapse lygiai top10 item"
						ng-show="showAnswer">
						<div class="item mb-2" mathjax-bind="getExplaination(question)"></div>

						<?php $controller->view('testset/report', $data);?>

					</div>
					<!--lí giải -->
				</div>
			</div>
			<div class="line-question">
			</div>
			<!--end question-->
		</div>
		<!-- End Questions -->

		<div class="text-center full mb-3 relative">				
			<button id="finish-choice" class="btn btn-primary btt-practice " name="finish-choice" ng-click="finishTest()" ng-disabled="!remaining.running"><span class="fa fa-check"></span>
				Xem đáp án
			</button>
		</div>
	</div>

</div>