(function (angular, global) {
  'use strict';

  angular.module('grid')
    .factory('gridResource', [
      '$http',
      '$q',
      '$cacheFactory',
      'apiConfig',
      function ($http, $q, $cacheFactory, apiConfig) {
        var gridResource = {};

        gridResource.listGenres = function () {
          var config = {
            cache: true
          };

          return $http.get(apiConfig.endpoint + '/genres', config).then(
            function (response) {
              return response.data.data.items;
            },
            function (response) {
              $q.reject({
                code: 'failure',
                message: 'Server is failure.',
                data: response.data
              })
            })
        };

        gridResource.listAssetsByGenre = function (genreId) {
          var config = {
            cache: true
          };

          return $http.get(apiConfig.endpoint + '/assets/genre/' + genreId, config).then(
            function (response) {
              return response.data.data.items.length ? response.data.data.items : [];
            },
            function (response) {
              $q.reject({
                code: 'failure',
                message: 'Server is failure.',
                data: response.data
              })
            })
        };

        return gridResource;
      }
    ])
})(angular, window);
