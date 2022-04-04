<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package kidsvibe
 */

if ( ! function_exists( 'kidsvibe_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function kidsvibe_posted_on() {
		if ( 'post' === get_post_type() ) {
			if ( kidsvibe_meta_option( 'show_category', 'show_single_category' ) ) :
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'kidsvibe' ) );
				if ( $categories_list ) {
					/* translators: 1: list of categories. */
					printf( '<span class="cat-links">' . '%1$s' . '</span>', $categories_list ); // WPCS: XSS OK.
				}
			endif;
		}

		if ( ! is_single() && kidsvibe_meta_option( 'show_author', '' ) ) :
			$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
			echo '<span class="byline"> ' . $byline . '</span>';
		endif;

		if ( is_single() ) {
			if ( kidsvibe_meta_option( '', 'show_single_author' ) ) :
				$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
				echo '<span class="byline"> ' . $byline . '</span>';
			endif;

			if ( kidsvibe_meta_option( '', 'show_single_date' ) ) :
				$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
				if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
					$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
				}

				$time_string = sprintf( $time_string,
					esc_attr( get_the_date( 'c' ) ),
					esc_html( get_the_date() ),
					esc_attr( get_the_modified_date( 'c' ) ),
					esc_html( get_the_modified_date() )
				);
				$year = get_the_date( 'Y' );
				$month = get_the_date( 'm' );
				$link = ( is_single() ) ? get_month_link( $year, $month ) : get_permalink();

				$posted_on = '<a href="' . esc_url( $link ) . '" rel="bookmark">' . $time_string . '</a>';

				echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
			endif;
		}
	}
endif;

if ( ! function_exists( 'kidsvibe_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function kidsvibe_entry_footer() {


		if ( ! is_single() && kidsvibe_meta_option( 'show_date', '' ) ) :
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			}

			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() ),
				esc_attr( get_the_modified_date( 'c' ) ),
				esc_html( get_the_modified_date() )
			);
			$year = get_the_date( 'Y' );
			$month = get_the_date( 'm' );
			$link = ( is_single() ) ? get_month_link( $year, $month ) : get_permalink();

			$posted_on = '<a href="' . esc_url( $link ) . '" rel="bookmark">' . $time_string . '</a>';

			echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
		endif;

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			if ( is_single() && kidsvibe_meta_option( '', 'show_single_tags' ) ) :
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list();
				if ( $tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">' . '%1$s' . '</span>', $tags_list ); // WPCS: XSS OK.
				}
			endif;
		}

		if ( kidsvibe_meta_option( 'show_comment', '' ) ) :
			if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link">';
				comments_popup_link(
					sprintf(
						wp_kses(
							/* translators: %s: post title */
							__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'kidsvibe' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					)
				);
				echo '</span>';
			}
		endif;

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'kidsvibe' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * Checks to see if meta option is enabled in archive/blog and single
 */
function kidsvibe_meta_option( $blog_option = '', $single_option = '' ) {
	if ( is_archive() || is_search() || is_home() ) :
		if ( kidsvibe_theme_option( $blog_option ) )
			return true;
		else
			return false;
	elseif ( is_single() ) :
		if ( kidsvibe_theme_option( $single_option ) )
			return true;
		else
			return false;
	else :
		return true;
	endif;
}