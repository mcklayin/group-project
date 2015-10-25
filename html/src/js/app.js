var angular = require('angular');
require('angular-animate');
require('angular-aria');
var supRoutes = require('./sup/routes');
var mainRoutes = require('./main/routes'); 
//load angular and modules    

angular.module('app-sup', [require('angular-material'),require('angular-ui-router')])
  .config(supRoutes);

angular.module('app-main', [require('angular-material'),require('angular-ui-router')])
  .config(mainRoutes);    