<?php
if ( ! get_theme_mod( 'educateup_kids_enable_testimonial_section', false ) ) {
	return;
}

$content_id = $designation = $section_content = array();

for ( $i = 1; $i <= 4; $i++ ) {
	$item_id                 = get_theme_mod( 'educateup_kids_testimonial_content_page_' . $i );
	$content_id[]            = $item_id;
	$designation[ $item_id ] = get_theme_mod( 'educateup_kids_testimonial_position_' . $i );
}

$args = array(
	'post_type'          => 'page',
	'post__in'           => (array) $content_id,
	'orderby'            => 'post__in',
	'posts_per_page'     => absint( 4 ),
	'ignore_sticky_post' => true,
);

$query = new WP_Query( $args );
if ( $query->have_posts() ) :
	while ( $query->have_posts() ) :
		$query->the_post();
		$section_content[] = array(
			'id'            => get_the_ID(),
			'title'         => get_the_title(),
			'content'       => get_the_content(),
			'permalink'     => get_the_permalink(),
			'thumbnail_url' => get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ),
		);
	endwhile;
	wp_reset_postdata();

	$section_content = apply_filters( 'educateup_kids_testimonial_section_content', $section_content );
endif;
educateup_kids_render_testimonial_section( $section_content, $designation );

/**
 * Render testinomial section
 */
function educateup_kids_render_testimonial_section( $section_content, $designation ) {
	$section_title    = get_theme_mod( 'educateup_kids_testimonial_section_title', __( 'What Students Says', 'educateup-kids' ) );
	$section_subtitle = get_theme_mod( 'educateup_kids_testimonial_section_subtitle' );
	?>
	<section id="educateup_kids_testimonial_section" class="testimonial-section">
		<?php
		if ( is_customize_preview() ) :
			educateup_kids_section_link( 'educateup_kids_testimonial_section' );
		endif;
		?>
		<div class="container">
			<div class="heading text-center text-gray">
				<h2><?php echo esc_html( $section_title ); ?></h2>
				<p><?php echo esc_html( $section_subtitle ); ?></p>
			</div>
			<div class="card-wrapper mb-5">
				<?php foreach ( $section_content as $content ) { ?>
					<div class="card ">
						<img class="card_img" src="<?php echo esc_url( $content['thumbnail_url'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
						<div class="card_details">
							<?php echo wp_kses_post( $content['content'] ); ?>
							<h5 class="mb-1"><?php echo esc_html( $content['title'] ); ?></h5>
							<p class="mb-0"><?php echo esc_html( $designation[ $content['id'] ] ); ?></p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<?php
}
