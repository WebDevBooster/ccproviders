<?php
/**
 * Template Name: Compare Coins Full-Width Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

/**
 * ACF fields
 * To echo out use the_field() instead of get_field()
 */
$provider_num = get_field('provider_num');
$provider_title = get_field('provider_title');

$star_rating = get_field( 'star_rating' );
$star_empty = "<img src=\"" . get_stylesheet_directory_uri() . "/images/rating-star-empty.svg\">\n";
$star_full = "<img src=\"" . get_stylesheet_directory_uri() . "/images/rating-star-full.svg\">\n";
// $stars for outputting star icons + screen reader text
switch ($star_rating) {
	case 1:
		$stars .= str_repeat( $star_full, 1 ) . str_repeat( $star_empty, 4 ) .
		          '<span class="sr-only">' . $star_rating . ' star</span>';
		break;
	case 2:
		$stars .= str_repeat( $star_full, 2 ) . str_repeat( $star_empty, 3 ) .
		          '<span class="sr-only">' . $star_rating . ' stars</span>';
		break;
	case 3:
		$stars .= str_repeat( $star_full, 3 ) . str_repeat( $star_empty, 2 ) .
		          '<span class="sr-only">' . $star_rating . ' stars</span>';
		break;
	case 4:
		$stars .= str_repeat( $star_full, 4 ) . str_repeat( $star_empty, 1 ) .
		          '<span class="sr-only">' . $star_rating . ' stars</span>';
		break;
	case 5:
		$stars .= str_repeat( $star_full, 5 ) . str_repeat( $star_empty, 0 ) .
		          '<span class="sr-only">' . $star_rating . ' stars</span>';
		break;
	
	default:
	    // 5 empty stars if the user hasn't selected a star rating
		$stars .= str_repeat( $star_full, 0 ) . str_repeat( $star_empty, 5 ) .
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







if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">

    <div class="<?php echo esc_attr( $container ); ?>" id="content">

        <div class="row">

            <div class="col-md-12 content-area" id="primary">

                <main class="site-main" id="main" role="main">
                    
                    <!-- .fnx-coin-providers.container -->
                    <div class="fnx-coin-providers container">
                    <h1>Compare Coin Providers</h1>
<?php
get_template_part( 'ccproviders' );
/*echo 'Number of array elements in likes: ' . sizeof($what_we_like);
echo '<br>';
if ( $what_we_like ) {
	foreach ( $what_we_like as $index => $item ) {
		print $yes_icon . ' ' . $item;
	}
//	$len = sizeof( $what_we_like );
//
//	foreach ( $what_we_like as $index => $item ) {
//		if ( $index < $len - 1 ) {
//			print $item . ', ';
//		} else {
//			print $item . ' (no comma after last one)';
//		}
//	}
}
echo '<br>';
echo 'Deposit methods:';
echo '<br>';
if ( $deposit_methods ) {
	$len = sizeof( $deposit_methods );
	
	foreach ( $deposit_methods as $index => $item ) {
		if ( $index < $len - 1 ) {
			print $item . ', ';
		} else {
			print $item . ' (no comma after last one)';
		}
	}
}
echo '<br>';

//var_dump($available_coins);
if ( $available_coins ) {
	$len = sizeof( $available_coins );
	
	foreach ( $available_coins as $index => $item ) {
		if ( $index < $len - 1 ) {
			print $item[ 'value' ] . ' + ' . $item[ 'label' ] . ', ';
		} else {
			print $item[ 'value' ] . ' + ' . $item[ 'label' ] . ' (no comma after last one)';
		}
	}
	echo '<br>';
	if ( $len < 9 ) {
	    print 'There are less than 9 coins available';
    } else {
	    print 'There are more than 8 coins available';
	    print '<br>';
	    print 'The first 8 coins are: <br>';
	    print '<ol>';
		foreach ( $available_coins as $index => $item ) {
			if ( $index < 8 ) {
				print '<li>' . $item[ 'label' ] . '</li>';
				// print $item[ 'value' ] . ' + ' . $item[ 'label' ] . ', ';
			}
		}
	    print '</ol>';
    }
	
}*/

?>
                        
                        <!-- WP posts loop START -->
                        
                        <!-- .ccp-section-row for one provider -->
                        <section class="row ccp-section-row pt-4">
                            <!-- title & star rating section -->
                            <!-- .order-1 -->
                            <div class="col-12 order-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row no-gutters">
                                            <div class="col-2 col-sm-1 pr-sm-0">
                                                <div class="ccp-num-circle">
                                                    <!-- Order number of this provider -->
                                                    <!-- '1' = 1st provider, '2' = 2nd provider etc. -->
                                                    <?php the_field('provider_num'); ?>
                                                </div>
                                            </div>
                                            <div class="col-10 col-sm-11 pl-1 pl-sm-0">
                                                <h2 class="ccp-title pl-0 pl-sm-3">
                                                    <!-- Title of this provider -->
                                                    <?php the_field('provider_title'); ?>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row no-gutters">
                                            <div class="col-2 col-sm-1">
                                            </div>
                                            <div class="col-10 col-sm-11 pl-1 pl-sm-3 text-sm-left text-md-right">
                                                <div class="ccp-subtitle mt-0 mt-sm-2 mt-md-3 pl-0 pl-sm-2 d-inline-block">our rating</div>
                                                <div class="ccp-star-rating d-inline-block mb-3 pr-0 pr-md-2">
                                                    <!-- Star rating for this provider -->
                                                    <?php echo $stars; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Separation line -->
                                    <div class="ccp-line mx-3 mb-3"></div>
                                    
                                </div>
                            </div>
                            <!-- title & star rating section END -->

                            <!-- provider logo section -->
                            <!-- .order-2 -->
                            <div class="col-6 col-md-3 order-2 text-center pr-0 pr-md-3">
                                <img class="img-fluid mt-0 mt-sm-2 mt-md-3 mb-3 pr-2 pr-md-3" src="<?php echo $provider_logo['sizes']['medium_large']; ?>" alt="<?php the_field('provider_title'); ?>">
                                <!-- .d-none .d-md-inline-block // hidden on small screens -->
                                <a class="btn btn-outline-info py-2 d-none d-md-inline-block" href="<?php the_field( 'full_review_link' ); ?>">full review</a>
                            </div>
                            <!-- provider logo section END -->

                            <!-- mobile view only buttons -->
                            <!-- .order-3 -->
                            <!-- .d-block .d-md-none // hidden on tablet+ screens -->
                            <div class="col-6 order-3 d-block d-md-none mt-0 mt-sm-2 pl-2">
                                <a class="btn btn-warning btn-block py-2 py-sm-3 mb-2 mb-sm-3" href="<?php the_field( 'buy_coin_link' ); ?>">buy coin</a>
                                <a class="btn btn-outline-info btn-block py-2 py-sm-3" href="<?php the_field( 'full_review_link' ); ?>">full review</a>
                            </div>
                            <!-- mobile view only buttons END -->

                            <!-- 'what we like' section -->
                            <!-- .order-4 -->
                            <div class="col-6 order-4 col-md-3">
                                <div class="ccp-subtitle mt-0 mt-sm-2 mt-md-3 pl-0">what we like</div>
                                <ul class="list-unstyled ccp-main-features">
                                    <?php
                                    // 'what we like' list items with green check mark icon
                                    if ( $what_we_like ) {
	                                    foreach ( $what_we_like as $index => $item ) {
		                                    echo "\n<li>\n";
		                                    echo $yes_icon . " " . $item;
		                                    echo "\n</li>\n";
	                                    }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <!-- 'what we like' section END -->

                            <!-- 'deposit method' section -->
                            <!-- different behavior and order on mobile! -->
                            <!-- same order class as previous = same order as code in HTML -->
                            <!-- .order-5 .order-md-4 -->
                            <div class="col-12 col-md-3 order-5 order-md-4">
                                <div class="ccp-subtitle mt-0 mt-sm-2 mt-md-3 pl-0">deposit method</div>
                                <!-- .d-flex .d-md-block controls display on small vs bigger screens -->
                                <ul class="list-unstyled d-flex d-md-block mb-0 mb-md-3 ccp-main-features">
                                    <?php
                                    // add <span class="d-inline d-md-none pr-1">, </span>
                                    // to all but the last list item to display a comma in mobile view
                                    if ( $deposit_methods ) {
	                                    $len = sizeof( $deposit_methods );
	                                    $comma = '<span class="d-inline d-md-none pr-1">, </span>';
	
	                                    foreach ( $deposit_methods as $index => $item ) {
		                                    if ( $index < $len - 1 ) {
			                                    echo "\n<li>\n";
			                                    echo $item . $comma;
			                                    echo "\n</li>\n";
		                                    } else {
			                                    echo "\n<li>\n";
			                                    echo $item;
			                                    echo "\n</li>\n";
		                                    }
	                                    }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <!-- 'deposit method' section END -->

                            <!-- 'available coins' section -->
                            <!-- .order-4 -->
                            <div class="col-6 col-md-3 order-4">
                                <div class="ccp-subtitle mt-0 mt-sm-2 mt-md-3 pl-0">available coins</div>
                                <div class="ccp-available-coins-top">
                                    <?php
                                    // display up to a maximum of 8 coin icons
                                    // and return the number of remaining coins for the "+ xx more" link
                                    if ( $available_coins ) {
	                                    $img_dir = get_stylesheet_directory_uri() . '/images/';
	                                    $len = sizeof( $available_coins );
	                                    $extra_coins = '';
	                                    $all_coins = '';
	                                    /**
 * <img class="mr-1 mb-1" src="<?php echo $coin_image; ?>" alt="<?php echo $coin_name; ?>">
 */
	                                    if ( $len > 9 ) {
		                                    // if more than 8 coins in this case
		                                    // display only the first 8
                                            // but save all into $all_coins
		                                    foreach ( $available_coins as $index => $item ) {
			                                    $coin_image = $img_dir . $item[ 'value' ];
			                                    $coin_name = $item[ 'label' ];
			                                    $all_coins .= "<img class=\"mr-1 mb-1\" src=\"" . $coin_image . "\" alt=\"" . $coin_name . "\">\n";
			                                    if ( $index < 8 ) {
				                                    echo "<img class=\"mr-1 mb-1\" src=\"" . $coin_image . "\" alt=\"" . $coin_name . "\">\n";
			                                    }
		                                    }
		
		                                    $extra_coins = $len - 8;
		                                    $extra_coins = '+ ' . $extra_coins . ' more';
		                                    
	                                    } else {
		                                    // no more than 8 coins available, show all
		                                    foreach ( $available_coins as $index => $item ) {
			                                    $coin_image = $img_dir . $item[ 'value' ];
			                                    $coin_name = $item[ 'label' ];
			                                    echo "<img class=\"mr-1 mb-1\" src=\"" . $coin_image . "\" alt=\"" . $coin_name . "\">\n";
		                                    }
	                                    }
                                    }
                                    ?>
                                </div>

                                <!-- trigger for all coins modal -->
                                <div class="ccp-main-features mt-2 mb-3">
                                    <!-- "+ xx more" if more than 8 coins -->
                                    <!-- triggers a modal with all coins inside -->
                                    <a href="#" data-toggle="modal" data-target="#ccp-coins-CCPID">
                                        <?php echo $extra_coins; ?>
                                    </a>
                                </div>
                                <!-- trigger for all coins modal END -->
                                
                                <!-- all coins modal -->
                                <div class="modal fade" id="ccp-coins-CCPID" tabindex="-1" role="dialog" aria-labelledby="ccp-coins-CCPID-label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ccp-coins-CCPID-label">All Available Coins</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo $all_coins; ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- all coins modal END -->
                                
                                <!-- .d-none .d-md-block // hidden on small screens -->
                                <a class="btn btn-warning btn-block py-2 d-none d-md-block" href="<?php the_field( 'buy_coin_link' ); ?>">buy coin</a>
                                
                            </div>
                            <!-- 'available coins' section END -->

                            <!-- disclaimer section -->
                            <!-- .order-6 -->
                            <div class="col-12 mt-0 mt-md-3 mb-1 order-6">
                                <p class="ccp-disclaimer">
                                    <?php the_field( 'disclaimer' ); ?>
                                </p>
                            </div>
                            <!-- disclaimer section END -->

                            <!-- show/hide details link section -->
                            <!-- .order-7 -->
                            <div class="col-12 text-center order-7">
                                <p class="ccp-details-link">
                                    <a data-toggle="collapse" href="#ccp-details-CCPID" role="button" aria-expanded="false" aria-controls="ccp-details-CCPID">
                                        <!-- keep one &nbsp; here! -->
                                        &nbsp;
                                        <!-- the 'show/hide details' text + arrows -->
                                        <!-- are coming via css for .ccp-details-link class -->
                                    </a>
                                </p>
                            </div>
                            <!-- show/hide details link section END -->

                            <!-- details section -->
                            <!-- .order-last -->
                            <aside id="ccp-details-CCPID" class="col-12 order-last ccp-details-col collapse">

                                <!-- .ccp-details-row for desktop & tablet -->
                                <!-- .d-none .d-md-flex // hide on mobile -->
                                <div class="row ccp-details-row justify-content-center d-none d-md-flex mx-md-0 px-md-0 mx-lg-5 px-lg-2 px-xl-4">
                                    <div class="col-md-4 px-md-2 px-lg-3">
                                        <div class="ccp-subtitle mt-3 pl-0 text-center text-md-left">account information</div>
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    Deposit In
                                                </td>
                                                <td>
                                                    <?php the_field( 'deposit_in' ); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Includes wallet
                                                </td>
                                                <td>
                                                    <!-- $yes_icon (green check mark) if the checkbox is checked else $no_icon -->
	                                                <?php
	                                                if ( get_field( 'includes_wallet' )[0] == 'yes' ) {
		                                                echo $yes_icon;
	                                                } else {
		                                                echo $no_icon;
	                                                }
	                                                ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Min deposit
                                                </td>
                                                <td>
                                                    <?php echo '$'. get_field( 'min_deposit' ); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Min trade
                                                </td>
                                                <td>
	                                                <?php echo '$'. get_field( 'min_trade' ); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Leverage
                                                </td>
                                                <td>
	                                                <?php the_field( 'leverage' ); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Deposit fees
                                                </td>
                                                <td>
	                                                <?php echo get_field( 'deposit_fees' ) . '%'; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Trade fees
                                                </td>
                                                <td>
	                                                <?php echo get_field( 'trade_fees' ) . '%'; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Withdrawl fees
                                                </td>
                                                <td>
	                                                <?php the_field( 'withdrawl_fees' ); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Margin trading
                                                </td>
                                                <td>
                                                    <!-- $yes_icon (green check mark) if the checkbox is checked else $no_icon -->
	                                                <?php
	                                                if ( get_field( 'margin_trading' )[0] == 'yes' ) {
		                                                echo $yes_icon;
	                                                } else {
		                                                echo $no_icon;
	                                                }
	                                                ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-4 px-md-2 px-lg-3">
                                        <div class="ccp-subtitle mt-0 mt-sm-2 mt-md-3 pl-0">research</div>
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    Education
                                                </td>
                                                <td>
                                                    <!-- $yes_icon (green check mark) if the checkbox is checked else $no_icon -->
	                                                <?php
	                                                if ( get_field( 'education' )[0] == 'yes' ) {
		                                                echo $yes_icon;
	                                                } else {
		                                                echo $no_icon;
	                                                }
	                                                ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Analyst recommendations
                                                </td>
                                                <td>
                                                    <!-- $yes_icon (green check mark) if the checkbox is checked else $no_icon -->
	                                                <?php
	                                                if ( get_field( 'analyst_recommendations' )[0] == 'yes' ) {
		                                                echo $yes_icon;
	                                                } else {
		                                                echo $no_icon;
	                                                }
	                                                ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Advanced charts
                                                </td>
                                                <td>
                                                    <!-- $yes_icon (green check mark) if the checkbox is checked else $no_icon -->
	                                                <?php
	                                                if ( get_field( 'advanced_charts' )[0] == 'yes' ) {
		                                                echo $yes_icon;
	                                                } else {
		                                                echo $no_icon;
	                                                }
	                                                ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-4 px-md-2 px-lg-3">
                                        <div class="ccp-subtitle mt-0 mt-sm-2 mt-md-3 pl-0">security</div>
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    100% Security Record
                                                </td>
                                                <td>
                                                    <!-- $yes_icon (green check mark) if the checkbox is checked else $no_icon -->
	                                                <?php
	                                                if ( get_field( 'security_record' )[0] == 'yes' ) {
		                                                echo $yes_icon;
	                                                } else {
		                                                echo $no_icon;
	                                                }
	                                                ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Does it offer 2fa
                                                </td>
                                                <td>
                                                    <!-- $yes_icon (green check mark) if the checkbox is checked else $no_icon -->
	                                                <?php
	                                                if ( get_field( 'does_it_offer_2fa' )[0] == 'yes' ) {
		                                                echo $yes_icon;
	                                                } else {
		                                                echo $no_icon;
	                                                }
	                                                ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- .ccp-details-row for desktop & tablet END -->

                                <!-- .ccp-details-row for mobile -->
                                <!-- .d-flex .d-md-none // hide from `md` and up -->
                                <div class="row ccp-details-row justify-content-center d-flex d-md-none">
                                    <div class="col-12">
                                        <!-- details carousel -->
                                        <div id="ccpDetailsCarousel-CCPID" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active px-5">
                                                    <div class="ccp-subtitle mt-3 pl-0 text-center text-md-left">account information</div>
                                                    <table class="table ">
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                Deposit In
                                                            </td>
                                                            <td>
			                                                    <?php the_field( 'deposit_in' ); ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Includes wallet
                                                            </td>
                                                            <td>
                                                                <!-- $yes_icon (green check mark) if the checkbox is checked else $no_icon -->
			                                                    <?php
			                                                    if ( get_field( 'includes_wallet' )[0] == 'yes' ) {
				                                                    echo $yes_icon;
			                                                    } else {
				                                                    echo $no_icon;
			                                                    }
			                                                    ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Min deposit
                                                            </td>
                                                            <td>
			                                                    <?php echo '$'. get_field( 'min_deposit' ); ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Min trade
                                                            </td>
                                                            <td>
			                                                    <?php echo '$'. get_field( 'min_trade' ); ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Leverage
                                                            </td>
                                                            <td>
			                                                    <?php the_field( 'leverage' ); ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Deposit fees
                                                            </td>
                                                            <td>
			                                                    <?php echo get_field( 'deposit_fees' ) . '%'; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Trade fees
                                                            </td>
                                                            <td>
			                                                    <?php echo get_field( 'trade_fees' ) . '%'; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Withdrawl fees
                                                            </td>
                                                            <td>
			                                                    <?php the_field( 'withdrawl_fees' ); ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Margin trading
                                                            </td>
                                                            <td>
                                                                <!-- $yes_icon (green check mark) if the checkbox is checked else $no_icon -->
			                                                    <?php
			                                                    if ( get_field( 'margin_trading' )[0] == 'yes' ) {
				                                                    echo $yes_icon;
			                                                    } else {
				                                                    echo $no_icon;
			                                                    }
			                                                    ?>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="carousel-item px-5">
                                                    <div class="ccp-subtitle mt-3 pl-0 text-center text-md-left">research</div>
                                                    <table class="table ">
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                Education
                                                            </td>
                                                            <td>
                                                                <!-- $yes_icon (green check mark) if the checkbox is checked else $no_icon -->
			                                                    <?php
			                                                    if ( get_field( 'education' )[0] == 'yes' ) {
				                                                    echo $yes_icon;
			                                                    } else {
				                                                    echo $no_icon;
			                                                    }
			                                                    ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Analyst recommendations
                                                            </td>
                                                            <td>
                                                                <!-- $yes_icon (green check mark) if the checkbox is checked else $no_icon -->
			                                                    <?php
			                                                    if ( get_field( 'analyst_recommendations' )[0] == 'yes' ) {
				                                                    echo $yes_icon;
			                                                    } else {
				                                                    echo $no_icon;
			                                                    }
			                                                    ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Advanced charts
                                                            </td>
                                                            <td>
                                                                <!-- $yes_icon (green check mark) if the checkbox is checked else $no_icon -->
			                                                    <?php
			                                                    if ( get_field( 'advanced_charts' )[0] == 'yes' ) {
				                                                    echo $yes_icon;
			                                                    } else {
				                                                    echo $no_icon;
			                                                    }
			                                                    ?>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="carousel-item  px-5">
                                                    <div class="ccp-subtitle mt-3 pl-0 text-center text-md-left">security</div>
                                                    <table class="table">
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                100% Security Record
                                                            </td>
                                                            <td>
                                                                <!-- $yes_icon (green check mark) if the checkbox is checked else $no_icon -->
			                                                    <?php
			                                                    if ( get_field( 'security_record' )[0] == 'yes' ) {
				                                                    echo $yes_icon;
			                                                    } else {
				                                                    echo $no_icon;
			                                                    }
			                                                    ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Does it offer 2fa
                                                            </td>
                                                            <td>
                                                                <!-- $yes_icon (green check mark) if the checkbox is checked else $no_icon -->
			                                                    <?php
			                                                    if ( get_field( 'does_it_offer_2fa' )[0] == 'yes' ) {
				                                                    echo $yes_icon;
			                                                    } else {
				                                                    echo $no_icon;
			                                                    }
			                                                    ?>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <ol class="carousel-indicators">
                                                <li data-target="#ccpDetailsCarousel-CCPID" data-slide-to="0" class="active"></li>
                                                <li data-target="#ccpDetailsCarousel-CCPID" data-slide-to="1"></li>
                                                <li data-target="#ccpDetailsCarousel-CCPID" data-slide-to="2"></li>
                                            </ol>
                                            <a class="carousel-control-prev " href="#ccpDetailsCarousel-CCPID" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next " href="#ccpDetailsCarousel-CCPID" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                        <!-- details carousel END -->

                                    </div>
                                </div>
                                <!-- .ccp-details-row for mobile END -->

                            </aside>
                            <!-- details section END -->

                        </section>
                        <!-- .ccp-section-row for one provider END -->

                        <!-- WP posts loop END -->

                    </div>
                    <!-- .fnx-coin-providers.container END -->



                    <h1>Lorem ipsum dolor sit amet</h1>
                    
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis sit recusandae error assumenda odit voluptate illum, voluptatibus! Nostrum deserunt quas consectetur, a dolor nihil numquam odit, soluta at, praesentium, cupiditate!
                    </p>

                    <?php while ( have_posts() ) : the_post(); ?>

                    <?php // get_template_part( 'loop-templates/content', 'page' ); ?>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
//                    if ( comments_open() || get_comments_number() ) :
//                    comments_template();
//                    endif;
                    ?>

                    <?php endwhile; // end of the loop. ?>

                </main><!-- #main -->

            </div><!-- #primary -->

        </div><!-- .row end -->

    </div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
