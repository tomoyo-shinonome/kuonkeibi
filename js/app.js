jQuery(function($) {
    deSVG('.js-svg', true);
    $.fn.autoKana('#UserName', '#UserFurigana', {katakana:true});

    $('.js-menu').on("click", function() {
        $('.l-header__menu--sp').slideToggle();
        $(this).toggleClass("is-active");
    });

});
$(function(){
    $(".homeAccess__toggle").on("click", function() {
        $(this).next().slideToggle();
    });
});

$(function(){
    $('.kv-slider').slick({ //{}を入れる
        autoplay: true, //「オプション名: 値」の形式で書く
    });
});

jQuery(function() {
    var appear = false;
    var pagetop = $('#page_top');
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {  //100pxスクロールしたら
            if (appear == false) {
                appear = true;
                pagetop.stop().animate({
                    'bottom': '50px' //下から50pxの位置に
                }, 300); //0.3秒かけて現れる
            }
        } else {
            if (appear) {
                appear = false;
                pagetop.stop().animate({
                    'bottom': '-50px' //下から-50pxの位置に
                }, 300); //0.3秒かけて隠れる
            }
        }
    });
    pagetop.click(function () {
        $('body, html').animate({ scrollTop: 0 }, 500); //0.5秒かけてトップへ戻る
        return false;
    });
});

//Contact　Reserve　ボタン
$(function() {
    setTimeout('slideAnim()', 2000); //1秒後に実行
});

function slideAnim() {
    $('.sideContact').addClass('is_show'); //アニメーション用のクラスを追加
}
$(function() {
    $('.sideContact a').hover(
        function(){
            $(this).animate({'marginRight':'140px'},500);
        },
        function () {
            $(this).animate({'marginRight':'0'},500);
        }
    );
});
