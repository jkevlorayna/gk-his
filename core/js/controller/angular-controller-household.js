
app.controller('AppHouseholdController', function ($scope, $http, $q, $location, svcHouseHold,growl,$uibModal,svcYear,$stateParams) {
	$scope.Year = $stateParams.Year;	
	
	$scope.pageNo = 1;
	$scope.pageSize = 10;
	if($scope.searchText == undefined){
		$scope.searchText = '';
	} 
	
	$scope.load = function(){
				$q.all([svcYear.List('',0,0)]).then(function(r){
					$scope.yearList = r[0].Results;
						$scope.DateFrom = moment($scope.Year).startOf('year').format('YYYY-MM-DD');
						$scope.DateTo = moment($scope.Year).endOf('year').format('YYYY-MM-DD');
						
						svcHouseHold.List($scope.searchText,$scope.pageNo,$scope.pageSize,$scope.DateFrom,$scope.DateTo,'null').then(function (r) {
							$scope.list = r.Results;
							$scope.count = r.Count;
						})
				})
	}			
	$scope.load();	
		
	$scope.changeYear = function(){		
		$location.path("/household/list/"+$scope.Year);
	}			

	
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

app.controller('AppHouseholdFormController', function ($scope, $http, $q, $location, svcHouseHold,svcLivelihood,growl,$uibModal,$stateParams,svcEmploymentStatus,svcEducationalAttainment,svcVillage,svcRelationship) {

	$scope.Id = $stateParams.Id;
	$scope.Year = $stateParams.Year;
	$q.all([svcLivelihood.List('',0,0),svcEmploymentStatus.List('',0,0),svcEducationalAttainment.List('',0,0),svcRelationship.List('',0,0)]).then(function(r){
		$scope.livelihoodList = r[0].Results;
		$scope.employmentStatusList = r[1].Results;
		$scope.educationalAttainmentList = r[2].Results;
		$scope.RelationshipList = r[3].Results;
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
			angular.forEach($scope.formData.MemberList,function(row,index){
				row.DateOfBirth = moment(row.DateOfBirth).toDate();
			})
			$scope.formData.SurveyDate = new Date(r.SurveyDate);
		})	
	}
	
		$scope.calculateAge = function calculateAge(row) { // birthday is a date
			if(row.DateOfBirth != undefined){
				var ageDifMs = Date.now() - row.DateOfBirth.getTime();
				var ageDate = new Date(ageDifMs); // miliseconds from epoch
				row.Age =  Math.abs(ageDate.getUTCFullYear() - 1970);
			}
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
