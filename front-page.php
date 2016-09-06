<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Yvonne's Theme 1.0
 */
$options = get_option( 'yttheme_options' );
get_header(); ?>

<?php if ( is_active_sidebar( 'features' ) ) :
	echo '<div class="features container';
	if ( $options['featured_style']=="icon" ) {
		echo ' icon';
	} elseif ( $options['featured_style']=="rollover" ) {
		echo ' rollover';
	}
	echo ' w';
	echo get_widgets_count( 'features' );
	echo '">';
	dynamic_sidebar( 'features' );
	echo '</div>';
endif; ?>


<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_sidebar(); ?>

<?php if ( $options['latest_post']=="yes" ) :
echo '<div class="latest container';
	if ( $options['featured_style']=="icon" ) {
		echo ' icon';
	} else {
		echo ' roll';
	}
	echo '">';
	?>
	<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><h2 class="entry-title">Latest Posts</h2></a>
	<div class="post">
	<?php
		$args = array( 'numberposts' => '3', 'post_status' => 'publish' );
		$recent_posts = wp_get_recent_posts( $args );
		foreach( $recent_posts as $recent ){
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($recent["ID"]), 'full' );
			echo '<a href="' . get_permalink($recent["ID"]) . '" title="'.esc_attr($recent["post_title"]).'">';
			if ( $options['featured_style']=="rollover" ) {
				echo '<div class="thumb" style="background-image: url('.$thumb['0'].')"></div>';
			} else if ( has_post_thumbnail( $recent["ID"]) ) {
				echo '<img src="'.$thumb['0'].'" alt="'.esc_attr($recent["post_title"]).'">';
			}
			echo '<h5>' . $recent["post_title"] .'<br/><span class="tiny">' . mysql2date('M j, Y', $recent["post_date"]).'</span></h5>';
			if ( $options['featured_style']=="icon" ) {
				echo '<p class="tiny">' . substr($recent["post_content"], 0 , 200) . '</p>';
			}
			echo '</a>';
		}
	?>
	</div>
</div>
<?php endif; ?>

<?php get_footer(); ?>
