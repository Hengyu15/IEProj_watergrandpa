<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package PridMag
 */

if ( ! function_exists( 'pridmag_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function pridmag_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';
		
		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'pridmag_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function pridmag_posted_by() {
		$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	}
endif;

if ( ! function_exists( 'pridmag_comments_link' ) ) :

	function pridmag_comments_link() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Comment<span class="screen-reader-text"> on %s</span>', 'pridmag' ),
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
	}

endif;

if ( ! function_exists( 'pridmag_tags_list' ) ) :
	/**
	 * Prints tags list.
	 */
	function pridmag_tags_list() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list();
			if ( $tags_list ) {
				echo '<span class="th-tags-links"><span class="th-tagged">' . esc_html__( 'Tagged', 'pridmag' ) . '</span>' . $tags_list . '</span>'; // WPCS: XSS OK.
			}
		}
	}

endif;

if ( ! function_exists( 'pridmag_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function pridmag_entry_footer() {
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'pridmag' ),
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


if ( ! function_exists( 'pridmag_category_list' ) ) :
	/**
	 * Prints categories list.
	 */
	function pridmag_category_list() {
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ' / ', 'pridmag' ) );
			if ( $categories_list ) {
				echo '<div class="cat-links">' . $categories_list . '</div>'; // WPCS: XSS OK.
			}
		}
	}
endif;

if ( ! function_exists( 'pridmag_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function pridmag_post_thumbnail( $pridmag_thumbnail_size="" ) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) : ?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail( $pridmag_thumbnail_size ); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php the_post_thumbnail( $pridmag_thumbnail_size ); ?>
			</a>

		<?php
			endif; // End is_singular().
	}
endif;


if ( ! function_exists( 'pridmag_entry_meta') ) :
	/**
	 * Show/hide entry meta based on customizer settings.
	 */
	function pridmag_entry_meta() {
		if( is_single() ) {
			$pridmag_display_postdate = get_theme_mod( 'pridmag_post_date', true );
			$pridmag_display_author = get_theme_mod( 'pridmag_post_author', true );
			$pridmag_display_comments_link = get_theme_mod( 'pridmag_post_comments_link', true );				
		} else {
			$pridmag_display_postdate = get_theme_mod( 'pridmag_archive_date', true );
			$pridmag_display_author = get_theme_mod( 'pridmag_archive_author', true );
			$pridmag_display_comments_link = get_theme_mod( 'pridmag_archive_comments_link', true );	
		}

		if( true === $pridmag_display_postdate ) {
			pridmag_posted_on();
		}

		if( true === $pridmag_display_author ) {
			pridmag_posted_by();
		}	

		if( true === $pridmag_display_comments_link ) {
			pridmag_comments_link();
		}
	}
endif;