<?php
/**
 * Post Type: Coin Providers
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


function register_ccproviders() {
	
	$labels = array(
		"name" => __( "Coin Providers", "ccproviders" ),
		"singular_name" => __( "Coin Provider", "ccproviders" ),
		"menu_name" => __( "Coin Providers", "ccproviders" ),
		"all_items" => __( "Coin Providers", "ccproviders" ),
		"add_new" => __( "Add Coin Provider", "ccproviders" ),
		"add_new_item" => __( "Add Coin Provider", "ccproviders" ),
		"edit_item" => __( "Edit Coin Provider", "ccproviders" ),
	);
	
	$args = array(
		"label" => __( "Coin Providers", "ccproviders" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "ccproviders", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 3,
		"menu_icon" => "dashicons-money",
		"supports" => array( "title" ),
	);
	
	register_post_type( "ccproviders", $args );
}

add_action( 'init', 'register_ccproviders' );

/**
 * Flushing Rewrite on Activation:
 * https://codex.wordpress.org/Function_Reference/register_post_type#Flushing_Rewrite_on_Activation
 */
function ccp_rewrite_flush() {
	register_ccproviders();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'ccp_rewrite_flush' );
