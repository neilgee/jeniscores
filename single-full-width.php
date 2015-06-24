<?php
/*
Single Post Template:Full Width
 *
 * @package jeniscores
 */

get_header(); ?>

	<div id="primary" class="content-area full-width-content">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<!-- <?php the_post_navigation(); ?> -->

			<?php 
			//Output the adter entry widget
			if ( is_active_sidebar( 'after-entry' ) ) :
					dynamic_sidebar( 'after-entry' ); 
			endif; ?>


			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>