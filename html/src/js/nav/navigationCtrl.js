module.exports = function(AuthFactory,$scope) {
  var that = this;
  this.links= [];
  
  $scope.$watch(function(){
    return AuthFactory.isAuthorized();
  }, function (newValue) {
    console.log(newValue);
    that.links = makeLinks(newValue);
  });
  
  function makeLinks(isLoged) {
    console.log('draw menu'+isLoged);
    if(isLoged){
      return [
        {
          title: 'Група',
          link: 'group'
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
  that.links = makeLinks(AuthFactory.isAuthorized());
};
