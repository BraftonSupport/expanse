<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<?php if ( is_active_sidebar( 'sidebar-4' ) ) { ?>
		<?php dynamic_sidebar( 'sidebar-4' ); ?>
	<?php } ?>

	<div class="site-inner">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

		<header id="masthead" class="site-header" role="banner">

			<div class="site-header-main">
				<div class="site-branding">
					<?php if ( get_header_image() ) : ?>
						<div class="header-image">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
							</a>
						</div>
					<?php else : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
					<button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'twentysixteen' ); ?></button>

					<div id="site-header-menu" class="site-header-menu">
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Primary Menu', 'twentysixteen' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'primary-menu',
									 ) );
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>

						<?php if ( has_nav_menu( 'social' ) ) : ?>
							<nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php _e( 'Social Links Menu', 'twentysixteen' ); ?>">
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
					</div><!-- .site-header-menu -->
				<?php endif; ?>
			</div><!-- .site-header-main -->

		</header><!-- .site-header -->

	</div>

	<?php if(is_front_page()) { 
		$url = wp_get_attachment_url( get_post_thumbnail_id($recent["ID"]) );?>
		<div id="banner" class="clear" style="background-image:url('<?php echo $url; ?>');">
			<div class="site-inner">
				<h1>All Types of Commercial Insurance for Marine Industries Worldwide</h1>
				<p>Fisk Marine Insurance International offers a full range of marine and other insurance products to serve commercial diving, oilfield, oceanographic and energy industries worldwide. We hope you'll give us the opportunity to handle all your insurance needs.</p>
				<a class="fancybox button" href="#wpcf7-f44-o1">Get a Free Quote</a>
				<?php echo do_shortcode('[contact-form-7 id="44" title="Contact form"]'); ?>
			</div>
		</div>

		<div class="site-inner">
			<h1>Industries We Cover Include:</h1>
			<div class="container industries">
				<div class="fourth"><i class="fa fa-anchor"></i><br/>Commercial Diving/Marine Contractors</div>
				<div class="fourth"><i class="fa fa-ship"></i><br/>Commercial Watercraft</div>
				<div class="fourth"><img src="http://design.brafton.com/fisk/wp-content/uploads/sites/37/2016/04/offshore.png">Offshore Consultants/Engineers/Project Managers</div>
				<div class="fourth"><i class="fa fa-cogs"></i><br/>ROV/AUV Manufacturers and Operators</div>
			</div>
		</div>
		<div class="blue2">
			<div class="container site-inner">
				<div class="half">
					<h3>Marine, Property &amp; Casualty Coverage</h3>
						<ul><li>General Liability</li>
							<li>Workers Compensation
								<ul><li>Longshore and Harbor Workers Act</li></ul></li>
							<li>MEL - Jones Act</li>
							<li>Hull/P&amp;I
								<ul><li>Vessel Pollution</li></ul></li>
							<li>Property</li>
							<li>Contractors Equipment</li>
							<li>Excess/Umbrella/Bumbershoot</li>
							<li>Bonds
								<ul><li>Contractors Pollution Liability</li></ul></li>
							<li>Executive Liability</li>
							<li>Commercial/Business Auto</li>
						</ul>
					<a href="http://design.brafton.com/fisk/coverage/marine-property-casualty-coverages/" class="button">Learn More</a>
				</div>
				<div class="half">
					<h3>Group/Individual Life and Health Insurance</h3>
					<ul><li><a href="http://design.brafton.com/fisk/coverage/international-travel-coverage/">International Travel Coverage</a></li>
						<li>Life, Health and Disability</li>
						<li>Key-Man</li>
						<li>Dental, Vision</li>
						<li>Hospitalization</li>
						<li>Medical</li>
						<li>Tax Reduction</li>
						<li>Survivorship</li>
						<li>Trust &amp; Will</li>
						<li>Long/Short Term Disability</li>
						<li>Simplified Employee Pension</li>
					</ul>
					<a href="http://design.brafton.com/fisk/coverage/life-health-disability-coverages/" class="button">Learn More</a>
				</div>
			</div>
		</div>
	<?php } elseif (is_page('contact-us')) { ?> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6154.871135972595!2d-90.11635799787672!3d30.028113716466844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8620ae56fccd78eb%3A0x21e99b66ce35eb30!2s8110+Breakwater+Dr%2C+New+Orleans%2C+LA+70124!5e0!3m2!1sen!2sus!4v1459540751023" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
	<?php } elseif( is_home() || is_page() || is_single() || is_archive() ) { ?>
		<header class="entry-header blue"><div class="site-inner"><h1 class="entry-title">
			<?php if(is_home()){?>
					Latest Posts
			<?php } elseif(is_page()){?>
					<?php if(!is_front_page()): ?><?php the_title(); ?><?php endif; ?>
			<?php } elseif (is_single()){ ?>
					<?php the_title(); ?>
			<?php } elseif (is_archive()) { ?>
					<?php
						the_archive_title();
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
			<?php } ?></h1>
		</div></header>
	<?php } ?>

	<div class="site-inner">
		<div id="content" class="site-content">
