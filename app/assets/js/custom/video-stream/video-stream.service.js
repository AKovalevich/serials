(function (angular, global) {
  'use strict';

  angular.module('video-stream')
    .factory('videoStream', ['$http', 'apiConfig', function ($http, apiConfig) {
      var videoStream = {};

      videoStream.getVideo = function (seasonId, videoId) {
        return $http.get(apiConfig.endpoint + '/api/episode/' + seasonId + '/' + videoId)
          .then(function (response) {
            return response;
          });
      };

      return videoStream;
    }])
})(angular, window);
