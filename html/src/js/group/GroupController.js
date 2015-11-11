module.exports = ['$scope','$http','$state','AuthFactory',function($scope,$http,$state,AuthFactory) {
  if(AuthFactory.isAuthorized()){
    $http.get('/group/getNews')
      .then(function(data) {
      
        console.log(data);
      })
  }else{
    $state.go('login');
  }
}];
