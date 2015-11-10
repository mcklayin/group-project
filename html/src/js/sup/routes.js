module.exports = ['$stateProvider', '$urlRouterProvider',
  function($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.otherwise("/");
    //
    // Now set up the states
    $stateProvider
    .state('index', {
      url: "/",
      templateUrl: "views/sup/index.tpl.html",
      controller: function() {
        console.log('index page');
      }
    })
    .state('login', {
      url: "/login",
      templateUrl: "views/sup/login.tpl.html",
      controller: require('./login/loginController')
    }) 
    .state('register', {
      url: '/register',
      templateUrl: "views/sup/register.tpl.html"     
    })
    .state('contacts', {
      url: '/contacts',
      templateUrl: "views/sup/contacts.tpl.html"
    })
    .state('reset', {
      url: '/reset',
      templateUrl: "views/sup/reset.tpl.html"
    })
   
}];