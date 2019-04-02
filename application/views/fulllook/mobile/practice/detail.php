<?php $controller->js('controller/practice_detail.js');?>
<div ng-controller="practiceDetailController">
<div class="full practice pb-5">
	<div class="container mt-4 mb-3">
		<div class="row redirect">
			&nbsp; &nbsp;
			<a href="/#practice">
				{{translate('Practice')}}
			</a>

			&nbsp; &nbsp; &gt; &nbsp; &nbsp;
			<a href="/detail.php?subject_id={{subject.id}}">{{translate(subject, 'category.name')}}</a>

		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-3">

			<div class="bg-success clearfix mb-3">
				
				<button type="button" class="navbar-toggle collapsed heading" data-toggle="collapse" data-target="#sidebar"
					aria-expanded="false">
					Chọn chuyên đề <i class="fa fa-bars text-danger" aria-hidden="true"></i>
				</button>
			</div>
			<div id="sidebar" class="navbar-collapse collapse">
				<div class="main-shadow full">
					<ul class="nav nav-pills" id="pills-tab" role="tablist" style="background: #ddd;">
						<li class="nav-item w-33 <?php if(!isset($is_vocabulary)): ?>active<?php endif ?>" role="presentation">
							<a style="border-radius: 5px 0px 0px 0px;" class="nav-link title-pr <?php if(!isset($is_vocabulary)): ?>active<?php endif ?>"
								id="pills-practice-tab" data-toggle="pill" href="#pills-practice" role="tab"
								aria-controls="pills-practice" aria-selected="true">{{translate('Practice')}}</a>
						</li>
						<li class="nav-item w-33 <?php if(isset($is_vocabulary)): ?>active<?php endif ?>" role="presentation">
							<a style="border-radius: 0px 5px 0px 0px;" class="nav-link title-pr <?php if(isset($is_vocabulary)): ?>active<?php endif ?>" id="pills-vocabulary-tab"
								data-toggle="pill" href="#pills-vocabulary" role="tab" aria-controls="pills-vocabulary"
								aria-selected="false">{{translate('Vocabulary')}}</a>
						</li>

					</ul>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade <?php if(!isset($is_vocabulary)): ?>in active<?php endif ?>" id="pills-practice" role="tabpanel"
							aria-labelledby="pills-practice-tab">
							<ul class="list-group menu-practice">
								<li class="list-group-item list-group-topic-item"
									ng-repeat="topic in topics | orderBy: 'ordering'" style="padding-bottom: 0"
									ng-class="{'active': sub_topic_id == topic.id, 'no-top-bottom-padding': topic.displayAtSite==2}">
									<div ng-hide="topic.displayAtSite==2">
										<a href="/practice/topic?subject_id={{subject.id}}&topic_id={{topic.id}}&sub_topic_id={{topic.id}}" style="position:relative;"
											ng-click="selectTopic(topic, topic)">{{translate(topic, 'category.name')}}</a>
										<i class="float-right fa fa-caret-down" aria-hidden="true"
											ng-show="topic.children.length > 0"
											style="position: absolute; top: 15px; right: 5px;"></i>
									</div>

									<div ng-show="subject.level==4">
										<ul class="list-group lv2" style="margin-left: -20px;margin-right: -20px;"
											ng-repeat="subTopic in topic.children">
											<li class="list-group-item" ng-repeat="subTopic2 in subTopic.children"
												ng-class="{'active sub-active text-white': sub_topic_id==subTopic2.id}">
												<a ng-class="{'text-white': sub_topic_id==subTopic2.id}"
												href="/practice/topic?subject_id={{subject.id}}&topic_id={{topic.id}}&sub_topic_id={{subTopic2.id}}" ng-click="selectTopic(subTopic2, topic)">{{translate(subTopic2, 'category.name')}}</a>
											</li>
										</ul>
									</div>
									<div ng-show="subject.level==3">
										<ul class="list-group lv2" style="margin-left: -20px;margin-right: -20px;">
											<li class="list-group-item"
												ng-class="{'active sub-active text-white': sub_topic_id==subTopic.id}"
												ng-repeat="subTopic in topic.children | orderBy: 'ordering'">
												<a ng-class="{'text-white': sub_topic_id==subTopic.id}"
												href="/practice/topic?subject_id={{subject.id}}&topic_id={{topic.id}}&sub_topic_id={{subTopic.id}}" ng-click="selectTopic(subTopic, topic)">{{translate(subTopic, 'category.name')}}</a>
											</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
						<div class="tab-pane fade <?php if(isset($is_vocabulary)): ?>in active<?php endif ?>" id="pills-vocabulary" role="tabpanel"
							aria-labelledby="pills-vocabulary-tab">
							<ul class="list-group vocabulary">
								<li class="list-group-item" ng-repeat="vocabulary in vocabularies"
									ng-class="{'active sub-active': vocabulary_id==vocabulary.id}">
									<a ng-class="{'text-white': vocabulary_id==vocabulary.id}"
									href="/practice/vocabulary?subject_id={{subject.id}}&vocabulary_id={{vocabulary.id}}"
										ng-click="selectVocabulary(vocabulary)">{{vocabulary.tdn_title || vocabulary.title}}</a></li>
							</ul>
						</div>

					</div>
				</div>
			</div>
			</div>
			<div class="col-xs-12 col-md-9">
				<div id="content" class="main-shadow full" ng-show="checkIsLogedIn()">
					<!-- Đã login -->
					<?php
					if(isset($child_view)) {
						$controller->view($child_view, $data);
					} else { ?>
						<h1 class="text-center mt-5">Chọn chuyên đề để bắt đầu làm</h1>
					<?php }
					?>
					<img class="img-fluid full" src="http://tdn.nextnobels.com/assets/images/bg-huongdan.png" />
				</div>

				<div class="main-shadow full" ng-hide="checkIsLogedIn()">
					<h2 class="text-center guide">Bạn phải <a href="#" onclick="return false" data-toggle="modal"
							data-target="#loginRegisterModal">đăng nhập</a> mới có thể học bài</h2>
					<img class="img-fluid full" src="http://tdn.nextnobels.com/assets/images/bg-huongdan.png" />
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<style>
.list-group-topic-item {background-color: #fff !important;}
.list-group-topic-item.active {background-color: #fbd65b !important;}
.list-group-item.sub-active {background-color: #ffe693 !important;}
.list-group-item.sub-active > a {color: #333 !important;}

.adjust-table table {
	width: 100%;
	border-collapse: collapsed;
}
.adjust-table table td, .adjust-table table th {
	vertical-align: top;
	border: 1px solid grey;
}
.adjust-table table img {
	width: 100%;
	display: flex;
	height: auto;
}
.text-white {
	color: white !important;
}
.no-top-bottom-padding {
	padding-top: 0;
	padding-bottom: 0;
}
.ptnn-title img {
	max-width: 100%;
}
</style>

<script>
var question_audios = {};
var current_sound = null;
var current_sound_url = null;
function read_question(elem, url) {
	if(current_sound) {
		current_sound.pause();
		current_sound.currentTime = 0;
		current_sound.onended();
	}
	if(current_sound_url == url) {
		current_sound_url = null;
		return ;
	} else {
		current_sound_url = url;
	}
	jQuery(elem).removeClass('fa-volume-up').addClass('fa-volume-off');
	if(1 || typeof question_audios[url] == 'undefined') {
		sound = new Audio(url);
		sound.loop = false;	
		question_audios[url] = sound;
		sound.onended = function() {
			jQuery(elem).removeClass('fa-volume-off').addClass('fa-volume-up');
		};
	}
	current_sound = question_audios[url];
	fetch(url)
    .then(function() {
      question_audios[url].play();
    });
	
}
</script>
