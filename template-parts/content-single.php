<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Expanse 1.0
 */
$options = get_option( 'expanse_options' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php expanse_excerpt(); ?>

	<?php expanse_post_thumbnail('full'); ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'expanse' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'expanse' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php expanse_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'expanse' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->


<?php if ( $options['related_posts']=="below" ) :
	echo '<div class="latest container';
	if ( $options['featured_style']=="icon" ) {
		echo ' icon';
	} else {
		echo ' roll';
	}
	echo '">';
?>
	<h3>Related Posts</h3>
	<div class="post">

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
						if ( $options['featured_style']=="icon" ) {
							echo '<p class="tiny">' . substr(get_the_content(), 0 , 200) . '</p>';
						}
					echo '</a>';
					endwhile;
				}
			}
		} ?>
	</div>
</div>
<?php endif; ?>


</article><!-- #post-## -->