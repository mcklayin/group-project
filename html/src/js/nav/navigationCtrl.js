module.exports = function(AuthFactory,$scope,$state,$rootScope) {
  var that = this;
  this.links= [];
  
  $scope.$watch(function(){
    return AuthFactory.isAuthorized();
  }, function (newValue) {
    that.links = makeLinks(newValue);
  });
  
  function makeLinks(isLoged) {
    if(isLoged){
      return [
        {
          title: 'Група',
          link: 'group.news'
        },{
          title: 'Кабінет',
          link: 'cabinet'
        },{
          title: 'Вийти',
          link: 'logout'
        }
      ];
    }else{
      return [
        {
          title: 'Контакти',
          link: 'contacts'
        },{
          title: 'Вхід',
          link: 'login'
        },{
          title: 'Реєстрація',
          link: 'register'
        }
      ];
    }
  }
  function getSubLinks() {
    if($state.includes('group')){
      return [
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
    } else{
      return [];
    }
  }

  $rootScope.$on('$stateChangeSuccess',function() {
    $scope.subLinks = getSubLinks();
  });
  
  that.links = makeLinks(AuthFactory.isAuthorized());
};
