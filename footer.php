<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package din-theme
 */
?>

	</div><!-- #content -->

    <!-- FOOTER -->
    <nav id="nav-onsite" class="mm-fixed-bottom">
        <div id="trust-widget"><a href="http://www.top50-solar.de/solarcount/main.php?id=7280" target="_blank"><img src="http://www.top50-solar.de/solarcount/img.php?id=7280&amp;js=1&amp;ref=&amp;rand=92556586954&amp;sc=1&amp;gif=0" border="0"></a></div>
        <div id="hotline-widget"><? dynamic_sidebar('hotline-area'); ?></div>
        <ul>
            <li><a href="#top"><span class="fa fa-chevron-up"></span></a></li>
        </ul>
    </nav>
    <?php get_sidebar(); ?>
    <footer class="footer container-fluid" id="footer">

        <?php
        if(is_active_sidebar('footer-header-widget')){ ?>
        <div class="row">
            <div id="footer-header-widget">
                <? dynamic_sidebar('footer-header-widget'); ?>
            </div>
        </div>
        <? } ?>
        <div class="row">
            <div class="col-lg-12"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/envaris-logotype-white-h60.png" id="brand-logotype-footer"/></div>
        </div>
        <nav id="footer-nav" class="row">
            <div class="col-lg-3">
                <?php if ( has_nav_menu( 'footer_ltr_one' ) ) : ?>
                    <?php wp_nav_menu( array( 'theme_location' => 'footer_ltr_one' ) ); ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-3">
                <?php if ( has_nav_menu( 'footer_ltr_two' ) ) : ?>
                    <?php wp_nav_menu( array( 'theme_location' => 'footer_ltr_two' ) ); ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-3">
                <?php if ( has_nav_menu( 'footer_ltr_three' ) ) : ?>
                    <?php wp_nav_menu( array( 'theme_location' => 'footer_ltr_three' ) ); ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-3">
                <div id="footer-widget" class="well">
                    <?php
                    if(is_active_sidebar('footer-widget')){
                        dynamic_sidebar('footer-widget');
                    }
                    ?>
                </div>
            </div>
        </nav>
    </footer>
    <!-- /FOOTER -->
</div><!--page -->

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/app.js"></script>

<?php wp_footer(); ?>



</body>
</html>
