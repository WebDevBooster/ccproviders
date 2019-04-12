<?php
/**
 * Template Name: Full Width Page
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
                    
                    <h1>Note:</h1>
                    
                    <p>
                        The current version of the shortcode (<code>[ccproviders]</code>) is designed to be used on <em>full-width</em> pages or posts. And of course, if desired, it could be adjusted for posts and pages with a sidebar as well.
                    </p>
                    <p>
                        You can <a href="http://fnx.alexbooster.com/wp/ccproviders.zip"><strong>download this child theme here</strong></a>.
                        Or get it on <a href="https://github.com/WebDevBooster/ccproviders"><strong>GitHub here</strong></a>.
                        <br>
                        You can also download the backup file in the
                        <a href="http://fnx.alexbooster.com/wp/wp-admin/"><strong>WP admin area here</strong></a>
                        <br>
                        under 'All-in-One WP Migration' &gt; Backups and restore it using
                        <a href="http://fnx.alexbooster.com/wp/all-in-one-wp-migration.zip"><strong>this plugin</strong></a> (that's a quick way to get all the customs posts with all the data).
                    </p>
                    <p>
                        Click one of the links in the header to see the output of the shortcode in action or watch the following video where I go through all the important points worth mentioning:
                    </p>
                    <p>
                        <iframe width="640" height="360" src="https://www.youtube.com/embed/1KTQFxgTRqo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
