(function (angular, global) {
  'use strict';

  angular
    .module('grid')
    .controller('GridSliderController', ['$scope', 'gridResource', function ($scope, gridResource) {
      var GridSliderCtrl = this;

      GridSliderCtrl.activeElement = null;
      GridSliderCtrl.focusClass = null;
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

      GridSliderCtrl.icons = gridResource.buildGalleryByGenre();

      GridSliderCtrl.buildGalleryByGenre = function (genreId) {
        return GridSliderCtrl.icons;
      };

      GridSliderCtrl.showFullInfo = false;
      GridSliderCtrl.currentElement = {};

      GridSliderCtrl.setCurrentElementInfo = function (element) {
        GridSliderCtrl.showFullInfo = true;
        GridSliderCtrl.currentElement = element;
      };

      GridSliderCtrl.showFullElementInfo = function () {
        return GridSliderCtrl.showFullInfo;
      };

      GridSliderCtrl.getAssetsByGenre = function () {
        gridResource.listAssetsByGenre(GridSliderCtrl.genreId)
          .then(function (assets) {
            GridSliderCtrl.icons = assets;
          })
      };

      GridSliderCtrl.isBordered = function (elementId) {
        return GridSliderCtrl.borderedElement === elementId;
      };

      GridSliderCtrl.getNeedClassElement = function (iconId) {
        var elementClass = 'closed';
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
        GridSliderCtrl.borderedElement = iconId;
        GridSliderCtrl.showMoreInfo = iconId;
      };

      GridSliderCtrl.closePanel = function () {
        GridSliderCtrl.activeElement = null;
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
    }])

})(angular, window);
