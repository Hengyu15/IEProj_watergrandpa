<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package norium-portfolio
 */

get_header();
?>


<div class="breadcum index-page-breadcum">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-xl-12 col-md-12">
				<div class="oliva-breadcum">
					<h1 class="heading-title">
						<?php
						$custom_blog_breadcum_title = get_theme_mod('blog_page_breadcumb_title');
						if(!empty($custom_blog_breadcum_title)){
							echo esc_html($custom_blog_breadcum_title, 'noriumportfolio');
						}else{
							esc_html_e('Latest Posts', 'noriumportfolio');
						}

							
						?> 
					</h1>
				</div>
			</div>
		</div>
	</div>
</div>

<div style="margin-top: <?php echo esc_attr(get_theme_mod('blog_page_margin'))?>;" class="oliva-post-page">
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-8 col-md-8">
				<div class="row">
				<?php
					if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) :
							?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<?php
						endif;

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
			<div class="col-xl-4 col-lg-4 col-md-4">
				<div class="blog-sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

get_footer();
