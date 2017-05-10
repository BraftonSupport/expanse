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
 * @since Expanse 1.0
 */
$options = get_option( 'expanse_options' );
get_header(); ?>

<?php if ( is_front_page() && is_active_sidebar( 'features' ) ) :
	echo '<div class="features container';
	if ( $options['featured_style']=="icon" ) :
		echo ' icon';
	elseif ( $options['featured_style']=="rollover" ) :
		echo ' rollover';
	endif;
	echo '">';
	dynamic_sidebar( 'features' );
	echo '</div>';
endif; ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			if ( !is_front_page() ){ the_title( '<h1>', '</h1>' ); }
			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_sidebar(); ?>

<?php if ( is_front_page() && $options['latest_post']=="yes" ) :
echo '<div class="latest container';
	if ( $options['featured_style']=="icon" ) :
		echo ' icon';
	else :
		echo ' roll';
	endif;
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
			if ( $options['featured_style']=="rollover" ) :
				echo '<div class="thumb" style="background-image: url('.$thumb['0'].')"></div>';
			elseif ( has_post_thumbnail( $recent["ID"]) ) :
				echo '<img src="'.$thumb['0'].'" alt="'.esc_attr($recent["post_title"]).'">';
			endif;
			echo '<h5>' . $recent["post_title"] .'<br/><span class="tiny">' . mysql2date('M j, Y', $recent["post_date"]).'</span></h5>';
			if ( $options['featured_style']=="icon" ) :
				echo '<p class="tiny">' . substr($recent["post_content"], 0 , 200) . '</p>';
			endif;
			echo '</a>';
		}
	?>
	</div>
</div>
<?php endif; ?>

<?php get_footer(); ?>