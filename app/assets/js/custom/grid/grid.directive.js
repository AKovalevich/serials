(function (angular, global) {
  'use strict';

  angular.module('grid')
    .directive('gridFocusItem', function () {
      return {
        link: function (scope, element, attrs) {
          $( ".grid-carousel-image" ).hover(
            function() {
              $(this).closest('.main-content').find('.grid-carousel-image img').addClass('img-blocked');
              $(this).find('img').addClass('img-show');
            }, function() {
              $(this).closest('.main-content').find('.grid-carousel-image img').removeClass('img-blocked');
              $(this).find('img').removeClass('img-show');
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
