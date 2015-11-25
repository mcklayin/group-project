module.exports = ['$scope','$state','AuthFactory','GroupFactory',function($scope,$state,AuthFactory,GroupFactory) {
  if(AuthFactory.isAuthorized()){
    
    GroupFactory.getUsers().then(function(result) {
      $scope.users = result;
      //console.log($scope.users);
    });
      
    GroupFactory.getNews().then(function(result) {
      $scope.news = result;
      //console.log($scope.news);
    });

    GroupFactory.getFiles().then(function(result) {
      $scope.files = result;
      console.log($scope.files);
    });

    GroupFactory.getGroup().then(function(result) {
      $scope.files = result;
      console.log($scope.group);
    });
    
    this.subLinks = [
      {
        title: 'Новини',
        link: 'group.news'
      }, {
        title: 'Користувачі',
        link: 'group.users'
      }, {
        title: 'Файли',
        link: 'group.files'
      }
    ];
  }else{
    $state.go('login');
  }
}];
