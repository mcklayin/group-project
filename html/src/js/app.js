var angular = require('angular');
require('angular-animate');
require('angular-aria');

//load angular and modules    

angular.module('app', [require('angular-material'),require('angular-ui-router'),require('angular-cookies')], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
  })
  .config(require('./routes'))
  .controller("MainCtrl", require('./MainController'))
  .factory('AuthFactory', require('./auth/AuthFactory'))
  .controller('navigationCtrl',require('./nav/navigationCtrl'))
  .directive('navigation',require('./nav/navDirective'));
     