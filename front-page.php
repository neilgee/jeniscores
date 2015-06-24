<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package jeniscores
 */

get_header('home'); ?>
<?php
	//test to see if secondary menu is used - if it is then output it
	if ( has_nav_menu( 'secondary' ) ) : ?>
	<nav class="nav-primary" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
	<div class="wrap">
	<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu' ) ); ?>
	</div>
	</nav>
	<?php endif; ?>

	<?php
	//check to see if home page widgets are being used and if they are - output them
	//https://codex.wordpress.org/Function_Reference/dynamic_sidebar
	if (  is_active_sidebar( 'home-hero' ) ) : ?>

	<div class="home-hero-container">
		<div class="wrap">
			<?php dynamic_sidebar( 'home-hero' ); ?>
		</div><!-- .wrap -->
	</div><!-- .home-hero-container -->

	<?php endif; ?>

	<?php
	if (  is_active_sidebar( 'home-optin' ) ) : ?>

	<div class="home-optin-container">
		<div class="wrap">
			<?php dynamic_sidebar( 'home-optin' ); ?>
		</div><!-- .wrap -->
	</div><!-- .home-optin-container -->

	<?php endif; ?>

	<?php
	if (  is_active_sidebar( 'home-top' ) ) : ?>

	<div class="home-top-container">
		<div class="wrap">
			<?php dynamic_sidebar( 'home-top' ); ?>
		</div><!-- .wrap -->
	</div><!-- .home-top-container -->

	<?php endif; ?>

	<?php
	if (  is_active_sidebar( 'home-middle' ) ) : ?>

	<div class="home-middle-container">
		<div class="wrap">
			<?php dynamic_sidebar( 'home-middle' ); ?>
		</div><!-- .wrap -->
	</div><!-- .home-middle-container -->

	<?php endif; ?>

	<?php
	if (  is_active_sidebar( 'home-bottom' ) ) : ?>

	<div class="home-middle-bottom">
		<div class="wrap">
			<?php dynamic_sidebar( 'home-bottom' ); ?>
		</div><!-- .wrap -->
	</div><!-- .home-bottom-container -->

	<?php endif; ?>
	
	<div id="content" class="site-content site-inner">

	<div id="primary" class="content-area full-width-content">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>