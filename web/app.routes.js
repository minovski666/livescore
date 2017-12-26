'use strict';
//app.config(function ($routeProvider, $locationProvider) {
//    $locationProvider.html5Mode(false).hashPrefix('');
//    $routeProvider
//            .when("/", {
//                templateUrl: "components/home/homeView.html",
//                controller: 'homeController'
//            })
//            .when("/admin", {
//                templateUrl: "components/admin/adminView.html",
//                controller: 'adminController'
//            })
//            .when("/admin/countries", {
//                templateUrl: "components/admin/partials/countries.html",
//                controller: 'adminController'
//            })
//            .when("/admin/leagues", {
//                templateUrl: "components/admin/partials/leagues.html",
//                controller: 'adminController'
//            })
//            .when("/admin/matches", {
//                templateUrl: "components/admin/partials/matches.html",
//                controller: 'adminController'
//            });
//
//});

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/home');

    $stateProvider
            .state('home', {
                url: '/home',
                views: {
                    'content@': {
                        templateUrl: 'components/home/homeView.html',
                        controller: 'homeController'
                    }
                }
            })
            .state('matches', {
                url: '/matches',
                views: {
                    'content@': {
                        templateUrl: 'components/matches/matchesView.html',
                        controller: 'homeController'
                    }
                }
            })
            .state('admin', {
                url: '/admin',
                redirectTo: 'admin.dashboard',
                views: {
                    'content@': {
                        templateUrl: 'components/admin/adminView.html',
                        controller: 'adminController'
                    }
                }
            })
            .state('admin.dashboard', {
                url: '/dashboard',
                views: {
                    'main@admin': {
                        templateUrl: 'components/admin/partials/dashboard.html',
                    }
                }
            })

            .state('admin.countries', {
                url: '/countries',
                views: {
                    'main@admin': {
                        templateUrl: 'components/admin/partials/countries.html',
                    }
                }
            })
            .state('admin.leagues', {
                url: '/leagues',
                views: {
                    'main@admin': {
                        templateUrl: 'components/admin/partials/leagues.html',
                    }
                }
            })
            .state('admin.matches', {
                url: '/matches',
                views: {
                    'main@admin': {
                        templateUrl: 'components/admin/partials/matches.html',
                    }
                }
            });
});
