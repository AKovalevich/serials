(function (angular, global) {
  'use strict';

  angular.module('login-form')
    .controller('LoginController', ['$scope', '$log', function ($scope, $log) {
      var LoginCtrl = this;
      LoginCtrl.credentials = {
        singIn: {
          email: '',
          password: ''
        },
        singUp: {
          email: '',
          password: '',
          confirmPassword: ''
        }
      };

      var menu = angular.element('#menu'),
        panelBoxes = angular.element('.panel__box');

      function removeSelection() {
        for (var i = 0, len = panelBoxes.length; i < len; i++) {
          panelBoxes[i].classList.remove('active');
        }
      }

      LoginCtrl.changeTab = function (tab, e) {
        e.preventDefault();
        removeSelection();

        switch (tab) {
          case 'signIn':
            panelBoxes[0].classList.add('active');
            menu[0].classList.remove('second-box');
            break;

          case 'signUp':
            panelBoxes[1].classList.add('active');
            menu[0].classList.add('second-box');
            break;
        }

      };

      LoginCtrl.signUp = function () {

      };

      LoginCtrl.signIn = function () {

      };
    }])
})(angular, window);
