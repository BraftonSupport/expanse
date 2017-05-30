<?php
/**
* Template Name: Front page
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Expanse 1.0
 */
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php

		$args = array(
		    'post_parent' => $post->ID,
		    'post_type' => 'page',
		    'orderby' => 'menu_order'
		);

		$child_query = new WP_Query( $args );
		?>

		<?php while ( $child_query->have_posts() ) : $child_query->the_post();

			$template = get_field('subsections_templates', get_the_ID() );

			if ($template=='visual'){
				get_template_part( 'frontpage-parts/visual', 'template' );
			} elseif ($template=='list'){
				get_template_part( 'frontpage-parts/list', 'template' );
			} elseif ($template=='slider'){
				get_template_part( 'frontpage-parts/slider', 'template' );
			}

		endwhile; ?>

	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_footer(); ?>
