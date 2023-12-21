
<div id="pageTop" class="pageTop">
    <a href="#">Back to top</a>
</div>
<footer class="l-footer">
    <section class=" l-footerItem">
        <div class="l-footer__logo">
            <span class="l-footer__logo--ja">久遠警備</span>
            <span class="l-footer__logo--en">KUON KEIBI</span>
        </div>
        <div class="l-footerNav">
            <nav class="l-navFooter" role="navigation">
                <div class="l-navFooter__items">
                    <div class="l-navFooter__item" >
                        <a href="<?php echo home_url();?>">
                            <div class="l-navFooter__item--ja cat01">ABOUT</div>
                        </a>
                        <div class=" l-navFooter__subitem">
                            <a href="<?php echo home_url('about#company');?>">
                                <span class="l-navFooter__item--ja">会社概要</span>
                            </a>
                        </div>
                        <div class=" l-navFooter__subitem">
                            <a href="<?php echo home_url('about#history');?>">
                                <span class="l-navFooter__item--ja">会社沿革</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="l-navFooter__items">
                    <div  class="l-navFooter__item">
                        <a href="<?php echo home_url('');?>">
                            <div class="l-navFooter__item--ja cat01">RECRUIT</div>
                        </a>
                    </div>
                    <div  class="l-navFooter__item">
                        <a href="<?php echo home_url('');?>">
                            <div class="l-navFooter__item--ja cat01">INFORMATION</div>
                        </a>
                    </div>
                    <div  class="l-navFooter__item">
                        <a href="<?php echo home_url('');?>">
                            <div class="l-navFooter__item--ja cat01">CONTACT</div>
                        </a>

                    </div>
                </div>
            </nav>
        </div>
        <div class="l-footer__social">
            <span><img src="<?php echo get_template_directory_uri() ?>/img/img_iconInstagram.svg"></span>
            <span>INSTAGRAM</span>
        </div>
    </section>
    <section class="l-footerCopy">
        <div class="l-footerCopy__item">Copyright&copy; <?php echo date('Y'); ?> Kuon Keibi co.,Ltd All Rights Reserved.</div>
    </section>
</footer>
<?php wp_footer(); ?>
</body>
</html>
