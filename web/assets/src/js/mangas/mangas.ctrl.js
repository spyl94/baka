angular.module('baka')
    .controller('MangasCtrl', function ($scope, Mangas) {
    $scope.mangas = Mangas.query();
});
