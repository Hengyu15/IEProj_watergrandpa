<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EducateUp
 */

get_header();
$main_class         = 'col-lg-12';
$sidebar_layout     = educateup_sidebar_layout();
$is_sidebar_enabled = educateup_is_sidebar_enabled();
if ( $is_sidebar_enabled ) {
	$main_class = 'col-lg-8';
	if ( 'left-sidebar' === $sidebar_layout ) {
		$main_class .= ' order-last';
	}
}
?>
<main id="primary" class="site-main <?php echo esc_attr( $main_class ); ?>">
	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'single' );

		do_action( 'educateup_post_navigation' );

		if ( is_singular( 'post' ) ) {
			$related_posts_label = get_theme_mod( 'educateup_post_related_post_label', __( 'Related Posts', 'educateup' ) );
			$cat_content_id      = get_the_category( $post->ID )[0]->term_id;
			$args                = array(
				'cat'            => $cat_content_id,
				'posts_per_page' => 3,
			);
			$query               = new WP_Query( $args );

			if ( $query->have_posts() ) :
				?>
				<div class="related-posts">
					<?php
					if ( get_theme_mod( 'educateup_post_hide_related_posts', true ) === false ) :
						?>
						<h2><?php echo esc_html( $related_posts_label ); ?></h2>
						<div class="row">
							<?php
							while ( $query->have_posts() ) :
								$query->the_post();
								?>
								<div class="col-lg-4 col-md-6">
									<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										<?php educateup_post_thumbnail(); ?>
										<header class="entry-header">
											<?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
										</header><!-- .entry-header -->
										<div class="entry-content">
											<?php the_excerpt(); ?>
										</div><!-- .entry-content -->
									</article>
								</div>
								<?php
							endwhile;
							wp_reset_postdata();
							?>
						</div>
						<?php
					endif;
					?>
				</div>
				<?php
			endif;
		}

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>
</main><!-- #main -->

<?php
if ( educateup_is_sidebar_enabled() ) {
	get_sidebar();
}
?>

<?php
get_footer();
