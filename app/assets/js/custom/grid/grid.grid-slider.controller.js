(function (angular, global) {
  'use strict';

  angular
    .module('grid')
    .controller('GridSliderController', ['$scope', 'gridResource', function ($scope, gridResource) {
      var GridSliderCtrl = this;

      GridSliderCtrl.activeElement = null;
      GridSliderCtrl.focusClass = null;
      GridSliderCtrl.focusedElement = false;
      GridSliderCtrl.borderedElement = null;
      GridSliderCtrl.showMoreInfo = null;
      GridSliderCtrl.firstAppear = null;
      GridSliderCtrl.closeState = null;
      GridSliderCtrl.genreId = $scope.$parent.genre.id;

      GridSliderCtrl.responsive = [
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

      GridSliderCtrl.icons = [
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

      GridSliderCtrl.icons = [];

      GridSliderCtrl.getAssetsByGenre = function () {
        gridResource.listAssetsByGenre(GridSliderCtrl.genreId)
          .then(function (assets) {
            GridSliderCtrl.icons = assets;
          })
      };

      GridSliderCtrl.setFocus = function (elementId) {
        if (GridSliderCtrl.borderedElement && GridSliderCtrl.showMoreInfo && elementId) {
          GridSliderCtrl.borderedElement = elementId;
          GridSliderCtrl.showMoreInfo = elementId;
        }
        else {
          GridSliderCtrl.focusedElement = elementId;
        }
        if (!elementId) GridSliderCtrl.firstAppear = null;
      };

      GridSliderCtrl.isFocused = function (elementId) {
        return GridSliderCtrl.focusedElement === elementId;
      };

      GridSliderCtrl.isBordered = function (elementId) {
        return GridSliderCtrl.borderedElement === elementId;
      };

      GridSliderCtrl.getNeedClassElement = function (iconId) {
        var elementClass = GridSliderCtrl.isFocused(iconId)
          ? 'opened'
          : 'closed';
        elementClass += ' ';

        elementClass += GridSliderCtrl.isBordered(iconId)
          ? 'bordered'
          : 'non-bordered';

        return elementClass;
      };

      GridSliderCtrl.getPanelClass = function (iconId) {
        var panelClass = GridSliderCtrl.firstAppear === iconId
          ? 'first-appear'
          : 'fade-in-out';

        if (GridSliderCtrl.isCloseState()) {
          panelClass = 'closing';
        }

        return panelClass;
      };

      GridSliderCtrl.showPanel = function (iconId) {
        return GridSliderCtrl.showMoreInfo === iconId;
      };

      GridSliderCtrl.setActiveElement = function (iconId, $event) {
        if (!GridSliderCtrl.showMoreInfo) {
          GridSliderCtrl.firstAppear = iconId;
        }
        GridSliderCtrl.activeElement = iconId;
        GridSliderCtrl.focusedElement = null;
        GridSliderCtrl.borderedElement = iconId;
        GridSliderCtrl.showMoreInfo = iconId;
      };

      GridSliderCtrl.closePanel = function () {
        GridSliderCtrl.activeElement = null;
        GridSliderCtrl.focusedElement = null;
        GridSliderCtrl.borderedElement = null;
        GridSliderCtrl.showMoreInfo = null;
        GridSliderCtrl.closeState = false;
      };

      GridSliderCtrl.setCloseState = function (state) {
        GridSliderCtrl.closeState = state;
      };

      GridSliderCtrl.isCloseState = function () {
        return !!GridSliderCtrl.closeState;
      };

      GridSliderCtrl.getActiveElement = function () {
        return !!GridSliderCtrl.activeElement;
      };

      GridSliderCtrl.init = function () {
        GridSliderCtrl.getAssetsByGenre(GridSliderCtrl.genreId);
      };
    }])

})(angular, window);
