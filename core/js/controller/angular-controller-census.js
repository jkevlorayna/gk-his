app.controller('AppCensusAgeController', function ($scope, $http, $q, $location,growl,$uibModal,$timeout,svcCensus,svcYear,$stateParams) {
	$scope.Year = $stateParams.Year;	

	$scope.loadAll = function(){
				$q.all([svcYear.List('',0,0)]).then(function(r){
					$scope.yearList = r[0].Results;
						$scope.DateFrom = moment($scope.Year).startOf('year').format('YYYY-MM-DD');
						$scope.DateTo = moment($scope.Year).endOf('year').format('YYYY-MM-DD');
						
						svcCensus.Age($scope.DateFrom,$scope.DateTo).then(function(r){
							$scope.Results = r;
							$scope.Count = r.length;
						})
				})
	}			
	$scope.loadAll();
	
	$scope.changeYear = function(){		
			$location.path("/census/age/"+$scope.Year);
	}			
		

				$scope.amChartOptions = $timeout(function(){
					return {
						data:$scope.Results,
						type: "pie",
						theme: 'light',
						"valueField": "Number",
						"titleField": "AgeGroup",
						"balloon":{
							"fixedPosition":false
						},
						"export": {
						"enabled": true
						}
					}
				}.bind(this), 1000) // delay chart render by 1 second
	


	
	
});

app.controller('AppCensusVillageController', function ($scope, $http, $q, $location,growl,$uibModal,$timeout,svcCensus,svcYear,$stateParams) {
	$scope.Year = $stateParams.Year;	

	$scope.loadAll = function(){
				$q.all([svcYear.List('',0,0)]).then(function(r){
					$scope.yearList = r[0].Results;
						$scope.DateFrom = moment($scope.Year).startOf('year').format('YYYY-MM-DD');
						$scope.DateTo = moment($scope.Year).endOf('year').format('YYYY-MM-DD');
						
						svcCensus.Village($scope.DateFrom,$scope.DateTo).then(function(r){
							$scope.Results = r;
							$scope.Count = r.length;
						})
				})
	}			
	$scope.loadAll();
	
	$scope.changeYear = function(){		
			$location.path("/census/village/"+$scope.Year);
	}			
		

				$scope.amChartOptions = $timeout(function(){
					return {
						data:$scope.Results,
						type: "pie",
						theme: 'light',
						"valueField": "Number",
						"titleField": "Village",
						"balloon":{
							"fixedPosition":false
						},
						"export": {
						"enabled": true
						}
					}
				}.bind(this), 1000) // delay chart render by 1 second
	


	
	
});

app.controller('AppCensusLivelihoodController', function ($scope, $http, $q, $location,growl,$uibModal,$timeout,svcCensus,svcYear,$stateParams) {
	$scope.Year = $stateParams.Year;	

	$scope.loadAll = function(){
				$q.all([svcYear.List('',0,0)]).then(function(r){
					$scope.yearList = r[0].Results;
						$scope.DateFrom = moment($scope.Year).startOf('year').format('YYYY-MM-DD');
						$scope.DateTo = moment($scope.Year).endOf('year').format('YYYY-MM-DD');
						
						svcCensus.Livelihood($scope.DateFrom,$scope.DateTo).then(function(r){
							$scope.Results = r;
							$scope.Count = r.length;
						})
				})
	}			
	$scope.loadAll();
	
	$scope.changeYear = function(){		
			$location.path("/census/livelihood/"+$scope.Year);
	}			
		

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

app.controller('AppCensusGenderController', function ($scope, $http, $q, $location,growl,$uibModal,$timeout,svcCensus,svcYear,$stateParams) {


	$scope.Year = $stateParams.Year;	

	$scope.loadAll = function(){
				$q.all([svcYear.List('',0,0)]).then(function(r){
					$scope.yearList = r[0].Results;
						$scope.DateFrom = moment($scope.Year).startOf('year').format('YYYY-MM-DD');
						$scope.DateTo = moment($scope.Year).endOf('year').format('YYYY-MM-DD');
						
						svcCensus.Gender($scope.DateFrom,$scope.DateTo).then(function(r){
							$scope.Results = r;
							$scope.Count = r.length;
						})
				})
	}			
	$scope.loadAll();
	
	$scope.changeYear = function(){		
			$location.path("/census/gender/"+$scope.Year);
	}	



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


app.controller('AppCensusEmploymentStatusController', function ($scope, $http, $q, $location,growl,$uibModal,$timeout,svcCensus,$stateParams,svcYear) {


	$scope.Year = $stateParams.Year;	

	$scope.loadAll = function(){
				$q.all([svcYear.List('',0,0)]).then(function(r){
					$scope.yearList = r[0].Results;
						$scope.DateFrom = moment($scope.Year).startOf('year').format('YYYY-MM-DD');
						$scope.DateTo = moment($scope.Year).endOf('year').format('YYYY-MM-DD');
						
						svcCensus.EmploymentStatus($scope.DateFrom,$scope.DateTo).then(function(r){
							$scope.Results = r;
							$scope.Count = r.length;
						})
				})
	}			
	$scope.loadAll();
	
	$scope.changeYear = function(){		
			$location.path("/census/employmentStatus/"+$scope.Year);
	}	




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


app.controller('AppCensusEducationalAttainmentController', function ($scope, $http, $q, $location,growl,$uibModal,$timeout,svcCensus,$stateParams,svcYear) {


	$scope.Year = $stateParams.Year;	

	$scope.loadAll = function(){
				$q.all([svcYear.List('',0,0)]).then(function(r){
					$scope.yearList = r[0].Results;
						$scope.DateFrom = moment($scope.Year).startOf('year').format('YYYY-MM-DD');
						$scope.DateTo = moment($scope.Year).endOf('year').format('YYYY-MM-DD');
						
						svcCensus.EducationalAttainment($scope.DateFrom,$scope.DateTo).then(function(r){
							$scope.Results = r;
							$scope.Count = r.length;
						})
				})
	}			
	$scope.loadAll();
	
	$scope.changeYear = function(){		
			$location.path("/census/educationalAttainment/"+$scope.Year);
	}	


    $scope.amChartOptions = $timeout(function(){
    	return {
            data:$scope.Results,
            type: "pie",
            theme: 'light',
			"valueField": "Number",
			"titleField": "EducationalAttainment",
			"balloon":{
				"fixedPosition":false
			},
			"export": {
			"enabled": true
			}
    	}
    }.bind(this), 1000) // delay chart render by 1 second
	
});


app.controller('AppCensusPopulationGrowthController', function ($scope, $http, $q, $location,growl,$uibModal,$timeout,svcCensus,$stateParams,svcYear) {


	$scope.Year = $stateParams.Year;	

	$scope.loadAll = function(){
				$q.all([svcYear.List('',0,0)]).then(function(r){
					$scope.yearList = r[0].Results;
						$scope.DateFrom = moment($scope.Year).startOf('year').format('YYYY-MM-DD');
						$scope.DateTo = moment($scope.Year).endOf('year').format('YYYY-MM-DD');
						
						svcCensus.PopulationGrowth(null,null).then(function(r){
							$scope.Results = r;
							$scope.Count = r.length;
						})
				})
	}			
	$scope.loadAll();
	
	$scope.changeYear = function(){		
			$location.path("/census/educationalAttainment/"+$scope.Year);
	}	


    $scope.amChartOptions = $timeout(function(){
    	return {
			"type": "serial",
			"theme": "light",
			"marginRight": 70,
            data:$scope.Results,
  "valueAxes": [{
    "axisAlpha": 0,
    "position": "left",
    "title": "PopulationGrowth"
  }],
  "startDuration": 1,
  "graphs": [{
    "balloonText": "<b>[[category]]: [[value]]</b>",
    "fillColorsField": "color",
    "fillAlphas": 100,
    "lineAlpha": 100,
    "type": "column",
    "valueField": "Number",
  }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "Year",
  "categoryAxis": {
    "gridPosition": "start",
    "labelRotation": 45
  },
  "export": {
    "enabled": true
  }
    	}
    }.bind(this), 1000) // delay chart render by 1 second
	
});


     

