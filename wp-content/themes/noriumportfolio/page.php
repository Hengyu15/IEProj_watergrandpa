<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package norium-portfolio
 */

get_header();
?>
<?php if(get_theme_mod('page_breadcumb_swtihcer')==true):?>
	<div class="page-breadcumb breadcum">
		<div class="container">
			<div class="row">
			<div class="col-lg-12 col-xl-12 col-md-12">
				<div class="oliva-breadcum">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'noriumportfolio');?></a> <a href="<?php esc_url(the_permalink());?>"><?php echo esc_html(get_the_title()) ;?></a>
				</div>
			</div>
		</div>
		</div>
	</div>

<?php endif;?>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xl-12 col-md-12">
					<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
				</div>
			</div>
		</div>



<?php

get_footer();
