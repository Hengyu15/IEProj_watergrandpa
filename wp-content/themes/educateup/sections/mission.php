<?php

if ( ! get_theme_mod( 'educateup_enable_mission_section', false ) ) {
	return;
}

$content_id = $section_content = array();

$content_type = get_theme_mod( 'educateup_mission_content', 'page' );
if ( in_array( $content_type, array( 'post', 'page' ) ) ) {

	$content_id[] = get_theme_mod( 'educateup_mission_content_' . $content_type );

	$args = array(
		'post_type'           => $content_type,
		'post__in'            => $content_id,
		'orderby'             => 'post__in',
		'posts_per_page'      => 1,
		'ignore_sticky_posts' => true,
	);

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) :
			$query->the_post();
			$section_content['id']            = get_the_ID();
			$section_content['title']         = get_the_title();
			$section_content['excerpt']       = get_the_excerpt();
			$section_content['content']       = get_the_content();
			$section_content['permalink']     = get_the_permalink();
			$section_content['thumbnail_url'] = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		endwhile;
		wp_reset_postdata();

		$section_content = apply_filters( 'educateup_mission_section_content', $section_content );

		educateup_render_mission_section( $section_content );
	endif;
}

function educateup_render_mission_section( $section_content ) {
	$mission_button_label = get_theme_mod( 'educateup_mission_button_label' );
	$mission_button_link  = get_theme_mod( 'educateup_mission_button_link' );
	$mission_button_link  = ! empty( $mission_button_link ) ? $mission_button_link : '#';

	if ( empty( $section_content ) ) {
		return;
	}
	?>
	<section id="educateup_mission_section" class="mission-section">
		<?php
		if ( is_customize_preview() ) :
			educateup_section_link( 'educateup_mission_section' );
		endif;
		?>
		<div class="container">
			<h2 class="text-center"><?php echo esc_html( $section_content['title'] ); ?></h2>
			<div class="row">
				<div class="col-lg-4 text-center text-lg-start pb-5 pb-lg-0">
					<img src="<?php echo esc_url( $section_content['thumbnail_url'] ); ?>" class="theme-radius-img mission-section_main-img" alt="<?php echo esc_attr( $section_content['title'] ); ?>">
				</div>
				<div class="col-lg-8 ps-lg-5 text-center text-lg-start">
					<?php echo wp_kses_post( str_replace( '<p', '<p class="lead"', wpautop( $section_content['content'] ) ) ); ?>
					<?php if ( ! empty( $mission_button_label ) ) { ?>
						<div class="btn-wrap">
							<a href="<?php echo esc_url( $mission_button_link ); ?>" class="btn btn-primary btn-lg"><?php echo esc_html( $mission_button_label ); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
