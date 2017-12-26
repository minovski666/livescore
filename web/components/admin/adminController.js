app.controller('adminController', function ($scope, $filter, $timeout, appService) {

  /*get all matches with initial date filter set for today*/
    $scope.getCountries = function () {
        var getData = appService.getCountries();
        getData.then(function (success) {
            $scope.countries = appService.countires.data;
            //console.log($scope.countries);
        }, function (error) {
            console.log('Error occured.');
        });
        
    };
    
    $scope.getCountries();
  
  
    /*get all matches with initial date filter set for today*/
    $scope.getLeagues = function () {
        var getData = appService.getLeagues();
        getData.then(function (success) {
            $scope.leagues = appService.leagues.data;
            //console.log($scope.leagues);
        }, function (error) {
            console.log('Error occured.');
        });
        
    };
    
    $scope.getLeagues();
    
    /*get all matches with initial date filter set for today*/
    $scope.getMatchesAdmin = function () {
        var getData = appService.getMatchesAdmin();
        getData.then(function (success) {
            $scope.matches_admin = appService.matches_admin.data;
            //console.log($scope.matches_admin);
        }, function (error) {
            console.log('Error occured.');
        });
        
    };
    
    $scope.getMatchesAdmin();
    
    /*get all matches with initial date filter set for today*/
    $scope.getStatistics = function () {
        var getData = appService.getStatistics();
        getData.then(function (success) {
            $scope.matches_admin = appService.statistics.data;
            //console.log($scope.matches_admin);
        }, function (error) {
            console.log('Error occured.');
        });
        
    };
    
    $scope.getStatistics();
  
});


