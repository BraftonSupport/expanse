<?php
/*
Author: Yvonne Tse
URL: http://yvonnetse.com/
Version: Expanse 1.0
*/
define("expanse", dirname(__FILE__));
include expanse.'/inc/themesettings.php';
include expanse.'/inc/themewidgets.php';
include expanse.'/inc/template-tags.php';

/**
 * Expanse only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'expanse_setup' ) ) :


function expanse_setup() {

	load_theme_textdomain( 'expanse', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'expanse' ),
		'social'  => __( 'Social Links Menu', 'expanse' ),
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

	add_editor_style( array( 'css/editor-style.css', expanse_fonts_url() ) );
}
endif; // expanse_setup
add_action( 'after_setup_theme', 'expanse_setup' );

function expanse_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'expanse_content_width', 840 );
}
add_action( 'after_setup_theme', 'expanse_content_width', 0 );

/**
 * Register widget areas.
 */
function expanse_widgets_init() {
	$options = get_option( 'expanse_options' );
	if ( !empty($options['es_home'])&&$options['es_home'] ) {
		register_sidebar( array(
			'name'          => __( 'Home Sidebar', 'expanse' ),
			'id'            => 'home-sidebar',
			'description'   => 'Appears on homepage in the sidebar.',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	if ( $options['es_page'] ) {
		register_sidebar( array(
			'name'          => __( 'Pages Sidebar', 'expanse' ),
			'id'            => 'pages-sidebar',
			'description'   => 'Appears on pages in the sidebar.',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	if ( $options['es_blog'] ) {
		register_sidebar( array(
			'name'          => __( 'Blog Sidebar', 'expanse' ),
			'id'            => 'blog-sidebar',
			'description'   => __( 'Appears on blog and blog posts in the sidebar.' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	if ( $options['es_contact'] ) {
		register_sidebar( array(
			'name'          => __( 'Contact Page Sidebar', 'expanse' ),
			'id'            => 'contact-sidebar',
			'description'   => __( 'Appears on the contact page template in the sidebar.' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	if ( $options['es_header'] ) {
		register_sidebar( array(
			'name'          => __( 'Header', 'expanse' ),
			'id'            => 'header',
			'description'   => 'This is located in the header area. Only 1 widget pls.',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	if ( $options['es_above'] ) {
		register_sidebar( array(
			'name'          => __( 'Above Header', 'expanse' ),
			'id'            => 'top',
			'description'   => 'Tippy top of the site. No more than 2 widgets pls.',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<p>',
			'after_title'   => '</p>',
		) );
	}
	if ( $options['es_features'] ) {
		register_sidebar( array(
			'name'          => __( 'Features', 'expanse' ),
			'id'            => 'features',
			'description'   => 'This is located below the banner on the home page. Perfect time to break out the feature widget! Use up to 4 widgets.',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	if ( $options['es_footer'] ) {
		register_sidebar( array(
			'name'          => __( 'Footer', 'expanse' ),
			'id'            => 'footer',
			'description'   => 'This is located in the footer. Use up to 4 widgets.',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'expanse_widgets_init' );


/**
 * HOH custom excerpt
 */
function excerpt($limit) {
    return wp_trim_words(get_the_excerpt(), $limit, custom_read_more());
}


add_filter(
	'the_excerpt',
	function ($excerpt) {
		$excerpt= substr($excerpt,0,strpos($excerpt,'.')+1);
		if (strlen($excerpt) > 125){
			return implode(' ', array_slice(explode(' ', strip_tags($excerpt)), 0, 15)).'... <a href="'. get_permalink($post->ID) . '" class="button">Read More</a>';
		} else {
			return strip_tags($excerpt).' <a href="'. get_permalink($post->ID) . '" class="button">Read More</a>';
		}
	}
);


if ( ! function_exists( 'expanse_fonts_url' ) ) :
/**
 * Register Google fonts for Expanse.
 *
 * Create your own expanse_fonts_url() function to override in a child theme.
 *
 * @since Expanse 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function expanse_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'expanse' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'expanse' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'expanse' ) ) {
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
function expanse_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'expanse_javascript_detection', 0 );


/**
 * Enqueue all the things!
 */
function expanse_enqueuingallthethings() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'expanse-fonts', expanse_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );
	wp_enqueue_style( 'font-awesome.min', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');

	// Theme stylesheet.
	wp_enqueue_style( 'expanse-style', get_stylesheet_directory_uri() . '/style.css' );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'expanse-ie', get_template_directory_uri() . '/css/ie.css', array( 'expanse-style' ), '20150930' );
	wp_style_add_data( 'expanse-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'expanse-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'expanse-style' ), '20151230' );
	wp_style_add_data( 'expanse-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'expanse-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'expanse-style' ), '20150930' );
	wp_style_add_data( 'expanse-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'expanse-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'expanse-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'expanse-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151112', true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'expanse-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20151104' );
	}

	wp_enqueue_script( 'expanse-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20151204', true );

	wp_localize_script( 'expanse-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'expanse' ),
		'collapse' => __( 'collapse child menu', 'expanse' ),
	) );

	$options = get_option( 'expanse_options' );
	if ( $options['stickynav'] ) {
		wp_enqueue_script( 'sticky', get_template_directory_uri() . '/js/sticky.js', array(), '1.0.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'expanse_enqueuingallthethings' );


/**
 * Adds custom classes to the array of body classes.
 */
function expanse_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of sidebar to sites without active sidebar.
	if ( is_page_template('contact.php') && is_active_sidebar('contact-sidebar') ) {
		$classes[] = 'has-sidebar';
	}
	if ( is_front_page() && is_active_sidebar('home-sidebar') ) {
		$classes[] = 'has-sidebar';
	}
	if ( !is_front_page() && !is_page_template('contact.php') && is_page() && is_active_sidebar('pages-sidebar') ) {
		$classes[] = 'has-sidebar';
	}
	if ( !is_page() && is_active_sidebar('blog-sidebar') ) {
		$classes[] = 'has-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'expanse_body_classes' );

/**
 * Converts a HEX value to RGB.
 */
function expanse_hex2rgb( $color ) {
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
function expanse_content_image_sizes_attr( $sizes, $size ) {
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
add_filter( 'wp_calculate_image_sizes', 'expanse_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 */
function expanse_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'expanse_post_thumbnail_sizes_attr', 10 , 3 );

function expanse_post_thumbnail() {
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
function expanse_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'expanse_widget_tag_cloud_args' );
/* Neat background things for home page sections */

add_action( 'admin_enqueue_scripts', 'bg_add_color_picker' );
function bg_add_color_picker( $hook ) {
 
    // if( is_admin() ) { 
    //     // Add the color picker css file       
    //     wp_enqueue_style( 'wp-color-picker' ); 
         
    //     // Include our custom jQuery file with WordPress Color Picker dependency
    //     wp_enqueue_script( 'color-picker', get_template_directory_uri() . '/js/color-picker.js', array( 'wp-color-picker' ), false, true );
    // }
}

function bg_meta_markup($object) {
	wp_nonce_field(basename(__FILE__), "meta-box-nonce");
	?>
		<div>
			<p><label for="bgcolor">Add a class to this section</label><br>
			<input class="class" name="class" value="<?php echo get_post_meta($object->ID, "class", true); ?>" ></p>

			<p>Add Shadow&nbsp;<label class="screen-reader-text" for="shadow">Add Shadow</label>
			<?php $shadow_value = get_post_meta($object->ID, "shadow", true);

			if($shadow_value == "") { ?>
				<input name="shadow" type="checkbox" value="true">
			<?php } elseif($shadow_value == "true") { ?>  
				<input name="shadow" type="checkbox" value="true" checked>
			<?php } ?>

			<p><label for="bgcolor">Background Color</label><br>
			<input class="color-field" name="bgcolor" value="<?php echo get_post_meta($object->ID, "bgcolor", true); ?>" ></p>

			<p><label for="textcolor">Text Color</label><br>
			<input class="color-field" name="textcolor" value="<?php echo get_post_meta($object->ID, "textcolor", true); ?>" ></p>

		</div>
	<?php  
}

add_action("add_meta_boxes", "add_bg_meta_box");
function add_bg_meta_box() {
	add_meta_box("bg_meta", "Style", "bg_meta_markup", "page", "side", "low", null);
}

add_action("save_post", "save_bg_meta_box", 10, 3);
function save_bg_meta_box($post_id, $post, $update)
{
	if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
		return $post_id;

	if(!current_user_can("edit_post", $post_id))
		return $post_id;

	if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
		return $post_id;

	$slug = "page";
	if($slug != $post->post_type)
		return $post_id;

	$class = "";
	$shadow = "";
	$bg_value = "";
	$color = "";

	if(isset($_POST["class"])) {
		$class = $_POST["class"];
	}   
	update_post_meta($post_id, "class", $class);

	if(isset($_POST["shadow"])) {
		$shadow = $_POST["shadow"];
	}   
	update_post_meta($post_id, "shadow", $shadow);

	if(isset($_POST["bgcolor"])) {
		$bg_value = $_POST["bgcolor"];
	}   
	update_post_meta($post_id, "bgcolor", $bg_value);

	if(isset($_POST["textcolor"])) {
		$color = $_POST["textcolor"];
	}   
	update_post_meta($post_id, "textcolor", $color);
}