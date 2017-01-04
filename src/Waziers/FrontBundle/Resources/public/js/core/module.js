(function () {

    var module = angular.module('coreModule', []);

    module.config(['$resourceProvider', function ($resourceProvider) {
        $resourceProvider.defaults.actions = {
            create: {method: 'POST'},
            get:    {method: 'GET'},
            getAll:    {method: 'GET', isArray:true},
            update: {method: 'PUT'},
            delete: {method: 'DELETE'}
        };
    }]);

    module.config(
        ['$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouterProvider) {


            $stateProvider
                .state(
                    {
                        abstract: true,
                        url : '/front/ng',
                        name : 'protected',
                        template : '<div ui-view></div>'
                    }
                )
                .state(
                    {
                        url : '/furnitures',
                        name : 'protected.furnitures',
                        templateUrl : 'front/templates/furnitures.liste.html',
                        controller : 'FurnituresListController as list',
                        resolve: {
                            furnituresPromise: function(FurnituresResource) {
                                return FurnituresResource.getAll().$promise;
                            }
                        }
                    }
                )
                .state(
                    {
                        url : '/:furnitureId',
                        name : 'protected.furnitures.detail',
                        templateUrl : 'front/templates/furnitures.details.html',
                        controller : 'FurnituresDetailsController as details',
                        resolve: {
                            furniturePromise : function ($stateParams, FurnituresResource) {
                                return FurnituresResource.get({id : $stateParams.furnitureId}).$promise;
                            }
                        }
                    }
                );

            $urlRouterProvider.otherwise('/front/ng/furnitures');

        }]
    );
})();