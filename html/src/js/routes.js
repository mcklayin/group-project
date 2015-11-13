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
      controller: require('./auth/RegisterController')
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
    .state('logout', {
      url: '/logout',
      controller: require('./auth/logoutController')
    })
    .state('cabinet', {
      url: '/cabinet'
    })
}];