<?php
/**
 * Template Name: Forms Page
 * The template for displaying forms.
 *
 * This is the template for using forms.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package din-theme
 */

get_header(); ?>
<section class="container section">
    <!--div id="primary" class="content-area"-->
    <!--main id="main" class="site-main" role="main"-->
    <!--div id="forms-section" class="row-fluid"-->

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'content', 'page' ); ?>

        <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() ) :
            comments_template();
        endif;
        ?>

    <?php endwhile; // end of the loop. ?>

    <!--/div--><!-- #forms section -->
    <!--/main--><!-- #main -->
    <!--/div--><!-- #primary -->
</section>

<section class="container-fluid section section-inverse">
    <div class="container">
        <div class="">
          <h2>Formular für Gutachten</h2>
            <p>Hier was mit dem von gut als mit eintragen wovon Licht viel besser.</p>
        </div>
    </div>

    <div class="row-fluid">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <?php
            if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 3 ); }

            ?>
        </div>
    </div>

</section>

<?php get_footer(); ?>
