'use strict';

angular.module('baka')
    .controller('LoginCtrl', function ($scope, $modalInstance, AuthenticationService, $route) {

        $scope.credentials = {
            username: 'user',
            password: 'password'
        };

        $scope.$on('event:auth-login-failed', function () {
            $scope.errorMessage = 'Bad credentials';
        });

        $scope.$on('event:auth-login-complete', function () {
            $modalInstance.close();
            $route.reload();
        });

        $scope.submit = function (credentials) {
            AuthenticationService.login(credentials);
        };

});
