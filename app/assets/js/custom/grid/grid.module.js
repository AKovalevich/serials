(function (angular, global) {
  'use strict';

  angular
    .module('grid', [])
    .run([
      '$q',
      'gridResource',
      function ($q, gridResource) {
        var promises = [];
        var promise = gridResource.listGenres();

        promise.then(function (genres) {
          for (var i = 0; i < genres.length; i++) {
            promises.push(gridResource.listAssetsByGenre(genres[i].id));
          }
          return $q.all(promises);
        });
      }
    ]);
})(angular, window);
