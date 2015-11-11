module.exports = function(AuthFactory) {
  this.links= {};
  if(AuthFactory.isAuthorized()){
    this.links = [
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
    this.links = [
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
  
};
