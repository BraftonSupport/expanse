<?php
/**
 * Template Name: Full Width Page
 * Description: Page template without sidebar
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Expanse 1.0
 */

$featured = has_post_thumbnail();
$color = get_post_meta( get_queried_object_id(), 'textcolor', true );
$class = get_post_meta( get_queried_object_id(), 'class', true );
$bg = get_post_meta( get_queried_object_id(), 'bgcolor', true );
$shadow = get_post_meta( get_queried_object_id(), 'shadow', true );
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<section class="<?php if ( $class ) { echo $class; } ?>"
			style="<?php
			if ( $bg ) { echo 'background-color: ' . $bg . ';'; }
			if ( $color ) { echo 'color: ' . $color . ';'; }
			if ( $featured ) {
				echo 'background-image: url(';
				the_post_thumbnail_url();
				echo ');';
			} ?>" >
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// End of the loop.
		endwhile;
		?>
			<?php if ( $shadow ) { echo '<hr class="shadow"/>'; } ?>
		</section>

		<?php $args = array( 
        'child_of' => $post->ID, 
        'parent' => $post->ID,
        'hierarchical' => 0,
        'sort_column' => 'menu_order', 
        'sort_order' => 'asc'
		);
		$mypages = get_pages( $args );

		foreach( $mypages as $child ) {
			$id = $child->ID;
			$slug = $child->post_name;
			$url = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), "full" )[0];
			$class = get_post_meta( $id, 'class', true );
			$bg = get_post_meta( $id, 'bgcolor', true );
			$color = get_post_meta( $id, 'textcolor', true );
			$shadow = get_post_meta( $id, 'shadow', true );

			echo '<section id="'.$slug.'"';
				if ( $class ) {
					echo 'class="'.$class.'"';
				}
				if ( $url || $bg || $color ) {
					echo 'style="';
						if ( $url ) { echo 'background-image: url('. $url .');'; }
						if ( $bg ) { echo ' background-color:'. $bg .';'; }
						if ( $color ) { echo ' color:'. $color .';'; }
					echo '"';
				}
			echo '>';
			echo apply_filters('the_content', $child->post_content);
				if ( $shadow ) { echo '<div class="shadow"></div>'; }
			echo '</section>';
		} ?>

	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_footer(); ?>
