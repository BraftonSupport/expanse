<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Expanse 1.0
 */
$options = get_option( 'expanse_options' );
?>

<?php if (is_page_template('contact.php') ) {
	echo '<aside id="secondary" class="sidebar widget-area" role="complementary">';
	dynamic_sidebar( 'contact-sidebar' );
	echo '</aside><!-- .sidebar .widget-area -->';
} else if ( is_front_page() && is_active_sidebar('home-sidebar')) {
	echo '<aside id="secondary" class="sidebar widget-area" role="complementary">';
	dynamic_sidebar( 'home-sidebar' );
	echo '</aside><!-- .sidebar .widget-area -->';
} else if (!is_front_page() && is_page() && is_active_sidebar('pages-sidebar')) {
	echo '<aside id="secondary" class="sidebar widget-area" role="complementary">';
	dynamic_sidebar( 'pages-sidebar' );
	echo '</aside><!-- .sidebar .widget-area -->';
} else if (!is_page() && is_active_sidebar('blog-sidebar')) {
	echo '<aside id="secondary" class="sidebar widget-area" role="complementary">';
	dynamic_sidebar( 'blog-sidebar' );

	if ( is_single() && $options['related_posts']=="side" ) {
		echo '<div class="latest';
		if ( $options['featured_style']=="icon" ) {
			echo ' icon';
		} else {
			echo ' roll';
		}
		echo '">';
	?>
			<h3>Related Posts</h3>
			<?php $categories = get_the_category();
			if ($categories) {
				foreach ($categories as $category) {
					$cat = $category->cat_ID;
					$args=array( 'cat' => $cat, 'post__not_in' => array($post->ID), 'posts_per_page'=>3 );

					$my_query = null;
					$my_query = new WP_Query($args);

					if( $my_query->have_posts() ) {
						while ($my_query->have_posts()) : $my_query->the_post();
						$url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
						echo '<a href="' . get_the_permalink() . '" title="'.get_the_title().'">';
							if ( $options['featured_style']=="rollover" ) {
								echo '<div class="thumb" style="background-image: url('.$url[0].')"></div>';
							} else if ( get_post_thumbnail_id( get_the_ID() ) ) {
								echo '<img src="'.$url[0].'" alt="'.get_the_title().'">';
							}
							echo '<h5>'.get_the_title().'<br/><span class="tiny">'.get_the_date('M j, Y').'</span></h5>';
						echo '</a>';
						endwhile;
					}
				}
			} ?>
		</div>
	<?php }
	echo '</aside><!-- .sidebar .widget-area -->';

} ?>