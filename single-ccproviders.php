<?php
/**
 * Template Name: Compare Coins Full-Width Post
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */


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

                        <!-- WP posts while loop START -->
		                <?php
		                // while ( $ccproviders_query->have_posts() ) : $ccproviders_query->the_post();
			                // get the ACF variables
			                require 'ccproviders-acf.php';
			                ?>

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
                                    <img class="img-fluid mt-0 mt-md-3 mb-3" src="<?php echo $provider_logo['sizes']['medium_large']; ?>" alt="<?php the_field('provider_title'); ?>">
                                </div>
                                <!-- provider logo section END -->

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
                                    <ul class="list-inline mb-0 mb-md-3 ccp-main-features">
						                <?php
						                // add <span class="d-inline d-md-none pr-1">, </span>
						                // to all but the last list item to display a comma in mobile view
						                if ( $deposit_methods ) {
							                $len = sizeof( $deposit_methods );
							                $comma = '<span class="d-inline d-md-none pr-1">, </span>';
							
							                foreach ( $deposit_methods as $index => $item ) {
								                if ( $index < $len - 1 ) {
									                echo "\n<li class=\"list-inline-item\">\n";
									                echo $item . $comma;
									                echo "\n</li>\n";
								                } else {
									                echo "\n<li class=\"list-inline-item\">\n";
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
							                if ( $len > 8 ) {
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
								                $extra_coins = '';
								                $all_coins = '';
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
                                        <a href="#" data-toggle="modal" data-target="#ccp-coins-<?php echo $ccpid; ?>">
							                <?php echo $extra_coins; ?>
                                        </a>
                                    </div>
                                    <!-- trigger for all coins modal END -->

                                    <!-- all coins modal -->
                                    <div class="modal fade" id="ccp-coins-<?php echo $ccpid; ?>" tabindex="-1" role="dialog" aria-labelledby="ccp-coins-<?php echo $ccpid; ?>-label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ccp-coins-<?php echo $ccpid; ?>-label">All Available Coins</h5>
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

                                </div>
                                <!-- 'available coins' section END -->

                                <!-- buttons section -->
                                <!-- .order-3 .order-md-4 // change order for mobile screens -->
                                <div class="col-6 col-md-12 order-3 order-md-4 mb-3 mb-md-0 d-flex d-md-block">
                                    <div class="row">
                                        <!-- 'full review' button -->
                                        <!-- .order-2 .order-md-1 // change order for mobile screens -->
                                        <div class="col-12 col-md-3 order-2 order-md-1 text-center d-flex d-md-block">
                                            <a class="btn btn-outline-info py-2 py-sm-3 py-md-2 d-flex d-md-inline-block justify-content-center align-items-center" href="<?php the_field( 'full_review_link' ); ?>">full review</a>
                                        </div>
                                        <!-- 'full review' button END -->

                                        <!-- 'buy coin' button -->
                                        <!-- .order-1 .order-md-2 // change order for mobile screens -->
                                        <div class="col-12 col-md-3 offset-md-6 order-1 order-md-2 d-flex d-md-block">
                                            <a class="btn btn-warning btn-block py-2 py-sm-3 py-md-2 mb-2 mb-sm-3 mb-md-0 d-flex d-md-block justify-content-center align-items-center" href="<?php the_field( 'buy_coin_link' ); ?>">buy coin</a>
                                        </div>
                                        <!-- 'buy coin' button END -->
                                    </div>
                                </div>
                                <!-- buttons section END -->

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
                                        <a data-toggle="collapse" href="#ccp-details-<?php echo $ccpid; ?>" role="button" aria-expanded="false" aria-controls="ccp-details-<?php echo $ccpid; ?>">
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
                                <aside id="ccp-details-<?php echo $ccpid; ?>" class="col-12 order-last ccp-details-col collapse">

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
                                            <div id="ccpDetailsCarousel-<?php echo $ccpid; ?>" class="carousel slide" data-ride="carousel">
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
                                                    <li data-target="#ccpDetailsCarousel-<?php echo $ccpid; ?>" data-slide-to="0" class="active"></li>
                                                    <li data-target="#ccpDetailsCarousel-<?php echo $ccpid; ?>" data-slide-to="1"></li>
                                                    <li data-target="#ccpDetailsCarousel-<?php echo $ccpid; ?>" data-slide-to="2"></li>
                                                </ol>
                                                <a class="carousel-control-prev " href="#ccpDetailsCarousel-<?php echo $ccpid; ?>" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next " href="#ccpDetailsCarousel-<?php echo $ccpid; ?>" role="button" data-slide="next">
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
		
		                <?php
		                // endwhile;
		                ?>
                        <!-- WP posts while loop END -->


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
