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
 * @package EducateUp
 */

get_header();
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
	<main id="primary" class="site-main <?php echo esc_attr( $main_class ); ?>">
		<?php
		do_action( 'educateup_breadcrumb' );

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			endwhile; // End of the loop.
		?>
	</main><!-- #main -->

	<?php
	if ( educateup_is_sidebar_enabled() ) {
		get_sidebar();
	}
	?>

<?php
get_footer();
