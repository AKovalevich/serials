(function (angular, global) {
  'use strict';

  angular
    .module('application')
    .config(['$routeProvider',
      function($routeProvider) {
        $routeProvider
          .when('/', {
            templateUrl: 'app/partials/landing-page.html',
            controller: 'LandingPageController',
            controllerAs: 'LPCtrl'
          })
          .when('/login', {
            templateUrl: 'app/partials/login-page.html',
            controller: 'LoginPageController',
            controllerAs: 'LoginCtrl'
          })
          .when('/browse', {
            templateUrl: 'app/partials/browse.html'
          })
          .when('/watch/:videoId', {
            templateUrl: 'app/partials/watch-page.html',
            controller: 'WatchPageController',
            controllerAs: 'WPCtrl'
          })
          .otherwise({
            redirectTo: '/browse'
          });
      }]);
})(angular, window);
