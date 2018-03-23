var app = angular.module('myApp', []);
	
	app.controller('MyController', ['$scope', function($scope){
	$scope.form = {};
	
		$scope.addDatabase = function(){
		$scope.databases.push($scope.form);
		$scope.form = {};
	}
	
	$scope.databases = [];
		$scope.remove=function(database){ 
			var index	= $scope.databases.indexOf(database)
					$scope.databases.splice(index,1);     
    }
	
	
	$scope.editActivity = function(database) {
				var selectedActivity = database;
					console.log(selectedActivity);
    }
	
	
	$scope.edit = function(database){
            $scope.dataedit.push($scope.form);
			$scope.form = {};
	 }
	 
}]);
	
