(function (angular, global) {
  'use strict';

  angular.module('auth-form')
    .controller('AuthFormController', [
      '$state',
      'authForm',
      'settings',
      function ($state, authForm, settings) {
        var AuthFormCtrl = this;

        AuthFormCtrl.settings = settings;

        AuthFormCtrl.isSingUp = function () {
          return AuthFormCtrl.settings.type == 'sing_up'
        };

        AuthFormCtrl.submit = function() {
          // We need to set timeout because we need to sync with animations on directive.
          setTimeout(function () {
            $state.go('browse');
          }, 1000 );
        };

        // Main
        AuthFormCtrl.init = function () {
          authForm.init();
        };

        AuthFormCtrl.init();
    }])
})(angular, window);
