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
        <ul>
            <li><a href="#top"><span class="fa fa-chevron-up"></span></a></li>
        </ul>
    </nav>
    <footer class="footer container" id="footer">
            <nav id="footer-nav" class="row">
                <p><img class="svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/envaris-white.svg" height="20" width="220" />
                    Wir freunen uns auf Ihren Anruf: +49 30-288-8493-110</p>
                <div class="col-lg-3">
                    <h3>Über Uns</h3>
                    <?php if ( has_nav_menu( 'footer_ltr_one' ) ) : ?>
                        <?php wp_nav_menu( array( 'theme_location' => 'footer_ltr_one' ) ); ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-3">
                    <h3>Leistungen</h3>
                    <?php if ( has_nav_menu( 'footer_ltr_two' ) ) : ?>
                        <?php wp_nav_menu( array( 'theme_location' => 'footer_ltr_two' ) ); ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-3">
                    <h3>Impressum</h3>
                    <?php if ( has_nav_menu( 'footer_ltr_three' ) ) : ?>
                        <?php wp_nav_menu( array( 'theme_location' => 'footer_ltr_three' ) ); ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-3">
                    <div class="well">
                        <div id="footer-widget">
                            <?php
                            if(is_active_sidebar('footer-widget')){
                                dynamic_sidebar('footer-widget');
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </nav>
    </footer>
    <!-- /FOOTER -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.offcanvas.js"></script>

</body>
</html>
