var angular = require('angular');
require('angular-animate');
require('angular-aria');
routes = require('./routes');   
//load angular and modules    

angular.module('app', [require('angular-material'),require('angular-ui-router')])
  .config(routes);    