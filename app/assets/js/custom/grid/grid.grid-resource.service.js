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

        gridResource.buildGalleryByGenre = function (genreId) {
          return [
            {
              id: 'content1',
              preview: '/assets/images/placeholders/vik.jpg',
              full: '/assets/images/placeholders/vik.jpg',
              text: 'content1'
            },
            {
              id: 'content2',
              preview: '/assets/images/placeholders/tt.jpg',
              full: '/assets/images/placeholders/tt.jpg',
              text: 'content2'
            },
            {
              id: 'content3',
              preview: '/assets/images/placeholders/dd.jpg',
              full: '/assets/images/placeholders/dd.jpg',
              text: 'content3'
            },
            {
              id: 'content4',
              preview: '/assets/images/placeholders/100.jpg',
              full: '/assets/images/placeholders/100.jpg',
              text: 'content4'
            },
            {
              id: 'content5',
              preview: '/assets/images/placeholders/wd.jpg',
              full: '/assets/images/placeholders/wd.jpg',
              text: 'content5'
            },
            {
              id: 'content6',
              preview: '/assets/images/placeholders/ftd.jpg',
              full: '/assets/images/placeholders/ftd.jpg',
              text: 'content6'
            },
            {
              id: 'content7',
              preview: '/assets/images/placeholders/wd.jpg',
              full: '/assets/images/placeholders/wd.jpg',
              text: 'content7'
            },
            {
              id: 'content8',
              preview: '/assets/images/placeholders/ftd.jpg',
              full: '/assets/images/placeholders/ftd.jpg',
              text: 'content8'
            },
            {
              id: 'content9',
              preview: '/assets/images/placeholders/dh.jpg',
              full: '/assets/images/placeholders/dh.jpg',
              text: 'content9'
            },
            {
              id: 'content10',
              preview: '/assets/images/placeholders/vik.jpg',
              full: '/assets/images/placeholders/vik.jpg',
              text: 'content10'
            }
          ];
        };

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
