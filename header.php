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
$options = get_option( 'expanse_options' );
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
<?php endif; ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'expanse' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php if ( is_active_sidebar( 'top' ) ) {
			echo '<div class="top"><div class="site-inner container">';
			dynamic_sidebar( 'top' );
			echo '</div></div>';
		} ?>
		<div class="site-header-main site-inner">
			<div class="container">
				<div class="site-branding">

					<?php if ( get_theme_mod( 'expanse_logo' ) ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src='<?php echo esc_url( get_theme_mod( 'expanse_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' class="site-title">
						</a>
					<?php else :
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif;
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
					<?php if ( is_active_sidebar( 'header' ) ) :
						dynamic_sidebar( 'header' );
					endif; ?>
					<button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'expanse' ); ?></button>

					<?php if ($options['nav'] == 'below') { echo '</div><!-- .container --></div><!-- .site-header-main --><div class="below">'; } ?>

						<div id="site-header-menu" class="site-header-menu<?php if ($options['nav'] == 'below') { echo " site-inner"; } ?>">

							<?php if ( has_nav_menu( 'social' ) ) : ?>
								<nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'expanse' ); ?>">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'social',
											'menu_class'     => 'social-links-menu',
											'depth'          => 1,
											'link_before'    => '<span class="screen-reader-text">',
											'link_after'     => '</span>',
										) );
									?>
								</nav><!-- .social-navigation -->
							<?php endif; ?>

							<?php if ( has_nav_menu( 'primary' ) ) : ?>
								<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'expanse' ); ?>">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'primary',
											'menu_class'     => 'primary-menu',
										 ) );
									?>
								</nav><!-- .main-navigation -->
							<?php endif; ?>
						</div><!-- .site-header-menu -->
					<?php endif; ?>
				<?php if ($options['nav'] == 'next') { echo '<br class="clear"/>'; } ?>
			</div><!-- .container -->

			<?php if ( get_header_image() && is_front_page() ) :
				$custom_header_sizes = apply_filters( 'expanse_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' ); ?>
				<div class="header-image" style="background-image: url(<?php header_image(); ?>)">
					<?php the_title( '<h1>', '</h1>' ); ?>
				</div>
			<?php elseif ( is_page() && has_post_thumbnail() && !is_page_template('contact.php') ) :
				$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
				<div class="header-image" style="background-image: url(<?php echo $url; ?>)">
					<?php the_title( '<h1>', '</h1>' ); ?>
				</div>
			<?php elseif ( is_page_template('contact.php') ) : ?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d11793.352744614434!2d-71.055708!3d42.3566315!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1462392769721" width="100%" height="350" frameborder="0" style="border:0;pointer-events: none;" allowfullscreen></iframe>
			<?php endif; // End header image check.  ?>
		</div><!-- .site-header-main -->

	</header><!-- .site-header -->

	<div id="content" class="site-content site-inner">
