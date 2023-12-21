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

        <section class="globalCompany">
            <div class="globalCompany__heading">
                <div class="globalCompany__heading--en">COMPANY</div>
                <div class="globalCompany__heading--ja">会社概要</div>
            </div>
            <div class="globalCompany__lists">
                <div class="globalCompany__list">
                    <div class="globalCompany__list--title">会社名</div>
                    <div class="globalCompany__list--item"><?php the_field('globalCompany_item');?></div>
                </div>
                <div class="globalCompany__list">
                    <div class="globalCompany__list--title">代表者</div>
                    <div class="globalCompany__list--item"><?php the_field('globalCompany_ceo');?></div>
                </div>
                <div class="globalCompany__list">
                    <div class="globalCompany__list--title">所在地</div>
                    <div class="globalCompany__list--item"><?php the_field('globalCompany_add');?></div>
                </div>
                <div class="globalCompany__list">
                    <div class="globalCompany__list--title">TEL</div>
                    <div class="globalCompany__list--item"><?php the_field('globalCompany_tel');?></div>
                </div>
                <div class="globalCompany__list">
                    <div class="globalCompany__list--title">FAX</div>
                    <div class="globalCompany__list--item"><?php the_field('globalCompany_fax');?></div>
                </div>
                <div class="globalCompany__list">
                    <div class="globalCompany__list--title">設立年月日</div>
                    <div class="globalCompany__list--item"><?php the_field('globalCompany_establishment');?></div>
                </div>
                <div class="globalCompany__list">
                    <div class="globalCompany__list--title">創業年月日</div>
                    <div class="globalCompany__list--item"><?php the_field('globalCompany_founding');?></div>
                </div>
                <div class="globalCompany__list">
                    <div class="globalCompany__list--title">資本金</div>
                    <div class="globalCompany__list--item"><?php the_field('globalCompany_capital');?></div>
                </div>
                <div class="globalCompany__list">
                    <div class="globalCompany__list--title">社員数</div>
                    <div class="globalCompany__list--item"><?php the_field('globalCompany_employees');?></div>
                </div>
                <div class="globalCompany__list">
                    <div class="globalCompany__list--title">取引銀行</div>
                    <div class="globalCompany__list--item"><?php the_field('globalCompany_bank');?></div>
                </div>
                <div class="globalCompany__list">
                    <div class="globalCompany__list--title">認定</div>
                    <div class="globalCompany__list--item"><?php the_field('globalCompany_certification');?></div>
                </div>
                <div class="globalCompany__list">
                    <div class="globalCompany__list--title">資格取得者</div>
                    <div class="globalCompany__list--item"><?php the_field('globalCompany_qualified');?></div>
                </div>
            </div>
        </section>
        <section class="globalHistory">
            <div class="globalHistory__heading">
                <div class="globalHistory__heading--en">HISTORY</div>
                <div class="globalHistory__heading--ja">会社沿革</div>
            </div>
            <div class="globalHistory__lists">
                    <?php the_field('globalHistory');?>
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