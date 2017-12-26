app.controller('homeController', function ($scope, $filter, $timeout, appService) {

    /*tabs and subtabs for the modal*/
    $scope.activeMainTab = 'all';
    $scope.switchMainTab = function (mainTab) {
        $scope.activeMainTab = mainTab;
        $scope.activeStandings = false;

    };

    $scope.activeTab = 'overall';
    $scope.switchTab = function (tabname) {
        $scope.activeTab = tabname;
    };



    $scope.filterDay = $filter('date')(new Date, "yyyy-MM-dd");//today's date

    /*get all matches with initial date filter set for today*/
    $scope.getAllMatches = function () {
        var getData = appService.getAllMatches($scope.filterDay);
        getData.then(function (success) {
            $scope.matches = appService.all_matches.data;
            //console.log($scope.matches);
        }, function (error) {
            console.log('Error occured.');
        });
    };
    $scope.getAllMatches();

    /*filter functon for filtering all matches by selected date*/
    $scope.selectDate = function () {
        $scope.date = $scope.filterCondition.key;

        var getData = appService.getAllMatches($scope.date);
        getData.then(function (success) {
            $scope.matches = appService.all_matches.data;
            //console.log($scope.matches);
        }, function (error) {
            console.log('Error occured.');
        });
    };


    /*creating array of dates (5 days before today, 5 days after today)*/
    $scope.today = new Date();//to be used in baseDate
    $scope.baseDate = $scope.today.setDate($scope.today.getDate() - 5);
    $scope.selectedDate = $filter('date')(new Date, "yyyy-MM-dd");

    $scope.filterCondition = {
        key: $scope.selectedDate,
        value: $scope.selectedDate
    };

    var date = new Date($scope.baseDate),
            d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear();

    $scope.datesArray = [];
    for (i = 0; i <= 10; i++) {
        var curdate = new Date(y, m, d + i);


        $scope.current_date = $filter('date')(curdate, "yyyy-MM-dd");
        $scope.today_date = $filter('date')(new Date, "yyyy-MM-dd");

        if ($scope.current_date === $scope.today_date) {

            $scope.datesArray.push({'key': $filter('date')(curdate, "yyyy-MM-dd"), 'value': 'Today'});

        } else {
            $scope.datesArray.push({'key': $filter('date')(curdate, "yyyy-MM-dd"), 'value': $filter('date')(curdate, "yyyy-MM-dd")});

        }
    }
    ;

    $scope.activeStandings = false;
    $scope.getLeagueData = function (league_id) {
        $scope.activeMainTab = 'all';
        /*get selected league data*/
        var getMatches = appService.getLeagueMatches(league_id);
        getMatches.then(function (success) {
            $scope.activeStandings = false;
            $scope.league_matches = appService.league_matches.data;
            //console.log($scope.league_matches);
        }, function (error) {
            console.log('Error occured.');
        });


    };


    $scope.activateStandings = function (league_id) {
        /*get selected league standings*/
        var getStandings = appService.getStandings(league_id);
        getStandings.then(function (success) {
            $scope.standings = appService.standings.data;
            $timeout(function () {
                $scope.activeStandings = true;
            }, 500);
            //console.log($scope.standings);
        }, function (error) {
            console.log('Error occured.');
        });
    };

    $scope.normalizeMixedDataValue = function (value) {
        var padding = "000000000000000";
        // Loop over all numeric values in the string and
        // replace them with a value of a fixed-width for
        // both leading (integer) and trailing (decimal)
        // padded zeroes.
        value = value.replace(
                /(\d+)((\.\d+)+)?/g,
                function ($0, integer, decimal, $3) {
                    // If this numeric value has "multiple"
                    // decimal portions, then the complexity
                    // is too high for this simple approach -
                    // just return the padded integer.
                    if (decimal !== $3) {
                        return(
                                padding.slice(integer.length) +
                                integer +
                                decimal
                                );
                    }
                    decimal = (decimal || ".0");
                    return(
                            padding.slice(integer.length) +
                            integer +
                            decimal +
                            padding.slice(decimal.length)
                            );
                }
        );
        //console.log(value);
        return(value);
    }
    ;

    $scope.sort = function (data) {
        data.sort(
                function (a, b) {
                    var aMixed = $scope.normalizeMixedDataValue(a.time);
                    var bMixed = $scope.normalizeMixedDataValue(b.time);
                    return(aMixed < bMixed ? -1 : 1);
                }
        );
    };



    $scope.activateStatistics = function (match_id) {
        // console.log(match_id);
        var getStatistics = appService.getStatistics(match_id);
        getStatistics.then(function (success) {
            $scope.statistics = $filter('orderBy')(appService.statistics.data, 'time');
            $scope.sort($scope.statistics);
            // console.log($scope.statistics);
        }, function (error) {
            console.log('Error occured.');
        });
        var getMatch = appService.getMatch(match_id);
        getMatch.then(function (success) {
            $scope.match = appService.match.data;
            // console.log($scope.match);
        }, function (error) {
            console.log('Error occured.');
        });



    };



    // for the modal
    $scope.league_active = false;
    $scope.statistics_active = false;
    $scope.toggleModal = function (modal) {
        switch (modal) {
            case 'league':
                $timeout(function () {
                    $scope.league_active = !$scope.league_active;
                }, 100);
                break;
            case 'statistics':
                $timeout(function () {
                    $scope.statistics_active = !$scope.statistics_active;
                }, 200);
                break;
            default:
                return;
        }

    };

    $scope.closeModal = function (modal) {

        switch (modal) {
            case 'league':
                $scope.league_active = false;
                break;
            case 'statistics':
                $scope.statistics_active = false;
                break;
            default:
                return;
        }
    };
    

});


