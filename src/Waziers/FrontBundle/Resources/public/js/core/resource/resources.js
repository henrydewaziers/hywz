/**
 * Created by Fidesio on 28/10/2015.
 */

(function() {
    var coreModule = angular.module('coreModule');

    coreModule.factory('FurnituresResource', ['$resource', function($resource) {
        return $resource('api/furnitures/:id', { id: '@id' });
    }]);

})();