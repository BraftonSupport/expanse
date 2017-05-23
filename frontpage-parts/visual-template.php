<?php
/**
 * The template used for displaying visual subsection of page.
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

$visual_intro_text = get_field('visual_intro_text');
$visual_button_text = get_field('visual_button_text');
$visual_button_link = get_field('visual_button_link');

$tracking = get_field('tracking');
?>

<section id="post-<?php the_ID(); ?>" <?php post_class('visual'); ?> style="<?php
	if ( !empty($url) ) { echo 'background-image: url('. $url .');'; }
	if ( !empty($bgc) ) { echo ' background-color:'. $bgc .';'; }
	if ( !empty($tc) ) { echo ' color:'. $tc .';'; }
	?>">

	<?php the_title( '<h1>', '</h1>' );
	if ( $visual_intro_text ) { echo $visual_intro_text; }
	if ( $visual_button_text && $visual_button_link ) {
		echo '<a href="'.$visual_button_link.'" class="button">'.$visual_button_text.'</a>';
	}

	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'expanse' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'expanse' ) . ' </span>%',
		'separator'   => '<span class="screen-reader-text">, </span>',
	) ); ?>

	<?php edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'expanse' ),
			get_the_title()
		),
		'<footer class="entry-footer"><span class="edit-link">',
		'</span></footer><!-- .entry-footer -->'
	); ?>
</section><!-- section -->
<?php if ( $shadow ) { echo '<div class="shadow"></div>'; } ?>