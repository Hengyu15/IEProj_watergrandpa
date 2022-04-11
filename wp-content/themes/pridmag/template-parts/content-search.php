<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prid_Mag
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'pridmag-post' ); ?>>
	
	<div class="th-archive-thumb">
		<?php pridmag_post_thumbnail( 'pridmag-featured' ); ?>
	</div><!-- .th-archive-thumb -->

	<div class="th-archive-content">
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php pridmag_entry_meta(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

	</div><!-- .th-archive-content -->
</article><!-- #post-<?php the_ID(); ?> -->
