<?php

if ( ! get_theme_mod( 'educateup_enable_blog_section', false ) ) {
	return;
}

$blog_count = get_theme_mod( 'educateup_blog_count', 3 );

$content_ids = $section_content = array();

for ( $i = 1; $i <= $blog_count; $i++ ) {
	$content_ids[] = get_theme_mod( 'educateup_blog_content_post_' . $i );
}

$args = array(
	'post_type'      => 'post',
	'post__in'       => $content_ids,
	'orderby'        => 'post__in',
	'posts_per_page' => absint( $blog_count ),
);

$query = new WP_Query( $args );
if ( $query->have_posts() ) :
	while ( $query->have_posts() ) :
		$query->the_post();
		$section_content[] = array(
			'id'            => get_the_ID(),
			'title'         => get_the_title(),
			'excerpt'       => get_the_excerpt(),
			'permalink'     => get_the_permalink(),
			'thumbnail_url' => get_the_post_thumbnail_url( get_the_ID(), 'full' ),
		);
	endwhile;
	wp_reset_postdata();

	$section_content = apply_filters( 'educateup_blog_section_content', $section_content );

	educateup_render_blog_section( $section_content );
endif;

/**
 * Render blog section
 */
function educateup_render_blog_section( $section_content ) {
	if ( empty( $section_content ) ) {
		return;
	}
	$blog_title        = get_theme_mod( 'educateup_blog_title', __( 'Featured Blog', 'educateup' ) );
	$blog_subtitle     = get_theme_mod( 'educateup_blog_subtitle' );
	$blog_button_label = get_theme_mod( 'educateup_blog_button_label', __( 'View All', 'educateup' ) );
	$blog_button_link  = get_theme_mod( 'educateup_blog_button_link' );
	$blog_button_link  = ! empty( $blog_button_link ) ? $blog_button_link : '#';
	?>
	<section id="educateup_blog_section" class="popular-course-section">
		<?php
		if ( is_customize_preview() ) :
			educateup_section_link( 'educateup_blog_section' );
		endif;
		?>
		<div class="container">
			<div class="heading text-center text-gray">
				<h2><?php echo esc_html( $blog_title ); ?></h2>
				<p><?php echo esc_html( $blog_subtitle ); ?></p>
			</div>
			<div class="row justify-content-center">
				<?php foreach ( $section_content as $content ) { ?>
					<div class="col-lg-4 col-md-6">
						<div class="card card-float">
							<div class="card_media">
								<a href="<?php echo esc_url( $content['permalink'] ); ?>">
									<img src="<?php echo esc_url( $content['thumbnail_url'] ); ?>" class="card_media_img" alt="<?php echo esc_attr( $content['title'] ); ?>">
								</a>
							</div>
							<div class="card__details text-gray">
								<div class="tags">
									<span class="badge bg-primary"><?php echo get_the_category_list( ', ', '', $content['id'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
								</div>
								<h4 class="card_title"><a href="<?php echo esc_url( $content['permalink'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h4>
								<p><?php echo esc_html( $content['excerpt'] ); ?></p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<?php if ( ! empty( $blog_button_label ) ) : ?>
				<div class="text-center btn-wrap">
					<a href="<?php echo esc_url( $blog_button_link ); ?>" class="btn btn-outline-primary btn-lg"><?php echo esc_html( $blog_button_label ); ?></a>
				</div>
			<?php endif; ?>
		</div>
	</section>
	<?php
}
