<?php
/**
 * Default Theme Customizer Values
 *
 * @package kidsvibe
 */

function kidsvibe_get_default_theme_options() {
	$kidsvibe_default_options = array(
		// default options

		/* Homepage Sections */

		// Slider
		'enable_slider'			=> false,
		'enable_slider_wave'	=> false,
		'slider_wave_layout'	=> 'wave',
		'slider_arrow'			=> true,
		'slider_autoplay'		=> true,
		'slider_opacity'		=> 3,
		'slider_btn_label'		=> esc_html__( 'Learn More', 'kidsvibe' ),

		// Service
		'enable_service'		=> false,
		'service_sub_title'		=> esc_html__( 'Why Us', 'kidsvibe' ),
		'service_title'			=> esc_html__( 'What We Offer', 'kidsvibe' ),

		// Team
		'enable_team'			=> false,
		'team_sub_title'		=> esc_html__( 'Team', 'kidsvibe' ),
		'team_title'			=> esc_html__( 'Meet Our Exclusive Team', 'kidsvibe' ),

		// Gallery
		'enable_gallery'		=> false,
		'gallery_sub_title'		=> esc_html__( 'Gallery', 'kidsvibe' ),
		'gallery_title'			=> esc_html__( 'Our Precious Memories', 'kidsvibe' ),
		'gallery_content_type'	=> 'page',

		// Introduction
		'enable_introduction'		=> false,
		'introduction_sub_title'	=> esc_html__( 'About Us', 'kidsvibe' ),
		'introduction_btn_label'	=> esc_html__( 'Explore Us', 'kidsvibe' ),

		// Portfolio
		'enable_portfolio'		=> false,
		'portfolio_sub_title'	=> esc_html__( 'Portfolio', 'kidsvibe' ),
		'portfolio_title'		=> esc_html__( 'Choose Classes For Your Child', 'kidsvibe' ),
		'portfolio_btn_label'	=> esc_html__( 'Read More', 'kidsvibe' ),

		// Product
		'enable_product'		=> false,
		'product_title'			=> esc_html__( 'Featured Products', 'kidsvibe' ),
		'product_sub_title'		=> esc_html__( 'All Styles in This Spring', 'kidsvibe' ),

		// Client
		'enable_client'			=> false,
		'client_sub_title'		=> esc_html__( 'Clients', 'kidsvibe' ),
		'client_title'			=> esc_html__( 'Our Major Clients', 'kidsvibe' ),

		// Testimonial
		'enable_testimonial'	=> false,
		'testimonial_sub_title'	=> esc_html__( 'Testimonial', 'kidsvibe' ),
		'testimonial_title'		=> esc_html__( 'What People Say', 'kidsvibe' ),
		'testimonial_control'	=> false,

		// Recent
		'enable_recent'			=> false,
		'recent_sub_title'		=> esc_html__( 'Latest News', 'kidsvibe' ),
		'recent_title'			=> esc_html__( 'Check latest blogs for more inspiration', 'kidsvibe' ),
		'recent_content_type'	=> 'recent',

		// Call to action
		'enable_cta'			=> false,
		'cta_btn_label'			=> esc_html__( 'Contact Us Now', 'kidsvibe' ),
		'cta_opacity'			=> 7,

		// Footer
		'slide_to_top'			=> true,
		'copyright_text'		=> esc_html__( 'Copyright &copy; 2021 | All Rights Reserved.', 'kidsvibe' ),

		/* Theme Options */

		// blog / archive
		'latest_blog_title'		=> esc_html__( 'Blogs', 'kidsvibe' ),
		'excerpt_count'			=> 25,
		'pagination_type'		=> 'numeric',
		'sidebar_layout'		=> 'right-sidebar',
		'column_type'			=> 'column-2',
		'show_date'				=> true,
		'show_category'			=> true,
		'show_author'			=> true,
		'show_comment'			=> true,

		// single post
		'sidebar_single_layout'	=> 'right-sidebar',
		'show_single_date'		=> true,
		'show_single_category'	=> true,
		'show_single_tags'		=> true,
		'show_single_author'	=> true,

		// page
		'enable_front_page'		=> false,
		'sidebar_page_layout'	=> 'right-sidebar',

		// global
		'enable_loader'			=> true,
		'enable_breadcrumb'		=> true,
		'enable_sticky_header'	=> false,
		'header_layout'			=> 'normal-header',
		'loader_type'			=> 'default',
		'site_layout'			=> 'full',

	);

	$output = apply_filters( 'kidsvibe_default_theme_options', $kidsvibe_default_options );
	return $output;
}