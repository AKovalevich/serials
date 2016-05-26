(function (angular, global) {
  'use strict';

  angular.module('video-stream')
    .factory('videoStream', ['$http', '$q', 'apiConfig', function ($http, $q, apiConfig) {
      var videoStream = {};

      videoStream.getVideo = function (seasonId, videoId) {
        return $q.when({
          currentVideo: {
            mimeType: "video/mp4",
            src: 'http://188.120.255.201:1337/watch/Futurama/s1/e1/480/Space Pilot 3000.mp4',
            seasonId: seasonId,
            videoId: videoId,
            background: 'https://images7.alphacoders.com/418/418484.jpg'
          },
          nextVideo: {
            seasonId: seasonId,
            videoId: ++videoId,
            preview: 'https://i.guim.co.uk/img/media/dbabdfe812e8579350588bc59d7e095bf640ee06/0_262_5616_3372/master/5616.jpg?w=620&q=55&auto=format&usm=12&fit=max&s=3b5804c182812c7b5c79cbfc4de04622'
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
