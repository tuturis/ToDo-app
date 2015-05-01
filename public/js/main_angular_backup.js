var app = angular.module('todo', []);

app.controller('toDoCtrl', ['$scope', '$http',
  function ($scope, $http) {  
  $scope.todoFld = "";  
  $scope.todos = [];
  
  $scope.initFirst= function()  {
     $http({method:'get', url:'todos/GetAll'})
      .success(function(data) {$scope.todos = data.data;})
   };
   $scope.initFirst();  
  $scope.addTodo = function () {    
   if ($scope.todoFld != "") {      
      $http({method:'post', url:'todos/GetAll', content: $scope.todoFld})
      .success(      
        function(data){
          console.log("data " + data)  
          $scope.todos.push({text: data.data , val: data.data})
        });
      $scope.todoFld = "";
    }
  };
  
  $scope.doneTodo = function($index) {
    $scope.todos[$index].done ="done";
  };
  $scope.removeTodo = function($index) {
    $http.post('todos/remove', {content: {id: $index}})
    .success(function(data){
     $scope.todos.splice($index);
     console.log(data, $index); 
    });
  }
}])