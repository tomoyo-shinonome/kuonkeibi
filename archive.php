<?php get_header(); ?>
<main class="l-main p-archive" role="main">
    <section class="p-page__heading l-main__kv--information globalInformation">
        <div class="p-page__title">
            <div class="p-page__title--en">Information</div>
        </div>
        <div class="p-page__wrap">
            <div class="p-page__copy">
                <span>久遠警備からのお知らせです</span>
            </div>
            <div class="p-page__desc">
               いつも久遠警備ホームページをご覧いただき誠にありがとうございます。<br>
               こちらのページでは弊社の最新情報をご確認頂けます。
            </div>
        </div>
    </section>

    <section class="l-main__content p-archive">
        <div class="p-single globalInformation">
            <div class="globalInformation__items">
                <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $wp_query = new WP_Query();
                $param = array(
                    'posts_per_page' => '-1', //表示件数。-1なら全件表示
                    'post_type' => 'post',
                    'paged' => $paged
                );
                $wp_query->query($param);
                if($wp_query->have_posts()): while($wp_query->have_posts()) : $wp_query->the_post();
                    ?>
                    <div class="globalInformation__item">
                        <a href="<?php the_permalink(); ?>" class="c-list">
                            <span class="c-list__item"><?php the_time("Y.m.d");?></span>
                            <span class="c-list__item"><?php the_title(); ?></span>
                        </a>
                    </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
            <?php if (function_exists('responsive_pagination')) {
                responsive_pagination($wp_query->max_num_pages,get_query_var( 'paged' ), 2, true);
            } ?>
        </div>
    </section>

    <section class="l-breadcrumb">
        <?php if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('<div class="l-breadcrumb__items">','</div>');
        } ?>
    </section>
    <?php get_template_part( 'inc/block', 'contact' ); ?>
</main>
<?php get_footer(); ?>
