(function (angular, global) {
  'use strict';

  angular.module('grid')
    .directive('gridFocusItem', function () {
      return {
        link: function (scope, element, attrs) {
          angular.element(element).hover(
            function() {
              angular.element(this)
                .closest('.main-content')
                .find('.grid-carousel-image img')
                .addClass('img-blocked');
              angular.element(this)
                .find('img')
                .addClass('img-show');
            }, function() {
              angular.element(this)
                .closest('.main-content')
                .find('.grid-carousel-image img')
                .removeClass('img-blocked');
              angular.element(this)
                .find('img')
                .removeClass('img-show');
            }
          );
        }
      };
    })
    // .directive('gridItem', function () {
    //   return {
    //     restrict: 'E',
    //     scope: {
    //       itemInfo: '=info'
    //     },
    //     templateUrl: 'assets/templates/grid.grid-item.html'
    //   };
    // })
    .directive('gridItemInfo', function () {
      return {
        restrict: 'E',
        scope: {
          itemInfo: '=blockInfo'
        },
        templateUrl: 'assets/templates/grid.grid-item-info.html'
      };
    });
})(angular, window);
