﻿
app.controller('AppEducationalAttainmentController', function ($scope, $http, $q, $location, svcEducationalAttainment,growl,$uibModal) {
	$scope.pageNo = 1;
	$scope.pageSize = 10;
	if($scope.searchText == undefined){ $scope.searchText = ''; } 
		
    $scope.load = function () {
			$scope.spinner.Active = true;
		svcEducationalAttainment.List($scope.searchText,$scope.pageNo,$scope.pageSize).then(function (r) {
            $scope.list = r.Results;
            $scope.count = r.Count;
			$scope.spinner.Active = false;
        })
    }
    $scope.load();
	
	$scope.pageChanged = function () { $scope.load();}
	

	$scope.formData = {  }
	$scope.save = function () {
		$scope.spinner.Active = true;
		svcEducationalAttainment.Save($scope.formData).then(function (r) {
			$scope.load();
			growl.success("Data Successfully Save");
			$scope.formData = {  }
			$scope.spinner.Active = false;
        });
    }
	
	$scope.getById = function (id) {
			$scope.spinner.Active = true;
		svcEducationalAttainment.GetById(id).then(function (r) {
			$scope.formData =  r;
			$scope.spinner.Active = false;
        });
    }
	
	$scope.openDeleteModal = function (size,id) {
			var modal = $uibModal.open({
			templateUrl: 'views/deletemodal/deleteModal.html',
			controller: 'AppEducationalAttainmentModalController',
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
app.controller('AppEducationalAttainmentModalController', function ($rootScope,$scope, $http, $q, $location, $filter, svcEducationalAttainment,growl,$uibModal,dataId,$uibModalInstance) {
	$scope.id = dataId;
	$scope.close = function(){
		$uibModalInstance.dismiss();
	}
	$scope.delete = function () {
		svcEducationalAttainment.Delete($scope.id).then(function (response) {
			growl.error("Data Successfully Deleted");
			$scope.close();
        });
    }
});	
