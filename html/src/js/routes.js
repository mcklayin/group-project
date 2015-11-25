module.exports = ['$stateProvider', '$urlRouterProvider',
  function($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.otherwise("/");
    //
    // Now set up the states
    $stateProvider
    .state('index', {
      url: "/",
      templateUrl: "views/index.tpl.html"
    })
    .state('login', {
      url: "/login",
      templateUrl: "views/auth/login.tpl.html",
      controller: require('./auth/loginController')
    }) 
    .state('register', {
      url: '/register',
      templateUrl: "views/auth/register.tpl.html",
      controller: require('./auth/RegisterController'),
      controllerAs: 'register'
    })
    .state('reset', {
        url: '/reset',
        templateUrl: "views/auth/reset.tpl.html"
    })
    .state('contacts', {
      url: '/contacts',
      templateUrl: "views/contacts.tpl.html" 
    })
    .state('group', {
      url: '/group',
      templateUrl: "views/group/group.tpl.html",
      controller: require('./group/GroupController'),
      controllerAs: 'group'
    })
    .state('group.news', {
      url: '/news',
      templateUrl: "views/group/group-news.tpl.html"
    })
    .state('group.newsPage', {
      url: '/news-page?id',
      templateUrl: "views/group/group-news-page.tpl.html",
      controller: require('./group/GroupNewsPageCtrl')
    })
    .state('group.files', {
      url: '/files',
      templateUrl: "views/group/group-files.tpl.html"
    })
    .state('group.users', {
      url: '/users',
      templateUrl: "views/group/group-users.tpl.html"
    })
    .state('logout', {
      url: '/logout',
      controller: require('./auth/logoutController')
    })
    .state('cabinet', {
      url: '/cabinet'
    })
}];