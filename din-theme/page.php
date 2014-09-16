<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package din-theme
 */

get_header(); ?>
    <div class="row row-offcanvas row-offcanvas-right">

        <div id="primary" class="content-area">
            <main id="main" class="site-main col-xs-12 col-sm-9" role="main">
                <p class="pull-right visible-xs">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><span class="fa fa-bars"></span> MENU</button>
                </p>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', 'page' ); ?>

                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>

                <?php endwhile; // end of the loop. ?>

            </main><!-- #main -->
        </div><!-- #primary -->


        <?php get_sidebar(); ?>

    </div>

<?php get_footer(); ?>
