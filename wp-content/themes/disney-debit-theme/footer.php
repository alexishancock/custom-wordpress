<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Disney_Debit
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( '#', 'disney-debit-theme' ) ); ?>"><?php printf( esc_html__( 'Theme %s', 'disney-debit-theme' ), 'Disney Debit' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'disney-debit-theme' ), 'Disney Debit', '<a href="https://automattic.com/" rel="designer">Alexis Hancock, Kelly Zhou</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
