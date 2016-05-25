(function (angular, global) {
  'use strict';

  angular.module('video-stream')
    .controller('VideoStreamController', [
      '$sce',
      '$routeParams',
      '$location',
      'vgFullscreen',
      'videoStream',
      'pageLock',
      function ($sce, $routeParams, $location, vgFullscreen, videoStream, pageLock) {
        var VSCtrl = this;

        VSCtrl.videoId = $routeParams.videoId;
        VSCtrl.seasonId = $routeParams.seasonId;
        VSCtrl.config = null;
        VSCtrl.isEnging = false;
        VSCtrl.nextVideo = false;
        VSCtrl.timer = 10;
        VSCtrl.countdown = false;
        VSCtrl.API = null;
        VSCtrl.currentVideo = 0;

        VSCtrl.onPlayerReady = function(API) {
          VSCtrl.API = API;
        };

        VSCtrl.getVideoInfo = function (seasonId, videoId) {
          var promise = videoStream.getVideo(seasonId, videoId);

          promise.then(function (response) {
            VSCtrl.nextVideo = response.nextVideo;
            VSCtrl.currentVideo = response.currentVideo;
            VSCtrl.config = {
              autoHide: true,
              autoHideTime: 3000,
              loop: false,
              preload: "none",
              sources: [
                {
                  src: $sce.trustAsResourceUrl(VSCtrl.currentVideo.src),
                  type: VSCtrl.currentVideo.mimeType
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
          });
          pageLock.setGlobalLock(promise);
        };

        VSCtrl.updateTime = function (currentTime, duration) {
          if (!VSCtrl.isEnging) {
            if (duration - currentTime <= 25) {
              if (!VSCtrl.countdown) {
                if (vgFullscreen.isFullScreen()) {
                  vgFullscreen.exit();
                }
                VSCtrl.countdown = 20;
              }
            }
          }
        };

        VSCtrl.timerFinished = function () {
          VSCtrl.isEnging = true;
          VSCtrl.videoId = VSCtrl.nextVideo.videoId;
          VSCtrl.seasonId = VSCtrl.nextVideo.seasonId;
          VSCtrl.countdown = false;
          VSCtrl.API.stop();
          // If html5Mode is disabled
          $location.path("/watch/"+ VSCtrl.seasonId +"/" + VSCtrl.videoId);
        };

        VSCtrl.getVideoInfo(VSCtrl.seasonId, VSCtrl.videoId);
      }
    ])
    .directive("tvShowPlaylist",
      ["VG_STATES", function(VG_STATES) {
        return {
          restrict: "E",
          require: "^videogular",
          template: "<img src='http://www.videogular.com/img/videogular.png' ng-show='API.currentState != \"play\"'>",
          link: function(scope, elem, attrs, API) {
            scope.API = API;
          }
        }
      }
      ]);

})(angular, window);
