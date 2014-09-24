'use strict';

angular.module('baka')
    .factory('AuthenticationService', function ($rootScope, $http, $window, Restangular) {
        return {
            login: function (credentials) {
                $http
                    .post('/api/login_check', credentials, { ignoreAuthModule: true })
                    .success(function (data) {
                        $window.sessionStorage.token = data.token;
                        Restangular.setDefaultHeaders({Authorization:'Bearer ' + data.token});
                        $rootScope.$broadcast('event:auth-login-complete');
                    })
                    .error(function (data, status) {
                        $rootScope.$broadcast('event:auth-login-failed', status);
                    });
            },
            logout: function () {
                delete $window.sessionStorage.token;
                Restangular.setDefaultHeaders({});
                $rootScope.$broadcast('event:auth-logout-complete');
            }
        };
});

