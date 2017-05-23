<?php
/**
 * The template used for displaying custom post type subsection of page.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Expanse 1.0
 */
$id = get_the_ID();
$url = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), "full" )[0];
$shadow = get_field('shadow', $id);
$bgc = get_field('background_color', $id);
$tc = get_field('text_color', $id);

$custom_post = get_field('custom_post');
$custom_show = get_field('custom_show');

if( $custom_show && in_array('featured', $custom_show) ) { $featured = 1; } else { $featured = 0; }
if( $custom_show && in_array('circle', $custom_show) ) { $circle = 1; } else { $circle = 0; }
if( $custom_show && in_array('button', $custom_show) ) { $button = 1; } else { $button = 0; }

$tracking = get_field('tracking');
?>

<section id="post-<?php the_ID(); ?>" <?php post_class('custompost'); ?> style="<?php
	if ( !empty($url) ) { echo 'background-image: url('. $url .');'; }
	if ( !empty($bgc) ) { echo ' background-color:'. $bgc .';'; }
	if ( !empty($tc) ) { echo ' color:'. $tc .';'; }
?>">

	<div class="entry-content">
		<?php
		the_title( '<h1>', '</h1>' );
		if ( $custom_post ) { echo $custom_post; }
		if( $colors && in_array('red', $colors) ) { ?>
			echo $custom_show;
		}

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'expanse' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'expanse' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'expanse' ),
				get_the_title()
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer><!-- .entry-footer -->'
		);
	?>
</section><!-- section -->
<?php if ( $shadow ) { echo '<div class="shadow"></div>'; } ?>