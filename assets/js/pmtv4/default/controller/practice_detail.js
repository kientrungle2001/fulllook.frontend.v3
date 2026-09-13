flApp.controller('practiceDetailController', ['$scope', function($scope) {
	
	$scope.subject_id = parseInt(subject_id);
	$scope.topic_id = parseInt(topic_id);
	$scope.sub_topic_id = parseInt(sub_topic_id);
	$scope.vocabulary_id = parseInt(vocabulary_id);
	
	$scope.subject = {};

	$scope.loadSubject = function () {
		var subject = cacheStorage.getItem('subject_' + $scope.subject_id);
		if(null !== subject) {
			$scope.subject = subject;
		} else {
			proxy_ajax({
				type: 'get',
				url: FL_API_URL + '/corecategories/' + subject_id,
				dataType: 'json',
				success: function (resp) {
					subject = resp;
					subjectId = resp.id;
					if (resp.id == 51) {
						subject.level = 3;
					}
					if (resp.id == 164) {
						subject.level = 3;
					}
					if (resp.id == 157) {
						subject.level = 3;
					}
					if (resp.id == 50) {
						subject.level = 3;
					}
					if (resp.id == 59) {
						subject.level = 3;
					}
					if (resp.id == 88) {
						subject.level = 1;
					}
					if (resp.id == 54) {
						subject.level = 3;
					}
					cacheStorage.setItem('subject_' + $scope.subject_id, subject);
					$scope.subject = subject;
					$scope.$apply();
				}
			});
		}
	};
	$scope.loadTopics = function () {
		var subject_topics = cacheStorage.getItem('subject_topics_' + $scope.subject_id);
		if(null !== subject_topics) {
			$scope.topics = subject_topics;
		} else {
			proxy_ajax({
				type: 'post',
				url: FL_API_URL + '/subject/getTopics',
				data: {
					subject_id: subject_id
				},
				dataType: 'json',
				success: function (resp) {
					subject_topics = buildBottomTree(resp);
					cacheStorage.setItem('subject_topics_' + $scope.subject_id, subject_topics);
					$scope.topics = subject_topics;
					$scope.$apply();
				}
			});
		}
	};

	$scope.loadVocabularies = function () {
		var subject_vocabularies = cacheStorage.getItem('subject_vocabularies_' + $scope.subject_id);
		if(null !== subject_vocabularies) {
			$scope.vocabularies = subject_vocabularies;
		} else {
			proxy_ajax({
				type: 'get',
				url: FL_API_URL + '/educationdocuments',
				data: {
					where:{
						categoryId: subject_id,
						type: 'vocabulary',
						status: 1,
						software: 1,
						classes: {like: '%,5,%'} 
					},
					select: 'id,en_title,title,tdn_title,trial,ordering',
					limit: 1000,
					sort: 'ordering asc'
				},
				dataType: 'json',
				success: function (resp) {
					subject_vocabularies = buildBottomTree(resp);
					cacheStorage.setItem('subject_vocabularies_' + $scope.subject_id, subject_vocabularies);
					$scope.vocabularies = subject_vocabularies;
					$scope.$apply();
				}
			});
		}
		
	};

	$scope.loadVocabulary = function() {
		if($scope.vocabulary_id) {
			var vocabulary = cacheStorage.getItem('vocabulary_' + $scope.vocabulary_id);
			if(null !== vocabulary) {
				$scope.vocabulary = vocabulary;
			} else {
				proxy_ajax({
					url: FL_API_URL + '/educationdocuments/' + $scope.vocabulary_id,
					type: 'get', dataType: 'json', success: function(vocabulary) {
						cacheStorage.setItem('vocabulary_' + $scope.vocabulary_id, vocabulary);
						$scope.vocabulary = vocabulary;
						$scope.$apply();
					}
				});
			}
			
		}
	};

	$scope.parseTranslate = function (str) {
		if (str) {
			str = str.replace(/\[start\](.*)\[end\]/g, '<button class="btn btn-primary" data-toggle="collapse" onclick="jQuery(this).next().collapse(\'toggle\')">Dịch</button><div class="collapse"><div class="card card-body">$1</div></div>');
			str = str.replace(/\[fix\](.*)\[endfix\]/g, "<span class=\"btn btn-default fa fa-volume-up\" onclick=\"read_question(this,'http://s1.nextnobels.com/3rdparty/Filemanager/source/audiovocabulary/'+'$1'.toLowerCase().replace(/ /g, '_')+'.mp3');\"></span>");
			str = str.replace(/\[audio\](.*)\[endaudio\]/g, function (rep) {
				var tam = (/\[audio\](.*)\[endaudio\]/gi).exec(rep);
				var $1 = tam[1];
				var $2 = $scope.strip_tags($1).trim();
				return $1 + "<span class=\"btn btn-default fa fa-volume-up\" onclick=\"read_question(this," + "'http://s1.nextnobels.com/3rdparty/Filemanager/source/audiovocabulary/" + $2.toLowerCase().replace(/ /g, '_') + ".mp3" + "'" + ")\"></span>";
			});
			return str;
		};
		return '';
	};

	$scope.strip_tags = function (str) {
		str = str.toString();
		return str.replace(/<\/?[^>]+>/gi, '');
	};

	$scope.loadSubject();
	$scope.loadTopics();
	$scope.loadVocabularies();
	$scope.loadVocabulary();

}]);