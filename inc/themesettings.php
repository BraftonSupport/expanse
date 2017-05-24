<?php

/*Oh gosh, shortcodes! Adding buttons for shortcodes into the WP editor
-----------------------------------------------------------------*/

function the_content_filter($content) {
    $block = join("|",array("row", "half", "third", "fourth","twothirds","threefourths", "compact"));
    $rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
    $rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
return $rep;
}
add_filter("the_content", "the_content_filter");

$shortcodesarray= array('row','half','third','fourth','twothirds','threefourths','compact');
foreach ($shortcodesarray as $shortcode) {
	add_shortcode( $shortcode, $shortcode.'_shortcode' );
}
function row_shortcode( $atts , $content = null ) {
    $a = shortcode_atts( array( 'class' => '', 'bg-color' => '', 'color' => '', 'bg-image' => '', 'padding' => ''), $atts );
	$html = '<div class="row';
		if ( !empty( $a['class'] ) ) {
			$html.= ' '.esc_attr($a['class']).'"';
		} else {
			$html.= '"';
		}
		if ( !empty( $a['bg-color']) || !empty( $a['color']) || !empty( $a['bg-image']) || !empty( $a['padding'] ) ) {
			$html.= ' style="';
		}
			if ( !empty( $a['bg-color'] ) ) {
				$html.= 'background-color:'. esc_attr($a['bg-color']).'; ';
			}
			if ( !empty( $a['color'] ) ) {
				$html.= 'color:'. esc_attr($a['color']).'; ';
			}
			if ( !empty( $a['bg-image'] ) ) {
				$html.= 'background-image:url('. esc_attr($a['bg-image']).');background-position: center; -webkit-align-self: stretch; -ms-flex-item-align: stretch; align-self: stretch;';
			}
			if ( !empty( $a['padding'] || $a['padding'] == '0' ) ) {
				$html.= 'padding:'. esc_attr($a['padding']).';';
			}
		if ( !empty( $a['bg-color'] ) || !empty( $a['color'] ) || !empty( $a['bg-image'] ) || !empty( $a['padding'] ) || $a['padding'] == '0' ) {
			$html.= '"';
		}
		$html.= '><div class="container site-inner">' . do_shortcode($content) . '</div></div>';
	return $html;
}

function half_shortcode( $atts , $content = null ) {
    $a = shortcode_atts( array( 'class' => '', 'bg-color' => '', 'color' => '', 'bg-image' => '', 'padding' => ''), $atts );
	$html = '<div class="half';
		if ( !empty( $a['class'] ) ) {
			$html.= ' '.esc_attr($a['class']).'"';
		} else {
			$html.= '"';
		}
		if ( !empty( $a['bg-color']) || !empty( $a['color']) || !empty( $a['bg-image']) || !empty( $a['padding'] ) || $a['padding'] == '0' ) {
			$html.= ' style="';
		}
			if ( !empty( $a['bg-color'] ) ) {
				$html.= 'background-color:'. esc_attr($a['bg-color']).'; ';
			}
			if ( !empty( $a['color'] ) ) {
				$html.= 'color:'. esc_attr($a['color']).'; ';
			}
			if ( !empty( $a['bg-image'] ) ) {
				$html.= 'background-image:url('. esc_attr($a['bg-image']).');background-position: center; -webkit-align-self: stretch; -ms-flex-item-align: stretch; align-self: stretch;';
			}
			if ( !empty( $a['padding'] ) || $a['padding'] == '0' ) {
				$html.= 'padding:'. esc_attr($a['padding']).';';
			}
		if ( !empty( $a['bg-color'] ) || !empty( $a['color'] ) || !empty( $a['bg-image'] ) || !empty( $a['padding'] ) || $a['padding'] == '0' ) {
			$html.= '"';
		}
		$html.= '>' . do_shortcode($content) . '</div>';
	return $html;
}

function third_shortcode( $atts , $content = null ) {
    $a = shortcode_atts( array( 'class' => '', 'bg-color' => '', 'color' => '', 'bg-image' => '', 'padding' => ''), $atts );
	$html = '<div class="third';
		if ( !empty( $a['class'] ) ) {
			$html.= ' '.esc_attr($a['class']).'"';
		} else {
			$html.= '"';
		}
		if ( !empty( $a['bg-color']) || !empty( $a['color']) || !empty( $a['bg-image']) || !empty( $a['padding'] ) || $a['padding'] == '0' ) {
			$html.= ' style="';
		}
			if ( !empty( $a['bg-color'] ) ) {
				$html.= 'background-color:'. esc_attr($a['bg-color']).'; ';
			}
			if ( !empty( $a['color'] ) ) {
				$html.= 'color:'. esc_attr($a['color']).'; ';
			}
			if ( !empty( $a['bg-image'] ) ) {
				$html.= 'background-image:url('. esc_attr($a['bg-image']).');background-position: center; -webkit-align-self: stretch; -ms-flex-item-align: stretch; align-self: stretch;';
			}
			if ( !empty( $a['padding'] ) || $a['padding'] == '0' ) {
				$html.= 'padding:'. esc_attr($a['padding']).';';
			}
		if ( !empty( $a['bg-color'] ) || !empty( $a['color'] ) || !empty( $a['bg-image'] ) || !empty( $a['padding'] ) || $a['padding'] == '0' ) {
			$html.= '"';
		}
		$html.= '>' . do_shortcode($content) . '</div>';
	return $html;
}

function fourth_shortcode( $atts , $content = null ) {
    $a = shortcode_atts( array( 'class' => '', 'bg-color' => '', 'color' => '', 'bg-image' => '', 'padding' => ''), $atts );
	$html = '<div class="fourth';
		if ( !empty( $a['class'] ) ) {
			$html.= ' '.esc_attr($a['class']).'"';
		} else {
			$html.= '"';
		}
		if ( !empty( $a['bg-color']) || !empty( $a['color']) || !empty( $a['bg-image']) || !empty( $a['padding'] ) || $a['padding'] == '0' ) {
			$html.= ' style="';
		}
			if ( !empty( $a['bg-color'] ) ) {
				$html.= 'background-color:'. esc_attr($a['bg-color']).'; ';
			}
			if ( !empty( $a['color'] ) ) {
				$html.= 'color:'. esc_attr($a['color']).'; ';
			}
			if ( !empty( $a['bg-image'] ) ) {
				$html.= 'background-image:url('. esc_attr($a['bg-image']).');background-position: center; -webkit-align-self: stretch; -ms-flex-item-align: stretch; align-self: stretch;';
			}
			if ( !empty( $a['padding'] ) || $a['padding'] == '0' ) {
				$html.= 'padding:'. esc_attr($a['padding']).';';
			}
		if ( !empty( $a['bg-color'] ) || !empty( $a['color'] ) || !empty( $a['bg-image'] ) || !empty( $a['padding'] ) || $a['padding'] == '0' ) {
			$html.= '"';
		}
		$html.= '>' . do_shortcode($content) . '</div>';
	return $html;
}

function twothirds_shortcode( $atts , $content = null ) {
    $a = shortcode_atts( array( 'class' => '', 'bg-color' => '', 'color' => '', 'bg-image' => '', 'padding' => ''), $atts );
	$html = '<div class="twothirds';
		if ( !empty( $a['class'] ) ) {
			$html.= ' '.esc_attr($a['class']).'"';
		} else {
			$html.= '"';
		}
		if ( !empty( $a['bg-color']) || !empty( $a['color']) || !empty( $a['bg-image']) || !empty( $a['padding'] ) || $a['padding'] == '0' ) {
			$html.= ' style="';
		}
			if ( !empty( $a['bg-color'] ) ) {
				$html.= 'background-color:'. esc_attr($a['bg-color']).'; ';
			}
			if ( !empty( $a['color'] ) ) {
				$html.= 'color:'. esc_attr($a['color']).'; ';
			}
			if ( !empty( $a['bg-image'] ) ) {
				$html.= 'background-image:url('. esc_attr($a['bg-image']).');background-position: center; -webkit-align-self: stretch; -ms-flex-item-align: stretch; align-self: stretch;';
			}
			if ( !empty( $a['padding'] ) || $a['padding'] == '0' ) {
				$html.= 'padding:'. esc_attr($a['padding']).';';
			}
		if ( !empty( $a['bg-color'] ) || !empty( $a['color'] ) || !empty( $a['bg-image'] ) || !empty( $a['padding'] ) || $a['padding'] == '0' ) {
			$html.= '"';
		}
		$html.= '>' . do_shortcode($content) . '</div>';
	return $html;
}
function threefourths_shortcode( $atts , $content = null ) {
    $a = shortcode_atts( array( 'class' => '', 'bg-color' => '', 'color' => '', 'bg-image' => '', 'padding' => ''), $atts );
	$html = '<div class="threefourths';
		if ( !empty( $a['class'] ) ) {
			$html.= ' '.esc_attr($a['class']).'"';
		} else {
			$html.= '"';
		}
		if ( !empty( $a['bg-color']) || !empty( $a['color']) || !empty( $a['bg-image']) || !empty( $a['padding'] ) || $a['padding'] == '0' ) {
			$html.= ' style="';
		}
			if ( !empty( $a['bg-color'] ) ) {
				$html.= 'background-color:'. esc_attr($a['bg-color']).'; ';
			}
			if ( !empty( $a['color'] ) ) {
				$html.= 'color:'. esc_attr($a['color']).'; ';
			}
			if ( !empty( $a['bg-image'] ) ) {
				$html.= 'background-image:url('. esc_attr($a['bg-image']).');background-position: center; -webkit-align-self: stretch; -ms-flex-item-align: stretch; align-self: stretch;';
			}
			if ( !empty( $a['padding'] ) || $a['padding'] == '0' ) {
				$html.= 'padding:'. esc_attr($a['padding']).';';
			}
		if ( !empty( $a['bg-color'] ) || !empty( $a['color'] ) || !empty( $a['bg-image'] ) || !empty( $a['padding'] ) || $a['padding'] == '0' ) {
			$html.= '"';
		}
		$html.= '>' . do_shortcode($content) . '</div>';
	return $html;
}

function compact_shortcode( $atts , $content = null ) {
    $a = shortcode_atts( array( 'class' => '', 'bg-color' => '', 'color' => '', 'bg-image' => '', 'padding' => ''), $atts );
	$html = '<div class="compact';
		if ( !empty( $a['class'] ) ) {
			$html.= ' '.esc_attr($a['class']).'"';
		} else {
			$html.= '"';
		}
		if ( !empty( $a['bg-color']) || !empty( $a['color']) || !empty( $a['bg-image']) || !empty( $a['padding'] ) || $a['padding'] == '0' ) {
			$html.= ' style="';
		}
			if ( !empty( $a['bg-color'] ) ) {
				$html.= 'background-color:'. esc_attr($a['bg-color']).'; ';
			}
			if ( !empty( $a['color'] ) ) {
				$html.= 'color:'. esc_attr($a['color']).'; ';
			}
			if ( !empty( $a['bg-image'] ) ) {
				$html.= 'background-image:url('. esc_attr($a['bg-image']).');background-position: center; -webkit-align-self: stretch; -ms-flex-item-align: stretch; align-self: stretch;';
			}
			if ( !empty( $a['padding'] ) || $a['padding'] == '0' ) {
				$html.= 'padding:'. esc_attr($a['padding']).';';
			}
		if ( !empty( $a['bg-color'] ) || !empty( $a['color'] ) || !empty( $a['bg-image'] ) || !empty( $a['padding'] ) || $a['padding'] == '0' ) {
			$html.= '"';
		}
		$html.= '>' . do_shortcode($content) . '</div>';
	return $html;
}

add_action( 'init', 'expanse_buttons' );
function expanse_buttons() {
    add_filter( "mce_external_plugins", "expanse_add_buttons" );
    add_filter( 'mce_buttons', 'expanse_register_buttons' );
}
function expanse_add_buttons( $plugin_array ) {
    $plugin_array['expanse'] = get_template_directory_uri() . '/inc/yt-shortcode.js';
    return $plugin_array;
}
function expanse_register_buttons( $buttons ) {
    array_push( $buttons, 'Shortcodes' );
    return $buttons;
}

/* Adding More Options to the Wordpress Theme Customizer.
-----------------------------------------------------------------*/

/* Adding the logo to the settings page*/

function expanse_site_options( $wp_customize ) {
	$wp_customize->add_setting( 'expanse_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'expanse_logo', array(
	'label' => __( 'Logo' ),
	'section'  => 'title_tagline',
	'settings' => 'expanse_logo',
	) ) );
}

add_action('customize_register', 'expanse_site_options');

/* Logo size */

function expanse_get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}


/* Enqueuing STUFF!
-----------------------------------------------------------------*/

function expanse_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'js', get_template_directory_uri(). '/js/js.js', array(), '1.0.0', true );
	wp_enqueue_style( 'css', get_template_directory_uri().'/inc/css.css' );
}
add_action( 'admin_init', 'expanse_scripts' );


/* Adding the Menus
-----------------------------------------------------------------*/

add_action( 'admin_menu', 'expanse_admin' );

function expanse_admin() {
    /* Base Menu */
    add_submenu_page('themes.php', "Expanse", "Expanse Theme", 'manage_options', 'expanse_options', 'expanse_index');
}

/* OPTION PAGE SETTINGS 
-----------------------------------------------------------------*/

add_action('admin_init', 'expanse_initialize_options');
function expanse_initialize_options() {
	if( false == get_option( 'expanse_options' ) ) {
		add_option( 'expanse_options', apply_filters( 'expanse_default_options', expanse_default_options() ) );
	} // end if
	add_settings_section(
		'options_section',
		__( 'Options', 'expanse' ),
		'expanse_callback',
		'expanse_options'
	);
	
	add_settings_field(
		'Nav',
		__( 'Navigation Bar Position', 'expanse' ),
		'expanse_nav_callback',
		'expanse_options',
		'options_section'
	);
	
	add_settings_field(
		'Sitcky Nav',
		__( 'Sticky Nav', 'expanse' ),
		'expanse_stickynav_callback',
		'expanse_options',
		'options_section'
	);
	
	add_settings_field(
		'Google Analytics',
		__( 'Google Analytics', 'expanse' ),
		'expanse_ga_callback',
		'expanse_options',
		'options_section'
	);
	
	add_settings_field(
		'Social Share Buttons',
		__( 'Social Share Buttons', 'expanse' ),
		'expanse_ss_callback',
		'expanse_options',
		'options_section'
	);
	
	add_settings_field(
		'Blog Layout',
		__( 'Blog Layout', 'expanse' ),
		'expanse_blog_layout_callback',
		'expanse_options',
		'options_section'
	);
	
	add_settings_field(
		'Featured Style',
		__( 'Featured Boxes Style', 'expanse' ),
		'expanse_featured_style_callback',
		'expanse_options',
		'options_section'
	);
	
	add_settings_field(
		'Related Posts',
		__( 'Related Posts', 'expanse' ),
		'expanse_related_posts_callback',
		'expanse_options',
		'options_section'
	);
	
	add_settings_field(
		'Headlines On Homepage',
		__( 'Latest Post', 'expanse' ),
		'expanse_latest_post_callback',
		'expanse_options',
		'options_section'
	);
	
	add_settings_field(
		'Extra Widget Areas',
		__( 'Extra Widget Areas', 'expanse' ),
		'expanse_extra_sidebars_callback',
		'expanse_options',
		'options_section'
	);
	
	add_settings_field(
		'Extra Post Types',
		__( 'Extra Post Types', 'expanse' ),
		'expanse_extra_posttypes_callback',
		'expanse_options',
		'options_section'
	);

	register_setting(
		'expanse_options',
		'expanse_options'
	);
} // end settings field

add_action('admin_init', 'expanse_initialize_options_export_import');
function expanse_initialize_options_export_import() {
	add_settings_section(
		'options_section_export_import',
		__( '', 'expanse' ),
		'expanse_callback_export_import',
		'expanse_options_export_import'
	);

	register_setting(
		'expanse_options_export_import',
		'expanse_options_export_import'
	);
} // end settings field

/* Register Default Settings
-----------------------------------------------------------------*/

function expanse_default_options() {
	$defaults = array(
		'nav'				=>	'',
		'stickynav'			=>	'',
		'blog_layout'		=>	'',
		'featured_style'	=>	'',
		'related_posts'		=>	'',
		'latest_post'		=>	'',
		'ga'				=>	'',
		'ssbutton'			=>	'',
			'ss_fb'			=>	'',
			'ss_tw'			=>	'',
			'ss_gp'			=>	'',
			'ss_li'			=>	'',
			'ss_pin'		=>	'',
			'ss_email'		=>	'',
			'ss_on'			=>	'',
		'es_home'			=>	'',
		'es_page'			=>	'',
		'es_blog'			=>	'',
		'es_contact'		=>	'',
		'es_above'			=>	'',
		'es_header'			=>	'',
		'es_features'		=>	'',
		'es_footer'			=>	'',
			'es_services'	=>	'',
			'es_team'		=>	'',
			'es_events'		=>	'',
			'es_testimonials' => ''

	);
	return apply_filters( 'expanse_default_options', $defaults );
}


/* Callbacks
-----------------------------------------------------------------*/

/* Section Callbacks */

	function expanse_callback() {
		echo '<p>' . __( 'How do you want your site?', 'expanse' ) . '</p>';
	}


/* Field Callbacks */

/* -- Callbacks -- */

	function expanse_nav_callback() {
		$options = get_option( 'expanse_options' );
		
		$html = '<select id="nav" name="expanse_options[nav]">';
			$html .= '<option value="next"' . selected( $options['nav'], 'next', false) . '>' . __( 'Next to the Logo (75%)', 'expanse' ) . '</option>';
			$html .= '<option value="below"' . selected( $options['nav'], 'below', false) . '>' . __( 'Below (100%)', 'expanse' ) . '</option>';
			$html .= '</select>';
			$html .= '<div class="floatimg"><img src="'. get_template_directory_uri() .'/inc/img/next.png"></div>';
		echo $html;
	}
	
	function expanse_stickynav_callback() {
		$options = get_option( 'expanse_options' );

		$sticky = $options['stickynav'];
			$html .= ' <input type="checkbox" id="stickynav" name="expanse_options[stickynav]" ';
			if ($sticky) {
				$html .= 'checked="checked"';
			}
			$html .= '> Sticky?';
		echo $html;
	}

	function expanse_blog_layout_callback() {
		$options = get_option( 'expanse_options' );
		
		$html = '<select id="blog_layout" name="expanse_options[blog_layout]">';
			$html .= '<option value="hero"' . selected( $options['blog_layout'], 'hero', false) . '>' . __( 'Hero First', 'expanse' ) . '</option>';
			$html .= '<option value="rich"' . selected( $options['blog_layout'], 'rich', false) . '>' . __( 'Image Rich', 'expanse' ) . '</option>';
			$html .= '<option value="full"' . selected( $options['blog_layout'], 'full', false) . '>' . __( 'Full Card', 'expanse' ) . '</option>';
			$html .= '<option value="simple"' . selected( $options['blog_layout'], 'simple', false) . '>' . __( 'Simple Card', 'expanse' ) . '</option>';
			$html .= '</select>';
			$html .= '<div class="floatimg" style="margin-top:-125px;"><img src="'. get_template_directory_uri() .'/inc/img/bloglayout.jpg"></div>';
		echo $html;
	}

	function expanse_featured_style_callback() {
		$options = get_option( 'expanse_options' );
		
		$html = '<select id="featured_style" name="expanse_options[featured_style]">';
			$html .= '<option value="icon"' . selected( $options['featured_style'], 'icon', false) . '>' . __( 'Title + icon / Text', 'expanse' ) . '</option>';
			$html .= '<option value="rollover"' . selected( $options['featured_style'], 'rollover', false) . '>' . __( 'Image bg, title, text rollover', 'expanse' ) . '</option>';
			$html .= '</select>';
			$html .= '<div class="floatimg"><img src="'. get_template_directory_uri() .'/inc/img/featured.png"></div>';
		echo $html;
	}

	function expanse_related_posts_callback() {
		$options = get_option( 'expanse_options' );
		
		$html = '<select id="related_posts" name="expanse_options[related_posts]">';
			$html .= '<option value="none"' . selected( $options['related_posts'], 'none', false) . '>' . __( 'No related posts', 'expanse' ) . '</option>';
			$html .= '<option value="below"' . selected( $options['related_posts'], 'below', false) . '>' . __( 'Below posts', 'expanse' ) . '</option>';
			$html .= '<option value="side"' . selected( $options['related_posts'], 'side', false) . '>' . __( 'On the sidebar', 'expanse' ) . '</option>';
			$html .= '</select>';
		echo $html;
	}

	function expanse_latest_post_callback() {
		$options = get_option( 'expanse_options' );
		
		$html = '<select id="latest_post" name="expanse_options[latest_post]">';
			$html .= '<option value="yes"' . selected( $options['latest_post'], 'yes', false) . '>' . __( 'Show', 'expanse' ) . '</option>';
			$html .= '<option value="no"' . selected( $options['latest_post'], 'no', false) . '>' . __( 'I\'ll put it elsewhere' , 'expanse' ) . '</option>';
			$html .= '</select>';
			$html .= '<div class="floatimg"><img src="'. get_template_directory_uri() .'/inc/img/hoh.png"></div>';
		echo $html;
	}

	function expanse_ga_callback() {
		$options = get_option( 'expanse_options' );

		$ga = '';
		if( isset( $options['ga'] ) ) {
			$ga = sanitize_html_class( $options['ga'] );
		}

		echo '<input type="text" id="ga" name="expanse_options[ga]" value="' . $ga . '" placeholder="UA-xxxxxxxx-xx" />';
	}

	function expanse_ss_callback() {
		$options = get_option( 'expanse_options' );

		$ssbutton = $options['ssbutton'];
			$html .= '<input type="checkbox" id="ssbutton" name="expanse_options[ssbutton]"';
			if ($ssbutton) {
				$html .= 'checked="checked"';
			}
			$html .= '> Social Share Buttons?<p class="ss" style="display:none">';

			$ss_on = $options['ss_on'];
				$html .= '<input type="radio" value="onpost" name="expanse_options[ss_on]"';
				if ($ss_on==="onpost") {
					$html .= 'checked';
				}
				$html .= '> On Post &nbsp; &nbsp;';

				$html .= '<input type="radio" value="onexcerpt" name="expanse_options[ss_on]"';
				if ($ss_on==="onexcerpt") {
					$html .= 'checked';
				}
				$html .= '> On Excerpt &nbsp; &nbsp;';

				$html .= '<input type="radio" value="all" name="expanse_options[ss_on]"';
				if ($ss_on==="all") {
					$html .= 'checked="checked"';
				}
				$html .= '> On All<br/>';

		$facebook = $options['ss_fb'];
			$html .= ' <input type="checkbox" id="ss_fb" name="expanse_options[ss_fb]"';
			if ($facebook) {
				$html .= 'checked="checked"';
			}
			$html .= '> Facebook? &nbsp; &nbsp;';

		$twitter = $options['ss_tw'];
			$html .= ' <input type="checkbox" id="ss_tw" name="expanse_options[ss_tw]"';
			if ($twitter) {
				$html .= 'checked="checked"';
			}
			$html .= '> Twitter? &nbsp; &nbsp;';

		$gplus = $options['ss_gp'];
			$html .= ' <input type="checkbox" id="ss_gp" name="expanse_options[ss_gp]"';
			if ($gplus) {
				$html .= 'checked="checked"';
			}
			$html .= '> Google+? &nbsp; &nbsp;';

		$linkedin = $options['ss_li'];
			$html .= ' <input type="checkbox" id="ss_li" name="expanse_options[ss_li]"';
			if ($linkedin) {
				$html .= 'checked="checked"';
			}
			$html .= '> LinkedIn? &nbsp; &nbsp;';

		$pinterest = $options['ss_pin'];
			$html .= ' <input type="checkbox" id="ss_pin" name="expanse_options[ss_pin]"';
			if ($pinterest) {
				$html .= 'checked="checked"';
			}
			$html .= '> Pinterest? &nbsp; &nbsp;';

		$email = $options['ss_email'];
			$html .= ' <input type="checkbox" id="ss_email" name="expanse_options[ss_email]"';
			if ($email) {
				$html .= 'checked="checked"';
			}
			$html .= '> Email?</p>';
		echo $html;
	}

	function expanse_extra_sidebars_callback() {
		$options = get_option( 'expanse_options' );

		$html .'You want extra widget areas with that?';

		$home = $options['es_home'];
			$html .= '<p><input type="checkbox" id="es_home" name="expanse_options[es_home]"';
			if ($home) {
				$html .= 'checked="checked"';
			}
			$html .= '> Home Sidebar &nbsp; &nbsp;';

		$page = $options['es_page'];
			$html .= ' <input type="checkbox" id="es_page" name="expanse_options[es_page]"';
			if ($page) {
				$html .= 'checked="checked"';
			}
			$html .= '> Page Sidebar &nbsp; &nbsp;';

		$blog = $options['es_blog'];
			$html .= ' <input type="checkbox" id="es_blog" name="expanse_options[es_blog]"';
			if ($blog) {
				$html .= 'checked="checked"';
			}
			$html .= '> Blog Sidebar &nbsp; &nbsp;';

		$contact = $options['es_contact'];
			$html .= ' <input type="checkbox" id="es_contact" name="expanse_options[es_contact]"';
			if ($contact) {
				$html .= 'checked="checked"';
			}
			$html .= '> Contact Sidebar</p><p>';

		$above = $options['es_above'];
			$html .= ' <input type="checkbox" id="es_above" name="expanse_options[es_above]"';
			if ($above) {
				$html .= 'checked="checked"';
			}
			$html .= '> Above the Header &nbsp; &nbsp; &nbsp;';

		$header = $options['es_header'];
			$html .= ' <input type="checkbox" id="es_header" name="expanse_options[es_header]"';
			if ($header) {
				$html .= 'checked="checked"';
			}
			$html .= '> Header &nbsp; &nbsp; &nbsp;';

		$features = $options['es_features'];
			$html .= ' <input type="checkbox" id="es_features" name="expanse_options[es_features]"';
			if ($features) {
				$html .= 'checked="checked"';
			}
			$html .= '> Features Widget Area &nbsp; &nbsp; &nbsp;';

		$footer = $options['es_footer'];
			$html .= ' <input type="checkbox" id="es_footer" name="expanse_options[es_footer]"';
			if ($footer) {
				$html .= 'checked="checked"';
			}
			$html .= '> Footer Widget Area</p>';
		echo $html;
	}

	function expanse_extra_posttypes_callback() {
		$options = get_option( 'expanse_options' );

		$html .'More Post Types';

		$services = $options['es_services'];
			$html .= '<p><input type="checkbox" id="es_services" name="expanse_options[es_services]"';
			if ($services) {
				$html .= 'checked="checked"';
			}
			$html .= '> Services &nbsp; &nbsp;';

		$team = $options['es_team'];
			$html .= '<input type="checkbox" id="es_team" name="expanse_options[es_team]"';
			if ($team) {
				$html .= 'checked="checked"';
			}
			$html .= '> Team &nbsp; &nbsp;';

		$events = $options['es_events'];
			$html .= ' <input type="checkbox" id="es_events" name="expanse_options[es_events]"';
			if ($events) {
				$html .= 'checked="checked"';
			}
			$html .= '> Events &nbsp; &nbsp;';

		$testimonials = $options['es_testimonials'];
			$html .= ' <input type="checkbox" id="es_testimonials" name="expanse_options[es_testimonials]"';
			if ($testimonials) {
				$html .= 'checked="checked"';
			}
			$html .= '> Testimonials</p>';
		echo $html;
	}

	function expanse_callback_export_import() {?>
		<h4>Backup/Export</h4>
		<p>Here are the stored settings for the current theme:</p>
		<p><textarea class="code" rows="5" cols="100" onclick="this.select()"><?php echo serialize(get_option( 'expanse_options' )); ?></textarea></p>
		<p><a href="?page=expanse_options&tab=import_settings&action=download" class="button-secondary">Download as file</a></p>
		<h4>Restore/Import</h4>
		<p><label class="description" for="upload">Restore a previous backup</label></p>
		<p><input type="file" name="file" /> <input type="submit" name="upload" id="upload" class="button-primary" value="Upload file" /></p>
		<?php if (function_exists('wp_nonce_field')) wp_nonce_field('expanse_restoreOptions', 'expanse_restoreOptions'); ?>
	<?php
	}



/* Import/Export Settings thingum
-----------------------------------------------------------------*/

function expanse_settings_export() {
	if (isset($_GET['action']) && ($_GET['action'] == 'download')) {
		header("Cache-Control: public, must-revalidate");
		header("Pragma: hack");
		header("Content-Type: text/plain");
		header('Content-Disposition: attachment; filename="theme-options-'.date("dMy").'.dat"');
		echo serialize(get_option( 'expanse_options' ));
		die();
	}
	if (isset($_POST['upload']) && check_admin_referer('expanse_restoreOptions', 'expanse_restoreOptions')) {
		if ($_FILES["file"]["error"] > 0) {
		} else {
			$options = unserialize(file_get_contents($_FILES["file"]["tmp_name"]));
			if ($options) {
				update_option("expanse_options", $options);
			}
		}
		wp_redirect(admin_url('themes.php?page=expanse_options&tab=import_settings'));
		exit;
	}
}
add_action( 'admin_init', 'expanse_settings_export' );



/* Display Page
-----------------------------------------------------------------*/

/**
 * Renders a simple page to display for the theme menu defined above.
 */
function expanse_index() {
?>

	<!-- Create a header in the default WordPress 'wrap' container -->
	<div class="wrap">

		<h2><?php _e( 'Expanse Theme Options', 'expanse' ); ?></h2>
		<?php settings_errors(); ?>
		
		<?php if( isset( $_GET[ 'tab' ] ) ) {
			$active_tab = $_GET[ 'tab' ];
		} else if( $active_tab == 'import_settings' ) {
			$active_tab = 'import_settings';
		} else if( $active_tab == 'shortcode' ) {
			$active_tab = 'shortcode';
		} else {
			$active_tab = 'display_options';
		} // end if/else ?>

		<h2 class="nav-tab-wrapper">
			<a href="?page=expanse_options&tab=display_options" class="nav-tab <?php echo $active_tab == 'display_options' ? 'nav-tab-active' : ''; ?>">Theme Options</a>
			<a href="?page=expanse_options&tab=import_settings" class="nav-tab <?php echo $active_tab == 'import_settings' ? 'nav-tab-active' : ''; ?>">Options Export/Import</a>
 			<a href="?page=expanse_options&tab=shortcode" class="nav-tab <?php echo $active_tab == 'shortcode' ? 'nav-tab-active' : ''; ?>">Shortcode Guide</a>
		</h2>

		<form method="post" action="options.php"<?php if( $active_tab == 'import_settings' ) { echo ' enctype="multipart/form-data"'; } ?> >
		<?php
			if( $active_tab == 'display_options' ) {
				settings_fields( 'expanse_options' );
				do_settings_sections( 'expanse_options' );
				submit_button();
			} else if( $active_tab == 'import_settings' ) {
				settings_fields( 'expanse_options_export_import' );
				do_settings_sections( 'expanse_options_export_import' );
			} else { ?>
				<h2>Team Shortcode</h2>
					<pre>[team]</pre>
				<h2>Shortcode Examples</h2>
				<p>Row - <pre>[row]Your Content[/row]</pre>
				<p>Half - <pre>[half]Your Content[/half]</pre></p>
				<p>Third - <pre>[third]Your Content[/third]</pre></p>
				<p>Fourth - <pre>[fourth]Your Content[/fourth]</pre></p>
				<p><strong>Attributes:</strong> class, color, bg-color, bg-image, and padding. Hexcodes, color names, and percentages are ok!</p><br/>
				<h2>Examples:</h2>
				<pre>[row]text[/row]</pre>
					<img src="<?php echo get_template_directory_uri(); ?>/inc/img/short1.png" class="short">
				<pre>[row bg-color="steelblue"]Galaxies quis... bits of moving fluff?[/row]</pre>
					<img src="<?php echo get_template_directory_uri(); ?>/inc/img/short2.png" class="short">
				<pre>[row bg-color="steelblue" padding="50px"]Galaxies quis... bits of moving fluff?[/row]</pre>
					<img src="<?php echo get_template_directory_uri(); ?>/inc/img/short2a.png" class="short">
				<pre>[row][half]Duis aute irure dolor... fugiat nulla pariatur.[/half][third]Galaxies quis... commodo consequat.[/third][/row]</pre>
					<img src="<?php echo get_template_directory_uri(); ?>/inc/img/short3.png" class="short">
				<pre>[row bg-color="cornflowerblue"][half]Galaxies quis... commodo consequat.[/half][fourth bg-color="lightblue" padding="25px"]Excepteur sint... moving fluff?[/fourth][fourth]Duis aute... nulla pariatur.[/fourth][/row]</pre>
					<img src="<?php echo get_template_directory_uri(); ?>/inc/img/short4.png" class="short">
				<pre>[half bg-color="cornflowerblue"]Galaxies quis... commodo consequat.[/half][fourth bg-color="lightblue" padding="25px"]Excepteur sint... moving fluff?[/fourth][fourth bg-color="cornflowerblue"]Duis aute... fugiat nulla pariatur.[/fourth]</pre>
					<img src="<?php echo get_template_directory_uri(); ?>/inc/img/short5.png" class="short">
				<pre>[row bg-color="darkslateblue" padding=0][half color="#fff" padding=110px bg-image="wombat url"]&lt;h1&gt;Your&lt;/h1&gt;[/half][fourth color="pink"]Content[/fourth][fourth color="#000" ]Astonishment.[/fourth][/row]</pre>
					<img src="<?php echo get_template_directory_uri(); ?>/inc/img/short6.png" class="short">
				<pre>[row bg-color="#666" color="#fff" padding="0"][half bg-image="wombat url"]Light years![/half][half]Emerged into... cosmic fugue.[/half][/row]</pre>
					<img src="<?php echo get_template_directory_uri(); ?>/inc/img/short7.png" class="short">

			<?php } ?>
		</form>
	</div>
<?php
} ?>