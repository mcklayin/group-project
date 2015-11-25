module.exports = ['$scope','$http','$state','AuthFactory','$mdToast','$document',function($scope,$http,$state,AuthFactory,$mdToast,$document) {
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
            $state.go('group.news');
          }else {
            console.log(data);
            AuthFactory.setAuthorize(false);
            $mdToast.show(
              $mdToast.simple({
                  parent: $document[0].querySelector('#main')
              })
                .content('Не вірно введені дані.')
                .position('top right')
                .hideDelay(3000)
            );
            //$scope.error
          }
        });
    }
  }  
}];



