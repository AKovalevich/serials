(function (angular, global) {
  'use strict';

  angular.module('CinemaPortal')
    .controller('TopSliderController', ['$scope', '$log', function ($scope, $log) {
      var ctr = this;

      ctr.slides = [
        {'src': 'assets/images/photo2.jpg'},
        {'src': 'assets/images/photo3.jpg'},
        {'src': 'assets/images/photo4.jpg'},
        {'src': 'assets/images/photo5.jpg'},
        {'src': 'assets/images/photo6.jpg'},
        {'src': 'assets/images/photo7.jpg'},
        {'src': 'assets/images/photo8.jpg'}
      ];
    }])
    .directive('topSlider', function () {
      return {
        restrict: 'A',
        templateUrl: 'assets/partials/top-slider.html',
        controller: 'TopSliderController',
        controllerAs: 'TSCtrl'
      }
    });
})(angular, window);