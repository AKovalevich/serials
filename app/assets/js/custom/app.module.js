(function (angular, global) {
  'use strict';

  angular
    .module('cinemaPortal', [
      'landing',
      'login-form',
      'slider',
      'grid',
      'video-stream',
      'ngRoute',
      'ngAnimate',
      'ngSanitize',
      'angular-preload-image',
      'slick'
    ])
    // .provider('httpApiCSRF', [
    //   'apiConfig',
    //   function (apiConfig) {
    //     this.$get = [
    //       '$cookies', function ($cookies) {
    //         return {
    //           'request': function (config) {
    //             var token = $cookies[apiConfig.CSRFToken.cookieName];
    //             var isAllowedMethod = apiConfig.CSRFToken.allowedMethods.indexOf(config.method) === -1;
    //
    //             if (isAllowedMethod && token) {
    //               config.headers[apiConfig.CSRFToken.headerName] = token;
    //             }
    //
    //             return config;
    //           }
    //         };
    //       }
    //     ];
    //   }
    // ])
    .constant('apiConst', {
      host: 'http://188.120.255.201',
      port: '8080',
      version: '1.0'
    })
    .config(['$compileProvider', function ($compileProvider) {
      $compileProvider.debugInfoEnabled(false);
    }]);
    // .run([
    //   'auth',
    //   function (auth) {
    //     // @todo block UI when user is not authorized.
    //     auth.logIn();
    //   }
    // ]);
})(angular, window);
