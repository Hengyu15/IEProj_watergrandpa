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
 * @package EducateUp
 */

get_header();

if ( is_front_page() && is_home() ) {
	require get_template_directory() . '/home.php';
} elseif ( is_front_page() && ! is_home() ) {
	?>
	<main id="primary" class="site-main py-0">
		<?php require get_template_directory() . '/sections/sections.php'; ?>
		<?php educateup_homepage_sections(); ?>
	</main><!-- #main -->
	<?php
}
if ( true === get_theme_mod( 'educateup_enable_frontpage_content', false ) ) {
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
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
				<main class="site-main <?php echo esc_attr( $main_class ); ?>">
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
				</main>
				<?php
				if ( educateup_is_sidebar_enabled() ) {
					get_sidebar();
				}
				?>
			</div>
		</div>
	</div>
	<?php
}

get_footer();
