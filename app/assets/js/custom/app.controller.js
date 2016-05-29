(function (angular, global) {
  'use strict';

  angular
    .module('cinemaPortal')
    .controller('MainController', ['$rootScope', '$scope', '$timeout', function ($rootScope, $scope, $timeout) {
      var MCtrl = this;
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

          $rootScope.$on('$stateChangeStart', function (event, currentRoute, previousRoute) {
            $timeout(function () {
              element.removeClass('ng-hide');
            });
          });

          $rootScope.$on('$stateChangeSuccess', function () {
            element.addClass('ng-hide');
          });
        }
      };
    });
})(angular, window);
