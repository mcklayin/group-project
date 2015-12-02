var angular = require('angular');
require('angular-animate');
require('angular-aria');

//load angular and modules    

angular.module('app', 
  [
    require('angular-material'),
    require('angular-ui-router'),
    require('angular-cookies'),
    require('angular-sanitize')
    ], ['$interpolateProvider' , function($interpolateProvider) {
      $interpolateProvider.startSymbol('<%');
      $interpolateProvider.endSymbol('%>');
    }]
  ) 
  .config(require('./routes'))
  .factory('AuthFactory', require('./auth/AuthFactory'))
  .factory('GroupFactory', require('./group/GroupFactory'))
  .controller("MainCtrl", require('./MainController'))
  .controller('navigationCtrl',require('./nav/navigationCtrl'))
  .directive('navigation',require('./nav/navDirective'));
     