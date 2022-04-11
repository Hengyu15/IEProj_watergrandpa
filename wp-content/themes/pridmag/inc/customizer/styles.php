<?php

/**
 * Hooks custom css into the head.
 */
function pridmag_get_custom_styles() {
	
	$pridmag_custom_styles = "";

	$primary_color = get_theme_mod( 'pridmag_primary_color', '#3498db' );

	if ( $primary_color != '#3498db' ) {

		$pridmag_custom_styles .= '
        button,
        input[type="button"],
        input[type="reset"],
        input[type="submit"] {
            background: '. esc_html( $primary_color ) .';
        }

        .th-readmore {
            background: '. esc_html( $primary_color ) .';
        }           

        a:hover {
            color: '. esc_html( $primary_color ) .';
        }

        .main-navigation ul a:hover, .main-navigation ul a:active {
            color:  '. esc_html( $primary_color ) .';
        }

        .main-navigation .current_page_item > a,
        .main-navigation .current-menu-item > a,
        .main-navigation .current_page_ancestor > a,
        .main-navigation .current-menu-ancestor > a {
            color: '. esc_html( $primary_color ) .';
        }

        .post-navigation .post-title:hover {
            color: '. esc_html( $primary_color ) .';
        }

        .th-search-box .search-form .search-submit {
            background-color: '. esc_html( $primary_color ) .';
        }

        .nav-links .current {
            background: '. esc_html( $primary_color ) .';
        }

        .elementor-widget-container h5,
        .widget-title {
            background: '. esc_html( $primary_color ) .';
        }

        .footer-widget-title {
            background: '. esc_html( $primary_color ) .';
        }

        .widget-area a:hover {
            color: '. esc_html( $primary_color ) .';
        }

        .footer-widget-area .widget a:hover {
            color: '. esc_html( $primary_color ) .';
        }

        .site-info a:hover {
            color: '. esc_html( $primary_color ) .';
        }

        .search-form .search-submit {
            background: '. esc_html( $primary_color ) .';
        }

        .thgw-entry-title a:hover,
        .thb-entry-title a:hover {
            color: '. esc_html( $primary_color ) .';
        }

        .thb-entry-meta a:hover,
        .ths-meta a:hover {
            color: '. esc_html( $primary_color ) .';
        }

        .ths-title a:hover {
            color: '. esc_html( $primary_color ) .';
        }

        .thw-grid-post .post-title a:hover {
            color: '. esc_html( $primary_color ) .';
        }

        .footer-widget-area .thw-grid-post .post-title a:hover,
        .footer-widget-area .thb-entry-title a:hover,
        .footer-widget-area .ths-title a:hover {
            color: '. esc_html( $primary_color ) .';
        }

        .th-tabs-wdt .ui-state-active {
            background: '. esc_html( $primary_color ) .';
        }

        a.th-viewall:hover {
            color: '. esc_html( $primary_color ) .';
            border-bottom: 2px solid '. esc_html( $primary_color ) .';
        }

        #pridmag-tags a,
        .widget_tag_cloud .tagcloud a {
            background: '. esc_html( $primary_color ) .';
        }

        .site-title a:hover {
            color: '. esc_html( $primary_color ) .';
        }

        .pridmag-post .entry-title a:hover {
            color: '. esc_html( $primary_color ) .';
        }

        .pridmag-post .entry-meta a:hover {
            color: '. esc_html( $primary_color ) .';
        }

        .cat-links a {
            color: '. esc_html( $primary_color ) .';
        }

        .pridmag-single .entry-meta a:hover {
            color: '. esc_html( $primary_color ) .';
        }

        .pridmag-single .author a:hover {
            color: '. esc_html( $primary_color ) .';
        }

        .single-post .th-tags-links a:hover {
            background: '. esc_html( $primary_color ) .';
        }

        .single-post .th-tagged {
            background: '. esc_html( $primary_color ) .';
        }

        a.post-edit-link {
            color: '. esc_html( $primary_color ) .';
        }

        .archive .page-title {
            background: '. esc_html( $primary_color ) .';
        }

        .comment-author a {
            color: '. esc_html( $primary_color ) .';
        }

        .comment-metadata a:hover,
        .comment-metadata a:focus,
        .pingback .comment-edit-link:hover,
        .pingback .comment-edit-link:focus {
            color: '. esc_html( $primary_color ) .';
        }

        .comment-reply-link:hover,
        .comment-reply-link:focus {
            background: '. esc_html( $primary_color ) .';
        }

        .required {
            color: '. esc_html( $primary_color ) .';
        }

        blockquote {
            border-left: 3px solid '. esc_html( $primary_color ) .';
        }

        .comment-reply-title small a:before {
            color: '. esc_html( $primary_color ) .';
        }

        .site-footer .site-info a:hover {
            color: '. esc_html( $primary_color ) .';
        }';

    }
    
    $pridmag_show_search = get_theme_mod( 'pridmag_show_search', true );
    if ( $pridmag_show_search == false ) {
        $pridmag_custom_styles .= '
            .main-navigation {
                padding-right: 0;
            }

            .rtl .main-navigation {
                padding-left: 0;
            }
        ';
    }

	return $pridmag_custom_styles; 

}

function pridmag_add_inline_styles() {
    $pridmag_custom_css = pridmag_get_custom_styles();
    wp_add_inline_style( 'pridmag-style', $pridmag_custom_css );
}
add_action( 'wp_enqueue_scripts', 'pridmag_add_inline_styles', 11 );