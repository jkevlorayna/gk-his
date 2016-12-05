app.controller('AppHomeController', function ($scope, $http, $q, $location,growl,$uibModal,$timeout,svcCensus,svcYear,$stateParams,svcHouseHold) {
	$scope.Year = $stateParams.Year;	

	$scope.loadAll = function(){
				$q.all([svcYear.List('',0,0)]).then(function(r){
					$scope.yearList = r[0].Results;
						$scope.DateFrom = moment($scope.Year).startOf('year').format('YYYY-MM-DD');
						$scope.DateTo = moment($scope.Year).endOf('year').format('YYYY-MM-DD');
						
						$q.all([
						svcHouseHold.List('',0,0,$scope.DateFrom,$scope.DateTo),
						svcCensus.Age($scope.DateFrom,$scope.DateTo),
						svcCensus.Gender($scope.DateFrom,$scope.DateTo),
						svcCensus.Livelihood($scope.DateFrom,$scope.DateTo),
						svcCensus.Village($scope.DateFrom,$scope.DateTo),
						svcCensus.EmploymentStatus($scope.DateFrom,$scope.DateTo),
						svcCensus.EducationalAttainment($scope.DateFrom,$scope.DateTo),
						svcCensus.Crime($scope.DateFrom,$scope.DateTo)
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
			$location.path("home/"+$scope.Year);
	}			
		


	


	
	
});
