'use strict';

var app = angular.module('baka', [
  'ngRoute',
  'restangular',
  'cfp.hotkeys',
  'ng-preload-src',
  'duScroll',
  'ui.bootstrap',
  'FBAngular'
]);

app.config(function ($interpolateProvider, $routeProvider, RestangularProvider) {
    $interpolateProvider.startSymbol('{[{');
    $interpolateProvider.endSymbol('}]}');

    RestangularProvider.setBaseUrl('/api');

    $routeProvider.
      when('/', {
        templateUrl: 'assets/src/partials/manga-list.html',
        controller: 'MangasCtrl'
      }).
      when('/mangas/:id', {
        templateUrl: 'assets/src/partials/manga-read.html',
        controller: 'MangasReadCtrl'
      }).
      when('/mangas/:id/:content', {
        templateUrl: 'assets/src/partials/manga-read.html',
        controller: 'MangasReadCtrl'
      }).
      when('/mangas/:id/:content/:page', {
        templateUrl: 'assets/src/partials/manga-read.html',
        controller: 'MangasReadCtrl'
      }).
      otherwise({
        redirectTo: '/'
      });

});

app.run(function(Restangular, $rootScope, $window) {

    if ($window.sessionStorage.token) {
        Restangular.setDefaultHeaders({Authorization:'Bearer '+ $window.sessionStorage.token});
    }

    Restangular.setErrorInterceptor(function(response) {
        if(response.status === 401) {
            $rootScope.$broadcast('event:auth-login-required');
            return false;
        }
        return true;
    });
});

