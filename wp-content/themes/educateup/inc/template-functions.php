<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package EducateUp
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function educateup_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	$classes[] = educateup_sidebar_layout();

	if ( get_theme_mod( 'educateup_enable_top_bar', true ) ) {
		$classes[] = 'topbar-active';
	}

	return $classes;
}
add_filter( 'body_class', 'educateup_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function educateup_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'educateup_pingback_header' );


/**
 * Get all posts for customizer Post content type.
 */
function educateup_get_post_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'educateup' ) );
	$args    = array( 'numberposts' => -1 );
	$posts   = get_posts( $args );

	foreach ( $posts as $post ) {
		$id             = $post->ID;
		$title          = $post->post_title;
		$choices[ $id ] = $title;
	}

	return $choices;
}

/**
 * Get all pages for customizer Page content type.
 */
function educateup_get_page_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'educateup' ) );
	$pages   = get_pages();

	foreach ( $pages as $page ) {
		$choices[ $page->ID ] = $page->post_title;
	}

	return $choices;
}

/**
 * Get all categories for customizer Category content type.
 */
function educateup_get_post_cat_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'educateup' ) );
	$cats    = get_categories();

	foreach ( $cats as $cat ) {
		$choices[ $cat->term_id ] = $cat->name;
	}

	return $choices;
}

/**
 * Get all list of taxonomies name.
 */
function educateup_get_taxonomy_choices() {
	$choices = array(
		'category' => esc_html__( 'Post Categories', 'educateup' ),
	);

	if ( class_exists( 'LearnPress' ) ) {
		$choices = array_merge(
			$choices,
			array(
				'course_category' => esc_html__( 'Course Categories', 'educateup' ),
			)
		);
	}

	return $choices;
}

/**
 * Get all taxonomy terms for customizer Destination content type.
 */
function educateup_get_taxonomy_term_choices( $taxonomy ) {
	$choices    = array( '' => esc_html__( '--Select--', 'educateup' ) );
	$tax_args   = array(
		'hide_empty' => false,
		'taxonomy'   => $taxonomy,
	);
	$taxonomies = get_categories( $tax_args );

	foreach ( $taxonomies as $cat ) {
		$choices[ $cat->term_id ] = $cat->name;
	}

	return $choices;
}

/**
 * Get all course categories for customizer Course Category content type
 */
function educateup_get_course_cat_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'educateup' ) );
	$args    = array(
		'taxonomy'   => 'course_category',
		'orderby'    => 'name',
		'order'      => 'asc',
		'hide_empty' => false,
	);

	$course_cats = get_terms( $args );
	if ( ! empty( $course_cats ) && ! is_wp_error( $course_cats ) ) {
		foreach ( $course_cats as $course_cat ) {
			$choices[ $course_cat->term_id ] = $course_cat->name;
		}
	}
	return $choices;
}

/**
 * Get all courses for customizer course content type.
 */
function educateup_get_course_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'educateup' ) );
	$posts   = get_posts(
		array(
			'post_type'   => 'lp_course',
			'numberposts' => -1,
		)
	);
	foreach ( $posts as $post ) {
		$choices[ $post->ID ] = $post->post_title;
	}
	return $choices;
}

/**
 * Get list for Course content type choices
 */
function educateup_get_course_content_type_choices() {
	$course_choices = array(
		'page' => esc_html__( 'Page', 'educateup' ),
		'post' => esc_html__( 'Post', 'educateup' ),
	);

	if ( class_exists( 'LearnPress' ) ) {
		$course_choices = array_merge(
			$course_choices,
			array(
				'lp_course' => esc_html__( 'Course', 'educateup' ),
			)
		);
	}

	return $course_choices;
}

if ( ! function_exists( 'educateup_excerpt_length' ) ) :
	/**
	 * Excerpt length.
	 */
	function educateup_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		return get_theme_mod( 'educateup_excerpt_length', 20 );
	}
endif;
add_filter( 'excerpt_length', 'educateup_excerpt_length', 999 );

if ( ! function_exists( 'educateup_excerpt_more' ) ) :
	/**
	 * Excerpt more.
	 */
	function educateup_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}

		return '&hellip;';
	}
endif;
add_filter( 'excerpt_more', 'educateup_excerpt_more' );

if ( ! function_exists( 'educateup_sidebar_layout' ) ) {
	/**
	 * Get sidebar layout.
	 */
	function educateup_sidebar_layout() {
		$sidebar_position      = get_theme_mod( 'educateup_sidebar_position', 'right-sidebar' );
		$sidebar_position_post = get_theme_mod( 'educateup_post_sidebar_position', 'right-sidebar' );
		$sidebar_position_page = get_theme_mod( 'educateup_page_sidebar_position', 'right-sidebar' );

		if ( is_single() ) {
			$sidebar_position = $sidebar_position_post;
		} elseif ( is_page() ) {
			$sidebar_position = $sidebar_position_page;
		}

		return $sidebar_position;
	}
}

if ( ! function_exists( 'educateup_is_sidebar_enabled' ) ) {
	/**
	 * Check if sidebar is enabled.
	 */
	function educateup_is_sidebar_enabled() {
		$sidebar_position      = get_theme_mod( 'educateup_sidebar_position', 'right-sidebar' );
		$sidebar_position_post = get_theme_mod( 'educateup_post_sidebar_position', 'right-sidebar' );
		$sidebar_position_page = get_theme_mod( 'educateup_page_sidebar_position', 'right-sidebar' );

		$sidebar_enabled = true;
		if ( is_home() || is_archive() || is_search() ) {
			if ( 'no-sidebar' === $sidebar_position ) {
				$sidebar_enabled = false;
			}
		} elseif ( is_single() ) {
			if ( 'no-sidebar' === $sidebar_position || 'no-sidebar' === $sidebar_position_post ) {
				$sidebar_enabled = false;
			}
		} elseif ( is_page() ) {
			if ( 'no-sidebar' === $sidebar_position || 'no-sidebar' === $sidebar_position_page ) {
				$sidebar_enabled = false;
			}
		}
		return $sidebar_enabled;
	}
}

if ( ! function_exists( 'educateup_get_homepage_sections ' ) ) {
	/**
	 * Returns homepage sections.
	 */
	function educateup_get_homepage_sections() {
		$sections = array(
			'banner'     => esc_html__( 'Banner Section', 'educateup' ),
			'course'     => esc_html__( 'Course Section', 'educateup' ),
			'team'       => esc_html__( 'Team Section', 'educateup' ),
			'counter'    => esc_html__( 'Counter Section', 'educateup' ),
			'mission'    => esc_html__( 'Mission Section', 'educateup' ),
			'blog'       => esc_html__( 'Blog Section', 'educateup' ),
			'newsletter' => esc_html__( 'Newsletter Section', 'educateup' ),
		);
		return $sections;
	}
}

if ( ! function_exists( 'educateup_get_default_color' ) ) {
	/**
	 * Returns default colors.
	 */
	function educateup_get_default_color( $layout = '' ) {
		$color['primary']   = '#6a48cd';
		$color['secondary'] = '#ffd601';
		return $color;
	}
}

function educateup_section_link( $section_id ) {
	$section_name      = str_replace( 'educateup_', ' ', $section_id );
	$section_name      = str_replace( '_', ' ', $section_name );
	$starting_notation = '#';
	?>
	<span class="section-link">
		<span class="section-link-title"><?php echo esc_html( $section_name ); ?></span>
	</span>
	<style type="text/css">
		<?php echo $starting_notation . $section_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>:hover .section-link {
			visibility: visible;
		}
	</style>
	<?php
}

function educateup_section_link_css() {
	if ( is_customize_preview() ) {
		?>
		<style type="text/css">
			.section-link {
				visibility: hidden;
				background-color: black;
				position: relative;
				top: 80px;
				z-index: 99;
				left: 40px;
				color: #fff;
				text-align: center;
				font-size: 20px;
				border-radius: 10px;
				padding: 20px 10px;
				text-transform: capitalize;
			}
			.section-link-title {
				padding: 0 10px;
			}
		</style>
		<?php
	}
}
add_action( 'wp_head', 'educateup_section_link_css' );

/**
 * Breadcrumb.
 */
function educateup_breadcrumb( $args = array() ) {
	if ( ! get_theme_mod( 'educateup_enable_breadcrumb', true ) ) {
		return;
	}

	$args = array(
		'show_on_front' => false,
		'show_title'    => true,
		'show_browse'   => false,
	);
	breadcrumb_trail( $args );
}
add_action( 'educateup_breadcrumb', 'educateup_breadcrumb', 10 );

/**
 * Add separator for breadcrumb trail.
 */
function educateup_breadcrumb_trail_print_styles() {
	$breadcrumb_separator = get_theme_mod( 'educateup_breadcrumb_separator', '/' );

	$style = '
		.trail-items li::after {
			content: "' . $breadcrumb_separator . '";
		}'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	$style = apply_filters( 'educateup_breadcrumb_trail_inline_style', trim( str_replace( array( "\r", "\n", "\t", '  ' ), '', $style ) ) );

	if ( $style ) {
		echo "\n" . '<style type="text/css" id="breadcrumb-trail-css">' . $style . '</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'wp_head', 'educateup_breadcrumb_trail_print_styles' );

/**
 * Pagination for archive.
 */
function educateup_render_posts_pagination() {
	$is_pagination_enabled = get_theme_mod( 'educateup_enable_pagination', true );
	if ( $is_pagination_enabled ) {
		$pagination_type = get_theme_mod( 'educateup_pagination_type', 'default' );
		if ( 'default' === $pagination_type ) :
			the_posts_navigation();
		else :
			the_posts_pagination();
		endif;
	}
}
add_action( 'educateup_posts_pagination', 'educateup_render_posts_pagination', 10 );

/**
 * Pagination for single post.
 */
function educateup_render_post_navigation() {
	the_post_navigation(
		array(
			'prev_text' => '<span>&#10229;</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-title">%title</span> <span>&#10230;</span>',
		)
	);
}
add_action( 'educateup_post_navigation', 'educateup_render_post_navigation' );

/**
 * Adds footer copyright text.
 */
function educateup_output_footer_copyright_content() {
	$theme_data = wp_get_theme();
	$search     = array( '[the-year]', '[site-link]' );
	$replace    = array( date( 'Y' ), '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );
	/* translators: 1: Year, 2: Site Title with home URL. */
	$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'educateup' ), '[the-year]', '[site-link]' );
	$copyright_text    = get_theme_mod( 'educateup_footer_copyright_text', $copyright_default );
	$copyright_text    = str_replace( $search, $replace, $copyright_text );
	$copyright_text   .= esc_html( ' | ' . $theme_data->get( 'Name' ) ) . '&nbsp;' . esc_html__( 'by', 'educateup' ) . '&nbsp;<a target="_blank" href="' . esc_url( $theme_data->get( 'AuthorURI' ) ) . '">' . esc_html( ucwords( $theme_data->get( 'Author' ) ) ) . '</a>';
	/* translators: %s: WordPress.org URL */
	$copyright_text .= sprintf( esc_html__( ' | Powered by %s', 'educateup' ), '<a href="' . esc_url( __( 'https://wordpress.org/', 'educateup' ) ) . '" target="_blank">WordPress</a>. ' );
	?>
	<div class="copyright">
		<span><?php echo wp_kses_post( $copyright_text ); ?></span>					
	</div>
	<?php
}
add_action( 'educateup_footer_copyright', 'educateup_output_footer_copyright_content' );
