<?php


/**
 * Custom Expanse template tags
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Expanse
 * @since Expanse 1.0
 */
if ( ! function_exists( 'expanse_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * Create your own expanse_entry_meta() function to override in a child theme.
 *
 * @since Expanse 1.0
 */
function expanse_entry_meta() {
	// if ( 'post' === get_post_type() ) {
	// 	$author_avatar_size = apply_filters( 'expanse_author_avatar_size', 49 );
	// 	printf( '<span class="byline"><span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>',
	// 		get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
	// 		_x( 'Author', 'Used before post author name.', 'expanse' ),
	// 		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
	// 		get_the_author()
	// 	);
	// }
	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		expanse_entry_date();
	}
	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'expanse' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}
	if ( 'post' === get_post_type() ) {
		expanse_entry_taxonomies();
	}

	$options = get_option( 'expanse_options' );
	if ( $options['ssbutton']=="on" ) {
		social_sharing_buttons();
	}
	// if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
	// 	echo '<span class="comments-link">';
	// 	comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'expanse' ), get_the_title() ) );
	// 	echo '</span>';
	// }
}
endif;





/**
 * What it says on the tin.
 */
if ( ! function_exists( 'social_sharing_buttons' ) ) :
	$options = get_option( 'expanse_options' );
	if ( $options['ssbutton']=="on" ) {
		function social_sharing_buttons() {
			// Get current page URL 
			$ssbURL = get_permalink();

			// Get current page title
			$ssbTitle = str_replace( ' ', '%20', get_the_title());
				
			// Get Post Thumbnail for pinterest
			$ssbThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

			// Construct sharing URL without using any script
			$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$ssbURL;
			$twitterURL = 'https://twitter.com/intent/tweet?text='.$ssbTitle.'&amp;url='.$ssbURL;
			$googleURL = 'https://plus.google.com/share?url='.$ssbURL;
			$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$ssbURL.'&amp;media='.$ssbThumbnail[0].'&amp;description='.$ssbTitle;
			$linkedURL = 'linkedin.com/shareArticle?mini=true&url='.$ssbURL.'&title='.$ssbTitle;

			// Add sharing button at the end of page/page content
			$variable .= '<span class="ssb-social"><span class="ssb-text">Social Share: </span>';
			$options = get_option( 'expanse_options' );
			if ( $options['ss_fb'] ) { $variable .= '<a class="ssb-facebook" href="'.$facebookURL.'" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>'; }
			if ( $options['ss_tw'] ) { $variable .= '<a class="ssb-twitter" href="'. $twitterURL .'" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>'; }
			if ( $options['ss_gp'] ) { $variable .= '<a class="ssb-googleplus" href="'.$googleURL.'" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>'; }
			if ( $options['ss_li'] ) { $variable .= '<a class="ssb-linked" href="'.$linkedURL.'" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>'; }
			if ( $options['ss_pin'] ) { $variable .= '<a class="ssb-pinterest" href="'.$pinterestURL.'" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>'; }
			if ( $options['ss_email'] ) { $variable .= '<a class="ssb-email" href="mailto:?subject=I wanted you to see this site&amp;body='.$ssbURL.'"><i class="fa fa-envelope" aria-hidden="true"></i></a>'; }
			$variable .= '</span>';

			if ( is_single() && $options['ss_on']=="onpost" || !is_single() && $options['ss_on']=="onexcerpt" || $options['ss_on']=="all" ){
				echo $variable;
			}
		}
	}

endif;


if ( ! function_exists( 'expanse_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own expanse_entry_date() function to override in a child theme.
 *
 * @since Expanse 1.0
 */
function expanse_entry_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		get_the_date(),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date()
	);
	printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
		_x( 'Posted on', 'Used before publish date.', 'expanse' ),
		esc_url( get_permalink() ),
		$time_string
	);
}
endif;

if ( ! function_exists( 'expanse_entry_taxonomies' ) ) :
/**
 * Prints HTML with category and tags for current post.
 *
 * Create your own expanse_entry_taxonomies() function to override in a child theme.
 *
 * @since Expanse 1.0
 */
function expanse_entry_taxonomies() {
	$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'expanse' ) );
	if ( $categories_list && expanse_categorized_blog() ) {
		printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Categories', 'Used before category names.', 'expanse' ),
			$categories_list
		);
	}
	$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'expanse' ) );
	if ( $tags_list ) {
		printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Tags', 'Used before tag names.', 'expanse' ),
			$tags_list
		);
	}
}
endif;

if ( ! function_exists( 'expanse_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own expanse_post_thumbnail() function to override in a child theme.
 *
 * @since Expanse 1.0
 */
function expanse_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}
	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	</a>

	<?php endif; // End is_singular()
}
endif;
if ( ! function_exists( 'expanse_excerpt' ) ) :
	/**
	 * Displays the optional excerpt.
	 *
	 * Wraps the excerpt in a div element.
	 *
	 * Create your own expanse_excerpt() function to override in a child theme.
	 *
	 * @since Expanse 1.0
	 *
	 * @param string $class Optional. Class string of the div element. Defaults to 'entry-summary'.
	 */
	function expanse_excerpt( $class = 'entry-summary' ) {
		$class = esc_attr( $class );
		if ( has_excerpt() || is_search() ) : ?>
			<div class="<?php echo $class; ?>">
				<?php the_excerpt(); ?>
			</div><!-- .<?php echo $class; ?> -->
		<?php endif;
	}
endif;
if ( ! function_exists( 'expanse_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * Create your own expanse_excerpt_more() function to override in a child theme.
 *
 * @since Expanse 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function expanse_excerpt_more() {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'expanse' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'expanse_excerpt_more' );
endif;

if ( ! function_exists( 'expanse_categorized_blog' ) ) :
/**
 * Determines whether blog/site has more than one category.
 *
 * Create your own expanse_categorized_blog() function to override in a child theme.
 *
 * @since Expanse 1.0
 *
 * @return bool True if there is more than one category, false otherwise.
 */
function expanse_categorized_blog() {
	// if ( false === ( $all_the_cool_cats = get_transient( 'expanse_categories' ) ) ) {
	// 	// Create an array of all the categories that are attached to posts.
	// 	$all_the_cool_cats = get_categories( array(
	// 		'fields'     => 'ids',
	// 		// We only need to know if there is more than one category.
	// 		'number'     => 2,
	// 	) );
	// 	// Count the number of categories that are attached to the posts.
	// 	$all_the_cool_cats = count( $all_the_cool_cats );
	// 	set_transient( 'expanse_categories', $all_the_cool_cats );
	// }
	// if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so expanse_categorized_blog should return true.
		return true;
	// } else {
	// 	// This blog has only 1 category so expanse_categorized_blog should return false.
	// 	return false;
	// }
}
endif;

if ( ! function_exists( 'expanse_category_transient_flusher' ) ) :
/**
 * Flushes out the transients used in expanse_categorized_blog().
 *
 * @since Expanse 1.0
 */
function expanse_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'expanse_categories' );
}
add_action( 'edit_category', 'expanse_category_transient_flusher' );
add_action( 'save_post',     'expanse_category_transient_flusher' );
endif;

if ( ! function_exists( 'expanse_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Expanse 1.2
 */
function expanse_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;