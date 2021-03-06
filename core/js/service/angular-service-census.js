app.factory('svcCensus', function ($rootScope, $http, $q) {
    $this = {
		 Crime: function (DateFrom,DateTo) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: BasePath+'/class/census/crime?DateFrom='+DateFrom + '&DateTo='+DateTo
            }).success(function (data, status) {
                deferred.resolve(data);
            }).error(function (data, status) {
                deferred.reject(data);
            });
            return deferred.promise;
        },
		 Village: function (DateFrom,DateTo,Village) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: BasePath+'/class/census/village?DateFrom='+DateFrom + '&DateTo='+DateTo + '&Village='+Village
            }).success(function (data, status) {
                deferred.resolve(data);
            }).error(function (data, status) {
                deferred.reject(data);
            });
            return deferred.promise;
        },
        Livelihood: function (DateFrom,DateTo,Village) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: BasePath+'/class/census/livelihood?DateFrom='+DateFrom + '&DateTo='+DateTo + '&Village='+Village
            }).success(function (data, status) {
                deferred.resolve(data);
            }).error(function (data, status) {
                deferred.reject(data);
            });
            return deferred.promise;
        },
		Gender: function (DateFrom,DateTo,Village) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: BasePath+'/class/census/gender?DateFrom='+DateFrom + '&DateTo='+DateTo + '&Village='+Village
            }).success(function (data, status) {
                deferred.resolve(data);
            }).error(function (data, status) {
                deferred.reject(data);
            });
            return deferred.promise;
        },
		EmploymentStatus: function (DateFrom,DateTo,Village) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: BasePath+'/class/census/employmentStatus?DateFrom='+DateFrom + '&DateTo='+DateTo + '&Village='+Village
            }).success(function (data, status) {
                deferred.resolve(data);
            }).error(function (data, status) {
                deferred.reject(data);
            });
            return deferred.promise;
        },EducationalAttainment: function (DateFrom,DateTo,Village) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: BasePath+'/class/census/educationalAttainment?DateFrom='+DateFrom + '&DateTo='+DateTo + '&Village='+Village
            }).success(function (data, status) {
                deferred.resolve(data);
            }).error(function (data, status) {
                deferred.reject(data);
            });
            return deferred.promise;
        }
		,Age: function (DateFrom,DateTo) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: BasePath+'/class/census/age?DateFrom='+DateFrom + '&DateTo='+DateTo
            }).success(function (data, status) {
                deferred.resolve(data);
            }).error(function (data, status) {
                deferred.reject(data);
            });
            return deferred.promise;
        }
		,PopulationGrowth: function (DateFrom,DateTo) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: BasePath+'/class/census/populationGrowth?DateFrom='+DateFrom + '&DateTo='+DateTo
            }).success(function (data, status) {
                deferred.resolve(data);
            }).error(function (data, status) {
                deferred.reject(data);
            });
            return deferred.promise;
        }
    };
    return $this;
});