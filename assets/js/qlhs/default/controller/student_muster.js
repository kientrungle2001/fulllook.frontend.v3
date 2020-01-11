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
  }
]);
