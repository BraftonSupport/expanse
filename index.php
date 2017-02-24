<?php
/**
 * The main template file
 */

get_header(); ?>

	<div id="primary" class="content-area site-inner">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			<?php if ( is_home() && ! is_front_page() ) : ?><header class="entry-header">
				<h1 class="entry-title">Latest Posts</h1>
			</header><!-- .page-header -->
			<?php endif; ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'expanse' ),
				'next_text'          => __( 'Next page', 'expanse' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'expanse' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
