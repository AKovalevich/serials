(function (angular, global) {
  'use strict';

  angular.module('CinemaPortal')
    .service('GridService', function () {
      var grid = this;
    })
    .controller('GridController', ['$scope', function ($scope) {
      var ctrl = this;

      ctrl.activeElement = null;
      ctrl.focusClass = null;
      ctrl.focusedElement = false;
      ctrl.borderedElement = null;
      ctrl.showMoreInfo = null;
      ctrl.firstAppear = null;
      ctrl.closeState = null;

      ctrl.responsive = [
        {
          breakpoint: 1920,
          settings: {
            slidesToShow: 7,
            slidesToScroll: 7,
            speed: "860",
            draggable: false,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 1368,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 5,
            speed: "860",
            draggable: false,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            speed: "860",
            draggable: false,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            speed: "860",
            draggable: false,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: "860",
            draggable: false,
            infinite: true,
            dots: false
          }
        }
      ];

      ctrl.icons = [
        {
          id: 'content1',
          preview: 'http://placehold.it/225x112',
          slideShow: [
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113'
          ],
          full: 'http://placehold.it/945x300',
          text: 'content1'
        },
        {
          id: 'content2',
          preview: 'http://placehold.it/225x112',
          slideShow: [
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113'
          ],
          full: 'http://placehold.it/945x300',
          text: 'content2'
        },
        {
          id: 'content3',
          preview: 'http://placehold.it/225x112',
          slideShow: [
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113'
          ],
          full: 'http://placehold.it/945x300',
          text: 'content3'
        },
        {
          id: 'content4',
          preview: 'http://placehold.it/225x112',
          slideShow: [
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113'
          ],
          full: 'http://placehold.it/945x300',
          text: 'content4'
        },
        {
          id: 'content5',
          preview: 'http://placehold.it/225x112',
          slideShow: [
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113'
          ],
          full: 'http://placehold.it/945x300',
          text: 'content5'
        },
        {
          id: 'content6',
          preview: 'http://placehold.it/225x112',
          slideShow: [
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113'
          ],
          full: 'http://placehold.it/945x300',
          text: 'content6'
        },
        {
          id: 'content7',
          preview: 'http://placehold.it/225x112',
          slideShow: [
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113'
          ],
          full: 'http://placehold.it/945x300',
          text: 'content7'
        },
        {
          id: 'content8',
          preview: 'http://placehold.it/225x112',
          slideShow: [
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113'
          ],
          full: 'http://placehold.it/945x300',
          text: 'content8'
        },
        {
          id: 'content9',
          preview: 'http://placehold.it/225x112',
          slideShow: [
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113'
          ],
          full: 'http://placehold.it/945x300',
          text: 'content9'
        },
        {
          id: 'content10',
          preview: 'http://placehold.it/225x112',
          slideShow: [
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113',
            'http://placehold.it/225x113'
          ],
          full: 'http://placehold.it/945x300',
          text: 'content10'
        }
      ];

      ctrl.setFocus = function (elementId) {
        if (ctrl.borderedElement && ctrl.showMoreInfo && elementId) {
          ctrl.borderedElement = elementId;
          ctrl.showMoreInfo = elementId;
        }
        else {
          ctrl.focusedElement = elementId;
        }
        if (!elementId) ctrl.firstAppear = null;
      };

      ctrl.isFocused = function (elementId) {
        return ctrl.focusedElement === elementId;
      };

      ctrl.isBordered = function (elementId) {
        return ctrl.borderedElement === elementId;
      };

      ctrl.getNeedClassElement = function (iconId) {
        var elementClass = ctrl.isFocused(iconId)
          ? 'opened'
          : 'closed';
        elementClass += ' ';

        elementClass += ctrl.isBordered(iconId)
          ? 'bordered'
          : 'non-bordered';

        return elementClass;
      };

      ctrl.getPanelClass = function (iconId) {
        var panelClass = ctrl.firstAppear === iconId
          ? 'first-appear'
          : 'fade-in-out';

        if (ctrl.isCloseState()) {
          panelClass = 'closing';
        }

        return panelClass;
      };

      ctrl.showPanel = function (iconId) {
        return ctrl.showMoreInfo === iconId;
      };

      ctrl.setActiveElement = function (iconId, $event) {
        if (!ctrl.showMoreInfo) {
          ctrl.firstAppear = iconId;
        }
        ctrl.activeElement = iconId;
        ctrl.focusedElement = null;
        ctrl.borderedElement = iconId;
        ctrl.showMoreInfo = iconId;
      };

      ctrl.closePanel = function () {
        ctrl.activeElement = null;
        ctrl.focusedElement = null;
        ctrl.borderedElement = null;
        ctrl.showMoreInfo = null;
        ctrl.closeState = false;
      };

      ctrl.setCloseState = function (state) {
        ctrl.closeState = state;
      };

      ctrl.isCloseState = function () {
        return !!ctrl.closeState;
      };

      ctrl.getActiveElement = function () {
        return !!ctrl.activeElement;
      };
    }])
    .directive('grid', function () {
      return {
        restrict: 'A',
        templateUrl: 'assets/partials/grid.html',
        controller: 'GridController',
        controllerAs: 'GCtrl'
      }
    });

})(angular, window);