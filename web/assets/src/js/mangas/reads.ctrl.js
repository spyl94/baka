'use strict';

angular.module('baka')
    .controller('MangasReadCtrl', function ($scope, $routeParams, Mangas) {
    $scope.manga = Mangas.get({id : $routeParams.id});
});
