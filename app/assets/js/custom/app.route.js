(function (angular, global) {
  'use strict';

  angular
    .module('cinemaPortal')
    .config(['$routeProvider', '$locationProvider',
      function ($routeProvider, $locationProvider) {
        $routeProvider
          .when('/', {
            templateUrl: 'assets/partials/landing-page.html',
            controller: 'LandingPageController',
            controllerAs: 'LPCtrl',
            resolve: {
              delay: function ($q, $timeout) {
                var delay = $q.defer();
                $timeout(delay.resolve, 300);
                return delay.promise;
              }
            }
          })
          .when('/login', {
            templateUrl: 'assets/partials/login-page.html',
            controller: 'LoginController',
            controllerAs: 'LoginCtrl',
            resolve: {
              delay: function ($q, $timeout) {
                var delay = $q.defer();
                $timeout(delay.resolve, 300);
                return delay.promise;
              }
            }
          })
          .when('/browse', {
            templateUrl: 'assets/partials/browse.html',
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
          .when('/watch/:seasonId/:videoId', {
            templateUrl: 'assets/partials/watch-page.html',
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
          .otherwise({
            redirectTo: '/login'
          });
        // $locationProvider.html5Mode({
        //   enabled: false,
        //   requireBase: false
        // });
      }])
})(angular, window);
