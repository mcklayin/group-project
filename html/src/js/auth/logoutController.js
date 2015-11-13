module.exports = ['AuthFactory','$http','$state', function(AuthFactory,$http,$state) {
  $http.get('/auth/logout')
    .then(function(){
      AuthFactory.setAuthorize(false);  
      $state.go('login');
    });
}];
