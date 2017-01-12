/**
 * Created by Fidesio on 26/04/2016.
 */

(function () {
    var coreModule = angular.module('coreModule');

    coreModule.controller('FurnituresDetailsController', ['FurnituresResource', 'furniturePromise', FurnituresDetailsController]);

    function FurnituresDetailsController(FurnituresResource, furniturePromise) {
        var me = this;

        me.furniture = furniturePromise;

        me.submit = function submit() {

            new FurnituresResource(me.furniture).$save(
                null,
                function (data) {
                    angular.extend(me.furniture, data);
                }, function (data) {
                    console.log('data ok', data);
                }
            )
        };

        console.log('controller', furniturePromise)
    }
})();