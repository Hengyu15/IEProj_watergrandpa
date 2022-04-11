<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prid_Mag
 */

?>
	</div><!-- .th-container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="th-container">
			<div class="footer-widget-area">
				<?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) : ?>
					<div class="footer-sidebar" role="complementary">
						<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
					</div><!-- .footer-sidebar -->
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) : ?>
					<div class="footer-sidebar" role="complementary">
						<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
					</div><!-- .footer-sidebar -->
				<?php endif; ?>		

				<?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) : ?>
					<div class="footer-sidebar" role="complementary">
						<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
					</div><!-- .footer-sidebar -->
				<?php endif; ?>						
			</div><!-- .footer-widget-area -->
		</div><!-- .th-container -->

		<div class="site-info">
			<div class="th-container">
				<div class="site-info-owner">
					<?php
						$pridmag_footer_copyright_text = get_theme_mod( 'pridmag_footer_copyright_text', '' );

						if ( ! empty ( $pridmag_footer_copyright_text ) ) {
							echo wp_kses_post( $pridmag_footer_copyright_text );
						} else {
							$site_link = '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" >' . esc_html( get_bloginfo( 'name' ) ) . '</a>';
							/* translators: 1: Year 2: Site URL. */
							printf( esc_html__( 'Copyright &#169; %1$s %2$s.', 'pridmag' ), date_i18n( 'Y' ), $site_link ); // WPCS: XSS OK.
						}		
					?>
				</div>			
				<div class="site-info-designer">
					<?php
						/* translators: 1: WordPress 2: Theme Author. */
						printf( esc_html__( 'Powered by %1$s and %2$s.', 'pridmag' ),
							'<a href="https://wordpress.org" target="_blank">WordPress</a>',
							'<a href="https://themezhut.com/themes/pridmag/" target="_blank">PridMag</a>'
						); 
					?>
				</div>
			</div><!-- .th-container -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
