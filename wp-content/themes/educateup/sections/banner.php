<?php

if ( ! get_theme_mod( 'educateup_enable_banner_section', false ) ) {
	return;
}

$section_content = array();

$content_type = get_theme_mod( 'educateup_banner_content', 'page' );

if ( ! in_array( $content_type, array( 'post', 'page' ) ) ) {
	return;
}

if ( 'post' === $content_type ) {
	$content_id = get_theme_mod( 'educateup_banner_content_post' );
} else {
	$content_id = get_theme_mod( 'educateup_banner_content_page' );
}

$args = array(
	'post_type'           => $content_type,
	'post__in'            => (array) $content_id,
	'orderby'             => 'post__in',
	'posts_per_page'      => 1,
	'ignore_sticky_posts' => true,
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
	while ( $query->have_posts() ) :
		$query->the_post();
		$section_content['title']         = get_the_title();
		$section_content['excerpt']       = get_the_excerpt();
		$section_content['thumbnail_url'] = get_the_post_thumbnail_url( get_the_ID(), 'full' );
	endwhile;
	wp_reset_postdata();

	$section_content = apply_filters( 'educateup_banner_section_content', $section_content );

	educateup_render_banner_section( $section_content );
endif;

function educateup_render_banner_section( $section_content ) {
	if ( empty( $section_content ) ) {
		return;
	}
	?>
	<section id="educateup_banner_section" class="banner-section">
		<?php
		if ( is_customize_preview() ) :
			educateup_section_link( 'educateup_banner_section' );
		endif;
		?>
		<div class="container">
			<div class="row align-items-center justify-content-between banner-section_row">
				<div class="col-md-5 text-end mt-auto order-lg-1 py-4 py-md-0">
					<div class="banner_media_img text-center text-lg-start">
					<img src="<?php echo esc_url( $section_content['thumbnail_url'] ); ?>" alt="<?php echo esc_attr( $section_content['title'] ); ?>">
					</div>
				</div>
				<div class="col-md-7 pb-xl-5 mb-xl-5 order-lg-0 pb-5 pb-lg-0">
					<h2><?php echo esc_html( $section_content['title'] ); ?></h2>
					<p class="banner-section_details"><?php echo esc_html( $section_content['excerpt'] ); ?></p>
				</div>
			</div>
		</div>
	</section><!-- .Banner Section -->
	<?php
}
