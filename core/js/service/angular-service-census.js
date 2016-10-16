app.factory('svcCensus', function ($rootScope, $http, $q) {
    $this = {
        Livelihood: function (year) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: BasePath+'/class/census/livelihood?year='+year
            }).success(function (data, status) {
                deferred.resolve(data);
            }).error(function (data, status) {
                deferred.reject(data);
            });
            return deferred.promise;
        },
		Gender: function (year) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: BasePath+'/class/census/gender?year='+year
            }).success(function (data, status) {
                deferred.resolve(data);
            }).error(function (data, status) {
                deferred.reject(data);
            });
            return deferred.promise;
        },
		EmploymentStatus: function (year) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: BasePath+'/class/census/employmentStatus?year='+year
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