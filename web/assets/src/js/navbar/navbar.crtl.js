'use strict';

angular.module('baka')
    .controller('NavbarCtrl', function ($scope, AuthenticationService) {

        $scope.logout = function () {
            AuthenticationService.logout();
        };

});
