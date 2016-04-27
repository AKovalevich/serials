(function (angular, global) {
  'use strict';

  angular
    .module('CinemaPortal')
    .config(['$routeProvider',
      function($routeProvider) {
        $routeProvider
          .when('/', {
            templateUrl: 'assets/partials/landing-page.html',
            controller: 'LandingPageController',
            controllerAs: 'LPCtrl'
          })
          .when('/login', {
            templateUrl: 'assets/partials/login-page.html',
            controller: 'LoginPageController',
            controllerAs: 'LoginCtrl'
          })
          .when('/browse', {
            templateUrl: 'assets/partials/browse.html'
          })
          .when('/watch/:videoId', {
            templateUrl: 'assets/partials/watch-page.html',
            controller: 'WatchPageController',
            controllerAs: 'WPCtrl'
          })
          .otherwise({
            redirectTo: '/browse'
          });
      }]);
})(angular, window);