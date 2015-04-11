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
            <li><a href="#top" class="back-to-top"><span class="fa fa-chevron-up"></span></a></li>
        </ul>
    </nav>
    <footer class="footer" id="footer">
        <h3><?php bloginfo( 'name' ); ?> <a href="http://www.wearepictures.com" target="_blank">Crafted by <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wearepictures-logo.png" /></a></h3>
    </footer>
    <!-- /FOOTER -->
</div><!--page -->
</div>

<!-- Modal -->
<div class="modal fade modal-cart" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">CART</h4>
            </div>
            <div class="modal-body">
                <? echo do_shortcode('[woocommerce_cart]'); ?>
            </div>
        </div>
    </div>
</div>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap-spinedit.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/masonry.pkgd.min.js"></script>
<?php wp_footer(); ?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/app.js"></script>



</body>
</html>
