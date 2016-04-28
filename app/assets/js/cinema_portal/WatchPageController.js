(function (angular, global) {
  'use strict';

  angular.module('CinemaPortal')
    .controller('WatchPageController', ["$sce", function ($sce) {
      var ctrl = this;

      ctrl.config = {
        sources: [
          {
            src: $sce.trustAsResourceUrl("http://static.videogular.com/assets/videos/videogular.mp4"),
            type: "video/mp4"
          },
          {
            src: $sce.trustAsResourceUrl("http://static.videogular.com/assets/videos/videogular.webm"),
            type: "video/webm"
          },
          {src: $sce.trustAsResourceUrl("http://static.videogular.com/assets/videos/videogular.ogg"), type: "video/ogg"}
        ],
        tracks: [
          {
            src: "http://www.videogular.com/assets/subs/pale-blue-dot.vtt",
            kind: "subtitles",
            srclang: "en",
            label: "English",
            default: ""
          }
        ],
        theme: "libraries/videogular-themes-default/videogular.css",
        plugins: {
          poster: "http://www.videogular.com/assets/images/videogular.png"
        }
      };
    }])

})(angular, window);
