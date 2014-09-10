'use strict';
var controllers = angular.module('controllers', []);

controllers.controller('loginController', ['$scope', function($scope){
    $scope.credentials = {email: '', password: '', remember: ''};

    $scope.login = function (){
        console.table($scope.credentials);
    }
}]);

controllers.controller('indexController', ['$scope', '$http',
    function ($scope, $http) {
        $scope.show = false;
        $http.get('get-all-users').success(function (data) {
            $scope.users = data;
        });

        $scope.create = function() {
            $http({
                url: '/create-user',
                method: 'POST',
                data: {
                    user: $scope.user
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
                    fullName: newUser.fullName ? newUser.fullName : user.fullName,
                    iq: newUser.iq ? newUser.iq : user.iq,
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

