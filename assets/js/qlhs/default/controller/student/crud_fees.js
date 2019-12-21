qlhsApp.factory('crud_fees', function() {
  return function($scope) {
    $scope.fee_item_remove = function(index) {
      $scope.a_fee.items.splice(index, 1);
    };
  
    $scope.fee_delete = function(fee) {
      
    };
  
    $scope.fee_view = function(fee) {
  
    };
  };
});