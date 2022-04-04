<?php
if ( ! get_theme_mod( 'educateup_kids_enable_project_section', false ) ) {
	return;
}

$content_ids     = array();
$section_content = array();

for ( $i = 1; $i <= 4; $i++ ) {
	$item_id = get_theme_mod( 'educateup_kids_project_content_post_' . $i );
	if ( ! empty( $item_id ) ) {
		$content_ids[] = $item_id;
	}
}

$args = array(
	'post_type'           => 'post',
	'post__in'            => (array) $content_ids,
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 4 ),
	'ignore_sticky_posts' => true,
);

$query = new WP_Query( $args );
if ( $query->have_posts() ) :
	while ( $query->have_posts() ) :
		$query->the_post();
		$section_content[] = array(
			'title'         => get_the_title(),
			'permalink'     => get_the_permalink(),
			'thumbnail_url' => get_the_post_thumbnail_url( get_the_ID(), 'full' ),
		);
	endwhile;
	wp_reset_postdata();

	$section_content = apply_filters( 'educateup_kids_project_section_content', $section_content );

	educateup_kids_render_project_section( $section_content );
endif;

/**
 * Render project section
 */
function educateup_kids_render_project_section( $section_content ) {
	if ( empty( $section_content ) ) {
		return;
	}
	$section_title        = get_theme_mod( 'educateup_kids_project_title', __( 'Latest Projects', 'educateup-kids' ) );
	$project_button_label = get_theme_mod( 'educateup_kids_project_button_label' );
	$project_button_link  = get_theme_mod( 'educateup_kids_project_button_link' );
	$project_button_link  = ! empty( $project_button_link ) ? $project_button_link : '#';
	?>
	<section id="educateup_kids_project_section" class="project-list-section">
		<?php
		if ( is_customize_preview() ) :
			educateup_kids_section_link( 'educateup_kids_project_section' );
		endif;
		?>
		<div class="container">
			<div class="row align-items-center mb-5 pb-md-4">
				<div class="col-sm-6 text-center text-md-start">
					<h2 class="mb-md-0 mb-4"><?php echo esc_html( $section_title ); ?></h2>
				</div>
				<?php if ( ! empty( $project_button_label ) ) { ?>
					<div class="col-sm-6 text-center text-md-end">
						<a href="<?php echo esc_url( $project_button_link ); ?>" class="btn btn-primary btn-lg"><?php echo esc_html( $project_button_label ); ?></a>
					</div>
				<?php } ?>
			</div>
			<div class="project-list-wrap">
				<?php foreach ( $section_content as $content ) { ?>
					<div class="project-list-item" tabindex="0" style="background-image:url('<?php echo esc_url( $content['thumbnail_url'] ); ?>');">
						<div class="project-list-item-content">
							<h3 class="project-list-item_title text-light"><?php echo esc_html( $content['title'] ); ?></h3>
							<a href="<?php echo esc_url( $content['permalink'] ); ?>" class="circle-btn"> <em class="bi bi-arrow-right"></em></a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<?php
}
