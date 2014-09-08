'use strict';
var zendApplication = angular.module('zendApplication', []);

zendApplication.controller('indexController', function ($scope, $http) {
    $http.get('get-all-users').success(function(data){
        $scope.json = data;
        console.log(data);
    });

    $scope.testString = 'test string';
});