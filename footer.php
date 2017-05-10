<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Expanse 1.0
 */
?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ( is_active_sidebar( 'footer' ) ) :
			echo '<div class="site-inner container">';
			echo '<a href="'.esc_url( home_url( '/' ) ).'" rel="home" class="footer-title widget">';
				$image_url = esc_url( get_theme_mod( 'expanse_logo' ) );
				$image_id = expanse_get_image_id($image_url);
				$image_thumb = wp_get_attachment_image_src($image_id, 'medium');
			echo '<img src='.$image_thumb[0].' alt='.esc_attr( get_bloginfo( 'name', 'display' ) ).' class="site-title"></a>';
			dynamic_sidebar( 'footer' );
			echo '</div><br class="clear"/>';
		endif; ?>
			
		<div class="site-info"><div class="site-inner container">
			<?php
				/**
				 * Fires before the expanse footer text for footer customization.
				 *
				 * @since Expanse 1.0
				 */
				do_action( 'expanse_credits' );
			?>
			<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?></a></span>
			<br class="clear"/>
		</div></div><!-- .site-info -->
	</footer><!-- .site-footer -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
