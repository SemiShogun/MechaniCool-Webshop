<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package designhubs
 */

?>
	</div>
</div>
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="widget_footer">
				<div class="widget_section footer_section1">
					<?php dynamic_sidebar('footer-1'); ?>
				</div>
				<div class="widget_section footer_section2">
					<?php dynamic_sidebar('footer-2');  ?>
				</div>
				<div class="widget_section footer_section3">
					<?php dynamic_sidebar('footer-3');  ?>
				</div>
				<div class="widget_section footer_section4">
					<?php dynamic_sidebar('footer-4');  ?>
				</div>
			</div>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'designhubs' ) ); ?>">
					<?php
					printf( esc_html__( 'Proudly powered by %s', 'designhubs' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
					<?php
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'designhubs' ), 'designhubs', '<a href="https://www.xeeshop.com/">reviewexchanger</a>' );
					?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<button type="button" class="scrollingUp scrolling-btn is-active" aria-label="scrollingUp"><i class="fa fa-angle-up"></i></button>
<?php wp_footer(); ?>

</body>
</html>
