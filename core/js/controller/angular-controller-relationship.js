﻿
app.controller('AppRelationshipController', function ($scope, $http, $q, $location, svcRelationship,growl,$uibModal) {
		$scope.pageNo = 1;
		$scope.pageSize = 10;
		if($scope.searchText == undefined){
			$scope.searchText = '';
		} 
		
    $scope.load = function () {
			$scope.spinner.Active = true;
		svcRelationship.List($scope.searchText,$scope.pageNo,$scope.pageSize).then(function (r) {
            $scope.list = r.Results;
            $scope.count = r.Count;
		
        })
    }
    $scope.load();
	
	$scope.pageChanged = function () { $scope.load();}
	

	$scope.formData = {  }
	$scope.save = function () {
		svcRelationship.Save($scope.formData).then(function (r) {
			$scope.load();
			growl.success("Data Successfully Save");
			$scope.formData = {  }
        });
    }
	
	$scope.getById = function (id) {
		svcRelationship.GetById(id).then(function (r) {
			$scope.formData =  r;
        });
    }
	
	$scope.openDeleteModal = function (size,id) {
			var modal = $uibModal.open({
			templateUrl: 'views/deletemodal/deleteModal.html',
			controller: 'AppRelationshipModalController',
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
app.controller('AppRelationshipModalController', function ($rootScope,$scope, $http, $q, $location, $filter, svcRelationship,growl,$uibModal,dataId,$uibModalInstance) {
	$scope.id = dataId;
	$scope.close = function(){
		$uibModalInstance.dismiss();
	}
	$scope.delete = function () {
		svcRelationship.Delete($scope.id).then(function (response) {
			growl.error("Data Successfully Deleted");
			$scope.close();
        });
    }
});	
