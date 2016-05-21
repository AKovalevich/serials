(function (angular, global) {
  'use strict';

  angular.module('video-stream')
    .factory('videoStream', ['$q', '$http', 'generalConf', function ($q, $http, generalConf) {
      var videoStream = {};

      videoStream.getVideo = function (seasonId, videoId) {
        var deferred = $q.defer();

        $http.get(generalConf.basePath + '/api/episode/' + seasonId + '/' + videoId)
          .then(function (response) {
            deferred.resolve(response)
          });

        return deferred.promise;
      }

      return videoStream;
    }])
})(angular, window);
