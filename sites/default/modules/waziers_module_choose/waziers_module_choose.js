'use strict';

(function ($) {

    $(document).ready(function () {

        $('.button-choose').click(
            function () {
                $.ajax({
                    type: 'POST',
                    url: Drupal.settings.basePath + 'node/' + $(this).data('nid') + '/choose',
                    dataType: 'json',
                    success: my_module_example,
                    data: { 'waziersChoice' : 'take' }
                });
            }
        );

        $('.button-leave').click(
            function () {
                $.ajax({
                    type: 'POST',
                    url: Drupal.settings.basePath + 'node/' + $(this).data('nid') + '/choose',
                    dataType: 'json',
                    success: my_module_example,
                    data: { 'waziersChoice' : 'leave' }
                });
            }
        );

        // ajax return
        var my_module_example = function (data) {
            location.reload();
        };


    });
})(jQuery);
