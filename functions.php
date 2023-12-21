<?php

//スタイルシート・js読み込み
function add_files() {
    //google fonts
    wp_enqueue_style(
    //google font css
        'google-font-style',
        '//fonts.googleapis.com/css2?family=Jost:wght@300;700&amp;family=Noto+Sans+JP:wght@300;700&amp;display=swap',
        array()
    );

    //基本のスタイル
    wp_enqueue_style(
    //style.css
        'base-style',
        get_template_directory_uri().'/css/style.min.css',
        array()
    );

    wp_enqueue_style(
    //slick.css
        'slick-style',
        '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',
        array()
    );

    if(is_front_page()) {
        //トップページのみ
        wp_enqueue_style(
        //home
            'home-style',
            get_template_directory_uri().'/css/home.min.css',
            array()
        );
    } else {
        // トップページ以外
        wp_enqueue_style(
        //global
            'global-style',
            get_template_directory_uri().'/css/global.min.css',
            array()
        );
    }

    if ( !is_admin() ) {
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', array(), '3.5.1');
    }

    wp_enqueue_script(
    //script.js
        'script-js',
        get_template_directory_uri().'/js/script.js',
        array('jquery'),
        '20210512',
        true
    );
    wp_enqueue_script(
    //script.js
        'slick-js',
        '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
        array('jquery'),
        '202310',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'add_files' );



// カテゴリー：削除
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title('', false);
    }
    return $title;
});

//管理画面メニュー名変更
function Change_menulabel() {
    global $menu;
    global $submenu;
    $name = 'お知らせ';
    $menu[5][0] = $name;
    $submenu['edit.php'][5][0] = $name.'一覧';
    $submenu['edit.php'][10][0] = '新しい'.$name;
}
function Change_objectlabel() {
    global $wp_post_types;
    $name = 'お知らせ';
    $labels = &$wp_post_types['post']->labels;
    $labels->name = $name;
    $labels->singular_name = $name;
    $labels->add_new = _x('新しいお知らせを作る', $name);
    $labels->add_new_item = $name.'の新規追加';
    $labels->edit_item = $name.'の編集';
    $labels->new_item = '新規'.$name;
    $labels->view_item = $name.'を表示';
    $labels->search_items = $name.'を検索';
    $labels->not_found = $name.'が見つかりませんでした';
    $labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
}
add_action( 'init', 'Change_objectlabel' );
add_action( 'admin_menu', 'Change_menulabel' );


//タイトルのプレースホルダーを変更
function change_default_title( $title ) {
    $screen = get_current_screen();
    if ( $screen->post_type == 'post' ) {     //投稿
        $title = '記事タイトルを入力';
    }elseif ( $screen->post_type == 'page' ) {     //固定ページ
        $title = '固定ページのタイトルを入力';
    }
    return $title;
}
add_filter( 'enter_title_here', 'change_default_title' );

add_filter( 'enter_title_here', 'custom_enter_title_here', 10, 2 );
function custom_enter_title_here( $enter_title_here, $post ) {
    $post_type = get_post_type_object( $post->post_type );
    if ( isset( $post_type->labels->enter_title_here ) && $post_type->labels->enter_title_here && is_string( $post_type->labels->enter_title_here ) ) {
        $enter_title_here = esc_html( $post_type->labels->enter_title_here );
    }
    return $enter_title_here;
}

// 投稿のアーカイブページを設定
add_filter('register_post_type_args', function($args, $post_type) {
    if ('post' == $post_type) {
        global $wp_rewrite;
        $archive_slug = 'information';
        $args['label'] = 'お知らせ';
        $args['has_archive'] = $archive_slug;
        $archive_slug = $wp_rewrite->root.$archive_slug;
        $feeds = '(' . trim( implode('|', $wp_rewrite->feeds) ) . ')';
        add_rewrite_rule("{$archive_slug}/?$", "index.php?post_type={$post_type}", 'top');
        add_rewrite_rule("{$archive_slug}/feed/{$feeds}/?$", "index.php?post_type={$post_type}".'&feed=$matches[1]', 'top');
        add_rewrite_rule("{$archive_slug}/{$feeds}/?$", "index.php?post_type={$post_type}".'&feed=$matches[1]', 'top');
        add_rewrite_rule("{$archive_slug}/{$wp_rewrite->pagination_base}/([0-9]{1,})/?$", "index.php?post_type={$post_type}".'&paged=$matches[1]', 'top');
    }
    return $args;
}, 10, 2);


//カスタムメニュー
if ( ! function_exists( 'lab_setup' ) ) :

    function lab_setup() {

        register_nav_menus( array(
            'global' => 'グローバルナビ',
            'header' => 'ヘッダーナビ',
            'footer' => 'フッターナビ',
        ) );

    }
endif;
add_action( 'after_setup_theme', 'lab_setup' );

//カスタムメニュー＋ACF
function my_wp_nav_menu_objects( $items, $args ) {
    if (function_exists('get_field')) {
        foreach ($items as &$item) {
            $className = get_field('class');
            $titleEn = get_field('title_en', $item);
            if ($titleEn) {
                $item->title .= '<div class="'.$className.'">'.$titleEn. '</div>';
            }
        }
        return $items;
    }
}

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

//excerpt文字数を変更
function wpdocs_custom_excerpt_length( $length ) {
    return 100;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

// WordPress の投稿スラッグを自動的に生成する
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4 );

// ページネーション
/**
* ページネーション出力関数
* $paged : 現在のページ
* $pages : 全ページ数
* $range : 左右に何ページ表示するか
* $show_only : 1ページしかない時に表示するかどうか
*/
function pagination( $pages, $paged, $range = 2, $show_only = false ) {

    $pages = ( int ) $pages;    //float型で渡ってくるので明示的に int型 へ
    $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように

    //表示テキスト
    $text_first   = "«";
    $text_before  = "‹ Prev";
    $text_next    = "Next ›";
    $text_last    = "»";

    if ( $show_only && $pages === 1 ) {
        // １ページのみで表示設定が true の時
        echo '<div class="pagination"><span class="current pager">1</span></div>';
        return;
    }

    if ( $pages === 1 ) return;    // １ページのみで表示設定もない場合

    if ( 1 !== $pages ) {
        //２ページ以上の時
        echo '<div class="pagination"><span class="page_num">Page ', $paged ,' of ', $pages ,'</span>';
        if ( $paged > $range + 1 ) {
            // 「最初へ」 の表示
            echo '<a href="', get_pagenum_link(1) ,'" class="first">', $text_first ,'</a>';
        }
        if ( $paged > 1 ) {
            // 「前へ」 の表示
            echo '<a href="', get_pagenum_link( $paged - 1 ) ,'" class="prev">', $text_before ,'</a>';
        }
        for ( $i = 1; $i <= $pages; $i++ ) {

            if ( $i <= $paged + $range && $i >= $paged - $range ) {
                // $paged +- $range 以内であればページ番号を出力
                if ( $paged === $i ) {
                    echo '<span class="current pager">', $i ,'</span>';
                } else {
                    echo '<a href="', get_pagenum_link( $i ) ,'" class="pager">', $i ,'</a>';
                }
            }

        }
        if ( $paged < $pages ) {
            // 「次へ」 の表示
            echo '<a href="', get_pagenum_link( $paged + 1 ) ,'" class="next">', $text_next ,'</a>';
        }
        if ( $paged + $range < $pages ) {
            // 「最後へ」 の表示
            echo '<a href="', get_pagenum_link( $pages ) ,'" class="last">', $text_last ,'</a>';
        }
        echo '</div>';
    }
}

// アイキャッチを利用
add_theme_support( 'post-thumbnails' );
add_image_size('category_thumb', 200, 113, true);

//ヘッダーを綺麗に
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles', 10 );

//セルフピンバック禁止
function no_self_pingst( &$links ) {
    $home = home_url();
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_pingst' );

//コンタクトフォームにメールアドレス確認項目追加
add_filter( 'wpcf7_validate_email', 'wpcf7_validate_email_filter_extend', 11, 2 );
add_filter( 'wpcf7_validate_email*', 'wpcf7_validate_email_filter_extend', 11, 2 );
function wpcf7_validate_email_filter_extend( $result, $tag ) {
    $type = $tag['type'];
    $name = $tag['name'];
    $_POST[$name] = trim( strtr( (string) $_POST[$name], "n", " " ) );
    if ( 'email' == $type || 'email*' == $type ) {
        if (preg_match('/(.*)_confirm$/', $name, $matches)){ //確認用メルアド入力フォーム名を ○○○_confirm としています。
            $target_name = $matches[1];
            if ($_POST[$name] != $_POST[$target_name]) {
                if (method_exists($result, 'invalidate')) {
                    $result->invalidate( $tag,"確認用のメールアドレスが一致していません");
                } else {
                    $result['valid'] = false;
                    $result['reason'][$name] = '確認用のメールアドレスが一致していません';
                }
            }
        }
    }
    return $result;
}

// contact form 7　メールアドレス確認
add_filter( 'wpcf7_validate_email', 'wpcf7_validate_email_filter_confrim', 11, 2 );
add_filter( 'wpcf7_validate_email*', 'wpcf7_validate_email_filter_confrim', 11, 2 );
function wpcf7_validate_email_filter_confrim( $result, $tag ) {
    $type = $tag['type'];
    $name = $tag['name'];
    if ( 'email' == $type || 'email*' == $type ) {
        if (preg_match('/(.*)_confirm$/', $name, $matches)){ //確認用メルアド入力フォーム名を ○○○_confirm としています。
            $target_name = $matches[1];
            $posted_value = trim( (string) $_POST[$name] ); //前後空白の削除
            $posted_target_value = trim( (string) $_POST[$target_name] ); //前後空白の削除
            if ($posted_value != $posted_target_value) {
                $result->invalidate( $tag,"確認用のメールアドレスが一致していません");
            }
        }
    }
    return $result;
}

//ログイン画面のロゴ／背景変更
function custom_login_logo() {
    echo '<style type="text/css">
    #login h1 a {
      background: url('.get_template_directory_uri().'/img/img_header_01.png) 50% 50% no-repeat;
      background-size: 100%;
      width: 314px; //ログインの幅
    }
    body{
      background: url('.get_template_directory_uri().'/img/img_homeKv.jpg) no-repeat top center;
      background-size: cover;
    }
  </style>';
}
add_action('login_head', 'custom_login_logo');


// バージョン更新を非表示にする
add_filter('pre_site_transient_update_core', '__return_zero');

// フッターWordPressリンクを非表示に
function custom_admin_footer() {
    echo ' お困りの際は<a href="https://decoru.co.jp/" target="_blank">有限責任事業組合デコル</a>までお気軽にお問い合わせ下さい。TEL:0157-51-2291';
}
add_filter('admin_footer_text', 'custom_admin_footer');

// 管理バーの項目を非表示
function remove_admin_bar_menu( $wp_admin_bar ) {
    $wp_admin_bar->remove_menu( 'wp-logo' ); // WordPressシンボルマーク
    $wp_admin_bar->remove_menu('my-account'); // マイアカウント
    $wp_admin_bar->remove_menu('comments'); // コメント
}
add_action( 'admin_bar_menu', 'remove_admin_bar_menu', 70 );

// 管理バーのヘルプメニューを非表示にする
function my_admin_head() {
    echo '<style type="text/css">#contextual-help-link-wrap{display:none;}</style>';
}
add_action('admin_head', 'my_admin_head');

// 管理バーにログアウトを追加
function add_new_item_in_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->add_menu(array(
        'id' => 'new_item_in_admin_bar',
        'title' => __('ログアウト'),
        'href' => wp_logout_url()
    ));
}
add_action('wp_before_admin_bar_render', 'add_new_item_in_admin_bar');

function example_remove_dashboard_widgets() {
    if (!current_user_can('level_10')) { //level10以下のユーザーの場合ウィジェットをunsetする
        global $wp_meta_boxes;
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);   // 最近のコメント
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);   // 被リンク
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);   // プラグイン
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);   // クイック投稿
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);   // 最近の下書き
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);   // WordPressブログ
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);   // WordPressフォーラム
    }
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');




//facebook タグ挿入
add_action( 'wp_body_open', function() {
    ?>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v12.0&appId=541928032537648&autoLogAppEvents=1" nonce="Q5DMmpLZ"></script>
    <?php
});

?>
