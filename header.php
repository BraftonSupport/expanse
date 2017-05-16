<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Expanse 1.0
 */
$options = get_option( 'expanse_options' );

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>

<?php
if ( $options['ga'] ) : ?>
	<!-- Google Analytics -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', '<?php echo $options['ga']; ?>', 'auto');
		  ga('send', 'pageview');
		</script>
	<!-- End Google Analytics -->
<?php endif;

$description = get_bloginfo( 'description', 'display' );
echo '<script type="application/ld+json">
	{
		"@context": "http://schema.org/",
		"@type": "Organization",
		"name": "'.get_bloginfo( "name" ).'",
		"legalName": "'.get_bloginfo( "name" ).'",
		"url": "'.network_site_url( '/' ).'",
		"email": "",
		"telephone": "",
		"description": "'.$description.'"
	}
</script>';
if(is_single()) {
	$content = wp_strip_all_tags(apply_filters('the_content', $post->post_content)); 
	$excerpt = wp_strip_all_tags(apply_filters('the_excerpt', $post->post_excerpt)); 
	$image_url = esc_url( get_theme_mod( 'expanse_logo' ) );
	$author = $post->post_author; 
	echo '<script type="application/ld+json">
		{ "@context": "http://schema.org",
		"@type": "BlogPosting",
		"headline": "'.esc_html( get_the_title() ).'",
		"image": "'.get_the_post_thumbnail_url().'",
		"wordcount": "'.str_word_count($content,0).'",
		"publisher": {
		"@type": "Organization",
		"name": "'.get_bloginfo( "name" ).'",
		"logo": "'.$image_url.'"
		},
		"url": "'.get_permalink().'",
		"datePublished": "'.get_the_date('Y-m-d').'",
		"description": "'.$excerpt.'",
		"author": {
		"@type": "Person",
		"name": "'.get_the_author_meta( "user_nicename" , $author ).'"
		}
		}
	</script>';
}
?>

</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'expanse' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="site-header-main">
				<?php if ( is_active_sidebar( 'top' ) ) {
					echo '<div class="top"><div class="site-inner container">';
					dynamic_sidebar( 'top' );
					echo '</div></div>';
				} ?>
				<div class="site-inner container">
					<div class="site-branding">

						<?php if ( get_theme_mod( 'expanse_logo' ) ) { ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php
								// set the image url
								$image_url = esc_url( get_theme_mod( 'expanse_logo' ) );
								 
								// store the image ID in a var
								$image_id = expanse_get_image_id($image_url);
								 
								// retrieve the thumbnail size of our image
								$image_thumb = wp_get_attachment_image_src($image_id, 'medium'); ?>

								<img src='<?php echo $image_thumb[0]; ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' class="site-title">
								<?php if ( has_site_icon() ){ ?>
									<img src='<?php echo get_site_icon_url( 32 ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' class="site-icon">
								<?php } ?>
							</a>
						<?php } else { ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php }	?>
					</div><!-- .site-branding -->

					<div class="next">

					<?php if ( is_active_sidebar( 'header' ) ) {
						dynamic_sidebar( 'header' );
					}
					?>

					<button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'expanse' ); ?></button>

					
				<?php if ($options['nav'] == 'below') { ?>
				<div id="site-header-menu" class="site-header-menu">
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation next" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'expanse' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'primary-menu',
									 ) );
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>
					</div><!-- .site-header-menu -->
				</div></div>
				<?php } ?>

					<div id="site-header-menu" class="site-header-menu">
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation<?php if ($options['nav'] == 'below') { echo " container site-inner"; } ?>" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'expanse' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'primary-menu',
									 ) );
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>
					</div><!-- .site-header-menu -->
				<?php if ($options['nav'] == 'next') { echo '</div></div>'; } ?>

			<?php if ( is_page() && has_post_thumbnail() && !is_page_template('contact.php') && !is_page_template('full-width.php') ) :
				$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
				<div class="header-image" style="background-image: url(<?php echo $url; ?>)">
					<?php the_title( '<h1>', '</h1>' ); ?>
				</div>
			<?php elseif ( is_page_template('contact.php') ) : ?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d11793.352744614434!2d-71.055708!3d42.3566315!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1462392769721" width="100%" height="350" frameborder="0" style="border:0;pointer-events: none;" allowfullscreen></iframe>
			<?php endif; // End header image check.  ?>

			</div><!-- .site-header-main -->
		</header>


	<div id="content" class="site-content site-inner">