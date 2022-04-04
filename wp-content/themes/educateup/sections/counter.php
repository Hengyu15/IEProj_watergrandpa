<?php
if ( ! get_theme_mod( 'educateup_enable_counter_section', false ) ) {
	return;
}

$section_content               = array();
$section_content['background'] = get_theme_mod( 'educateup_counter_background' );
$section_content['count']      = get_theme_mod( 'educateup_counter_count', 4 );

$section_content = apply_filters( 'educateup_counter_section_content', $section_content );

educateup_render_counter_section( $section_content );

/**
 * Render counter section
 */
function educateup_render_counter_section( $section_content ) {
	?>
	<section id="educateup_counter_section" class="counter-section" style="background-image:url('<?php echo esc_url( $section_content['background'] ); ?>')">
		<?php
		if ( is_customize_preview() ) :
			educateup_section_link( 'educateup_counter_section' );
		endif;
		?>
		<div class="container">
			<div class="counter-list ">
				<?php
				for ( $i = 1; $i <= $section_content['count']; $i++ ) {
					$icon         = get_theme_mod( 'educateup_counter_icon_' . $i );
					$label        = get_theme_mod( 'educateup_counter_label_' . $i );
					$value        = get_theme_mod( 'educateup_counter_value_' . $i );
					$value_suffix = get_theme_mod( 'educateup_counter_value_suffix_' . $i );
					?>
					<div class="counter-list_item">
						<?php if ( ! empty( $icon ) ) { ?>
							<img src="<?php echo esc_url( $icon ); ?>" class="counter-list_item_img" alt="<?php echo esc_attr( $label ); ?>">
						<?php } ?>
						<h2 class="counter-list_item_title">
							<span class="count" data-count="<?php echo esc_attr( $value ); ?>"></span><?php echo esc_html( $value_suffix ); ?>
						</h2>
						<p><?php echo esc_html( $label ); ?></p>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</section>
	<?php
}
