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
      $scope.selectedStudyDate = null;
      $scope.get_students();
      $scope.get_class_schedules();
      $scope.get_student_schedules();
      $scope.get_all_student_schedules();
    }

    $scope.select_item = function(name, value) {
      $scope[name] = value;
    };

    $scope.selectStudyDate = function(studyDate) {
      $scope.selectedStudyDate = studyDate;
      $scope.get_student_schedules();
      $scope.get_all_student_schedules();
    }

    $scope.has_study_date = function(studyDate) {
      if($scope.all_student_schedules) {
        var l = $scope.all_student_schedules.length;
        for(var i = 0; i < l; i++) {
          if($scope.all_student_schedules[i].studyDate === studyDate) {
            return true;
          }
        }
      }
      return false;
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
            classId: $scope.classId,
            studyDate: $scope.selectedStudyDate
          }
        },
        success: function(resp) {
          $scope.student_schedules = resp.rows;
          $scope.$apply();
        }
      });
    };

    $scope.get_all_student_schedules = function() {
      proxy_get({
        url: QA.student_schedule.url + '/items/student_schedule',
        type: AJC.get, dataType: 'json',
        data: {
          sort: 'studyDate desc',
          pageNum: 0,
          pageSize: 1000,
          fields: 'studyDate',
          where: {
            classId: $scope.classId
          }
        },
        success: function(resp) {
          $scope.all_student_schedules = resp.rows;
          $scope.$apply();
        }
      });
    };

    $scope.remove_student_schedule = function (student_schedule) {
      if(confirm('Bạn có muốn xóa điểm danh ' + student_schedule.studentName + ' ' + student_schedule.studyDate)) {
        alert('Remove');
      }
    };

    $scope.muster_student = function(studentId, status) {
      if($scope.selectedStudyDate) {
        alert(studentId);
        alert($scope.selectedStudyDate);
        alert(status);
        // replace existed (update )
      }
    };
  }
]);
