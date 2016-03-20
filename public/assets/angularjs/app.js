/**
 * Created by amit on 3/20/16.
 */

//var commentApp = angular.module('commentApp', ['mainCtrl', 'jobapplicationservice']);
var jobApp = angular.module('jobApp', ['mainCtrl', 'jobapplicationservice'],function($interpolateProvider){
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});