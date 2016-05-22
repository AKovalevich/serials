(function (angular, global) {
  'use strict';

  angular.module('video-stream')
    .factory('videoStream', ['$http', '$q', 'apiConfig', function ($http, $q, apiConfig) {
      var videoStream = {};

      videoStream.getVideo = function (seasonId, videoId) {
        return $q.when({
          currentVideo: {
            mimeType: "video/mp4",
            src: 'http://static.videogular.com/assets/videos/videogular.mp4',
            seasonId: seasonId,
            videoId: videoId
          },
          nextVideo: {
            seasonId: seasonId,
            videoId: ++videoId
          }
        });

        /*return $http.get(apiConfig.endpoint + '/api/episode/' + seasonId + '/' + videoId).then(
          function (response) {
            return response;
          });*/
      };

      return videoStream;
    }])
})(angular, window);
