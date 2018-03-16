$(function(){

    $('img').on('click', function(){

        // 背景セット
        $('body').append('<div id="back">');
        $('#back').hide();

        // 画像セット
        $('body').append('<div id="enlarged_image">');
        $('#enlarged_image').html('<img>');
        $('#enlarged_image img').attr('src', $(this).attr('src'));
        $('#enlarged_image').hide();

        var imgWidth  = $(this).width();
        var imgHeight = $(this).height();
        var winWidth  = $(window).width();
        var winHeight = $(window).height();

        // 拡大画像のサイズ
        var resizedHeight = winHeight * 0.7;
        var resizedWidth  = resizedHeight * imgWidth / imgHeight;

        // 拡大後画像幅がディスプレイ幅を超えていた場合
        if (resizedWidth > winWidth) {
            for (var i = 6; i > 0; i--) {
                tmpResizedHeight = winHeight * i * 0.1;
                tmpResizedWidth  = tmpResizedHeight * imgWidth / imgHeight;

                if (tmpResizedWidth < winWidth) {
                    resizedHeight = tmpResizedHeight;
                    resizedWidth  = tmpResizedWidth;
                    break;
                }
            }
        }

        // 表示位置を中心にセット
        $('#enlarged_image').css({
            top  : winHeight / 2 - resizedHeight / 2,
            left : winWidth / 2 - resizedWidth / 2
        });

        $('#enlarged_image img').css({
            height : resizedHeight,
            width  : resizedWidth
        });

        $('#back, #enlarged_image').fadeIn();

        $('#back').on('click', function() {
            $(this).fadeOut(function() {
                $(this).remove();
            });

            $('#enlarged_image').fadeOut(function() {
                $(this).remove();
            });
        });

        return false;
    });
});
