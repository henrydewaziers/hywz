'use strict';

(function ($) {

    $(document).ready(function () {

        $('.button-valide').click(
            function (event) {
                event.preventDefault();
                var nid =$(this).data('nid'),
                    option = $('select[data-nid="'+nid+'"] option:selected');

                $.ajax({
                    type: 'POST',
                    url: Drupal.settings.basePath + 'node/' + $(this).data('nid') + '/choose',
                    dataType: 'json',
                    success: my_module_example,
                    data: { 'waziersChoice' : option[0].index }
                });
            }
        );

        // $('.button-choose').click(
        //     function () {
        //         $.ajax({
        //             type: 'POST',
        //             url: Drupal.settings.basePath + 'node/' + $(this).data('nid') + '/choose',
        //             dataType: 'json',
        //             success: my_module_example,
        //             data: { 'waziersChoice' : 'take' }
        //         });
        //     }
        // );
        //
        // $('.button-leave').click(
        //     function () {
        //         $.ajax({
        //             type: 'POST',
        //             url: Drupal.settings.basePath + 'node/' + $(this).data('nid') + '/choose',
        //             dataType: 'json',
        //             success: my_module_example,
        //             data: { 'waziersChoice' : 'leave' }
        //         });
        //     }
        // );

        // ajax return
        var my_module_example = function () {
            location.reload();
        };


    });
})(jQuery);
