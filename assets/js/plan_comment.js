
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
        $('.parent pic_name').each(function(i, elem){
            $(elem).attr('name','pic_name'+i);
        })
        $('.parent textarea').each(function(i, elem){
            $(elem).attr('name','content'+i);
        })
    });

    $(document).on('click','.trash_btn', function() {
        $(this).parents('.field').remove();
              $('.parent textarea').each(function(i, elem){
                  $(elem).attr('name','content'+i);
        })
    });
});