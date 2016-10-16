
app.controller('AppMemberController', function ($scope, $http, $q, $filter, svcMember,svcMemberType,growl,$uibModal,$stateParams ) {
		$scope.pageNo = 1;
		$scope.pageSize = 10;
		if($scope.searchText == undefined){ $scope.searchText = ''; }
		
    $scope.load = function () {
		$scope.spinner.active = true;
		svcMember.list($scope.searchText,$scope.pageNo,$scope.pageSize).then(function (r) {
            $scope.list = r.Results;
            $scope.count = r.Count;
			$scope.spinner.active = false;
        })
    }
    $scope.load();
	
		

	
	$scope.pageChanged = function () { $scope.load(); }
	
	

	
	$scope.openDeleteModal = function (size,id) {
			var modal = $uibModal.open({
			templateUrl: 'views/deletemodal/deleteModal.html',
			controller: 'AppMemberModalController',
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

	$scope.formModal = function (size,id) {
			var modal = $uibModal.open({
			templateUrl: 'views/census/memberForm.html',
			controller: 'AppMemberFormModalController',
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
app.controller('AppMemberModalController', function ($rootScope,$scope, $http, $q,  $filter, svcMember,growl,$uibModal,dataId,$uibModalInstance) {
	$scope.id = dataId;
	$scope.close = function(){
		$uibModalInstance.dismiss();
	}
	$scope.delete = function () {
		svcMember.deleteData($scope.id).then(function (response) {
			growl.error("Data Successfully Deleted");
			$scope.close();
        }, function (error) {

        });
    }
});	

app.controller('AppMemberFormModalController', function ($rootScope,$scope, $http, $q, $filter, svcMember,growl,$uibModal,dataId,$uibModalInstance,svcEmploymentStatus,svcEducationalAttainment) {
	$scope.Id = dataId;
	$scope.close = function(){
		$uibModalInstance.dismiss();
	}
	$q.all([svcEmploymentStatus.List('',0,0),svcEducationalAttainment.List('',0,0)]).then(function(r){
		$scope.employmentStatusList = r[0].Results;
		$scope.educationalAttainmentList = r[1].Results;
	})
	
	$scope.Save = function(){
			svcMember.save($scope.formData).then(function(r){
				growl.success("Data Successfully Saved");
				$scope.close();
			})
	}
	$scope.getById = function(){
			svcMember.getById($scope.Id).then(function(r){
				$scope.formData = r;
			})
	}
	$scope.getById();
	
});	