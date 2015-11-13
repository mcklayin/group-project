module.exports = ['$scope','$http','$state','AuthFactory',function($scope,$http,$state,AuthFactory) {
  if(AuthFactory.isAuthorized()){
    $state.go('group');
  }
  
  $scope.submit = submit;
  var data = {};
  function submit() {
    console.log('hello');
    console.log(this.loginForm);
    if(this.loginForm.$valid){
      data.email = this.loginForm.email; 
      data.password = this.loginForm.password;
      console.log(data);
      console.log($scope.token);
      $http.post('/auth/loginAjax',data)
        .then(function(data) {  
          if(data.data.code === 'success'){
            AuthFactory.setAuthorize(true);
            $state.go('group');
          }else {
            AuthFactory.setAuthorize(false);
          }
      },function(data) {
        console.log(data);
      });
    }
  }  
}];



