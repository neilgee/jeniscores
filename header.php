<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package jeniscores
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( is_active_sidebar( 'preheader' ) ) : ?>
	<div class="preheader-container"><div class="wrap">
		<?php dynamic_sidebar( 'preheader' ); ?>
	</div></div>
<?php endif; ?>


<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'jeniscores' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="wrap">
		<div class="title-area site-branding">
		<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php bloginfo( 'name' ); echo ', '; bloginfo( 'description' ); ?>">
	</a>
	<?php else : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			<?php endif; // End header image check. ?>
		</div><!-- .site-branding -->

		
		<div class="widget-area header-widget-area">
		<?php 
		//output menu only if used
		if ( has_nav_menu( 'primary' ) ) : ?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
		<?php endif; ?>
		<?php dynamic_sidebar( 'header-right' ); ?>
		</div>
		</div><!-- .wrap -->
	</header><!-- #masthead -->
	<?php
	//test to see if secondary menu is used - if it is then output it
	if ( has_nav_menu( 'secondary' ) ) : ?>
	<nav class="nav-primary" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
	<div class="wrap">
	<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu' ) ); ?>
	</div>
	</nav>
	<?php endif; ?>
	<div id="content" class="site-content site-inner">
