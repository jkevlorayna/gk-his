app.controller('AppHomeController', function ($scope, $http, $q, $location,growl,$uibModal,$timeout,svcCensus,svcYear,$stateParams,svcHouseHold,svcVillage) {
	$scope.Year = $stateParams.Year;	
	$scope.Village = $stateParams.Village;
	$scope.loadVillage = function(){
		svcVillage.List('',0,0).then(function(r){
			$scope.VillageList = r.Results;
		})
	}
	$scope.loadVillage();
	$scope.loadAll = function(){
				$q.all([svcYear.List('',0,0)]).then(function(r){
					$scope.yearList = r[0].Results;
						$scope.DateFrom = moment($scope.Year).startOf('year').format('YYYY-MM-DD');
						$scope.DateTo = moment($scope.Year).endOf('year').format('YYYY-MM-DD');
						
						$q.all([
						svcHouseHold.List('',0,0,$scope.DateFrom,$scope.DateTo,$scope.Village),
						svcCensus.Age($scope.DateFrom,$scope.DateTo,$scope.Village),
						svcCensus.Gender($scope.DateFrom,$scope.DateTo,$scope.Village),
						svcCensus.Livelihood($scope.DateFrom,$scope.DateTo,$scope.Village),
						svcCensus.Village($scope.DateFrom,$scope.DateTo,$scope.Village),
						svcCensus.EmploymentStatus($scope.DateFrom,$scope.DateTo,$scope.Village),
						svcCensus.EducationalAttainment($scope.DateFrom,$scope.DateTo,$scope.Village),
						svcCensus.Crime($scope.DateFrom,$scope.DateTo,$scope.Village)
						]).then(function(r){
								$scope.HouseHoldCount = r[0].Count;
								$scope.AgeResults = r[1];
								$scope.GenderResults = r[2];
								$scope.LivelihoodResults = r[3];
								$scope.VillageResults = r[4];
								$scope.EmploymentStatusResults = r[5];
								$scope.EducationalAttainmentResults = r[6];
								$scope.CrimeResults = r[7];
						})
						

				})
	}			
	$scope.loadAll();
	
	$scope.changeYear = function(){		
			$location.path("home/"+$scope.Year+"/"+$scope.Village);
	}			
	$scope.changeVillage = function(){		
			$location.path("home/"+$scope.Year+"/"+$scope.Village);
	}

	


	
	
});
