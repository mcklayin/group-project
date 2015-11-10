module.exports = ['$scope','$http',function($scope,$http) {
  console.log('logon login !@');
  //console.log($scope.user);
  console.log($scope);
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
          console.log(data);
          console.log('success');
        },function(data) {
          console.log(data);
          console.log('fail');
      });
    }
  }   
}];



