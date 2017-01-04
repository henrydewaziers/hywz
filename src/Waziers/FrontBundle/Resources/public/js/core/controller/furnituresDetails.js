/**
 * Created by Fidesio on 26/04/2016.
 */

(function() {
    var coreModule = angular.module('coreModule');

    coreModule.controller('FurnituresDetailsController', ['furniturePromise', FurnituresDetailsController]);

    function FurnituresDetailsController(furniturePromise) {
        var me = this;

        me.furniture = furniturePromise;

        console.log('controller', furniturePromise)
    }
})();