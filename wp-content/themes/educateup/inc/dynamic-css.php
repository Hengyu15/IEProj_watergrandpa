<?php

/**
 * Dynamic CSS
 */
function educateup_dynamic_css() {
	$default_color = educateup_get_default_color();

	$primary_color   = get_theme_mod( 'primary_color', $default_color['primary'] );
	$secondary_color = get_theme_mod( 'secondary_color', $default_color['secondary'] );

	$rgb  = educateup_convert_hex_to_rgb( $primary_color );
	$rgb2 = educateup_convert_hex_to_rgb( $secondary_color );

	$header_font           = get_theme_mod( 'educateup_header_font', 'Lexend' );
	$body_font             = get_theme_mod( 'educateup_body_font', 'Lexend' );
	$site_title_font       = get_theme_mod( 'educateup_site_title_font', 'Lexend' );
	$site_description_font = get_theme_mod( 'educateup_site_description_font', 'Lexend' );

	$custom_css  = '';
	$custom_css .= '
    /*Color Scheme*/
    :root {
        --bs-primary: ' . esc_attr( $primary_color ) . ';
        --bs-secondary: ' . esc_attr( $secondary_color ) . ';
        --bs-primary-rgb: ' . esc_attr( $rgb[0] ) . ', ' . esc_attr( $rgb[1] ) . ', ' . esc_attr( $rgb[2] ) . ';
        --bs-secondary-rgb: ' . esc_attr( $rgb2[0] ) . ', ' . esc_attr( $rgb2[1] ) . ', ' . esc_attr( $rgb2[2] ) . ';
    }

    a,
    .btn-outline-primary,
    .comment-reply-link-link,
    .comment-reply-link-outline-primary,
    .comment-reply-link-primary:hover,
    .comment-reply-link-primary:focus,
    .comment-reply-link-secondary,
    .comment-reply-link-outline-secondary:hover,
    .comment-reply-link-outline-secondary:focus,
    aside .widget ul li:before,
    nav.pagination .nav-links .page-numbers
    {
    	color: ' . esc_attr( $primary_color ) . ';
    }

    .bg-primary,
    .btn-primary,
    .btn-primary:disabled,
    .btn-primary.disabled,
    .btn-secondary:hover,
    .btn-secondary:focus,
    .btn-secondary:active,
    button,
    input[type="button"],
    input[type="reset"],
    input[type="submit"],
    .site-header,
    .site-header.site-header-sticky,
    .search-modal-container .search-submit,
    .banner-section:after,
    .btn-outline-primary:hover,
    .btn-outline-primary:focus,
    .comment-reply-link:hover,
    .comment-reply-link:focus,
    .comment-reply-link-primary,
    .comment-reply-link-outline-primary:hover,
    .comment-reply-link-outline-primary:focus,
    .newsletter-section,
    .site-footer-top .social-links a,
    .top-link:hover,
    .top-link:focus,
    .wp-block-search .wp-block-search__button,
    aside#secondary h2:after,
    nav.navigation.pagination .nav-links a:hover,
    nav.navigation.pagination .nav-links a:focus,
    nav.pagination .nav-links .page-numbers.current,
    .slick-dots li button,
    .card-horizontal .card_media time
    {
    	background-color: ' . esc_attr( $primary_color ) . ';
    }

    .gallery_item_caption {
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0), ' . esc_attr( $primary_color ) . ' 100%);
    }

    .btn-primary,
    .btn-primary:disabled,
    .btn-primary.disabled,
    .btn-outline-primary,
    .btn-outline-primary:hover,
    .btn-outline-primary:focus,
    .btn-secondary:hover,
    .btn-secondary:focus,
    .btn-secondary:active,
    .wp-block-search .wp-block-search__button,
    .comment-reply-link,
    .comment-reply-link-primary,
    .comment-reply-link-outline-primary,
    .comment-reply-link-outline-primary:hover,
    .comment-reply-link-outline-primary:focus,
    nav.pagination .nav-links .page-numbers
    {
    	border-color: ' . esc_attr( $primary_color ) . ';
    }

    .text-secondary,
    a:hover,
    a:focus,
    a:active,
    .btn-outline-secondary,
    .comment-reply-link-link:hover,
    .comment-reply-link-link:focus,
    .comment-reply-link-link-light:hover,
    .comment-reply-link-link-light:focus,
    .comment-reply-link-outline-secondary,
    .main-navigation .current_page_item > a,
    .main-navigation .current-menu-item > a,
    .main-navigation .current_page_ancestor > a,
    .main-navigation .current-menu-ancestor > a,
    .main-navigation li:hover > a,
    .main-navigation li.focus > a,
    .search-modal_close-btn:hover,
    .search-modal_close-btn:focus,
    .team-section .social-links a:hover,
    .team-section .social-links a:focus,
    .team-section .social-links a:active,
    .newsletter-section .newsletter button[type="submit"]:hover,
    .newsletter-section .newsletter button[type="submit"]:focus,
    .site-footer-top a:hover,
    .site-footer-top a:focus,
    .post .entry-title a:hover,
    .post .entry-title a:focus,
    aside#secondary a:hover,
    aside#secondary a:focus,
    aside#secondary a:active
    {
    	color: ' . esc_attr( $secondary_color ) . ';
    }

    .bg-secondary,
    .btn-secondary,
    .btn-primary:hover,
    .btn-primary:focus,
    .btn-outline-secondary:hover,
    .btn-outline-secondary:focus,
    .btn-outline-light:hover,
    .btn-outline-light:focus,
    .btn-outline-light:active,
    .comment-reply-link-primary:hover,
    .comment-reply-link-primary:focus,
    .comment-reply-link-secondary,
    .comment-reply-link-secondary:hover,
    .comment-reply-link-secondary:focus,
    .comment-reply-link-outline-secondary:hover,
    .comment-reply-link-outline-secondary:focus,
    button:hover,
    button:focus,
    input[type="button"]:hover,
    input[type="button"]:focus,
    input[type="reset"]:hover,
    input[type="reset"]:focus,
    input[type="submit"]:hover,
    input[type="submit"]:focus,
    .site-header .social-links a:hover,
    .site-header .social-links a:focus,
    .site-header .links-inline a:hover,
    .site-header .links-inline a:focus,
    .search-modal-container .search-submit:hover,
    .search-modal-container .search-submit:focus,
    .slick-dots .slick-active button,
    .slick-dots button:hover,
    .slick-dots button:focus,
    .site-footer-top .social-links a:hover,
    .site-footer-top .social-links a:focus,
    .top-link,
    .wp-block-search .wp-block-search__button:focus,
    .wp-block-search .wp-block-search__button:hover,
    .slick-dots li button:hover,
    .slick-dots li button:focus,
    .slick-arrow:hover,
    .slick-arrow:focus
    {
    	background-color: ' . esc_attr( $secondary_color ) . ';
    }

    .btn-secondary,
    .btn-primary:hover,
    .btn-primary:focus,
    .btn-outline-secondary,
    .btn-outline-secondary:hover,
    .btn-outline-secondary:focus,
    .btn-outline-light:hover,
    .btn-outline-light:focus,
    .btn-outline-light:active,
    .comment-reply-link-primary:hover,
    .comment-reply-link-primary:focus,
    .comment-reply-link-secondary,
    .comment-reply-link-secondary:hover,
    .comment-reply-link-secondary:focus,
    .comment-reply-link-outline-secondary,
    .comment-reply-link-outline-secondary:hover,
    .comment-reply-link-outline-secondary:focus,
    button:hover,
    button:focus,
    input[type="button"]:hover,
    input[type="button"]:focus,
    input[type="reset"]:hover,
    input[type="reset"]:focus,
    input[type="submit"]:hover,
    input[type="submit"]:focus,
    .wp-block-search .wp-block-search__button:hover,
    .wp-block-search .wp-block-search__button:focus,
    .slick-dots .slick-active button,
    .slick-dots button:hover,
    .slick-dots button:focus,
    .slick-arrow:hover,
    .slick-arrow:focus
    {
    	border-color: ' . esc_attr( $secondary_color ) . ';
    }

    @media (min-width: 1200px) {
        .site-header-sticky .header-bottom {
            background-color: rgba(' . esc_attr( $rgb[0] ) . ', ' . esc_attr( $rgb[1] ) . ', ' . esc_attr( $rgb[2] ) . ', 0.4);
        }
        .main-navigation ul ul a {
            background-color: ' . esc_attr( $primary_color ) . ';
        }
        .main-navigation ul ul :hover > a,
        .main-navigation ul ul .focus > a {
            background-color: ' . esc_attr( $secondary_color ) . ';
        }
    }
    @media (max-width: 1199.98px) {
        .main-navigation ul ul :hover > a,
        .main-navigation ul ul .focus > a {
            color: ' . esc_attr( $secondary_color ) . ';
        }
    }
    ';

	$custom_css .= '
	/*Fonts*/
	h1, h2, h3 {
	    font-family: "' . esc_attr( $header_font ) . '", serif;
	}

	body,
	button, input, select, optgroup, textarea {
	    font-family: "' . esc_attr( $body_font ) . '", serif;
	}

	.site-title a {
	    font-family: "' . esc_attr( $site_title_font ) . '", serif;
	}

	.site-description {
	    font-family: "' . esc_attr( $site_description_font ) . '", serif;
	}';

	wp_add_inline_style( 'educateup-style', $custom_css );

}
add_action( 'wp_enqueue_scripts', 'educateup_dynamic_css', 99 );

/**
 * Convert Hex to RGB
 *
 * @link http://bavotasan.com/2011/convert-hex-color-to-rgb-using-php/
 * @param  string Hex color
 * @return array RGB color
 */
function educateup_convert_hex_to_rgb( $hex ) {
	$hex = str_replace( '#', '', $hex );

	if ( strlen( $hex ) == 3 ) {
		$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
		$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
		$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
	} else {
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
	}
	$rgb = array( $r, $g, $b );
	// return implode(",", $rgb); // returns the rgb values separated by commas
	return $rgb; // returns an array with the rgb values
}
