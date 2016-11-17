
app.controller('AppHouseholdController', function ($scope, $http, $q, $location, svcHouseHold,growl,$uibModal) {
		$scope.pageNo = 1;
		$scope.pageSize = 10;
		if($scope.searchText == undefined){
			$scope.searchText = '';
		} 
		
    $scope.load = function () {
		svcHouseHold.List($scope.searchText,$scope.pageNo,$scope.pageSize).then(function (r) {
            $scope.list = r.Results;
            $scope.count = r.Count;
        })
    }
    $scope.load();
	
	$scope.pageChanged = function () { $scope.load();}
	

	$scope.openDeleteModal = function (size,id) {
			var modal = $uibModal.open({
			templateUrl: 'views/deletemodal/deleteModal.html',
			controller: 'AppHouseholdModalController',
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
app.controller('AppHouseholdModalController', function ($rootScope,$scope, $http, $q, $location, $filter, svcHouseHold,growl,$uibModal,dataId,$uibModalInstance) {
	$scope.id = dataId;
	$scope.close = function(){
		$uibModalInstance.dismiss();
	}
	$scope.delete = function () {
		svcHouseHold.Delete($scope.id).then(function (response) {
			growl.error("Data Successfully Deleted");
			$scope.close();
        }, function (error) {

        });
    }
});	

app.controller('AppHouseholdFormController', function ($scope, $http, $q, $location, svcHouseHold,svcLivelihood,growl,$uibModal,$stateParams,svcEmploymentStatus,svcEducationalAttainment,svcVillage) {

	$scope.Id = $stateParams.Id;
	$q.all([svcLivelihood.List('',0,0),svcEmploymentStatus.List('',0,0),svcEducationalAttainment.List('',0,0)]).then(function(r){
		$scope.livelihoodList = r[0].Results;
		$scope.employmentStatusList = r[1].Results;
		$scope.educationalAttainmentList = r[2].Results;
	})
	
	$scope.SearchVillage = function(search){
		return svcVillage.List(search,0,0).then(function(r){
			return r.Results.map(function(item){
				return item.Name;
			});
		})
	}


	$scope.getById = function(){
		svcHouseHold.GetById($scope.Id).then(function(r){
			$scope.formData = r;
			$scope.formData.SurveyDate = new Date(r.SurveyDate);
		})	
	}
	if($scope.Id == 0){
		$scope.formData = { SurveyDate: new Date() }
		$scope.formData.MemberList = [];
	}else{
		$scope.getById();	
	}

	$scope.PageTitle = $scope.Id == 0 ? 'Add New Household': 'Update Household Record' ;
	$scope.save = function(){
		svcHouseHold.Save($scope.formData).then(function (r) {
			growl.success("Data Successfully Saved!");
        })	
	}

	$scope.addMember = function(){
		$scope.formData.MemberList.push({});
	}
	
	
		$scope.openDeleteModal = function (size,id) {
			var modal = $uibModal.open({
			templateUrl: 'views/deletemodal/deleteModal.html',
			controller: 'AppHouseholdFormModalController',
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
app.controller('AppHouseholdFormModalController', function ($rootScope,$scope, $http, $q, $location, $filter, svcMember,growl,$uibModal,dataId,$uibModalInstance) {
	$scope.id = dataId;
	$scope.close = function(){
		$uibModalInstance.dismiss();
	}
	$scope.delete = function () {
		svcMember.deleteData($scope.id).then(function (response) {
			growl.error("Data Successfully Deleted");
			$scope.close();
        });
    }
});	
