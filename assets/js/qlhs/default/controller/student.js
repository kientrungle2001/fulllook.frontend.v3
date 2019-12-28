qlhsApp.controller('student_controller', ['$scope', 
  'get_teachers', 
  'get_classes',
  'get_subjects',
  'get_payment_periods',
  'class_get_schedules',
  'student_get_list',
  'student_get_advices',
  'student_get_class_students',
  'student_get_fees',
  'student_get_schedules', 
  'student_get_test_schedules', 
  'student_get_usings',
  'student_crud',
  'crud_class_students',
  'crud_student_advices',
  'crud_fees',
  'utils_pagination', function($scope, 
    get_teachers,
    get_classes,
    get_subjects,
    get_payment_periods,
    class_get_schedules,
    student_get_list,
    student_get_advices,
    student_get_class_students,
    student_get_fees,
    student_get_schedules,
    student_get_test_schedules,
    student_get_usings,
    student_crud,
    crud_class_students,
    crud_student_advices,
    crud_fees,
    utils_pagination) {
  $scope.get_list = function() {
    student_get_list($scope);
  };

  // Phân trang
  utils_pagination($scope);

  $scope.selected_tab = 'info';
  $scope.selected_row = null;
  $scope.select_row = function(row) {
    $scope.selected_row = row;
    $scope.fetch_data();
  };
  $scope.select_tab = function(tab) {
    $scope.selected_tab = tab;
    $scope.fetch_data();
  };
  $scope.fetch_data = function() {
    if($scope.selected_tab && $scope.selected_row) {
      if(typeof $scope['select_tab_' + $scope.selected_tab] !== 'undefined') {
        $scope['select_tab_' + $scope.selected_tab].call($scope);
      }
    }
  };
  // 
  $scope.select_tab_info = function() {
    // console.log('show_info');
  };

  // 
  $scope.select_tab_class_student = function() {
    // Do Nothing
    $scope.get_class_students();
  };

  //
  $scope.select_tab_class_student_list = function() {
    $scope.get_class_students();
  };
  $scope.get_class_students = function() {
    student_get_class_students($scope);
  };

  // 
  $scope.select_tab_advice = function() {
    $scope.get_advices();
  };
  $scope.get_advices = function() {
    student_get_advices($scope);
  };

  //
  $scope.select_tab_history = function() {
    $scope.get_test_schedules();
  }

  $scope.get_test_schedules = function() {
    student_get_test_schedules($scope);
  }

  // 
  $scope.select_tab_fee = function() {
    $scope.get_student_fees();
    $scope.get_class_students();
    $scope.a_fee = $scope.a_fee || {};
    $scope.a_fee.name = $scope.selected_row.name;
    $scope.a_fee.phone = $scope.selected_row.phone;
    $scope.a_fee.email = $scope.selected_row.email;
    $scope.a_fee.address = $scope.selected_row.address;
  };
  $scope.get_student_fees = function() {
    student_get_fees($scope);
  };

  // 
  $scope.select_tab_timesheet = function() {
    $scope.get_class_schedules();
  };

  $scope.get_class_schedules = function() {
    $scope.get_class_students();
    setTimeout(function() {
      class_get_schedules($scope, $scope.get_class_ids($scope.class_students));
    }, 1000);
  };

  $scope.get_class_ids = function(class_students) {
    if(!class_students) {
      return [];
    }
    var classIds = [];
    class_students.forEach(function(class_student) {
      classIds.push(class_student.classId);
    });
    return classIds;
  }

  // 
  $scope.select_tab_using = function() {
    $scope.get_usings();
  };

  $scope.get_usings = function() {
    student_get_usings($scope);
  };

  $scope.is_selected_row = function(row) {
    if($scope.selected_row)
      return $scope.selected_row.id == row.id;
    return false;
  }
  $scope.detail_rows = {};
  $scope.order_rows = {};
  $scope.toggle_detail_row = function(row) {
    $scope.detail_rows[row.id] = !$scope.detail_rows[row.id];
    if($scope.detail_rows[row.id]) {
      $scope.get_student_fees();
      setTimeout(function() {
        $scope.order_rows[row.id] = angular.copy($scope.danh_sach_hoc_phi);
        $scope.$apply();
      }, 200);
      
    }
  };
  $scope.is_detail_visible = function(row) {
    return !!$scope.detail_rows[row.id];
  };
  $scope.open_sign_row = function(row) {
    return $scope.is_detail_visible(row) ? '-' : '+';
  };

  student_crud($scope);

  crud_class_students($scope);

  crud_student_advices($scope);

  crud_fees($scope);

  $scope.get_list();
  get_teachers($scope);
  get_classes($scope);
  get_subjects($scope);
  get_payment_periods($scope);
}]);