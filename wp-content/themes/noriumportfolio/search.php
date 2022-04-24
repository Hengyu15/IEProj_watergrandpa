<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package noriumportfolio
 */

get_header();
?>


		<div class="search-page-oliva">
			<div class="page-breadcumb breadcum">
				<div class="container">
					<div class="row">
					<div class="col-lg-12 col-xl-12 col-md-12">
						<div class="oliva-breadcum">
							<header class="page-header">
								<h1 class="page-title">
									<?php
									/* translators: %s: search query. */
									printf( esc_html__( 'Search Results for: %s', 'noriumportfolio' ), '<span>' . get_search_query() . '</span>' );
									?>
								</h1>
							</header><!-- .page-header -->
						</div>
					</div>
				</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-xl-9 col-lg-9 col-md-9">
						<?php if ( have_posts() ) : ?>


						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;

							the_posts_pagination();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3">
						<div class="sibebar">
							<?php get_sidebar();?>
						</div>
					</div>
				</div>
			</div>
		</div>


<?php

get_footer();
