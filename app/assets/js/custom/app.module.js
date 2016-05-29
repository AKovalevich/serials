(function (angular, global) {
  'use strict';

  angular
    .module('cinemaPortal', [
      'auth-form',
      'slider',
      'grid',
      'video-stream',
      'ui.router',
      'ngAnimate',
      'ngSanitize',
      'angular-preload-image',
      'slick'
    ])
    .constant('apiConst', {
      host: 'http://188.120.255.201',
      port: '8080',
      version: '1.0'
    })
    .config(['$compileProvider', function ($compileProvider) {
      $compileProvider.debugInfoEnabled(false);
    }]);
})(angular, window);
