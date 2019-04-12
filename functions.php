<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Remove the parent theme's stylesheets and scripts from inc/enqueue.php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );
    // if not logged in, remove Gutenberg css:
	if ( ! is_user_logged_in() ) {
		wp_deregister_style( 'wp-block-library' );
	}
	
	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
	
	
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

// Enqueue stylesheets and scripts for this child theme
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
/**
 *
 */
function theme_enqueue_styles() {
	// Enqueue Google Fonts: Oswald ond Roboto
	wp_enqueue_style( 'ccproviders-fonts', 'https://fonts.googleapis.com/css?family=Oswald|Roboto:400,500' );
	
	// Get the theme data
	$the_theme = wp_get_theme();
    
    wp_enqueue_style( 'ccproviders-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    
    // Enqueue scripts
    wp_enqueue_script( 'jquery');
	
    wp_enqueue_script( 'bootstrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'ccproviders-scripts', get_stylesheet_directory_uri() . '/js/ccproviders.js', array(), $the_theme->get( 'Version' ), true );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

/*
//Remove jQuery migrate
function remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
		
		if ( $script->deps ) { // Check whether the script has any dependencies
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
}
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );
*/

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'ccproviders', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );


// Modify `.site-info` in footer
add_action( 'understrap_site_info', 'understrap_add_site_info' );

/**
 * Add site info content.
 */
function understrap_add_site_info() {
    $the_theme = wp_get_theme();

    $site_info = sprintf(
	    '<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s (%4$s)',
        esc_url( __( 'http://wordpress.org/', 'ccproviders' ) ),
        sprintf(
            /* translators:*/
            esc_html__( 'Proudly powered by %s', 'ccproviders' ),
            'WordPress'
        ),
        sprintf( // WPCS: XSS ok.
            /* translators:*/
            esc_html__( 'Theme: %1$s by %2$s.', 'ccproviders' ),
            $the_theme->get( 'Name' ),
            '<a href="' . esc_url( __( 'https://github.com/WebDevBooster', 'ccproviders' ) ) . '">Alex Booster</a>'
        ),
        sprintf( // WPCS: XSS ok.
            /* translators:*/
            esc_html__( 'Version: %1$s', 'ccproviders' ),
            $the_theme->get( 'Version' )
        )
    );

    echo apply_filters( 'understrap_site_info_content', $site_info ); // WPCS: XSS ok.
}


/**
 * Disable Gutenberg editor
 */
add_filter( 'use_block_editor_for_post', '__return_false' );

/**
 * Add custom post type (ccproviders)
 */
require 'ccp-posttype.php';



// return the contents of ccproviders.php
function show_ccproviders($atts){
	// output buffering is required to catch any `echo` or `print` content from the template part
	// because shortcodes need to _return_ the content to be outputted (instead of displaying it)
	// begin output buffering
	ob_start();
	
	// custom query output looping through all available custom posts of the ccproviders post type
	get_template_part( 'ccproviders' );
	
	// end output buffering, grab the buffer contents and empty the buffer
	return ob_get_clean();
}

// add [ccproviders] shortcode
add_shortcode('ccproviders', 'show_ccproviders');

/**
 * Include custom fields (ACF)
 */

// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/inc/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
	return MY_ACF_URL;
}

// Hide the ACF admin menu item.
add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
	return false;
}
