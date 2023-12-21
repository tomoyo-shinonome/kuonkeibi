<?php get_header(); ?>
<main class="l-main home">
    <section class="homeKv">
        <div class="homeKv__bg"><img src="<?php echo get_template_directory_uri() ?>/img/img_homeKv_bg.jpg"></div>
        <div class="homeKv__copy">
            <span class="homeKv__copy--en">Change the image </span>
            <span class="homeKv__copy--ja">警備業界のイメージを覆し、楽しく働きやすい職場を目指す</span>
        </div>
        <div class="homeKV-Topics">
            <div class="homeKV-Topics__heading">
                <span class="homeKV-Topics__heading--en">TOPICS</span>
                <span class="homeKV-Topics__heading--ja">お知らせ</span>
            </div>
            <div class="homeKV-Topics__wrap">
                <div class="homeKV-Topics__items">
                <?php
                $wp_query = new WP_Query();
                $param = array(
                    'posts_per_page' => '1', //表示件数。-1なら全件表示
                    'post_type' => 'お知らせ', //カスタム投稿タイプの名称を入れる
                );
                $wp_query->query($param);
                if($wp_query->have_posts()): while($wp_query->have_posts()) : $wp_query->the_post();
                $category = get_the_category();$cat_name = $category[0]->cat_name;
                ?>
                    <div class="homeKV-Topics__item">
                        <a href="<?php the_permalink(); ?>" class="c-list">
                            <span class="c-list__item"><?php the_time("Y.m.d");?></span>
                            <span class="c-list__item"><?php the_title(); ?></span>
                        </a>
                    </div>
                <?php endwhile; endif; wp_reset_query(); ?>
                </div>
            </div>
        </div>
        <div class="homeScroll"><span>SCROLL</span></div>
    </section>
    <section class="homeBusiness">
        <div class="homeBusiness__wrap">
            <div class="homeBusiness__items">
                <div class="homeBusiness__heading">
                    <span class="homeBusiness__heading--en"><img src="<?php echo get_template_directory_uri() ?>/img/img_homeBusiness-en.svg"></span>
                    <span class="homeBusiness__heading--ja">業務内容</span>
                </div>
                <div class="homeBusiness__cat"><span>交通誘導</span></div>
                <div class="homeBusiness__desc">警備は夏は暑く、冬は寒い。特に北見市の冬は厳しいと言われています。その中で何時間も警備をする事は大変です。<br>
                    安全第一なので手薄になってはいけませんが、調整しながら一人ひとりが働きやすい環境を心がけています。</div>
            </div>
            <div class="homeBusiness__image"><img src="<?php echo get_template_directory_uri() ?>/img/img_homeBusiness-01.jpg"></div>
        </div>
    </section>
    <section class="homeAbout">
        <div class="homeAbout__wrap">
            <div class="homeAbout__heading">
                <div class="homeAbout__heading--en">ABOUT</div>
                <div class="homeAbout__heading--ja">久遠警備とは</div>
            </div>
            <div class="homeAbout__items">
                <div class="homeAbout__image"><img src="<?php echo get_template_directory_uri() ?>/img/img_homeAbout-01.jpg"></div>
                <div class="homeAbout__item">
                    <div class="homeAbout__title">第一線で働く警備員の安全を第一に新たな警備業界の姿を描いていきたい</div>
                    <div class="homeAbout__desc">厳しく報われないイメージの警備業界のイメージを払拭し、従業員68名、一人ひとりの安全を第一に考えながら警備業界の改革を目指しています。</div>
                    <div class="homeAbout__button"><a href="" class="c-button"><span>会社概要</span></a></div>
                </div>
            </div>
        </div>
    </section>
    <section class="homeTopics">
        <div class="homeTopics__wrap">
            <div class="homeTopics__header">
                <div class="homeTopics__heading">
                    <div class="homeTopics__heading--en">TOPICS</div>
                    <div class="homeTopics__heading--ja">お知らせ</div>
                </div>
                <div class="homeTopics__button"><a href="" class="c-button__secondary"><span>VIEW MORE</span></a></div>
            </div>
            <div class="homeTopics__lists">
                <?php
                $wp_query = new WP_Query();
                $param = array(
                    'posts_per_page' => '3', //表示件数。-1なら全件表示
                    'post_type' => 'お知らせ', //カスタム投稿タイプの名称を入れる
                );
                $wp_query->query($param);
                if($wp_query->have_posts()): while($wp_query->have_posts()) : $wp_query->the_post();
                    $category = get_the_category();$cat_name = $category[0]->cat_name;
                    ?>
                    <div class="homeTopics__list">
                        <a href="<?php the_permalink(); ?>" class="c-list">
                            <span class="c-list__item"><?php the_time("Y.m.d");?></span>
                            <span class="c-list__item"><?php the_title(); ?></span>
                        </a>
                    </div>
                <?php endwhile; endif; wp_reset_query(); ?>
            </div>
        </div>
    </section>
    <section class="homeRecruit">
        <div class="homeRecruit__heading">
            <div class="homeRecruit__heading--en">RECRUIT</div>
            <div class="homeRecruit__heading--ja">採用情報</div>
        </div>
        <div class="homeRecruit__wrap">
            <div class="homeRecruit__items">
                <div class="homeRecruit__pics"><img src="<?php echo get_template_directory_uri() ?>/img/img_homeRecruit-01.jpg"></div>
                <div class="homeRecruit__item">
                    <div class="homeRecruit__item--desc">安全第一でも、楽しく、やりがいを感じられる仕事です！</div>
                    <div class="homeRecruit__item--par">安全第一の警備業界で、怪我や事故がおこらないための指導を徹底しています。また、1人ひとりが働きやすい環境をつくり、全従業員が楽しみながらやりがいを感じられる職場環境を目財しています。</div>
                    <div class="homeRecruit__button"><a href="" class="c-button"><span>採用情報</span></a></div>
                </div>
            </div>
        </div>
    </section>
    <?php get_template_part( 'inc/block', 'contact' ); ?>
</main>
<?php get_footer(); ?>
