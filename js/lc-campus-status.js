// Creates a new app with AngularFire module
var app = angular.module("app", ["ngResource", "firebase"]);

app.controller("lcAuthCtrl", ["$scope", "$rootScope", "$http", "$firebaseObject", "$timeout",
 function($scope, $rootScope, $http, $firebaseObject, $timeout) {

  $scope.lcLogin = function() {

   var email = document.getElementById('email').value;
   var password = document.getElementById('password').value;

  firebase.auth().signInWithEmailAndPassword(email, password).then(function(result){
   console.log('User Logged in');

   $rootScope.authData = true;

   var databaseRef = firebase.database().ref();

   $rootScope.notify = $firebaseObject(databaseRef);

  }).catch(function(error) {
   console.log('An error occurred');
   authData = false;
  })
 };

 $scope.logout = function() {
  firebase.auth().signOut();
  $rootScope.authData = false;
  console.log($scope);
 };

  $scope.lcUpdateStatus = function(day){
     console.log('updating...');
     $scope.notify.$save($scope.notify);
     $scope.save_notify = true;

     $timeout(function(){
         $scope.save_notify = false;
     }, 500)
  };


 }
]);
