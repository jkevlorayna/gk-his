var MainFolder = 'sams';
var BasePath = 'core';
var app = angular.module('app', ['ui.router','ui.bootstrap','ngSanitize', 'ui.select','angular-growl','ngCookies','ngAnimate','checklist-model','treasure-overlay-spinner','amChartsDirective','tableSort']);
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
        .state('login',
        {
            url: '/login',
            templateUrl: "views/login.html",
            controller: "AppLoginController",
        })
		
	    .state('home',
        {
            url: '/home/:Year/:Village',
            templateUrl: "views/home.html",
            controller: "AppHomeController",
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
				url: '/list/:Year',
				templateUrl: "views/household/list.html",
				controller: "AppHouseholdController",
			})
			.state('household.form',
			{
				url: '/:Year/form/:Id',
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
		.state('village',
		{
			url: '/village',
			templateUrl: "views/village.html",
			controller: "AppVillageController",
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
		.state('crime',
		{
			url: '/crime',
			templateUrl: "views/crime.html",
			controller: "AppCrimeController",
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
				url: '/livelihood/:Year',
				templateUrl: "views/census/livelihood.html",
				controller: "AppCensusLivelihoodController",
			})
			.state('census.village',
			{
				url: '/village/:Year',
				templateUrl: "views/census/village.html",
				controller: "AppCensusVillageController",
			})
			.state('census.gender',
			{
				url: '/gender/:Year',
				templateUrl: "views/census/gender.html",
				controller: "AppCensusGenderController",
			})
			.state('census.employmentStatus',
			{
				url: '/employmentStatus/:Year',
				templateUrl: "views/census/employmentStatus.html",
				controller: "AppCensusEmploymentStatusController",
			})
			.state('census.educationalAttainment',
			{
				url: '/educationalAttainment/:Year',
				templateUrl: "views/census/educationalAttainment.html",
				controller: "AppCensusEducationalAttainmentController",
			})
			.state('census.populationGrowth',
			{
				url: '/populationGrowth/:Year',
				templateUrl: "views/census/populationGrowth.html",
				controller: "AppCensusPopulationGrowthController",
			})
			.state('census.age',
			{
				url: '/age/:Year',
				templateUrl: "views/census/age.html",
				controller: "AppCensusAgeController",
			})
			.state('census.crime',
			{
				url: '/crime/:Year',
				templateUrl: "views/census/crime.html",
				controller: "AppCensusCrimeController",
			})
			.state('census.member',
			{
				url: '/member',
				templateUrl: "views/census/member.html",
				controller: "AppMemberController",
			})
		// end census
		
		// crime report
		.state('crimeReport',
		{
			url: '/crime/report',
			templateUrl: "views/crime/index.html",
			controller: "",
		})
		.state('crimeReport.list',
		{
			url: '/list/:Year',
			templateUrl: "views/crime/list.html",
			controller: "CrimeReportController",
		})
		.state('crimeReport.form',
		{
			url: '/:Year/form/:Id',
			templateUrl: "views/crime/form.html",
			controller: "CrimeReportFormController",
		})
		// end crime report
		

}]);
app.config(['growlProvider', function(growlProvider) {
  growlProvider.globalTimeToLive(5000);
  growlProvider.globalDisableCountDown(true);
}]);