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