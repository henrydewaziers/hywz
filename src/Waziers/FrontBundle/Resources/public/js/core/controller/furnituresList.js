/**
 * Created by Fidesio on 26/04/2016.
 */

(function() {
    var coreModule = angular.module('coreModule');

    coreModule.controller('FurnituresListController', ['furnituresPromise', FurnituresListController]);

    function FurnituresListController(furnituresPromise) {
        var me = this;

        me.furnitures = furnituresPromise;
    }
})();