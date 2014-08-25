'use strict';

angular.module('baka', [
  'ngRoute',
  'api',
  ])
  .config(['$interpolateProvider', '$routeProvider', function ($interpolateProvider, $routeProvider) {
    $interpolateProvider.startSymbol('{[{');
    $interpolateProvider.endSymbol('}]}');

    $routeProvider.
      when('/', {
        templateUrl: 'assets/src/partials/manga-list.html',
        controller: 'MangasCtrl'
      }).
      when('/mangas/:id', {
        templateUrl: 'assets/src/partials/manga-read.html',
        controller: 'MangasCtrl'
      }).
      otherwise({
        redirectTo: '/'
      });

}]);
angular.module('api', ['ngResource']);
