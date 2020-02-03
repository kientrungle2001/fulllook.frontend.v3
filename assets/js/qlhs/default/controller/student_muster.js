qlhsApp.controller("student_muster_controller", [
	"$scope",
	"get_teachers",
	"get_classes",
  "get_subjects",
	function(
		$scope,
		get_teachers,
		get_classes,
    get_subjects	
  ) {
    get_classes($scope);
    get_subjects($scope);
    get_teachers($scope);
    $scope.select_class = function() {
      $scope.get_students();
      $scope.get_class_schedules();
      $scope.studyDate = null;
      $scope.get_student_schedules();
    }

    $scope.get_students = function() {
      proxy_get({
        url: QA.student.url + '/items/student',
        type: AJC.get, dataType: 'json',
        data: {
          sort: 'id desc',
          pageNum: 0,
          pageSize: 1000,
          where: {
            currentClassIds: $scope.classId
          }
        },
        success: function(resp) {
          $scope.students = resp.rows;
          $scope.$apply();
        }
      });
    };

    $scope.get_class_schedules = function() {
      proxy_get({
        url: QA.schedule.url + '/items/schedule',
        type: AJC.get, dataType: 'json',
        data: {
          sort: 'studyDate desc',
          pageNum: 0,
          pageSize: 1000,
          where: {
            classId: $scope.classId
          }
        },
        success: function(resp) {
          $scope.class_schedules = resp.rows;
          $scope.$apply();
        }
      });
    };

    $scope.get_student_schedules = function() {
      proxy_get({
        url: QA.student_schedule.url + '/items/student_schedule',
        type: AJC.get, dataType: 'json',
        data: {
          sort: 'studyDate desc',
          pageNum: 0,
          pageSize: 1000,
          where: {
            classId: $scope.classId
          }
        },
        success: function(resp) {
          $scope.student_schedules = resp.rows;
          $scope.$apply();
        }
      });
    };
  }
]);
