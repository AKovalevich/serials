(function (angular, global) {
  'use strict';

  angular.module('video-stream', [
    'timer',
    'angulartics.google.analytics',
    'com.2fdevs.videogular',
    'com.2fdevs.videogular.plugins.controls',
    'com.2fdevs.videogular.plugins.overlayplay',
    'com.2fdevs.videogular.plugins.poster',
    'com.2fdevs.videogular.plugins.buffering',
    'com.2fdevs.videogular.plugins.analytics'
  ]);

})(angular, window);
