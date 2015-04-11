<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package din-theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/font-awesome/css/font-awesome.min.css">
</head>

<body <?php body_class(); ?>>
    <div id="layout-background-image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/background.jpg" class="stretch" /></div>
    <div id="layout-background-canvas"></div>
    <div id="layout-background-colomn"></div>

    <div class="navbar" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header-dingsbums.png" />
                </a>
            </div>

            <? /*
            <div class="navbar-ui">
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-icon"><a href="http://www.facebook.com/"><span class="fa-stack fa-lg">
                      <i class="fa fa-square fa-stack-2x"></i>
                      <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                    </span></a></li>
                    <li class="nav-icon"><a href="http://www.twitter.com/"><span class="fa-stack fa-lg">
                      <i class="fa fa-square fa-stack-2x"></i>
                      <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                    </span></a></li>
                    <li class="nav-icon"><a href="http://plus.google.com/"><span class="fa-stack fa-lg">
                      <i class="fa fa-square fa-stack-2x"></i>
                      <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
                    </span></a></li>
                </ul>
            </div> */
            ?>

        </div>
    </div>

    <!-- Cart Toggle -->
    <!-- CART -->
    <?php global $woocommerce; ?>

    <a  id="cart-toggle"
        class="cart-toggle"
        title="<?php _e('View your shopping cart', 'woothemes'); ?>"
        href="#<?php /* echo $woocommerce->cart->get_cart_url(); */ ?>"  data-toggle="modal" data-target="#myModal">
        <!-- Cart Icon -->
        <?
            switch($woocommerce->cart->cart_contents_count){
                case 0:
                    $state = "empty";
                    break;
                case 1:
                case 2:
                    $state = "okay";
                    break;
                case 3:
                case 4:
                    $state = "happy";
                    break;
                default:
                    $state = "mad";
            }
        ?>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cart-<?=$state?>.png" alt="Cart" /><br />
        <!-- /Cart Icon -->
        <?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></a>




    <div id="layout-background-page">
    <div class="container-fluid page">



