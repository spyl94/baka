'use strict';

angular.module('baka')
    .controller('MangasReadCtrl', function ($scope, $routeParams, Restangular) {

    Restangular.one('mangas', $routeParams.id).get().then(function(manga) {
      $scope.manga = manga;

      var content = $routeParams.content;

      if (content === undefined) {
        content = 'tome-01';
      }

        Restangular.one('mangas', $routeParams.id)
                   .one('contents', content)
                   .getList().then(function(pages) {
                      $scope.pages = pages;
        });
    });

});
