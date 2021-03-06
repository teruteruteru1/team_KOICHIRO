
// $(function() {
//     "use strict";
//     var $content = $('.field:last-child');
//     $('.add_btn').on('click', function() {
//         $content.clone(true).appendTo('.parent');
//     });

//     $(document).on('click','.trash_btn', function() {
       
//         $(".field:last-child").remove();
//      });
// });

$(function() {
    "use strict";

    var $content = $('.field:last-child');
    $('.add_btn').on('click', function() {
        $content.clone(true).appendTo('.parent');
        $('.parent input').each(function(i, elem){
            $(elem).attr('name','pic_name'+i);
        })
        $('.parent textarea').each(function(i, elem){
            $(elem).attr('name','comment'+i);
        })
    });

    $(document).on('click','.trash_btn', function() {
        $(this).parents('.field').remove();
            $('.parent input').each(function(i, elem){
                $(elem).attr('name','pic_name'+i);
            })
            $('.parent textarea').each(function(i, elem){
                $(elem).attr('name','comment'+i);
            })
    });
});