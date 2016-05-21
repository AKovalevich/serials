(function (angular, global) {
  'use strict';

  angular.module('video-stream')
    .controller('VideoStreamController', ['$rootScope', '$sce', '$routeParams', 'videoStream', 'pageLock',
      function ($rootScope, $sce, $routeParams, videoStream, pageLock) {
        var VSCtrl = this;

        VSCtrl.videoId = $routeParams.videoId;
        VSCtrl.seasonId = $routeParams.seasonId;
        VSCtrl.config = null;
        VSCtrl.isEnging = false;
        VSCtrl.nextVideo = false;
        VSCtrl.timer = 10;
        VSCtrl.countdown = 0;

        VSCtrl.getVideoInfo = function (seasonId, videoId) {
          var promise = videoStream.getVideo(seasonId, videoId);

          promise.then(function (response) {
              VSCtrl.nextVideo = response.nextVideo;

              VSCtrl.config = {
                autoHide: true,
                autoHideTime: 3000,
                autoPlay: true,
                loop: false,
                preload: "none",
                sources: [
                  {
                    src: $sce.trustAsResourceUrl("http://admin.serials.loc/video/1"),
                    type: "video/mp4"
                  }
                ],
                theme: "assets/js/vendor/videogular-themes-default/videogular.css",
                plugins: {
                  poster: "http://www.videogular.com/assets/images/videogular.png",
                  analytics: {
                    category: "Videogular",
                    label: "Main",
                    events: {
                      ready: true,
                      play: true,
                      pause: true,
                      stop: true,
                      complete: true,
                      progress: 10
                    }
                  }
                }
              };

              VSCtrl.isEnging = false;
              $rootScope.loading = false;
            });
          pageLock.setGlobalLock(promise);
        };

        VSCtrl.updateTime = function (currentTime, duration) {
          if (!VSCtrl.isEnging) {
            if (duration - currentTime <= 70) {
              VSCtrl.countdown = 10;
            }
          }
        };

        VSCtrl.timerFinished = function () {
          VSCtrl.isEnging = true;
          VSCtrl.videoId = VSCtrl.nextVideo.videoId;
          VSCtrl.seasonId = VSCtrl.nextVideo.seasonId;
          VSCtrl.getVideoInfo(VSCtrl.seasonId, VSCtrl.videoId);
        };

        VSCtrl.getVideoInfo(VSCtrl.seasonId, VSCtrl.videoId);
      }])

})(angular, window);
