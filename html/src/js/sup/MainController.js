module.exports = function($scope,$mdSidenav) {
  this.toggleSlider = toggleSlider;
  this.closeSlider = closeSlider; 
  
  
  function toggleSlider(navID) {
    $mdSidenav(navID).toggle();
  }
  
  function closeSlider(navID) {
    $mdSidenav(navID).close();
  }
};



