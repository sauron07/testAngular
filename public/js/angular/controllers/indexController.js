'use strict';
var zendApplication = angular.module('zendApplication', []);

zendApplication.controller('indexController', ['$scope', '$http',
    function ($scope, $http) {
        $http.get('get-all-users').success(function (data) {
            $scope.users = data;
        });

        $scope.submit = function() {
            $http({
                url: '/create-user',
                method: 'POST',
                data: {
                    fullName: $scope.user.fullName
                },
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })
                .success(function(data, status) {
//                    alert('User "' + $scope.user.fullName + '"   added success')
                })
                .error(function(data, status) {
                });
        };

    }]);

