(function (angular, global) {
  'use strict';

  angular
    .module('cinemaPortal')
    .factory('apiConfig', ['apiConst', function (apiConst) {
      return {
        endpoint: [apiConst.host, apiConst.port].join(':') + '/api/' + apiConst.version
      }
    }])
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
    })
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
})(angular, window);
