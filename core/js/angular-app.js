﻿var MainFolder = 'sams';
var BasePath = 'core';
var app = angular.module('app', ['ui.router','ui.bootstrap','ngSanitize', 'ui.select','angular-growl','ngCookies','ngAnimate','checklist-model','treasure-overlay-spinner','amChartsDirective']);
app.run(function ($rootScope, $location,$cookieStore,$window,svcLogin) {
   var cookieCheck = $cookieStore.get('credentials');
   

    $rootScope.$on("$stateChangeStart",function() { 
   		svcLogin.auth().then(function (r) {
			if(r == "false"){ 
				$location.path("/login");
			}
		});
    });
   

});
app.config(['$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.otherwise("/login")
    $stateProvider
	    .state('home',
        {
            url: '/',
            templateUrl: "views/home.html",
            controller: "",
        })
        .state('login',
        {
            url: '/login',
            templateUrl: "views/login.html",
            controller: "AppLoginController",
        })
		

		
		
		// household
			.state('household',
			{
				url: '/household',
				templateUrl: "views/household/index.html",
				controller: "",
			})
			.state('household.list',
			{
				url: '/list',
				templateUrl: "views/household/list.html",
				controller: "AppHouseholdController",
			})
			.state('household.form',
			{
				url: '/form/:Id',
				templateUrl: "views/household/form.html",
				controller: "AppHouseholdFormController",
			})
		// end household
		
		
		//user 
			.state('user',
			{
				url: '/user',
				templateUrl: "views/user/index.html",
				controller: "",
			})
			.state('user.list',
			{
				url: '/list',
				templateUrl: "views/user/list.html",
				controller: "AppUserController",
			})
			.state('user.type',
			{
				url: '/type',
				templateUrl: "views/user/type.html",
				controller: "AppUserTypeController",
			})
			.state('user.roles',
			{
				url: '/roles/:UserId',
				templateUrl: "views/user/roles.html",
				controller: "AppUserRoleController",
			})
		// end user

		.state('userType',
        {
            url: '/usertype',
            templateUrl: "views/user_type.html",
            controller: "AppUserTypeController",
        })
		.state('livelihood',
		{
			url: '/livelihood',
			templateUrl: "views/livelihood.html",
			controller: "AppLivelihoodController",
		})
		.state('diagnosis',
		{
			url: '/diagnosis',
			templateUrl: "views/diagnosis.html",
			controller: "AppDiagnosisController",
		})
		.state('employmentStatus',
		{
			url: '/employmentStatus',
			templateUrl: "views/employmentStatus.html",
			controller: "AppEmploymentStatusController",
		})
		.state('educationalAttainment',
		{
			url: '/educationalAttainment',
			templateUrl: "views/educationalAttainment.html",
			controller: "AppEducationalAttainmentController",
		})
		.state('year',
		{
			url: '/year',
			templateUrl: "views/year.html",
			controller: "AppYearController",
		})
		
		.state('setting',
		{
			url: '/setting',
			templateUrl: "views/setting.html",
			controller: "AppSettingController",
		})

		// census
			.state('census',
			{
				url: '/census',
				templateUrl: "views/census/index.html",
				controller: "",
			})
			.state('census.livelihood',
			{
				url: '/livelihood',
				templateUrl: "views/census/livelihood.html",
				controller: "AppCensusLivelihoodController",
			})
			.state('census.gender',
			{
				url: '/gender',
				templateUrl: "views/census/gender.html",
				controller: "AppCensusGenderController",
			})
			.state('census.employmentStatus',
			{
				url: '/employmentStatus',
				templateUrl: "views/census/employmentStatus.html",
				controller: "AppCensusEmploymentStatusController",
			})
			.state('census.age',
			{
				url: '/age',
				templateUrl: "views/census/age.html",
				controller: "",
			})
			.state('census.member',
			{
				url: '/member',
				templateUrl: "views/census/member.html",
				controller: "AppMemberController",
			})
		// end census
		

}]);
app.config(['growlProvider', function(growlProvider) {
  growlProvider.globalTimeToLive(5000);
  growlProvider.globalDisableCountDown(true);
}]);