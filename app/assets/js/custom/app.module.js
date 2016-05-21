(function (angular, global) {
  'use strict';

  angular
    .module('cinemaPortal', [
      'langing',
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
    .factory('apiConfig', ['apiConst', function (apiConst) {
      return {
        endpoint: [apiConst.host, apiConst.port].join(':') + '/api/' + apiConst.version
        // ,
        // CSRFToken: {
        //   headerName: "X-CSRF-Token",
        //   cookieName: "X-CSRF-Token",
        //   allowedMethods: [
        //     'GET'
        //   ]
        // }
      }
    }])
    // .factory('auth', [
    //   '$http',
    //   '$cookies',
    //   '$q',
    //   'apiConfig',
    //   function ($http, $cookies, $q, apiConfig) {
    //     return {
    //       logIn: function () {
    //         var token = apiConfig.CSRFToken;
    //
    //         if ($cookies[token.cookieName]) {
    //           return $q.when();
    //         }
    //
    //         return $http.get('/rest/session/token').then(function (responce) {
    //           $cookies[token.cookieName] = responce.data;
    //         })
    //       }
    //     }
    //   }
    // ])
    .factory('pageLock', function ($rootScope) {
      var globalLocks = 0;

      return {
        setGlobalLock: function (promise) {
          $rootScope.loading = !!(++globalLocks);

          promise.finally(function () {
            $rootScope.loading = !!(--globalLocks);
          });
        }
      }
    });
    // .run([
    //   'auth',
    //   function (auth) {
    //     // @todo block UI when user is not authorized.
    //     auth.logIn();
    //   }
    // ]);
})(angular, window);
