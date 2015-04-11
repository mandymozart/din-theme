<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';

?>
<div <?php post_class( $classes ); ?>>

    <?
    // product_type: external (Ad)
    if($product->product_type == 'external'){
        ?>
        <h3><? echo $post->post_title; ?></h3>
        <? echo apply_filters ("the_content", $post->post_content); ?>
        <?
    }
    // product_type: simple (book)
    else {
        ?>
        <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

        <div class="product-preview-gallery">
            <ul>
            <?php

            if ( has_post_thumbnail() ) {

                $image_title = esc_attr( get_the_title( get_post_thumbnail_id() ) );
                $image_link  = wp_get_attachment_url( get_post_thumbnail_id() );
                $image       = get_the_post_thumbnail( $post->ID );

                $attachment_count = count( $product->get_gallery_attachment_ids() );


                echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li><img src="%s" alt="" /></li>', $image_link, $image_title ), $post->ID );

            } else {

                echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<li><img src="%s" alt="%s" /></li>', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );

            }

            ?>

            <?php

            $attachment_ids = $product->get_gallery_attachment_ids();
            ?>
                <!-- IDS
            <? print_r($attachment_ids);?>
                 /IDS -->
                <?
            if ( $attachment_ids ) {
                foreach ( $attachment_ids as $id ) {
                    echo '<li class="hidden">';
                    echo wp_get_attachment_image( $id, 'full' );
                    echo '</li>';
                }
            }
            /*

            if ( $attachments ) {
                foreach ( $attachments as $attachment ) {
                    echo '<li class="hidden">';
                    echo wp_get_attachment_image( $attachment->ID, 'full' );
                    echo '</li>';
                }
            }
            */
                ?>

            </ul>

            <?php
                /**
                 * woocommerce_before_shop_loop_item_title hook
                 *
                 * @hooked woocommerce_show_product_loop_sale_flash - 10
                 * @hooked woocommerce_template_loop_product_thumbnail - 10
                 */
                // do_action( 'woocommerce_before_shop_loop_item_title' );
            ?>

        </div>

        <h3>&quot;<?php
            the_title();
            ?>&quot;<br />
            <?
            $attributes = $product->get_attributes();

            $authors = get_the_terms( $product->id, 'pa_book_author');
            if(is_array($authors)){
                $i = false;
                foreach ( $authors as $author ) {
                    if($i) echo ", ";
                    echo $author->name;
                    $i = true;
                }
            }
            ?>
        </h3>

        <div class="product-description"><?php echo nl2br(wp_strip_all_tags($post->post_content )) ?></div>
        <div class="product-credits"><?php echo nl2br(wp_strip_all_tags($post->post_excerpt )) ?></div>

            <?php
                /**
                 * woocommerce_after_shop_loop_item_title hook
                 *
                 * @hooked woocommerce_template_loop_rating - 5
                 * @hooked woocommerce_template_loop_price - 10
                 */
                do_action( 'woocommerce_after_shop_loop_item_title' );
            ?>
        <br /><br />
        <?php do_action( 'woocommerce_after_shop_loop_item' ); ?><br />
        <a class="like-button" href="JavaScript:window.open('http://www.facebook.com/sharer.php?u=<? the_permalink($product->id); ?>','','width=657,height=400,scrollbars=1')">Like</a>
        <meta itemprop="url" content="<? the_permalink($product->id); ?>" />
    <? } // END: simple ?>
</div>

