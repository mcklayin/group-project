module.exports = ['$scope','$state','AuthFactory','GroupFactory',function($scope,$state,AuthFactory,GroupFactory) {
  if(AuthFactory.isAuthorized()){
    
   //this.users = GroupFactory.getUsers();
   GroupFactory.getUsers().then(function(result) {
     $scope.users = result;
   });
   console.log($scope.users);
    //this.users = [
    //  {
    //    name: 'kitty',
    //    age: 20 
    //  },{
    //    name: 'ron',
    //    age: 15
    //  }
    //];
  }else{
    $state.go('login');
  }
}];
