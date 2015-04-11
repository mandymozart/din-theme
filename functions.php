<?php
/**
 * din-theme functions and definitions
 *
 * @package din-theme
 */

/**
 * Set the content width based on the theme's design and stylesheet. ????
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'din_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function din_theme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on din-theme, use a find and replace
	 * to change 'din-theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'din-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'din-theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'din_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // din_theme_setup
add_action( 'after_setup_theme', 'din_theme_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function din_theme_widgets_init() {

    register_sidebar( array(
        'name' => 'Checkout Page Ads',
        'id' => 'checkoutWidget',
        'description' => 'Place for Ads in the checkout page.',
        'before_widget' => '<widget id="%1$s" class="widget widget-checkout%2$s">',
        'after_widget' => '</widget>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

}
add_action( 'widgets_init', 'din_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function din_theme_scripts() {
	wp_enqueue_style( 'din-theme-style', get_stylesheet_uri() );
    wp_deregister_script('jquery');
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'din_theme_scripts' );


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Remove Admin Bar from Frontend
 */
add_filter('show_admin_bar', '__return_false');


/**
 * Remove WooCommerce Styles
 */
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

function din_theme_clean_text($content){
    return "echo";
    // return preg_replace("/\r\n|\r|\n/",'<br/>',wp_strip_all_tags($content));
}

/**
 * Remove QTY HTML5 for bootstrap-spinedit.js
 */

function woocommerce_quantity_input($data) {
    global $product;

    $defaults = array(
        'input_name'    => $data['input_name'],
        'input_value'   => $data['input_value'],
        'max_value'  	=> apply_filters( 'woocommerce_quantity_input_max', '', $product ),
        'min_value'  	=> apply_filters( 'woocommerce_quantity_input_min', '', $product ),
        'step' 		=> apply_filters( 'woocommerce_quantity_input_step', '1', $product ),
        'style'		=> apply_filters( 'woocommerce_quantity_style', 'float:left; margin-right:10px;', $product )
    );
    if ( ! empty( $defaults['min_value'] ) )
        $min = $defaults['min_value'];
    else $min = 1;

    if ( ! empty( $defaults['max_value'] ) )
        $max = $defaults['max_value'];
    else $max = 20;

    if ( ! empty( $defaults['step'] ) )
        $step = $defaults['step'];
    else $step = 1;

    echo '<input type="text" value="'.$defaults['input_value'].'" name="' . esc_attr( $defaults['input_name'] ) . '" title="' . _x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) . '" class="input-text qty text noSelect">';
}


/* Rewrite Add-To-Cart-Button to redirect to shop mainpage */
add_filter( 'woocommerce_add_to_cart_redirect', 'custom_add_to_cart_redirect' );

function custom_add_to_cart_redirect() {
    /**
     * Replace with the url of your choosing
     * e.g. return 'http://www.yourshop.com/'
     */
    //return get_permalink( get_option('woocommerce_checkout_page_id') );
    return the_site_url();
}