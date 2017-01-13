
app.controller('CrimeReportController', function ($scope, $http, $q, $location, svcCrime,growl,$uibModal,svcCrimeReport) {
	$scope.pageNo = 1;
	$scope.pageSize = 10;
	if($scope.searchText == undefined){ $scope.searchText = ''; } 
		
    $scope.load = function () {
		svcCrimeReport.List($scope.searchText,$scope.pageNo,$scope.pageSize).then(function (r) {
            $scope.list = r.Results;
            $scope.count = r.Count;
        })
    }
    $scope.load();
	
	$scope.pageChanged = function () { $scope.load();}
	
	$scope.openDeleteModal = function (size,id) {
			var modal = $uibModal.open({
			templateUrl: 'views/deletemodal/deleteModal.html',
			controller: 'AppCrimeReportModalController',
			size: size,
			resolve: {
				dataId: function () {
					return id;
				}
			}
			});
			modal.result.then(function () { }, function () { 
				$scope.load();
			});
	};
	
	
});
app.controller('AppCrimeReportModalController', function ($rootScope,$scope, $http, $q, $location, $filter, svcCrimeReport,growl,$uibModal,dataId,$uibModalInstance) {
	$scope.id = dataId;
	$scope.close = function(){
		$uibModalInstance.dismiss();
	}
	$scope.delete = function () {
		svcCrimeReport.Delete($scope.id).then(function (response) {
			growl.error("Data Successfully Deleted");
			$scope.close();
        });
    }
});	


app.controller('CrimeReportFormController', function ($scope, $http, $q, $location, svcCrime,growl,$uibModal,svcCrimeReport,$stateParams) {
	$scope.Id = $stateParams.Id;
	$scope.Year = $stateParams.Year;
	$scope.PageTitle = $scope.Id == 0 ? 'Add New Violation Report': 'Update Violation Report' ;
		
	$scope.pageNo = 1;
	$scope.pageSize = 10;
	if($scope.searchText == undefined){ $scope.searchText = ''; } 
		
	$scope.loadCrime = function () {
		svcCrime.List('',0,0).then(function (r) {
            $scope.CrimeList = r.Results;
        })
    }
    $scope.loadCrime()
	

	$scope.formData = {  }
	$scope.save = function () {
		svcCrimeReport.Save($scope.formData).then(function (r) {
			growl.success("Data Successfully Save");
        });
    }
	
	$scope.getById = function () {
		svcCrimeReport.GetById($scope.Id).then(function (r) {
			$scope.formData =  r;
			$scope.formData.CrimeDate =  new Date(r.CrimeDate);
        });
    }
	
	$scope.formData = $scope.Id == 0 ? { Crimes:[] , Victims:[] , Suspects:[] } : $scope.getById();

	$scope.addCrime = function(){
		$scope.formData.Crimes.push({Crime:''})
	}
	$scope.addVictims = function(){
		$scope.formData.Victims.push({Name:'',Age:'',Gender:'',Address:''})
	}
	$scope.addSuspects = function(){
		$scope.formData.Suspects.push({Name:'',Age:'',Gender:'',Address:''})
	}
	
	$scope.openDeleteModal = function (size,id,DeleteFrom) {
			var DeleteController = "";
			if(DeleteFrom == 'Crimes'){ DeleteController = 'AppCrimeReportCrimeModalController'; }
			if(DeleteFrom == 'Suspects'){ DeleteController = 'AppCrimeReportSuspectsModalController'; }
			if(DeleteFrom == 'Victims'){ DeleteController = 'AppCrimeReportVictimsModalController'; }
				
			var modal = $uibModal.open({
			templateUrl: 'views/deletemodal/deleteModal.html',
			controller: DeleteController,
			size: size,
			resolve: {
				dataId: function () {
					return id;
				}
			}
			});
			modal.result.then(function () { }, function () { 
				$scope.getById();
			});
	};
	
});
app.controller('AppCrimeReportCrimeModalController', function ($rootScope,$scope, $http, $q, $location, $filter, svcCrimeReportCrimes,growl,$uibModal,dataId,$uibModalInstance) {
	$scope.id = dataId;
	$scope.close = function(){
		$uibModalInstance.dismiss();
	}
	$scope.delete = function () {
		svcCrimeReportCrimes.Delete($scope.id).then(function (response) {
			growl.error("Data Successfully Deleted");
			$scope.close();
        });
    }
});	
app.controller('AppCrimeReportSuspectsModalController', function ($rootScope,$scope, $http, $q, $location, $filter, svcCrimeReportSuspects,growl,$uibModal,dataId,$uibModalInstance) {
	$scope.id = dataId;
	$scope.close = function(){
		$uibModalInstance.dismiss();
	}
	$scope.delete = function () {
		svcCrimeReportSuspects.Delete($scope.id).then(function (response) {
			growl.error("Data Successfully Deleted");
			$scope.close();
        });
    }
});	
app.controller('AppCrimeReportVictimsModalController', function ($rootScope,$scope, $http, $q, $location, $filter, svcCrimeReportVictims,growl,$uibModal,dataId,$uibModalInstance) {
	$scope.id = dataId;
	$scope.close = function(){
		$uibModalInstance.dismiss();
	}
	$scope.delete = function () {
		svcCrimeReportVictims.Delete($scope.id).then(function (response) {
			growl.error("Data Successfully Deleted");
			$scope.close();
        });
    }
});	