<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PridMag
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'pridmag-post' ); ?>>
	<div class="th-archive-thumb">
		<?php pridmag_post_thumbnail( 'pridmag-featured' ); ?>
	</div><!-- .th-archive-thumb -->

	<div class="th-archive-content">
		<header class="entry-header">
			<?php
				if( true === get_theme_mod( 'pridmag_archive_category_list', true) ) {
					pridmag_category_list(); 
				}
			?>
			<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php pridmag_entry_meta(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php

			$pridmag_content_display_method = get_theme_mod( 'pridmag_content_display_method', 'excerpt' );

			if ( $pridmag_content_display_method === 'excerpt' ) {
				the_excerpt();
			} elseif( $pridmag_content_display_method === 'full-content' ) {
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'pridmag' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );
			}

			if ( true === get_theme_mod( 'pridmag_readmore_button', false ) ) {
				$pridmag_readmore_text = get_theme_mod( 'pridmag_readmore_text', 'Read More' ); ?>
				<a href="<?php the_permalink(); ?>" class="th-readmore"><?php echo esc_html( $pridmag_readmore_text ); ?></a>
			<?php } ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pridmag' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		
	</div><!-- .th-archive-content -->
</article><!-- #post-<?php the_ID(); ?> -->