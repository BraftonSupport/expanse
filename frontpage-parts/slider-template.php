<?php
/**
 * Slider subsection of page.
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

$slider_type = get_field('slider_type');
$custom_slider_post = get_field('custom_slider_post');
$recent_slider = get_field('recent_slider_posts');
$slider_button = get_field('slider_read_more');
$number = get_field('slider_number_of_posts');

$tracking = get_field('tracking');
?>

<section id="post-<?php the_ID(); ?>" <?php post_class('slider'); ?> style="<?php
	if ( !empty($url) ) { echo 'background-image: url('. $url .');'; }
	if ( !empty($bgc) ) { echo ' background-color:'. $bgc .';'; }
	if ( !empty($tc) ) { echo ' color:'. $tc .';'; }
	?>">
<span class="quotes">&ldquo;</span>
<div class="slick">
	<?php if ( $slider_type=='choose' && $custom_slider_post ) {
		foreach( $custom_slider_post as $post ) { ?>
			<div>
				<?php
					$excerpt= get_post_field('post_content', $post);
					if (strlen($excerpt) > 150){
						echo implode(' ', array_slice(explode(' ', strip_tags($excerpt)), 0, 28)).'...';
					} else {
						echo strip_tags($excerpt);
					}
				if ( $slider_button ){ ?>
					<a href="<?php echo get_permalink($post->ID); ?>" class="button">Read More</a>
				<?php } ?>
			</div>
		<?php }
	}
	elseif ($slider_type=='recent'){
		query_posts(array(
			'post_type' => $recent_slider,
			'showposts' => $number
		) );  
		while (have_posts()) : the_post(); ?>
			<div><?php
					$excerpt= get_the_content();
					if (strlen($excerpt) > 150){
						echo implode(' ', array_slice(explode(' ', strip_tags($excerpt)), 0, 28)).'...';
					} else {
						echo strip_tags($excerpt);
					}
					echo '</p>';
			if ( $slider_button ){ ?>
				<a href="<?php echo get_permalink(); ?>" class="button">Read More</a>
			<?php } ?>

			</div>
		<?php endwhile;
		wp_reset_query();
	} ?>
</div><span class="quotes">&rdquo;</span>
<div class="toolbar"></div>
</section><!-- section -->
<?php if ( $shadow ) { echo '<div class="shadow"></div>'; } ?>