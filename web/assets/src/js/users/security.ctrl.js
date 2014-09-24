'use strict';

angular.module('baka')
    .controller('SecurityCtrl', function ($scope, $modal) {

    $scope.$on('event:auth-login-required', function () {

        $modal.open({
            templateUrl: 'assets/src/partials/login.html',
            controller:  'LoginCtrl',
            backdrop:    'static'
        });

    });

});
