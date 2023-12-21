<?php get_header(); ?>
    <main class="l-main global" role="main">
        <section class="p-page__heading">
            <div class="p-page__title">
                <div class="p-page__title--en"><?php the_title(); ?></div>
            </div>
            <div class="p-page__wrap">
                <div class="p-page__copy">
                    <span><?php the_field('page_copy');?></span>
                </div>
                <div class="p-page__desc">
                    <?php the_field('page_description');?>
                </div>
            </div>
        </section>

        <section class="globalTelephone">
            <div class="globalTelephone__wrap">
                <div class="globalTelephone__heading">
                    <div class="globalTelephone__heading--en">TELEPHONE</div>
                    <div class="globalTelephone__heading--ja">お電話でのお問い合わせ</div>
                </div>
                <div class="globalTelephone__items">
                    <div class="globalTelephone__item">0157-69-0028</div>
                    <div class="globalTelephone__time">受付時間／00:00〜00:00</div>
                </div>
            </div>
        </section>

        <section class="globalForm">
            <div class="globalForm__heading">
                <div class="globalForm__heading--en">CONTACT FORM</div>
                <div class="globalForm__heading--ja">メールフォームからのお問い合わせ</div>
            </div>
            <?php echo apply_shortcodes('[contact-form-7 id="50a7594" title="コンタクトフォーム 1"]'); ?>
        </section>

        <section class="l-breadcrumb">
            <?php if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('<div class="l-breadcrumb__items">','</div>');
            } ?>
        </section>

        <?php get_template_part( 'inc/block', 'contact' ); ?>
    </main>
<?php get_footer(); ?>