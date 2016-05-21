(function (angular, global) {
  'use strict';

  angular.module('grid')
    .controller('GridController', ['gridResource', 'pageLock', function (gridResource, pageLock) {
      var GridCtrl = this;

      GridCtrl.genres = [];
      GridCtrl.assets = [];

      GridCtrl.init = function() {
        var promiseGenres = gridResource.listGenres();
        promiseGenres.then(function (genres) {
          GridCtrl.genres = genres;
        });

        pageLock.setGlobalLock(promiseGenres);
      };
      GridCtrl.init();
    }])
})(angular, window);
