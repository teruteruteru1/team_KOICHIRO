
        $(function() {
            "use strict";
            var $content = $('.field:last-child');
            $('.add_btn').on('click', function() {
                $content.clone(true).appendTo('.parent');
            });

            $(document).on('click','.trash_btn', function() {
               
                $(".field:last-child").remove();
             });
        });
    