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

        <section class="globalWelfare">
            <div class="globalWelfare__wrap">
                <div class="globalWelfare__heading">
                    <div class="globalWelfare__heading--en">WELFARE</div>
                    <div class="globalWelfare__heading--ja">福利厚生制度</div>
                </div>
                <div class="globalWelfare__desc">福利厚生の向上も推進中</div>
                <div class="globalWelfare__items">
                    <div class="globalWelfare__item">
                        <span class="globalWelfare__item--pic"><img src="<?php echo get_template_directory_uri() ?>/img/img_globalWelfare01.png"></span>
                        <span class="globalWelfare__item--explain">入社祝い金</span>
                    </div>
                    <div class="globalWelfare__item">
                        <span class="globalWelfare__item--pic"><img src="<?php echo get_template_directory_uri() ?>/img/img_globalWelfare02.png"></span>
                        <span class="globalWelfare__item--explain">美容室・各種サロン<br>施術費補助月1回3,000円迄</span>
                    </div>
                    <div class="globalWelfare__item">
                        <span class="globalWelfare__item--pic"><img src="<?php echo get_template_directory_uri() ?>/img/img_globalWelfare03.png"></span>
                        <span class="globalWelfare__item--explain">マッサージ<br>月1回無料</span>
                    </div>
                    <div class="globalWelfare__item">
                        <span class="globalWelfare__item--pic"><img src="<?php echo get_template_directory_uri() ?>/img/img_globalWelfare04.png"></span>
                        <span class="globalWelfare__item--explain">3大疾病の際､<br>会社加入保険でも保障</span>
                    </div>
                    <div class="globalWelfare__item">
                        <span class="globalWelfare__item--pic"><img src="<?php echo get_template_directory_uri() ?>/img/img_globalWelfare05.png"></span>
                        <span class="globalWelfare__item--explain">資格取得制度有</span>
                    </div>
                    <div class="globalWelfare__item">
                        <span class="globalWelfare__item--pic"><img src="<?php echo get_template_directory_uri() ?>/img/img_globalWelfare06.png"></span>
                        <span class="globalWelfare__item--explain">単身者向け住居有(1DK)</span>
                    </div>
                </div>
                <div class="globalWelfare__attention">
                    <div class="globalWelfare__attention--text">現場が遠方で､早出･残業になる場合は移動時間でも時間外手当支給</div>
                    <div class="globalWelfare__attention--text">天候不良で現場が休みになった場合の給与保障有</div>
                    <div class="globalWelfare__attention--text">日払い(当日/全額)･週払いOK</div>
                </div>
            </div>
        </section>

        <section class="globalRequirement">
            <div class="globalRequirement__heading">
                <div class="globalRequirement__heading--en">REQUIREMENT</div>
                <div class="globalRequirement__heading--ja">募集要項</div>
            </div>
            <div class="globalRequirement__lists">
                <div class="globalRequirement__list">
                    <div class="globalRequirement__list--title">勤務先</div>
                    <div class="globalRequirement__list--item"><?php the_field('globalRequirement_place');?></div>
                </div>
                <div class="globalRequirement__list">
                    <div class="globalRequirement__list--title">雇用期間</div>
                    <div class="globalRequirement__list--item"><?php the_field('globalRequirement_period');?></div>
                </div>
                <div class="globalRequirement__list">
                    <div class="globalRequirement__list--title">勤務開始日</div>
                    <div class="globalRequirement__list--item"><?php the_field('globalRequirement_start');?></div>
                </div>
                <div class="globalRequirement__list">
                    <div class="globalRequirement__list--title">仕事内容</div>
                    <div class="globalRequirement__list--item"><?php the_field('globalRequirement_content');?></div>
                </div>
                <div class="globalRequirement__list">
                    <div class="globalRequirement__list--title">資格</div>
                    <div class="globalRequirement__list--item"><?php the_field('globalRequirement_age');?></div>
                </div>
                <div class="globalRequirement__list">
                    <div class="globalRequirement__list--title">求める人物像</div>
                    <div class="globalRequirement__list--item"><?php the_field('globalRequirement_image');?></div>
                </div>
                <div class="globalRequirement__list">
                    <div class="globalRequirement__list--title">勤務時間</div>
                    <div class="globalRequirement__list--item"><?php the_field('globalRequirement_time');?></div>
                </div>
                <div class="globalRequirement__list">
                    <div class="globalRequirement__list--title">休日</div>
                    <div class="globalRequirement__list--item"><?php the_field('globalRequirement_holiday');?></div>
                </div>
                <div class="globalRequirement__list">
                    <div class="globalRequirement__list--title">勤務日数</div>
                    <div class="globalRequirement__list--item"><?php the_field('globalRequirement_days');?></div>
                </div>
                <div class="globalRequirement__list">
                    <div class="globalRequirement__list--title">休暇</div>
                    <div class="globalRequirement__list--item"><?php the_field('globalRequirement_vacation');?></div>
                </div>
                <div class="globalRequirement__list">
                    <div class="globalRequirement__list--title">給与</div>
                    <div class="globalRequirement__list--item"><?php the_field('globalRequirement_salary');?></div>
                </div>
                <div class="globalRequirement__list">
                    <div class="globalRequirement__list--title">諸手当</div>
                    <div class="globalRequirement__list--item"><?php the_field('globalRequirement_allowance');?></div>
                </div>
                <div class="globalRequirement__list">
                    <div class="globalRequirement__list--title">福利厚生</div>
                    <div class="globalRequirement__list--item"><?php the_field('globalRequirement_welfare');?></div>
                </div>
                <div class="globalRequirement__list">
                    <div class="globalRequirement__list--title">昇給・賞与</div>
                    <div class="globalRequirement__list--item"><?php the_field('globalRequirement_bonus');?></div>
                </div>
                <div class="globalRequirement__list">
                    <div class="globalRequirement__list--title">試用期間</div>
                    <div class="globalRequirement__list--item"><?php the_field('globalRequirement_trial01');?></div>
                </div>
            </div>

            <div class="globalRequirement__desc">お電話での応募、またはメールフォームからのご相談等承っております。</div>
        </section>

        <section class="l-breadcrumb">
            <?php if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('<div class="l-breadcrumb__items">','</div>');
            } ?>
        </section>

        <?php get_template_part( 'inc/block', 'contact' ); ?>
    </main>
<?php get_footer(); ?>