
app.controller('AppCensusLivelihoodController', function ($scope, $http, $q, $location,growl,$uibModal,$timeout,svcCensus) {

	$scope.load = function(){
			svcCensus.Livelihood('').then(function(r){
				 $scope.Results = r;
			})
	}
	$scope.load();

    $scope.amChartOptions = $timeout(function(){
    	return {
            data:$scope.Results,
            type: "pie",
            theme: 'light',
			"valueField": "Number",
			"titleField": "Livelihood",
			"balloon":{
				"fixedPosition":false
			},
			"export": {
			"enabled": true
			}
    	}
    }.bind(this), 1000) // delay chart render by 1 second
	
});

app.controller('AppCensusGenderController', function ($scope, $http, $q, $location,growl,$uibModal,$timeout,svcCensus) {

	$scope.load = function(){
			svcCensus.Gender('').then(function(r){
				 $scope.Results = r;
			})
	}
	$scope.load();

    $scope.amChartOptions = $timeout(function(){
    	return {
            data:$scope.Results,
            type: "pie",
            theme: 'light',
			"valueField": "Number",
			"titleField": "Gender",
			"balloon":{
				"fixedPosition":false
			},
			"export": {
			"enabled": true
			}
    	}
    }.bind(this), 1000) // delay chart render by 1 second
	
});


app.controller('AppCensusEmploymentStatusController', function ($scope, $http, $q, $location,growl,$uibModal,$timeout,svcCensus) {

	$scope.load = function(){
			svcCensus.EmploymentStatus('').then(function(r){
				 $scope.Results = r;
			})
	}
	$scope.load();

    $scope.amChartOptions = $timeout(function(){
    	return {
            data:$scope.Results,
            type: "pie",
            theme: 'light',
			"valueField": "Number",
			"titleField": "EmploymentStatus",
			"balloon":{
				"fixedPosition":false
			},
			"export": {
			"enabled": true
			}
    	}
    }.bind(this), 1000) // delay chart render by 1 second
	
});


app.controller('AppCensusAgeController', function ($scope, $http, $q, $location,growl,$uibModal,$timeout,svcCensus) {

	$scope.load = function(){
			svcCensus.EmploymentStatus('').then(function(r){
				 $scope.Results = r;
			})
	}
	$scope.load();

    $scope.amChartOptions = $timeout(function(){
    	return {
            data:$scope.Results,
            type: "pie",
            theme: 'light',
			"valueField": "Number",
			"titleField": "Age",
			"balloon":{
				"fixedPosition":false
			},
			"export": {
			"enabled": true
			}
    	}
    }.bind(this), 1000) // delay chart render by 1 second
	
});

     

