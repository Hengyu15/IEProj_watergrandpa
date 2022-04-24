<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package norium_portfolio
 */

get_header();
?>

<div class="arg-cate-page">
	<div class="page-breadcumb breadcum">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xl-12 col-md-12">
					<div class="oliva-breadcum">
						<header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-xl-8 col-md-8">
				<div class="row">
					<?php if ( have_posts() ) : ?>
					

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_pagination();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
				</div>
				</div>
			<div class="col-lg-4 col-xl-4 col-md-4">
					<?php get_sidebar();?>
			</div>
		</div>
	</div>
</div>



<?php

get_footer();
