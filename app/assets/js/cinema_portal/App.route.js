(function (angular, global) {
  'use strict';

  angular
    .module('CinemaPortal')
    .config(['$routeProvider', '$locationProvider',
      function ($routeProvider, $locationProvider) {
        $routeProvider
          .when('/', {
            templateUrl: 'assets/partials/landing-page.html',
            controller: 'LandingPageController',
            controllerAs: 'LPCtrl',
            resolve: {
              delay: function($q, $timeout) {
                var delay = $q.defer();
                $timeout(delay.resolve, 1500);
                return delay.promise;
              }
            }
          })
          .when('/login', {
            templateUrl: 'assets/partials/login-page.html',
            controller: 'LoginPageController',
            controllerAs: 'LoginCtrl',
            resolve: {
              delay: function($q, $timeout) {
                var delay = $q.defer();
                $timeout(delay.resolve, 1500);
                return delay.promise;
              }
            }
          })
          .when('/browse', {
            templateUrl: 'assets/partials/browse.html',
            controller: 'GridController',
            controllerAs: 'GCtrl',
            resolve: {
              init: function(GridService) {
                return GridService.init()
                  .then(function(genres) {
                    return genres;
                  });
              }
            }
          })
          .when('/watch/:seasonId/:videoId', {
            templateUrl: 'assets/partials/watch-page.html',
            controller: 'WatchPageController',
            controllerAs: 'WPCtrl',
            resolve: {
              delay: function($q, $timeout) {
                var delay = $q.defer();
                $timeout(delay.resolve, 1500);
                return delay.promise;
              }
            }
          })
          .otherwise({
            redirectTo: '/login'
          });
        //$locationProvider.html5Mode({
        //  enabled: true,
        //  requireBase: false
        //});
      }])
})(angular, window);
