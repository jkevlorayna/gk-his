app.factory('svcCrimeReportCrimes', function ($rootScope, $http, $q) {
    $this = {
        List: function (searchText,pageNo,pageSize) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: BasePath+'/class/crimereportcrimes?searchText='+searchText+'&pageNo='+pageNo+'&pageSize='+pageSize
            }).success(function (data, status) {
                deferred.resolve(data);
            }).error(function (data, status) {
                deferred.reject(data);
            });
            return deferred.promise;
        },
		GetById: function (id) {
            var deferred = $q.defer();
            $http({
                method: 'GET',
                url: BasePath+'/class/crimereportcrimes/'+id
            }).success(function (data, status) {
                deferred.resolve(data);
            }).error(function (data, status) {
                deferred.reject(data);
            });
            return deferred.promise;
        },
		Delete: function (id) {
            var deferred = $q.defer();
            $http({
                method: 'DELETE',
                url: BasePath+'/class/crimereportcrimes/'+id
            }).success(function (data, status) {
                deferred.resolve(data);
            }).error(function (data, status) {
                deferred.reject(data);
            });
            return deferred.promise;
        }
		,Save: function (postData) {
            var deferred = $q.defer();
            $http({
                method: 'POST',
                url: BasePath+'/class/crimereportcrimes',
                data:postData
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