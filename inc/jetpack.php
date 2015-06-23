<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package jeniscores
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function jeniscores_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'jeniscores_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function jeniscores_jetpack_setup
add_action( 'after_setup_theme', 'jeniscores_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function jeniscores_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function jeniscores_infinite_scroll_render
