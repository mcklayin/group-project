var angular = require('angular');
require('angular-animate');
require('angular-aria');

//load angular and modules    

angular.module('app.sup', [require('angular-material'),require('angular-ui-router')], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>'); 
  })
  .config(require('./sup/routes'))
  .controller("MainCtrl", require('./sup/MainController'));

angular.module('app.main', [require('angular-material'),require('angular-ui-router')])
  .config(require('./main/routes'));    