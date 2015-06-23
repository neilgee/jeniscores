<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package jeniscores
 */

?>

	</div><!-- #content -->
	<?php
	//check to see if widget is being used and if is - output all 3 footer
	//https://codex.wordpress.org/Function_Reference/dynamic_sidebar
	if (  is_active_sidebar( 'footer1' ) ) : ?>


	<div class="footer-widgets">
	<div class="wrap">
	<div class="footer-widgets-1 widget-area">
	<?php dynamic_sidebar( 'footer1' ); ?>
	</div>
	<div class="footer-widgets-2 widget-area">
	<?php dynamic_sidebar( 'footer2' ); ?>
	</div>
	<div class="footer-widgets-3 widget-area">
	<?php dynamic_sidebar( 'footer3' ); ?>
	</div>

	</div><!-- .wrap -->
	</div><!-- #footer-widgets -->
	<?php endif; ?>
	<?php
	//check to see if widget is being used and if is - output footer
	//https://codex.wordpress.org/Function_Reference/dynamic_sidebar
	if (  is_active_sidebar( 'footer' ) ) : ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php dynamic_sidebar( 'footer' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
	<?php else : ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'jeniscores' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'jeniscores' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'jeniscores' ), 'jeniscores', '<a href="http://wpbeaches.com" rel="designer">Neil Gee</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
