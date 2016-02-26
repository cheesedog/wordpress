<?php
/**
 * Template Name: Ask Landing
 * The template for asking landing page
 *
 *
 * @package WordPress
 * @subpackage Onerockwell
 * @since Onerockwell 1.0
 */

get_header(); ?>

<div id="primary" class="content-area ask-landing">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			// Include the page content template.
			get_template_part( 'template-parts/content', 'ask-landing' );
			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>