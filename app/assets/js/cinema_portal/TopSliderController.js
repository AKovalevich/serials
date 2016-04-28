(function (angular, global) {
  'use strict';

  angular.module('CinemaPortal')
    .controller('TopSliderController', ['$scope', '$log', function ($scope, $log) {
      var ctr = this;

      ctr.slides = [
        {'src': 'http://placehold.it/320x200'},
        {'src': 'http://placehold.it/320x200'},
        {'src': 'http://placehold.it/320x200'},
        {'src': 'http://placehold.it/320x200'},
        {'src': 'http://placehold.it/320x200'},
        {'src': 'http://placehold.it/320x200'},
        {'src': 'http://placehold.it/320x200'}
      ];

      ctr.options = {
        sourceProp: 'src',
        visible: 5,
        perspective: 35,
        startSlide: 3,
        border: 0,
        dir: 'rtl',
        width: 400,
        height: 220,
        space: 200,
        autoRotationSpeed: 5000
      };

      ctr.selectedClick = selectedClick;
      ctr.slideChanged = slideChanged;
      ctr.beforeChange = beforeChange;
      ctr.lastSlide = lastSlide;

      function lastSlide(index) {
      }

      function beforeChange(index) {
      }

      function selectedClick(index) {
      }

      function slideChanged(index) {
      }
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