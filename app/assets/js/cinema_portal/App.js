(function (angular, global) {
  'use strict';

  angular
    .module('CinemaPortal', [
      'ngRoute',
      'ngAnimate',
      'ngSanitize',
      'angular-preload-image',
      'slick',
      'angulartics.google.analytics',
      'com.2fdevs.videogular',
      'com.2fdevs.videogular.plugins.controls',
      'com.2fdevs.videogular.plugins.overlayplay',
      'com.2fdevs.videogular.plugins.poster',
      'com.2fdevs.videogular.plugins.buffering',
      'com.2fdevs.videogular.plugins.analytics'
    ])
    .constant('apiConst', {
      host: 'http://188.120.255.201',
      port: '8080',
      version: '1.0'
    })
    .config(function ($interpolateProvider) {
      $interpolateProvider.startSymbol("{[").endSymbol("]}");
    })
    .factory('apiConfig', ['apiConst', function (apiConst) {
      return {
        baseUrl: [apiConst.host, apiConst.port].join(':') + '/api/' + apiConst.version + '/'
      }
    }])
    .controller('MainController', ['$rootScope', '$scope', '$timeout', function ($rootScope, $scope, $timeout) {
      var ctrl = this;

      //Application is launch
      $rootScope.started = false;

      // User is logged
      $rootScope.isLogged = false;

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
    }])
    .directive('showLoader', function ($rootScope, $timeout) {
      return {
        restrict: 'E',
        replace: true,
        template: '<section id="loader" ng-hide>' +
        '<div class="la-line-scale-pulse-out la-red la-3x">' +
        '<div></div>' +
        '<div></div>' +
        '<div></div>' +
        '<div></div>' +
        '<div></div>' +
        '</div></section>',
        link: function (scope, element) {

          $rootScope.$on('$routeChangeStart', function (event, currentRoute, previousRoute) {
            $timeout(function () {
              element.removeClass('ng-hide');
            });
          });

          $rootScope.$on('$routeChangeSuccess', function () {
            element.addClass('ng-hide');
          });
        }
      };
    });
})(angular, window);
