<?php

if ( ! get_theme_mod( 'educateup_enable_team_section', false ) ) {
	return;
}

$content_id    = $designation = $social_links = $section_content = array();
$content_count = get_theme_mod( 'educateup_team_count', 3 );
$content_type  = get_theme_mod( 'educateup_team_content_type', 'post' );

if ( ! in_array( $content_type, array( 'post', 'page' ) ) ) {
	return;
}

for ( $i = 1; $i <= $content_count; $i++ ) {
	$team_id                 = get_theme_mod( 'educateup_team_content_' . $content_type . '_' . $i );
	$content_id[]            = $team_id;
	$designation[ $team_id ] = get_theme_mod( 'educateup_team_position_' . $i );
	$social_links_str        = get_theme_mod( 'educateup_team_social_links_' . $i );
	if ( ! empty( $social_links_str ) ) {
		$social_links[ $team_id ] = explode( ',', get_theme_mod( 'educateup_team_social_links_' . $i ) );
	}
}

$args = array(
	'post_type'           => $content_type,
	'post__in'            => $content_id,
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( $content_count ),
	'ignore_sticky_posts' => true,
);

$query = new WP_Query( $args );
if ( $query->have_posts() ) :
	while ( $query->have_posts() ) :
		$query->the_post();
		$section_content[] = array(
			'id'            => get_the_ID(),
			'title'         => get_the_title(),
			'permalink'     => get_the_permalink(),
			'thumbnail_url' => get_the_post_thumbnail_url( get_the_ID(), 'full' ),
		);
	endwhile;
	wp_reset_postdata();
endif;

$section_content = apply_filters( 'educateup_team_section_content', $section_content );

educateup_render_team_section( $section_content, $designation, $social_links );

/**
 * Render Team Section.
 */
function educateup_render_team_section( $section_content, $designation, $social_links ) {
	$section_title     = get_theme_mod( 'educateup_team_section_title', __( 'Meet our Teachers', 'educateup' ) );
	$section_subtitle  = get_theme_mod( 'educateup_team_section_subtitle' );
	$team_button_label = get_theme_mod( 'educateup_team_button_label' );
	$team_button_link  = get_theme_mod( 'educateup_team_button_link' );
	$team_button_link  = ! empty( $team_button_link ) ? $team_button_link : '#';
	?>
	<section id="educateup_team_section" class="team-section">
		<?php
		if ( is_customize_preview() ) :
			educateup_section_link( 'educateup_team_section' );
		endif;
		?>
		<div class="container">
			<div class="heading text-center">
				<h2 class="text-center"><?php echo esc_html( $section_title ); ?></h2>
				<p><?php echo esc_html( $section_subtitle ); ?></p>
			</div>
			<div class="row">
				<?php
				foreach ( $section_content as $content ) {
					$team_id = $content['id'];
					?>
					<div class="col-md-4">
						<div class="media flex-column">
							<div class="media_img">
							<a href="<?php echo esc_url( $content['permalink'] ); ?>">
								<img src="<?php echo esc_html( $content['thumbnail_url'] ); ?>" class="theme-radius-img" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
							</div>
							<div class="media_details">
								<h4 class="media_title"><a href="<?php echo esc_url( $content['permalink'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h4>
								<p><?php echo esc_html( $designation[ $team_id ] ); ?></p>
								<?php if ( ! empty( $social_links[ $team_id ] ) ) : ?>
									<div class="social-links">
										<?php foreach ( $social_links[ $team_id ] as $link ) : ?>
											<a href="<?php echo esc_url( $link ); ?>" target="_blank"></a>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
			<?php if ( ! empty( $team_button_label ) ) : ?>
				<div class="btn-wrap text-center">
					<a href="<?php echo esc_url( $team_button_link ); ?>" class="btn btn-outline-primary btn-lg"><?php echo esc_html( $team_button_label ); ?></a>
				</div>
			<?php endif; ?>
		</div>
	</section>
	<?php
}
