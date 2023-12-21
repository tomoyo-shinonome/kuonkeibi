<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"></script>
    <script>FontAwesomeConfig = { searchPseudoElements: true };</script>
    <?php wp_head(); ?>
    <link href="<?php echo get_template_directory_uri() ?>/img/favicon.ico" rel="icon" type="image/vnd.microsoft.icon">
    <link href="<?php echo get_template_directory_uri() ?>/img/favicon_icon.png" rel="apple-touch-icon" sizes="152x152">
</head>
<body <?php body_class(); ?>><?php wp_body_open(); ?>
 <header class="l-header">
     <?php if ( is_home() || is_front_page() ) : ?>
     <div class="l-header__logo">
         <a href="<?php echo home_url(); ?>">
             <div class="l-header__logo--image"><img src="<?php echo get_template_directory_uri() ?>/img/img_headerLogo.png" alt="久遠警備"></div>
             <h1 class="l-header__siteName">
                 <span class="l-header__siteName--ja">久遠警備</span>
                 <span class="l-header__siteName--en">KUON KEIBI</span>
             </h1>
         </a>
     </div>
     <?php else : ?>
         <div class="l-header__logo page">
             <a href="<?php echo home_url(); ?>" class="page">
                 <div class="l-header__logo--image page"><img src="<?php echo get_template_directory_uri() ?>/img/img_headerLogo.png" alt="久遠警備"></div>
                 <h1 class="l-header__siteName page">
                     <span class="l-header__siteName--ja page">久遠警備</span>
                     <span class="l-header__siteName--en page">KUON KEIBI</span>
                 </h1>
             </a>
         </div>
     <?php endif; ?>
     <div class="l-header__wrap">
         <div class="l-header__menu">
             <nav class="l-navHeader" role="navigation">
                 <div class="l-navHeader__item" >
                     <a href="<?php echo home_url('about');?>">
                         <span class="l-navHeader__item--en">ABOUT</span>
                     </a>
                 </div>
                 <div  class="l-navHeader__item">
                     <a href="<?php echo home_url('recruit');?>">
                         <span class="l-navHeader__item--en">RECRUIT</span>
                     </a>
                 </div>
                 <div  class="l-navHeader__item">
                     <a href="<?php echo home_url('information');?>">
                         <span class="l-navHeader__item--en">INFORMATION</span>
                     </a>
                 </div>
                 <div  class="l-navHeader__item--contact">
                     <a href="<?php echo home_url('contact');?>">　
                         <span><img src="<?php echo get_template_directory_uri() ?>/img/img_iconMail.svg "></span>
                         <span class="l-navHeader__item--en">CONTACT</span>
                     </a>
                 </div>
             </nav>
             <div class="l-header__button js-menu">
                 <span></span>
             </div>
         </div>
     </div>
 </header>


    <div class="overlay js-overlay">
        <div class="overlay__item">
            <nav class="overlayNav__items">
                <div class="overlayNav__item" >
                    <a href="<?php echo home_url('');?>">
                        <span class="overlayNav__item--ja">トップページ</span>
                    </a>
                </div>
                <div  class="overlayNav__item">
                    <a href="<?php echo home_url('about');?>">
                        <span class="overlayNav__item--ja">ABOUT</span>
                    </a>
                </div>
                <div  class="overlayNav__item">
                    <a href="<?php echo home_url('recruit');?>">
                        <span class="overlayNav__item--ja">RECRUIT</span>
                    </a>
                </div>
                <div  class="overlayNav__item">
                    <a href="<?php echo home_url('information');?>">
                        <span class="overlayNav__item--ja">INFORMATION</span>
                    </a>
                </div>
            </nav>
            <div class="overlayButton">
                <div class="overlayButton__contact">
                    <a href="<?php echo home_url('contact');?>">
                        <img src="<?php echo get_template_directory_uri() ?>/img/img_iconMail.svg" alt="お問い合わせ">
                    </a>
                </div>
            </div>
        </div>
        <div class="l-footerCopy__item">Copyright&copy; <?php echo date('Y'); ?> Kuon Keibi co.,Ltd All Rights Reserved.</div>
    </div>
