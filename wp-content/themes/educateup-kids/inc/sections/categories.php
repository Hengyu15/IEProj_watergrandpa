<?php
if ( ! get_theme_mod( 'educateup_kids_enable_categories_section', false ) || ! class_exists( 'LearnPress' ) ) {
	return;
}

$section_content = array();

$section_content['title'] = get_theme_mod( 'educateup_kids_categories_title', __( 'Feel The Adventure', 'educateup-kids' ) );
$section_content['text']  = get_theme_mod( 'educateup_kids_categories_text' );

$section_content = apply_filters( 'educateup_kids_categories_section_content', $section_content );

educateup_kids_render_categories_section( $section_content );

/**
 * Render categories section.
 */
function educateup_kids_render_categories_section( $section_content ) {
	$categories_button_label = get_theme_mod( 'educateup_kids_categories_button_label' );
	$categories_button_link  = get_theme_mod( 'educateup_kids_categories_button_link' );
	$categories_button_link  = ! empty( $categories_button_link ) ? $categories_button_link : '#';

	for ( $i = 1; $i <= 3; $i++ ) {
		$item_id      = get_theme_mod( 'educateup_kids_categories_content_course_category_' . $i );
		$content_id[] = $item_id;

		$cat_image[ $item_id ] = get_theme_mod( 'educateup_kids_categories_image_' . $i );
	}

	$args = array(
		'taxonomy'   => 'course_category',
		'include'    => (array) $content_id,
		'count'      => true,
		'orderby'    => 'include',
		'order'      => 'asc',
		'hide_empty' => false,
	);

	$terms = get_terms( $args );
	?>
	<section id="educateup_kids_categories_section" class="popular-category-section">
		<?php
		if ( is_customize_preview() ) :
			educateup_kids_section_link( 'educateup_kids_categories_section' );
		endif;
		?>
		<div class="container">
			<div class="heading text-center">
				<h2><?php echo esc_html( $section_content['title'] ); ?></h2>
				<p><?php echo esc_html( $section_content['text'] ); ?></p>
			</div>
			<?php if ( ! empty( $terms ) ) { ?>
				<div class="row">
					<?php
					foreach ( $terms as $value ) {
						$term_link = get_term_link( $value, 'course_category' );
						?>
						<div class="col-lg-4 col-md-6">
							<a class="gallery_item" href="<?php echo esc_url( $term_link ); ?>">
								<?php if ( isset( $cat_image[ $value->term_id ] ) ) { ?>
									<div class="gallery_item_img_wrap">
										<img class="gallery_item_img" src="<?php echo esc_url( $cat_image[ $value->term_id ] ); ?>" alt="<?php echo esc_attr( $value->name ); ?>">
									</div>
								<?php } ?>
								<div class="gallery_item_caption ">
									<div>
										<h5><?php echo esc_html( $value->name ); ?></h5>
										<?php if ( isset( $value->count ) && $value->count > 0 ) { ?>
											<small class="text-small">
												<?php
												printf(
													/* translators: %d: items count. */
													esc_html( _n( '%d item', '%d items', $value->count, 'educateup-kids' ) ),
													number_format_i18n( $value->count ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
												);
												?>
											</small>
										<?php } ?>
									</div>
								</div>
							</a>
						</div>
						<?php
					}
					?>
				</div>
			<?php } ?>
			<?php if ( ! empty( $categories_button_label ) ) : ?>
				<div class="text-center btn-wrap">
					<a href="<?php echo esc_url( $categories_button_link ); ?>" class="btn btn-outline-primary btn-lg"><?php echo esc_html( $categories_button_label ); ?></a>
				</div>
			<?php endif; ?>
		</div>
	</section>
	<?php
}
