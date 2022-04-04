<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package kidsvibe
 */

get_header(); 
$column = kidsvibe_theme_option( 'column_type' );
?>
<div class="wrapper page-section">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="blog-posts-wrapper <?php echo esc_attr( $column ) ?>">
				<?php
				if ( have_posts() ) : 

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div><!-- #blog-posts-wrapper -->
			<?php  
			/**
			* Hook - kidsvibe_pagination_action.
			*
			* @hooked kidsvibe_pagination 
			*/
			do_action( 'kidsvibe_pagination_action' ); 

			/**
			* Hook - kidsvibe_infinite_loader_action.
			*
			* @hooked kidsvibe_infinite_loader 
			*/
			do_action( 'kidsvibe_infinite_loader_action' ); 
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrapper -->
<?php
get_footer();
