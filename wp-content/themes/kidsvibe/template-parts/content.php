<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kidsvibe
 */

$thumbnail = ( 'column-1' == kidsvibe_theme_option( 'column_type' ) ) ? 'large' : 'post-thumbnail';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrapper">
		<?php if ( has_post_thumbnail() ) : ?>
            <div class="featured-image">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( esc_attr( $thumbnail ), array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
                </a>
            </div><!-- .recent-image -->
        <?php endif; ?>
        <div class="entry-container">
			<header class="entry-header">
				<?php if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php kidsvibe_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
				
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					the_excerpt();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kidsvibe' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
			<div class="entry-meta">
                <?php kidsvibe_entry_footer(); ?>
            </div><!-- .entry-meta -->
		</div><!-- .entry-container -->
	</div><!-- .post-wrapper -->
</article><!-- #post-<?php the_ID(); ?> -->
