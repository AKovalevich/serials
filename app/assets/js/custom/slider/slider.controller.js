(function (angular, global) {
  'use strict';

  angular.module('slider')
    .controller('sliderController', ['$scope', '$log', function ($scope, $log) {
      var TSCtrl = this;

      TSCtrl.slides = [
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
        controller: 'sliderController',
        controllerAs: 'TSCtrl'
      }
    });
})(angular, window);
