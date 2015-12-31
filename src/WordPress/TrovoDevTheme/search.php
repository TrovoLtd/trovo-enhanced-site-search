<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

use \Trovo\TESS\WordPress\WP_Trovo_Query;

get_header();

$searchTerm = get_query_var('s');

$queryArgs = array(
    "queryTerm" => $searchTerm,
    "googleAccountId" => "Wouldn't you like to know?"
);

$searchQuery = new WP_Trovo_Query($queryArgs);

echo $searchQuery->getFirstResultTitle();

?>

<section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">


        <?php if ( $searchQuery->have_posts() ) : ?>

            <!-- pagination here -->

            <!-- the loop -->
            <?php while ( $searchQuery->have_posts() ) : $searchQuery->the_post(); ?>
                <h2><?php the_title(); ?></h2>
            <?php endwhile; ?>
            <!-- end of the loop -->

        <?php else : ?>
            <p><?php _e( 'Sorry, search no worky.' ); ?></p>
        <?php endif; ?>


    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>



