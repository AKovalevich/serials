(function (angular, global) {
  'use strict';

  angular
    .module('CinemaPortal', [
      'ngRoute',
      'ngAnimate',
      'ngSanitize',
      'angular-carousel-3d',
      'angular-preload-image',
      'slick',
      'com.2fdevs.videogular',
      'com.2fdevs.videogular.plugins.controls',
      'com.2fdevs.videogular.plugins.overlayplay',
      'com.2fdevs.videogular.plugins.poster',
      "com.2fdevs.videogular.plugins.buffering"
    ])
    .constant('generalConf', {
      basePath: "http://api.serials.loc"
    })
    .config(function($interpolateProvider){
      $interpolateProvider.startSymbol("{[").endSymbol("]}");
    })
    .controller('MainController', ['$rootScope', '$scope', '$timeout', function ($rootScope, $scope, $timeout) {
      var ctrl = this;

      //Application is launch
      $rootScope.started = false;

      //Show loader
      $rootScope.loading = false;

      $rootScope.isLoading = function () {
        $timeout(function () {
          $rootScope.loading = true;
        });
      };

      $rootScope.isNotLoading = function () {
        $timeout(function () {
          $rootScope.loading = false;
        });
      };
    }]);
})(angular, window);
