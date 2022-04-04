<?php
if ( ! get_theme_mod( 'educateup_enable_newsletter_section', false ) ) {
	return;
}

$section_content                     = array();
$section_content['title']            = get_theme_mod( 'educateup_newsletter_title', __( 'Join Our Mailing List', 'educateup' ) );
$section_content['content']          = get_theme_mod( 'educateup_newsletter_content', __( 'Sign up for newsletter and get latest news and updates.', 'educateup' ) );
$section_content['background_color'] = get_theme_mod( 'educateup_newsletter_background_color' );

$section_content = apply_filters( 'educateup_newsletter_section_content', $section_content );

educateup_render_newsletter_section( $section_content );

/**
 * Render newsletter section
 */
function educateup_render_newsletter_section( $section_content ) {
	$style_attr = '';
	if ( ! empty( $section_content['background_color'] ) ) {
		$style_attr = 'background-color: ' . $section_content['background_color'] . ';';
	}
	?>
	<section id="educateup_newsletter_section" class="newsletter-section" style="<?php echo esc_attr( $style_attr ); ?>;">
		<?php
		if ( is_customize_preview() ) :
			educateup_section_link( 'educateup_newsletter_section' );
		endif;
		?>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
					<h2><?php echo esc_html( $section_content['title'] ); ?></h2>
					<p class="mb-0"><?php echo wp_kses_post( $section_content['content'] ); ?></p>
				</div>
				<div class="col-lg-6 text-center text-lg-end">
					<div class="newsletter">
						<?php
						$subscription_shortcode = '[jetpack_subscription_form title="" subscribe_text="" subscribe_button=""]';
						echo do_shortcode( wp_kses_post( $subscription_shortcode ) );
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
}
