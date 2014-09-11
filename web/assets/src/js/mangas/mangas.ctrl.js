'use strict';

angular.module('baka')
    .controller('MangasCtrl', function ($scope, Restangular) {

    Restangular.all('mangas').getList().then(function(mangas) {
      $scope.mangas = mangas;
    });
});

