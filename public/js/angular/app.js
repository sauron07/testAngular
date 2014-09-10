'use strict';

/* App Module */

var zendApplication = angular.module('zendApplication', [
    'ngRoute',
    'ngResource',
//    'services',
    'filters',
    'controllers'
]);

zendApplication.config(function($routeProvider){
    $routeProvider.when('/login', {
        templateUrl: 'templates/login.phtml',
        controller: 'loginController'
    });
    $routeProvider.when('/crud', {
        templateUrl: 'templates/crud.phtml',
        controller: 'indexController'
    });
    $routeProvider.otherwise({redirectTo:'/crud'});
});