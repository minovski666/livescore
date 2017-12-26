'use strict';
app.factory("appService", function ($http, $q) {
    var api_url = "includes/api/";

    // interface
    var service = {
        all_matches: [],
        league_matches: [],
        standings: [],
        countries: [],
        leagues: [],
        matches_admin: [],
        statistics: [],
        match:[],
        getAllMatches: getAllMatches,
        getLeagueMatches: getLeagueMatches,
        getStandings: getStandings,
        getCountries: getCountries,
        getLeagues: getLeagues,
        getMatchesAdmin: getMatchesAdmin,
        getStatistics: getStatistics,
        getMatch:getMatch
    };
    return service;

    // implementation
    function getAllMatches(date) {
        var response = $http({
            method: 'GET',
            url: api_url + "get_all_matches.php?match_date=" + date
        }).then(function (success) {
            service.all_matches = success.data;

        }, function (error) {
            //console.log(error);
        });
        return response;
    }

    function getLeagueMatches(league_id) {
        var response = $http({
            method: 'GET',
            url: api_url + "get_league_matches.php?league_id=" + league_id
        }).then(function (success) {
            service.league_matches = success.data;
        }, function (error) {
            //console.log(error);
        });
        return response;
    }


    function getStandings(league_id) {
        var response = $http({
            method: 'GET',
            url: api_url + "get_standings.php?league_id=" + league_id
        }).then(function (success) {
            service.standings = success.data;
        }, function (error) {
            //console.log(error);
        });
        return response;
    }

    // implementation
    function getCountries() {
        var response = $http({
            method: 'GET',
            url: api_url + "get_countries.php"
        }).then(function (success) {
            service.countires = success.data;

        }, function (error) {
            //console.log(error);
        });
        return response;
    }

    // implementation
    function getLeagues() {
        var response = $http({
            method: 'GET',
            url: api_url + "get_leagues.php"
        }).then(function (success) {
            service.leagues = success.data;

        }, function (error) {
            //console.log(error);
        });
        return response;
    }
    
     function getStatistics(match_id) {
        var response = $http({
            method: 'GET',
            url: api_url + "get_statistics.php?match_id=" + match_id
        }).then(function (success) {
            service.statistics = success.data;
        }, function (error) {
            //console.log(error);
        });
        return response;
    }

    function getMatch(match_id) {
        var response = $http({
            method: 'GET',
            url: api_url + "get_match.php?match_id=" + match_id
        }).then(function (success) {
            service.match = success.data;
        }, function (error) {
            //console.log(error);
        });
        return response;
    }




    function getMatchesAdmin() {
        var response = $http({
            method: 'GET',
            url: api_url + "get_all_matches_admin.php"
        }).then(function (success) {
            service.matches_admin = success.data;

        }, function (error) {
            //console.log(error);
        });
        return response;
    }


});