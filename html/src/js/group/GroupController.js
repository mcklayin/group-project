module.exports = ['$scope','$state','AuthFactory','GroupFactory','$q','$rootScope','$document', function($scope,$state,AuthFactory,GroupFactory,$q,$rootScope,$document) {
  if(AuthFactory.isAuthorized()){
    $scope.ready = false;
    $rootScope.$on('$stateChangeSuccess', function() {
      $document[0].body.scrollTop = $document[0].documentElement.scrollTop = 0;
    });
    
    $q.all([
      GroupFactory.getUsers().then(function(result) {
        $scope.users = result;
      }),
      GroupFactory.getNews().then(function(result) {
        $scope.news = result;
      })]   
    ).then(function() {
      $scope.news.forEach(function(news) {
        news.author = findUserNameById(news['user_id']);
      });
      $scope.ready = true;
    });

    GroupFactory.getFiles().then(function(result) {
      $scope.files = result;
    });
    
    GroupFactory.getGroup().then(function(result) {
      $scope.groupData = result;
    });
    
    function  findUserNameById(id) {
      var user;
      $scope.users.forEach(function(item) {
        if(item.id === id){
          user = item.fio;
          return false
        }
      });
      return user;
    }
    
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
