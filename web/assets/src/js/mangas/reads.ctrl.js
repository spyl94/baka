'use strict';

angular.module('baka')
    .controller('MangasReadCtrl', function ($scope, $routeParams, Restangular) {

    Restangular.one('mangas', $routeParams.id).get().then(function(manga) {
      $scope.manga = manga;

      var content = $routeParams.content;
      var page =  parseInt($routeParams.page,10);

      if (content === undefined) {
        content = 'Tome 01';
      }
      if (isNaN(page)) {
        page = 0;
      }

      $scope.currentPage = page;
      $scope.currentContent = content;
      $scope.pages = [];

      Restangular
        .one('mangas', $routeParams.id)
        .one('contents', content)
        .getList().then(function(pages) {
          $scope.pages = pages;
      });

      $scope.prevPage = function() {
        if ($scope.currentPage > 0) {
          $scope.currentPage--;
        }
      };

      $scope.prevPageDisabled = function() {
        return $scope.currentPage === 0 ? 'disabled' : '';
      };

      $scope.nextPage = function() {
        if ($scope.currentPage < $scope.pages.length - 1) {
          $scope.currentPage++;
        }
      };

      $scope.nextPageDisabled = function() {
        return $scope.currentPage === $scope.pages.length - 1 ? 'disabled' : '';
      };

    });

});
