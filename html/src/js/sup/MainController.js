module.exports = function($scope,$mdSidenav,$http) {
  this.toggleSlider = toggleSlider;
  this.closeSlider = closeSlider;
  $http.defaults.headers['X-CSRF-TOKEN'] = $scope.token;
  
  function toggleSlider(navID) {
    $mdSidenav(navID).toggle();
  }
  
  function closeSlider(navID) {
    $mdSidenav(navID).close();
  }
};



