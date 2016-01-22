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

wp_enqueue_style('search', get_stylesheet_directory_uri() . '/search.css');

$searchTerm = get_query_var('s');

$searchOptions = get_option('trovo_search_options');

$queryArgs = array(
    "queryTerm" => $searchTerm,
    "googleAccountId" => $searchOptions['gss_account_id']
);

$searchQuery = new WP_Trovo_Query($queryArgs);



//echo $searchQuery->getFirstResultTitle();

?>

<section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">


        <?php if ( $searchQuery->have_results() ) : ?>

            <!-- pagination here -->

            <!-- the loop -->
            <?php

                $results = $searchQuery->get_results();

                foreach ($results as $result): ?>
                <h3 class="search-result-title"><a class="search-result-link" href="<?php echo $result->getUrl(); ?>"><?php echo $result->getTitle(); ?></a></h3>

                    <p class="search-result-snippet"><?php echo $result->getSnippet(); ?></p>

            <?php endforeach; ?>
            <!-- end of the loop -->

        <?php else : ?>
            <p><?php _e( 'Sorry, search no worky.' ); ?></p>
        <?php endif; ?>


    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php get_footer(); ?>



