<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EducateUp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'educateup_breadcrumb' ); ?>
	<?php if ( is_singular() ) : ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<?php
		if ( 'post' === get_post_type() ) :
			setup_postdata( get_post() );
			?>
			<div class="entry-meta">
				<?php
				$hide_date   = get_theme_mod( 'educateup_post_hide_date', false );
				$hide_author = get_theme_mod( 'educateup_post_hide_author', false );

				if ( ! $hide_date ) {
					educateup_posted_on();
				}
				if ( ! $hide_author ) {
					educateup_posted_by();
				}
				?>
			</div><!-- .entry-meta -->
			<?php
		endif;
		?>
	<?php endif; ?>

	<?php educateup_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'educateup' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'educateup' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php educateup_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
