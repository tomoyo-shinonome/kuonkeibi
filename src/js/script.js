window.addEventListener("scroll", function(){
    var header = document.querySelector(".l-header__wrap");
    header.classList.toggle("is-scroll", window.scrollY > 0)
});

$(window).on("scroll", function(){
    $(".l-header__wrap").css("left", -$(window).scrollLeft());
});

jQuery(function() {
    $('.js-menu').on('click', function () {
        $(this).toggleClass('is-active close');
        $(".js-overlay").toggleClass('is-active');
        if($(this).hasClass('is-active')){
            $('body,html').css({'overflow':'hidden'});
        } else {
            $('body,html').css({'overflow':'visible'});
        }
    });

    $('.js-overlay a').on('click', function () {
        $('.js-overlay').toggleClass('is-active');
        $(".js-menu").toggleClass('is-active');
    });
});

//accordion
$(function() {
    $(".js-showMore").click(function() {
        var show_text = $(this).parent(".accordion__wrap").find(".js-accordion");
        var small_height = 320; //This is initial height.
        var original_height = show_text.css({ height: "auto" }).height();

        if (show_text.hasClass('is-open')) {
            /*CLOSE*/
            show_text.height(original_height).animate({
                height: small_height
            }, 300);
            show_text.removeClass('is-open');
            $(this).removeClass('is-active');
        } else {
            /*OPEN*/
            show_text.height(small_height).animate({
                height: original_height
            }, 300, function() {
                show_text.height('auto');
            });
            show_text.addClass('is-open');
            $(this).addClass('is-active');
        }
    });
});

//tab
jQuery('.globalApplication__tab .js-tabTitle').click(function() {
    var index = $('.globalApplication__tab .js-tabTitle').index(this);
    $('.js-tabTitle, .js-tabItem').removeClass('is-active');
    $(this).addClass('is-active');
    $('.globalApplication__tab .js-tabItem').eq(index).addClass('is-active');
});

jQuery(function () {
    var headerHight = $("header").height();

    $('a[href^="#"]').click(function(e) {
        var href = $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top - headerHight;

        $.when(
            $("html, body").animate({
                scrollTop: position
            }, 300, "swing"),
            e.preventDefault(),
        ).done(function() {
            var diff = target.offset().top - headerHight;
            if (diff === position) {
            } else {
                $("html, body").animate({
                    scrollTop: diff
                }, 10, "swing");
            }
        });
    });
});

//slick
$(function () {
    var $js_slide = $('.js-slide');

    /*--- 連動サムネイル（ドット）設定 -----------------------*/
    // スライダー初期化時
    $js_slide.on('init', function (event, slick, currentSlide, nextSlide) {
        // スライドアイテム取得
        slideItem = $('.js-slide .slick-slide')
        // スライドの数だけループ
        for (var i = 0; i < slick.slideCount; i++) {
            // ループ回数をキーにn番目のスライドを取得
            var slideImg = slideItem.filter(function () {
                return $(this).data('slick-index') === i;
            }).find('img').clone();
            // n番目のドットを取得
            var dot = $('.thumbs_list').find("li").eq(i);
            // n番目のスライド画像のURLを取得
            var src = slideImg.attr('src');
            // n番目のドットにn番目のスライド画像を背景に当て込み
            dot.css('background', "url(".concat(src, ")"));
            // 背景の表示の仕方を指定
            dot.css('background-size', 'cover');
        }
    });

    $js_slide.slick({
        arrows: false, // 前・次のボタンを表示しない
        dots: true, // ドットナビゲーションを表示する
        dotsClass: 'thumbs_list', // ドットのクラス名を変更
        appendDots: $('.thumbs-dots'), // ドットの生成位置を変更
        customPaging: function (slick, index) { // ドットの中身を空にする
            return '';
        },
        fade: true, // スライド切り替えをフェード
        autoplay: false, //自動再生させない
        slidesToShow: 1, // 表示させるスライド数
    });

});

//pageTop
jQuery(function() {
    var appear = false;
    var pagetop = $('#pageTop');
    pagetop.click(function () {
        $('body, html').animate({ scrollTop: 0 }, 500); //0.5秒かけてトップへ戻る
        return false;
    });
});

//Contact_button
$(function() {
    setTimeout('slideAnim()', 2000); //1秒後に実行
});

function slideAnim() {
    $('.c-buttonCta__contact').addClass('is_show'); //アニメーション用のクラスを追加
    $('.c-buttonCta__line').addClass('is_show');
}
$(function() {
    $('.c-buttonCta__contact a').hover(
        function(){
            $(this).animate({'marginRight':'140px'},500);
        },
        function () {
            $(this).animate({'marginRight':'0'},500);
        }
    );
    $('.c-buttonCta__line a').hover(
        function(){
            $(this).animate({'marginRight':'140px'},500);
        },
        function () {
            $(this).animate({'marginRight':'0'},500);
        }
    );
});
