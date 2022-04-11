<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package PridMag
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function pridmag_body_classes( $classes ) {
	global $post;

	if ( 'wide-layout' === get_theme_mod( 'pridmag_site_main_layout', 'boxed-layout' ) ) {
		$classes[] = 'pridmag-full-width';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	if ( is_home() || is_archive() || is_search() ) {
		$pridmag_archive_sidebar_align = get_theme_mod( 'pridmag_archive_sidebar_align', 'th-right-sidebar' );
		$classes[] = esc_attr( $pridmag_archive_sidebar_align );
	}

	if ( is_single() ) {
		$pridmag_post_specific_layout = get_post_meta( $post->ID, '_pridmag_layout_meta', true );
		if ( empty( $pridmag_post_specific_layout ) || $pridmag_post_specific_layout == 'th-default-layout' ) {
			$classes[] = esc_attr( get_theme_mod( 'pridmag_post_sidebar_align', 'th-right-sidebar' ) );
		} else {
			$classes[] = esc_attr( $pridmag_post_specific_layout );
		}
	}

	if ( is_page() ) {
		$page_specific_layout = get_post_meta( $post->ID, '_pridmag_layout_meta', true );
		if ( empty( $page_specific_layout ) || $page_specific_layout == 'th-default-layout' ) {
			$classes[] = esc_attr( get_theme_mod( 'pridmag_page_sidebar_align', 'th-right-sidebar' ) );
		} else {
			$classes[] = esc_attr( $page_specific_layout );
		}		
	}

	return $classes;
}
add_filter( 'body_class', 'pridmag_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function pridmag_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'pridmag_pingback_header' );


/**
 * Add a custom excerpt length.
 */
function pridmag_excerpt_length( $length ) {
	if( is_admin() ) {
		return $length;
	}
	$custom_length = get_theme_mod( 'pridmag_excerpt_length', 20 );
	return absint( $custom_length );
}
add_filter( 'excerpt_length', 'pridmag_excerpt_length', 999 );

/**
 * Changes the excerpt more text.
 */
function pridmag_excerpt_more( $more ) {

	if ( is_admin() ) {
		return $more;
	}

	return ' &hellip; ';
}
add_filter( 'excerpt_more', 'pridmag_excerpt_more' );

/**
 * View all link for posts widgets 
 */
function pridmag_viewall_link( $category_id, $viewall_text ) {

	if ( ! empty( $viewall_text ) ) :

		if ( ! empty( $category_id ) ) {
			$viewall_link = get_category_link( $category_id );
		} else {
			$posts_page_id = get_option( 'page_for_posts' );

			if ( $posts_page_id ) {
				$viewall_link = get_page_link( $posts_page_id );
			} else {
				$viewall_link = "";
			}
		}

		if ( $viewall_link ) { ?>
			<a class="th-viewall" href="<?php echo esc_url( $viewall_link ); ?>"><span><?php echo esc_html( $viewall_text ); ?></span></a>
		<?php }

	endif;  

}

/**
 * Removes the archive title label for category.
 */
function pridmag_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
  
    return $title;
}
add_filter( 'get_the_archive_title', 'pridmag_archive_title' );

/**
 * Changes tag font size.
 */
function pridmag_tag_cloud_sizes($args) {
	$args['smallest']	= 11;
	$args['largest'] 	= 11;
	return $args; 
}
add_filter('widget_tag_cloud_args','pridmag_tag_cloud_sizes');


if ( ! function_exists( 'pridmag_get_layout' ) ) :
	/**
	 * Returns the selected sidebar alignment for the page.
	 *
	 * @return string
	 */
	function pridmag_get_layout() {
	
		global $post;
	
		$layout = 'th-right-sidebar';
	
		if ( is_home() || is_archive() || is_search() ) {
			$pridmag_archive_sidebar_align = get_theme_mod( 'pridmag_archive_sidebar_align', 'th-right-sidebar' );
			$layout = $pridmag_archive_sidebar_align;
		}
	
		if ( is_single() ) {
			$pridmag_post_specific_layout = get_post_meta( $post->ID, '_pridmag_layout_meta', true );
			if ( empty( $pridmag_post_specific_layout ) || $pridmag_post_specific_layout == 'th-default-layout' ) {
				$layout = get_theme_mod( 'pridmag_post_sidebar_align', 'th-right-sidebar' );
			} else {
				$layout = $pridmag_post_specific_layout;
			}
		}
		if( is_page() ) {
			$pridmag_page_specific_layout = get_post_meta( $post->ID, '_pridmag_layout_meta', true );
			if ( empty( $pridmag_page_specific_layout ) || $pridmag_page_specific_layout == 'th-default-layout' ) {
				$layout = get_theme_mod( 'pridmag_page_sidebar_align', 'th-right-sidebar' );
			} else {
				$layout = $pridmag_page_specific_layout;
			}	
		}

		return $layout;
	
	}
	
endif;