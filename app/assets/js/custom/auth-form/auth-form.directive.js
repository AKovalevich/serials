(function (angular, global) {
  'use strict';

  angular.module('auth-form')
    .directive('animateFormSubmit', [
      '$state',
      function ($state) {
        return {
          link: function (scope, element, attrs) {
            var admin = element.find('.admin'),
              cms = element.find('.cms'),
              links = element.find('.links');
            element.find('#valid').on('click', function () {
              admin.addClass("up").delay( 100 ).fadeOut( 100 );
              cms.addClass("down").delay( 150 ).fadeOut( 100 );
              links.hide();
            });
          }
        };
      }]);
})(angular, window);
