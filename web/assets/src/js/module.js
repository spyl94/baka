'use strict';

angular.module('baka', [
  'api',
  ])
  .config(['$interpolateProvider', function ($interpolateProvider) {
    $interpolateProvider.startSymbol('{[{');
    $interpolateProvider.endSymbol('}]}');
}]);
angular.module('api', ['ngResource']);
