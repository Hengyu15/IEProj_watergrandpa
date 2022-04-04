<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EducateUp
 */

?>
	<?php if ( ! is_front_page() || is_home() ) { ?>
				</div>
			</div>
		</div><!-- #content -->
	<?php } ?>
	<footer id="colophon" class="site-footer text-center text-md-start">
		<div class="site-footer-top">
			<div class="container">
				<div class="row">
					<div class="site-footer-top_column_info col-md-6 col-lg-4 col-xl-5 pb-5 pb-lg-0">
						<?php dynamic_sidebar( 'footer-widget' ); ?>
					</div>
					<div class="col-lg-2 col-md-6 pb-5 pb-lg-0">
						<?php dynamic_sidebar( 'footer-widget-2' ); ?>
					</div>
					<div class="col-lg-2 col-md-6 pb-5 pb-lg-0">
						<?php dynamic_sidebar( 'footer-widget-3' ); ?>
					</div>
					<div class="col-md-6 col-lg-4 col-xl-3 pb-3 pb-lg-0">
						<?php dynamic_sidebar( 'footer-widget-4' ); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="site-info">
			<?php
			/**
			 * Hook: educateup_footer_copyright.
			 *
			 * @hooked - educateup_output_footer_copyright_content - 10
			 */
			do_action( 'educateup_footer_copyright' );
			?>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->

	<?php
	$is_scroll_top_active = get_theme_mod( 'educateup_scroll_top', true );
	if ( $is_scroll_top_active ) :
		?>
		<a href="#masthead" id="scroll-to-top" class="top-link shadow"><em class="bi bi-arrow-up"></em></a>
		<?php
	endif;
	?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
