<?php
/*
Author: Yvonne Tse
URL: http://yvonnetse.com/
Version: Yvonne's Theme 1.0
*/

include '/inc/themesettings.php';
include '/inc/themewidgets.php';
include '/inc/template-tags.php';

/**
 * Yvonne's Theme only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'yttheme_setup' ) ) :


function yttheme_setup() {

	load_theme_textdomain( 'yttheme', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'yttheme' ),
		'social'  => __( 'Social Links Menu', 'yttheme' ),
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	add_editor_style( array( 'css/editor-style.css', yttheme_fonts_url() ) );
}
endif; // yttheme_setup
add_action( 'after_setup_theme', 'yttheme_setup' );

function yttheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'yttheme_content_width', 840 );
}
add_action( 'after_setup_theme', 'yttheme_content_width', 0 );

/**
 * Register widget areas.
 */
function yttheme_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Home Sidebar', 'yttheme' ),
		'id'            => 'home-sidebar',
		'description'   => 'Appears on homepage in the sidebar.',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Pages Sidebar', 'yttheme' ),
		'id'            => 'pages-sidebar',
		'description'   => 'Appears on pages in the sidebar.',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'yttheme' ),
		'id'            => 'blog-sidebar',
		'description'   => __( 'Appears on blog and blog posts in the sidebar.' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Contact Page Sidebar', 'yttheme' ),
		'id'            => 'contact-sidebar',
		'description'   => __( 'Appears on the contact page template in the sidebar.' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Header', 'yttheme' ),
		'id'            => 'header',
		'description'   => 'This is located in the header area. Only 1 widget pls.',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Above Header', 'yttheme' ),
		'id'            => 'top',
		'description'   => 'Tippy top of the site. No more than 2 widgets pls.',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<p>',
		'after_title'   => '</p>',
	) );

	register_sidebar( array(
		'name'          => __( 'Features', 'yttheme' ),
		'id'            => 'features',
		'description'   => 'This is located below the banner on the home page. Perfect time to break out the feature widget! Use up to 4 widgets.',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'yttheme' ),
		'id'            => 'footer',
		'description'   => 'This is located in the footer. Use up to 4 widgets.',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'yttheme_widgets_init' );


/**
 * How many widget? This many!
 */
function get_widgets_count( $sidebar_id ) {
	$sidebars_widgets = wp_get_sidebars_widgets();
	return (int) count( (array) $sidebars_widgets[ $sidebar_id ] );
}

/**
 * HOH custom excerpt
 */
function excerpt($limit) {
    return wp_trim_words(get_the_excerpt(), $limit, custom_read_more());
}


if ( ! function_exists( 'yttheme_fonts_url' ) ) :
/**
 * Register Google fonts for Yvonne's Theme.
 *
 * Create your own yttheme_fonts_url() function to override in a child theme.
 *
 * @since Yvonne's Theme 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function yttheme_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'yttheme' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'yttheme' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'yttheme' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function yttheme_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'yttheme_javascript_detection', 0 );


/**
 * Enqueue all the things!
 */
function yttheme_enqueuingallthethings() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'yttheme-fonts', yttheme_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );
	wp_enqueue_style( 'font-awesome.min', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');

	// Theme stylesheet.
	wp_enqueue_style( 'yttheme-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'yttheme-ie', get_template_directory_uri() . '/css/ie.css', array( 'yttheme-style' ), '20150930' );
	wp_style_add_data( 'yttheme-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'yttheme-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'yttheme-style' ), '20151230' );
	wp_style_add_data( 'yttheme-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'yttheme-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'yttheme-style' ), '20150930' );
	wp_style_add_data( 'yttheme-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'yttheme-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'yttheme-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'yttheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151112', true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'yttheme-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20151104' );
	}

	wp_enqueue_script( 'yttheme-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20151204', true );

	wp_localize_script( 'yttheme-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'yttheme' ),
		'collapse' => __( 'collapse child menu', 'yttheme' ),
	) );
	
	$options = get_option( 'yttheme_options' );
	if ( $options['stickynav'] ) {
		wp_enqueue_script( 'sticky', get_template_directory_uri() . '/js/sticky.js', array(), '1.0.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'yttheme_enqueuingallthethings' );


/**
 * Adds custom classes to the array of body classes.
 */
function yttheme_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of full width.
	$options = get_option( 'yttheme_options' );
	if ( $options['fullwidth'] ) {
		$classes[] = 'fullwidth';
	} else {
		$classes[] = 'boxed';
	}

	// Adds a class of sidebar to sites without active sidebar.
	if ( is_front_page() && is_active_sidebar( 'home-sidebar' ) ) {
		$classes[] = 'yes-sidebar';
	}
	if ( !is_front_page() && is_page() && is_active_sidebar( 'pages-sidebar' ) ) {
		$classes[] = 'yes-sidebar';
	}
	if ( !is_front_page() && !is_page() && is_active_sidebar( 'blog-sidebar' ) ) {
		$classes[] = 'yes-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'yttheme_body_classes' );

/**
 * Converts a HEX value to RGB.
 */
function yttheme_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 */
function yttheme_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'yttheme_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 */
function yttheme_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'yttheme_post_thumbnail_sizes_attr', 10 , 3 );

function yttheme_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail( 'full' ); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	</a>

	<?php endif; // End is_singular()
}

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 */
function yttheme_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'yttheme_widget_tag_cloud_args' );



/**
 * What it says on the tin.
 */
$options = get_option( 'yttheme_options' );
if ( $options['ssbutton'] ) {
	function social_sharing_buttons($content) {
		if(is_single()){

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
			$variable .= '<div class="ssb-social"><span>Social Share:</span>';
			$options = get_option( 'yttheme_options' );
			if ( $options['ss_fb'] ) { $variable .= '<a class="ssb-facebook" href="'.$facebookURL.'" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>'; }
			if ( $options['ss_tw'] ) { $variable .= '<a class="ssb-twitter" href="'. $twitterURL .'" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>'; }
			if ( $options['ss_gp'] ) { $variable .= '<a class="ssb-googleplus" href="'.$googleURL.'" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>'; }
			if ( $options['ss_li'] ) { $variable .= '<a class="ssb-linked" href="'.$linkedURL.'" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>'; }
			if ( $options['ss_pin'] ) { $variable .= '<a class="ssb-pinterest" href="'.$pinterestURL.'" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>'; }
			if ( $options['ss_email'] ) { $variable .= '<a class="ssb-email" href="mailto:?subject=I wanted you to see this site&amp;body='.$ssbURL.'"><i class="fa fa-envelope" aria-hidden="true"></i></a>'; }
			$variable .= '</div>';

			return $variable.$content;
		}else{
			// if not a post/page then don't include sharing button
			return $variable.$content;
		}
	};
	add_filter( 'the_content', 'social_sharing_buttons');
}