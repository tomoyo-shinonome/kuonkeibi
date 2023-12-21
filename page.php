<?php get_header(); ?>
    <main class="l-main global" role="main">

        <section class="p-page__heading">
            <div class="p-page__title">
                <div class="p-page__title--en"><?php the_title(); ?></div>
            </div>
            <div class="p-page__copy">
                <?php the_field('page_copy');?>
            </div>
            <div class="p-page__desc">
                <?php the_field('page_description');?>
            </div>
        </section>

        <article class="p-page">
            <?php remove_filter('the_content', 'wpautop'); ?>
            <?php the_content(); ?>
        </article>

        <section class="l-breadcrumb">
            <?php if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('<div class="l-breadcrumb__items">','</div>');
            } ?>
        </section>
            <?php get_template_part( 'inc/block', 'contact' ); ?>
    </main>
<?php get_footer(); ?>