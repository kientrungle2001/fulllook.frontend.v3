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
						<div class="col" ng-show="language != 'vn'">
							<div class="ptnn-title full" mathjax-bind="question.name"></div>
						</div>
						<div class="col" ng-show="language == 'vn' || language == 'ev'">
							<div class="ptnn-title full" mathjax-bind="question.name_vn"></div>
						</div>
					</div>

					<table class="full">
						<tbody>
							<tr ng-repeat="answer in question.ref_question_answers"
								ng-class="{'bg-primary text-white': showAnswer && answer.status==1}">
								<td style="padding: 10px;">
									<input type="radio" class="float-left" name="question_answers_{{question.id}}"
										ng-value="answer.id" ng-model="user_answers[question.id]"
										ng-disabled="!remaining.running"
										onclick="jQuery(this).blur();" />
									<div class="row">
										<div class="col" ng-show="language != 'vn'">
											<span class="answers_{{question.id}}_{{answer.id}}} pl10"
												mathjax-bind="answer.content"></span>
										</div>
										<div class="col" ng-show="language=='vn'">
											<span class="answers_{{question.id}}_{{answer.id}}} pl10"
												mathjax-bind="answer.content_vn"></span>
										</div>
										<div class="col" ng-show="language=='ev'">
											<span class="answers_{{question.id}}_{{answer.id}}} pl10"
												mathjax-bind="answer.content_vn"></span>
										</div>
									</div>

								</td>
							</tr>
							<tr class="bg-success text-white"
								ng-show="showAnswer && isRightAnswer(question.id)">
								<td style="padding: 10px;">
									Bạn đã trả lời đúng
								</td>
							</tr>
							<tr class="bg-warning text-white"
								ng-show="showAnswer && !isRightAnswer(question.id)">
								<td style="padding: 10px;">
									Bạn đã trả lời sai
								</td>
							</tr>
						</tbody>
					</table>

					<a href="#mobile-explan-{{question.id}}" class="explanation top10 btn btn-success btn-show-exp"
						data-toggle="collapse" ng-show="showAnswer">Xem lí giải
					</a>

					<div id="mobile-explan-{{question.id}}" class="collapse lygiai top10 item"
						ng-show="showAnswer">
						<div class="item mb-2" mathjax-bind="getExplaination(question)"></div>

						<div class="item">
							<div class="btn btn-danger" data-toggle="modal" data-target="#report{{question.id}}">
								Báo lỗi
							</div>

							<div class="modal fade" id="report{{question.id}}" tabindex="-1" role="dialog"
								aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button style="right: 15px;" type="button" class="close absolute"
												data-dismiss="modal" aria-label="Close"><span
													aria-hidden="true">×</span></button>

											<h4 class="modal-title" id="myModalLabel{{question.id}}">Báo lỗi</h4>
										</div>
										<div class="modal-body">
											<div class="w100p">
												<label for="contentError{{question.id}}">Nội dung:</label>
												<textarea style="height: 150px !important;"
													id="contentError{{question.id}}" name="contentError"
													class="form-control" ng-model="report.content"></textarea>
											</div>

										</div>
										<div class="modal-footer">

											<button ng-click="reportError(question);" type="button"
												class="btn btn-primary">Báo lỗi</button>
										</div>
									</div>
								</div>
							</div>

						</div>
						<!--end report-->

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
				Hoàn thành
			</button>
			<button id="view-result" class="btn btt-practice btn-success" data-toggle="modal" data-target="#resultModal" name="view-result"  ng-show="!remaining.running"><span class="fa fa-list-alt"></span>
				Xem kết quả
			</button>
			<button id="show-answers" class="btn btt-practice btn-danger " name="show-answers" ng-click="showAnswers();" ng-show="!remaining.running" ng-disabled="showAnswer"><span class="fa fa-check"></span>
			Xem đáp án
			</button>
		</div>
	</div>

</div>