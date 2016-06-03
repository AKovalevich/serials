(function (angular, global) {
  'use strict';

  angular
    .module('grid')
    .controller('GridSliderController', [
      '$rootScope',
      '$scope',
      '$timeout',
      'gridResource',
      function ($rootScope, $scope, $timeout, gridResource) {
        var GridSliderCtrl = this;

        GridSliderCtrl.borderedElement = null;
        GridSliderCtrl.firstAppear = null;
        GridSliderCtrl.closeState = null;
        GridSliderCtrl.openState = false;
        GridSliderCtrl.hoverTimer = null;
        GridSliderCtrl.currentElement = {};
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
          return this.icons;
        };

        GridSliderCtrl.openPanel = function (element) {
          $rootScope.$emit('slider.openPanel');
          this.openState = true;
          this.currentElement = element;
        };

        GridSliderCtrl.showFullElementInfo = function () {
          return this.openState;
        };

        GridSliderCtrl.closePanel = function () {
          this.openState = false;
          this.currentElement = {};
        };

        GridSliderCtrl.showHoverElement = function (element) {
          if (this.openState) {
            this.hoverTimer = $timeout(function () {
              GridSliderCtrl.currentElement = element;
            }, 500);
          }
        };

        GridSliderCtrl.hideHoverElement = function () {
          $timeout.cancel(this.hoverTimer);
        };

        GridSliderCtrl.getAssetsByGenre = function () {
          gridResource.listAssetsByGenre(this.genreId)
            .then(function (assets) {
              GridSliderCtrl.icons = assets;
            })
        };

        $rootScope.$on('slider.openPanel', function () {
          GridSliderCtrl.closePanel();
        });



        // Helpers for future
        GridSliderCtrl.isBordered = function (elementId) {
          return this.borderedElement === elementId;
        };

        GridSliderCtrl.getNeedClassElement = function (iconId) {
          var elementClass = 'closed';
          elementClass += ' ';

          elementClass += this.isBordered(iconId)
            ? 'bordered'
            : 'non-bordered';

          return elementClass;
        };

        GridSliderCtrl.getPanelClass = function (iconId) {
          var panelClass = this.firstAppear === iconId
            ? 'first-appear'
            : 'fade-in-out';

          if (this.isCloseState()) {
            panelClass = 'closing';
          }

          return panelClass;
        };

        GridSliderCtrl.showPanel = function (iconId) {
          return this.showMoreInfo === iconId;
        };

        GridSliderCtrl.setActiveElement = function (iconId) {
          if (!this.showMoreInfo) {
            this.firstAppear = iconId;
          }
          this.activeElement = iconId;
          this.borderedElement = iconId;
          this.showMoreInfo = iconId;
        };

        GridSliderCtrl.setCloseState = function (state) {
          this.closeState = state;
        };

        GridSliderCtrl.isCloseState = function () {
          return !!this.closeState;
        };

        GridSliderCtrl.getActiveElement = function () {
          return !!this.activeElement;
        };
      }
    ])

})(angular, window);
