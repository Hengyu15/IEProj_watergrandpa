<?php
if ( ! get_theme_mod( 'educateup_enable_course_section', false ) ) {
	return;
}

$section_content = array();
$post_count      = get_theme_mod( 'educateup_course_count', 6 );
$content_type    = get_theme_mod( 'educateup_course_content_type', 'page' );
$course_cat      = 'category';

switch ( $content_type ) {
	case 'post': // Post.
		$content_ids = array();
		for ( $i = 1; $i <= $post_count; $i++ ) {
			$content_post_id = get_theme_mod( 'educateup_course_content_post_' . $i );
			if ( ! empty( $content_post_id ) ) {
				$content_ids[] = $content_post_id;
			}
		}

		$args = array(
			'post_type'           => 'post',
			'posts_per_page'      => $post_count,
			'post__in'            => (array) $content_ids,
			'order_by'            => 'post__in',
			'ignore_sticky_posts' => true,
		);

		break;

	case 'page': // Page.
		$content_ids = array();
		for ( $i = 1; $i <= $post_count; $i++ ) {
			$content_post_id = get_theme_mod( 'educateup_course_content_page_' . $i );
			if ( ! empty( $content_post_id ) ) {
				$content_ids[] = $content_post_id;
			}
		}

		$args = array(
			'post_type'           => 'page',
			'posts_per_page'      => $post_count,
			'post__in'            => (array) $content_ids,
			'order_by'            => 'post__in',
			'ignore_sticky_posts' => true,
		);

		break;

	case 'lp_course': // Course.
		if ( ! class_exists( 'LearnPress' ) ) {
			return;
		}

		$course_cat  = 'course_category';
		$content_ids = array();
		for ( $i = 1; $i <= $post_count; $i++ ) {
			$content_post_id = get_theme_mod( 'educateup_course_content_course_' . $i );
			if ( ! empty( $content_post_id ) ) {
				$content_ids[] = $content_post_id;
			}
		}

		$args = array(
			'post_type'           => 'lp_course',
			'posts_per_page'      => $post_count,
			'post__in'            => (array) $content_ids,
			'orderby'             => 'post__in',
			'ignore_sticky_posts' => true,
		);

		break;

	default:
		break;
}

$args = apply_filters( 'educateup_course_section_content', $args, $course_cat );

educateup_render_course_section( $args, $course_cat );

/**
 * Render course section
 */
function educateup_render_course_section( $args, $course_cat ) {
	?>
	<section id="educateup_course_section" class="popular-course-section pattern bottom-left">
		<?php
		if ( is_customize_preview() ) :
			educateup_section_link( 'educateup_course_section' );
		endif;

		$section_title       = get_theme_mod( 'educateup_course_title', __( 'Popular Courses', 'educateup' ) );
		$section_text        = get_theme_mod( 'educateup_course_text' );
		$content_type        = get_theme_mod( 'educateup_course_content_type', 'page' );
		$course_button_label = get_theme_mod( 'educateup_course_button_label' );
		$course_button_link  = get_theme_mod( 'educateup_course_button_link' );
		$course_button_link  = ! empty( $course_button_link ) ? $course_button_link : '#';
		?>
		<div class="container">
			<div class=" row align-items-center mb-1">
				<div class="col-lg-9 col-md-8 mb-5 text-center text-md-start">
					<h2 class="mb-2"><?php echo esc_html( $section_title ); ?></h2>
					<p class="text-medium mb-0"><?php echo esc_html( $section_text ); ?></p>
				</div>
				<?php if ( ! empty( $course_button_label ) ) { ?>
					<div class="col-lg-3 col-md-4 text-center text-md-end mb-5">
						<a href="<?php echo esc_url( $course_button_link ); ?>" class="btn btn-outline-primary btn-lg"><?php echo esc_html( $course_button_label ); ?></a>
					</div>
				<?php } ?>
			</div>

			<?php
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) :
				?>
				<div class="row justify-content-center">
					<?php
					while ( $query->have_posts() ) :
						$query->the_post();
						$course = LP_Global::course();
						?>
						<div class="col-xl-4 col-lg-6 col-md-6">
							<div class="card card-float">
								<div class="card_media">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'full', array( 'class' => 'card_media_img' ) ); ?>
									</a>
								</div>
								<div class="card__details">
									<?php
									$terms = get_the_terms( get_the_ID(), $course_cat );
									if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
										?>
										<div class="tags">
											<span class="badge bg-primary"><?php echo get_the_term_list( get_the_ID(), $course_cat, '', ', ' ); ?></span>
										</div>
										<?php
									}
									?>
									<h4 class="card_title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h4>
									<?php if ( 'lp_course' === $content_type ) { ?>
										<div class="card_info mb-3"><strong><?php esc_html_e( 'Instructor:', 'educateup' ); ?></strong> <?php echo $course->get_instructor_html(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
										<div class="card_list_inline">
											<div>
												<em class="bi bi-people-fill me-1"></em> <?php echo esc_html( $course->get_users_enrolled() ); ?>
											</div>
											<div class="card_list_inline_mid">
												<em class="bi bi-clock-fill me-1"></em> <?php echo esc_html( learn_press_get_post_translated_duration( get_the_ID(), esc_html__( 'Lifetime access', 'educateup' ) ) ); ?>
											</div>
											<?php
											$price_html = $course->get_price_html();
											if ( $price_html ) :
												?>
												<div class="text-primary">
													<em class="bi bi-tag-fill me-1"></em> <?php echo esc_html( $price_html ); ?>
												</div>
												<?php
											endif;
											?>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<?php
						endwhile;
						wp_reset_postdata();
					?>
				</div>
				<?php
				endif;
			?>
		</div>
	</section>
	<?php
}
