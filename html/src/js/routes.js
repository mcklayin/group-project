module.exports = ['$stateProvider', '$urlRouterProvider',
  function($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.otherwise("/");
    //
    // Now set up the states
    $stateProvider.state('state1', {
      url: "/state1",
      templateUrl: "partials/state1.html"
    })
    .state('index', {
      url: "/",
      templateUrl: "views/index.tpl.html",
      controller: function() {
        console.log('index page');
      }
    })
    .state('login', {
      url: "/login",
      templateUrl: "views/login.tpl.html",
      controller: function() {
        console.log('login page');
      }
    })
    .state('register', {
      url: '/register',
      templateUrl: "views/register.tpl.html"    
    })
   
}];