(function (angular, global) {
  'use strict';

  angular
    .module('CinemaPortal', [
      'ngRoute',
      'ngAnimate',
      'ngSanitize',
      'angular-carousel-3d',
      'angular-preload-image',
      'slick',
      'com.2fdevs.videogular',
      'com.2fdevs.videogular.plugins.controls',
      'com.2fdevs.videogular.plugins.overlayplay',
      'com.2fdevs.videogular.plugins.poster',
      "com.2fdevs.videogular.plugins.buffering"
    ]);
})(angular, window);
