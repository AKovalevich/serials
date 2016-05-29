(function (angular, global) {
  'use strict';

  angular
    .module('cinemaPortal')
    .config(function($stateProvider, $urlRouterProvider, $locationProvider) {
      // $locationProvider.html5Mode({
      //   enabled: false,
      //   requireBase: false
      // });

      $urlRouterProvider.otherwise("/sign-in");

      $stateProvider
        .state('sign_up', {
          url: '/sign-up',
          templateUrl: 'assets/templates/auth-page.html',
          controller: 'AuthFormController',
          controllerAs: 'AuthFormCtrl',
          resolve: {
            settings: function () {
              return {
                type: 'sing_up',
                title: 'SIGN UP'
              }
            },
            delay: function ($q, $timeout) {
              var delay = $q.defer();
              $timeout(delay.resolve, 300);
              return delay.promise;
            }
          }
        })
        .state('sign_in', {
          url: '/sign-in',
          templateUrl: 'assets/templates/auth-page.html',
          controller: 'AuthFormController',
          controllerAs: 'AuthFormCtrl',
          resolve: {
            settings: function () {
              return {
                type: 'sing_in',
                title: 'SIGN IN'
              }
            },
            delay: function ($q, $timeout) {
              var delay = $q.defer();
              $timeout(delay.resolve, 300);
              return delay.promise;
            }
          }
        })
        .state('browse', {
          url: '/browse',
          templateUrl: 'assets/templates/browse.html',
          controller: 'GridController',
          controllerAs: 'GridCtrl',
          resolve: {
            delay: function ($q, $timeout) {
              var delay = $q.defer();
              $timeout(delay.resolve, 300);
              return delay.promise;
            }
          }
        })
        .state('watch', {
          url: '/watch/{assetId:int}/{seasonId:int}/{videoId:int}',
          templateUrl: 'assets/templates/watch-page.html',
          controller: 'VideoStreamController',
          controllerAs: 'VSCtrl',
          resolve: {
            delay: function ($q, $timeout) {
              var delay = $q.defer();
              $timeout(delay.resolve, 500);
              return delay.promise;
            }
          }
        })
    })
})(angular, window);
