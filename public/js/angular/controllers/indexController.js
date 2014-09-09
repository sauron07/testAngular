'use strict';
var zendApplication = angular.module('zendApplication', []);

zendApplication.controller('indexController', ['$scope', '$http',
    function ($scope, $http) {
        $http.get('get-all-users').success(function (data) {
            $scope.users = data;
        });

        $scope.create = function() {
            $http({
                url: '/create-user',
                method: 'POST',
                data: {
                    fullName: $scope.user.fullName
                },
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })
                .success(function() {
                    $http.get('get-all-users').success(function (data) {
                        $scope.users = data;
                    });
                })
        };

        $scope.remove = function(id){
            $http({
                url: '/remove-user',
                method: 'POST',
                data: {
                    id: id
                },
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(){
                $http.get('get-all-users').success(function (data) {
                    $scope.users = data;
                });
            });
        };

        $scope.save = function(newUser, user){
            $http({
                url: '/update-user',
                method: 'POST',
                data: {
                    id: user.id,
                    fullName: newUser.fullName ? newUser.fullName  : user.fullName,
                    blocked: newUser.blocked ? newUser.blocked : user.blocked
                },
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(){
                $http.get('get-all-users').success(function (data) {
                    $scope.users = data;
                });
            });
        }

    }]);

