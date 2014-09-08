/**
 * Created by home on 9/8/14.
 */
'use strict';

/* Services */

var indexService = angular.module('indexService', ['ngResource']);

indexService.factory('User', ['$resource',
    function($resource){
        return $resource('get-all-users', {}, {
            query: {
                method:'GET',
                isArray:true
            }
        });
    }]);
