<?php
/**
 * Variables for Advanced Custom Fields (ACF)
 * To echo out use the_field() instead of get_field()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$provider_num = get_field('provider_num');

// $ccpid is for generating unique ids in HTML
// unique ids are needed in Bootstrap for controls etc.
// deliberately using a separate variable here instead of the above ones
$ccpid = get_field('provider_num');

$provider_title = get_field('provider_title');

$star_rating = get_field( 'star_rating' );
$star_empty = "<img src=\"" . get_stylesheet_directory_uri() . "/images/rating-star-empty.svg\">\n";
$star_full = "<img src=\"" . get_stylesheet_directory_uri() . "/images/rating-star-full.svg\">\n";
// $stars for outputting star icons + screen reader text
switch ( $star_rating ) {
	case 1:
		$stars = str_repeat( $star_full, 1 ) . str_repeat( $star_empty, 4 ) .
		          '<span class="sr-only">' . $star_rating . ' star</span>';
		break;
	case 2:
		$stars = str_repeat( $star_full, 2 ) . str_repeat( $star_empty, 3 ) .
		          '<span class="sr-only">' . $star_rating . ' stars</span>';
		break;
	case 3:
		$stars = str_repeat( $star_full, 3 ) . str_repeat( $star_empty, 2 ) .
		          '<span class="sr-only">' . $star_rating . ' stars</span>';
		break;
	case 4:
		$stars = str_repeat( $star_full, 4 ) . str_repeat( $star_empty, 1 ) .
		          '<span class="sr-only">' . $star_rating . ' stars</span>';
		break;
	case 5:
		$stars = str_repeat( $star_full, 5 ) . str_repeat( $star_empty, 0 ) .
		          '<span class="sr-only">' . $star_rating . ' stars</span>';
		break;
	
	default:
		// 5 empty stars if the user hasn't selected a star rating
		$stars = str_repeat( $star_full, 0 ) . str_repeat( $star_empty, 5 ) .
		          '<span class="sr-only">No rating yet</span>';
}

$provider_logo = get_field( 'provider_logo' );
// echo $provider_logo['sizes']['medium_large'];
/**
 * HTML with title in the alt attribute:
 * <img src="<?php echo $provider_logo['sizes']['medium_large']; ?>" alt="<?php the_field('provider_title'); ?>">
 *
 * Make sure to add the required Bootstrap classes to that image tag!
 */

$full_review_link = get_field( 'full_review_link' );
$buy_coin_link = get_field( 'buy_coin_link' );

// Array of likes, deposit methods & available coins:
$what_we_like = get_field( 'what_we_like' );
$deposit_methods = get_field( 'deposit_methods' );
$available_coins = get_field( 'available_coins' );

$yes_icon = '<img src="' . get_stylesheet_directory_uri() . '/images/icon-check-mark-green.svg" alt="yes">';
$no_icon = '<img src="' . get_stylesheet_directory_uri() . '/images/icon-cross-red.svg" alt="no">';

$disclaimer = get_field( 'disclaimer' );
