/**
 * Created by matveev on 9/9/14.
 */
'use strict';

angular.module('filters', []).filter('checkmark', function(){
    return function(input){
        return input ? '\u2713' : '\u2718';
    };
});