module.exports = ['$scope','$http','$state','AuthFactory',function($scope,$http,$state,AuthFactory) {
  if(AuthFactory.isAuthorized()){
    $state.go('group');
  }
  $scope.invalids = [];
  var data = {};
  $scope.submit = submit;
  
  
  $scope.onInput = function(input) {
    if($scope.invalids.hasOwnProperty(input.$name)){
      $scope.invalids[input.$name].forEach(function(i,index){
        $scope.registerForm[input.$name].$setValidity(index+'',true);
      });
      delete $scope.invalids[input.$name];
    }
  };
  
  function submit() {
    if(this.registerForm.$valid){
      var that = this;
      data.name = this.registerForm.name.$modelValue;
      data.fio = this.registerForm.fio.$modelValue;
      data.username = this.registerForm.username.$modelValue;
      data.email = this.registerForm.email.$modelValue;
      data.phone = this.registerForm.phone.$modelValue;
      data.password = this.registerForm.password.$modelValue;
      data.password_confirmation = this.registerForm.password_confirmation.$modelValue;
      $http.post('/auth/registerAjax',data)
        .then(function(data) {
          console.log(data);
          if(data.data.code === 'success'){
            AuthFactory.setAuthorize(true);
            $state.go('group.news');
          }else {
            AuthFactory.setAuthorize(false);
          }
        },function(data) {
          $scope.invalids = data.data;
          for(var prop in $scope.invalids){
            $scope.invalids[prop].forEach(function(i,index){
              that.registerForm[prop].$setValidity(index+'',false);
            });
          }
        });
    }
  }
}];



