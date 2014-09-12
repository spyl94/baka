'use strict';

angular.module('baka', [
  'ngRoute',
  'restangular',
  'cfp.hotkeys',
  'ng-preload-src',
  'duScroll'
])
  .config(function ($interpolateProvider, $routeProvider, RestangularProvider) {
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
        controller: 'MangasReadCtrl',
        hotkeys: [
          ['right', 'Next page', 'nextPage()'],
          ['left',  'Previous page', 'prevPage()']
        ]
      }).
      when('/mangas/:id/:content', {
        templateUrl: 'assets/src/partials/manga-read.html',
        controller: 'MangasReadCtrl',
        hotkeys: [
          ['right', 'Next page', 'nextPage()'],
          ['left',  'Previous page', 'prevPage()']
        ]
      }).
      when('/mangas/:id/:content/:page', {
        templateUrl: 'assets/src/partials/manga-read.html',
        controller: 'MangasReadCtrl',
        hotkeys: [
          ['right', 'Next page', 'nextPage()'],
          ['left',  'Previous page', 'prevPage()']
        ]
      }).
      otherwise({
        redirectTo: '/'
      });

});
