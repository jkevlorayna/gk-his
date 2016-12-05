
app.controller('AppMainController', function ($rootScope,$scope, $http, $q, $location, $filter,svcYear, $window,$cookieStore,$uibModal,svcLogin,svcMemberType,svcSetting) {
     $scope.cookieCheck = $cookieStore.get('credentials');
	$scope.spinner = { Active:false }
	
	if($scope.cookieCheck == undefined){
		$scope.session = { userData:{} , isAuthenticated: false,  loading: false };
	}else{
		$scope.session = { userData:$scope.cookieCheck , isAuthenticated: true,  loading: false };
	}

	$scope.loadYear = function(){
		svcYear.List('',0,0).then(function(r){
			$scope.yearList = r.Results;
			$scope.Year = $scope.yearList[0].Year;
		})
	}
	$scope.loadYear();
	
   $scope.init = function (isAuthenticated) {
         $scope.session.isAuthenticated = isAuthenticated;
		 if (!$scope.session.isAuthenticated) { 
			 $location.path("/");
		 } 
    }

	$scope.logout = function(){
		svcLogin.logout($scope.formData).then(function (r) {
				$scope.session = { userData:{} , isAuthenticated: false,  loading: false };
				$cookieStore.remove('credentials');
				$location.path("/login"); 
		});
	}

	
	$scope.passwordModal = function (size,id,user) {
			var modal = $uibModal.open({
			templateUrl: 'views/changePassword/modal.html',
			controller: 'AppChangePasswordModalController',
			size: size,
			resolve: {
				Id: function () {
					return id;
				},user:function(){
					return user;
				}
			}
			});
			modal.result.then(function () { }, function () { 
				
			});
	};
	

	$rootScope.PrintReport = function(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var popupWin = window.open('', '_blank', 'width=700,height=700');
		popupWin.document.open();
		popupWin.document.write('<html><head><link rel="stylesheet" type="text/css" href="core/css/print.css" /></head><body onload="window.print()">' + printContents + '</body></html>');
		popupWin.document.close();
	} 

});


app.controller('AppChangePasswordModalController', function ( $scope, $http, $q, $location, $uibModalInstance , Id , user , svcLogin,growl ) {
	$scope.close = function(){ $uibModalInstance.dismiss(); }
	$scope.Id = Id;
	$scope.user = user;
});

app.controller('AppLoginController', function ( $scope, $http, $q, $location, svcLogin,$cookieStore,$window ,growl,svcYear) {
	$scope.loadYear = function(){
		svcYear.List('',0,0).then(function(r){
			$scope.yearList = r.Results;
			$scope.Year = $scope.yearList[0].Year;
		})
	}
	$scope.loadYear();
	
		$scope.formData = {};
		$scope.login = function(){
				svcLogin.loginUser($scope.formData).then(function (r) {
					
					if(r.granted == 'true'){
						$cookieStore.put('credentials', r.Results);
						$scope.cookieCheck = $cookieStore.get('credentials');
				     	$scope.session.userData.name = $scope.cookieCheck.name;
				     	$scope.session.isAuthenticated = true;
						$scope.spinner.active = true;
						if($scope.session.userData.name != null){
							growl.success("Access Granted");
							$location.path('/home/'+$scope.Year);
							console.log("123");
							$scope.spinner.active = false;
						}
					}else{
						growl.error("Login Failed. Please Check your username and Password");
						$scope.session.isAuthenticated = false;
					}

				}) 
		}
});
