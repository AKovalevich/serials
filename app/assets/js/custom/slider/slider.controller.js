(function (angular, global) {
  'use strict';

  angular.module('slider')
    .controller('sliderController', ['$scope', '$log', function ($scope, $log) {
      var TSCtrl = this;

      TSCtrl.slides = [
        {
          'src': 'assets/images/slide.jpg',
          'description': 'Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        },
        {
          'src': 'assets/images/slide.jpg',
          'description': 'Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        }
      ];
    }])
    .directive('topSlider', function () {
      return {
        restrict: 'A',
        templateUrl: 'assets/templates/top-slider.html',
        controller: 'sliderController',
        controllerAs: 'TSCtrl'
      }
    });
})(angular, window);
