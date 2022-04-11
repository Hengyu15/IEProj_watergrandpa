<?php
/**
 * Prid Mag Theme Customizer
 *
 * @package PridMag
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pridmag_customize_register( $wp_customize ) {
	require( get_template_directory() . '/inc/customizer/custom-controls/class-radio-image-control.php' );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'pridmag_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'pridmag_customize_partial_blogdescription',
		) );
	}

	/**
	 * Add Panels.
	 */
	$wp_customize->add_panel(
		'pridmag_header_options_panel',
		array(
			'priority' 			=> 190,
			'capability' 		=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title' 			=> esc_html__( 'Header Options', 'pridmag' ),
			'description' 		=> esc_html__( 'Configure header settings for the PridMag Theme', 'pridmag' ),
		)
	);

	$wp_customize->add_panel(
		'pridmag_layout_options_panel',
		array(
			'priority' 			=> 191,
			'capability' 		=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title' 			=> esc_html__( 'Layout Options', 'pridmag' ),
			'description' 		=> esc_html__( 'Configure layout settings for the PridMag Theme', 'pridmag' ),
		)
	);

	$wp_customize->add_panel(
		'pridmag_blog_options_panel',
		array(
			'priority' 			=> 192,
			'capability' 		=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title' 			=> esc_html__( 'Archives / Blog Options', 'pridmag' ),
			'description' 		=> esc_html__( 'You can change your blog / archives settings here.', 'pridmag' ),
		)
	);

	/**
	 * Add sections
	 */
	$wp_customize->add_section(
		'pridmag_blog_meta_section',
		array(
			'title'			=> esc_html__( 'Post Details', 'pridmag' ),
			'description'	=> esc_html__( 'Select what post details to be displayed on blog and archives.', 'pridmag' ),
			'panel' 		=> 'pridmag_blog_options_panel'
		)
	);

	$wp_customize->add_section(
		'pridmag_blog_excerpt_section',
		array(
			'title'		=> esc_html__( 'Excerpt Length', 'pridmag' ),
			'panel'	 	=> 'pridmag_blog_options_panel'
		)
	);

	$wp_customize->add_section(
		'pridmag_blog_readmore_section',
		array(
			'title'		=> esc_html__( 'Read More Button', 'pridmag' ),
			'panel'	 	=> 'pridmag_blog_options_panel'
		)
	);

	$wp_customize->add_section(
		'pridmag_singlepost_section',
		array(
			'title'			=> esc_html__( 'Post Options', 'pridmag' ),
			'description'	=> esc_html__( 'You can change your single post settings here.', 'pridmag' ),
			'priority' 		=> 193
		)
	);

	$wp_customize->add_section(
		'pridmag_footer_section',
		array(
			'title'			=> esc_html__( 'Footer Options', 'pridmag' ),
			'priority' 		=> 194
		)
	);

	$wp_customize->add_section(
		'pridmag_main_layout_section',
		array(
			'title'	=> esc_html__( 'Site Main Layout', 'pridmag' ),
			'panel' => 'pridmag_layout_options_panel'
		)
	);

	$wp_customize->add_section(
		'pridmag_blog_layout_section',
		array(
			'title'	=> esc_html__( 'Archives / Blog Layout', 'pridmag' ),
			'panel' => 'pridmag_layout_options_panel'
		)
	);

	$wp_customize->add_section(
		'pridmag_post_layout_section',
		array(
			'title'	=> esc_html__( 'Single Post Layout', 'pridmag' ),
			'panel' => 'pridmag_layout_options_panel'
		)
	);

	$wp_customize->add_section(
		'pridmag_page_layout_section',
		array(
			'title'	=> esc_html__( 'Page Layout', 'pridmag' ),
			'panel' => 'pridmag_layout_options_panel'
		)
	);

	$wp_customize->add_section(
		'pridmag_header_image_section',
		array(
			'title'	=> esc_html__( 'Header Image Options', 'pridmag' ),
			'panel' => 'pridmag_header_options_panel'
		)
	);
	$wp_customize->add_section(
		'pridmag_search_section',
		array(
			'title'	=> esc_html__( 'Search Box', 'pridmag' ),
			'panel' => 'pridmag_header_options_panel'
		)
	);

	/**
	 * Settings and controls.
	 */

	// Header image position
	$wp_customize->add_setting(
		'pridmag_header_image_position',
		array(
			'default'			=> 'before-header',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_select'
		)
	);

	$wp_customize->add_control(
		'pridmag_header_image_position',
		array(
			'settings'		=> 'pridmag_header_image_position',
			'section'		=> 'pridmag_header_image_section',
			'type'			=> 'radio',
			'label'			=> esc_html__( 'Header Image Location.', 'pridmag' ),
			'choices'		=> array(
				'before-header' 	=> esc_html__( 'Before Header', 'pridmag' ),
				'after-header' 		=> esc_html__( 'After Header', 'pridmag' )
			)
		)
	);	

	// Link Header Image.
	$wp_customize->add_setting(
		'pridmag_link_header_image',
		array(
			'default'			=> true,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'pridmag_link_header_image',
		array(
			'settings'		=> 'pridmag_link_header_image',
			'section'		=> 'pridmag_header_image_section',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Link header image to home page.', 'pridmag' )
		)
	);	

	// Show search
	$wp_customize->add_setting(
		'pridmag_show_search',
		array(
			'default'			=> true,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'pridmag_show_search',
		array(
			'settings'		=> 'pridmag_show_search',
			'section'		=> 'pridmag_search_section',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Show search icon on menu.', 'pridmag' )
		)
	);

	/**
	 * Site Main layout.
	 */
	$wp_customize->add_setting(
		'pridmag_site_main_layout',
		array(
			'default'			=> 'boxed-layout',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_select'
		)
	);

	$wp_customize->add_control(
		'pridmag_site_main_layout',
		array(
			'settings'		=> 'pridmag_site_main_layout',
			'section'		=> 'pridmag_main_layout_section',
			'type'			=> 'radio',
			'label'			=> esc_html__( 'Select the main layout for the site.', 'pridmag' ),
			'choices'		=> array(
				'boxed-layout' 		=> esc_html__( 'Boxed Layout', 'pridmag' ),
				'wide-layout' 		=> esc_html__( 'Wide Layout', 'pridmag' )
			)
		)
	);

	/**
	 * Blog layout.
	 */
	// Sidebar and content alignment
	$wp_customize->add_setting(
		'pridmag_archive_sidebar_align',
		array(
			'default'			=> 'th-right-sidebar',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new PridMag_Radio_Image_Control( 
			$wp_customize,
			'pridmag_archive_sidebar_align',
			array(
				'settings'		=> 'pridmag_archive_sidebar_align',
				'section'		=> 'pridmag_blog_layout_section',
				'label'			=> esc_html__( 'Archives / Blog Layout', 'pridmag' ),
				'description'	=> esc_html__( 'Select content and sidebar alignment for blog posts listing pages.', 'pridmag' ),
				'choices'		=> array(
					'th-right-sidebar' 		=> get_template_directory_uri() . '/inc/customizer/assets/imgs/2cr.png',
					'th-left-sidebar'   	=> get_template_directory_uri() . '/inc/customizer/assets/imgs/2cl.png',
					'th-no-sidebar'  		=> get_template_directory_uri() . '/inc/customizer/assets/imgs/1c.png',
					'th-content-centered'  	=> get_template_directory_uri() . '/inc/customizer/assets/imgs/1cc.png'
				)
			)
		)
	);

	// Blog posts layout.
	$wp_customize->add_setting(
		'pridmag_post_listing_layout',
		array(
			'default'			=> 'th-list-posts',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_select'
		)
	);

	$wp_customize->add_control(
		'pridmag_post_listing_layout',
		array(
			'settings'		=> 'pridmag_post_listing_layout',
			'section'		=> 'pridmag_blog_layout_section',
			'type'			=> 'radio',
			'label'			=> esc_html__( 'Posts Listing Layout', 'pridmag' ),
			'choices'		=> array(
				'th-list-posts' 	=> esc_html__( 'List posts', 'pridmag' ),
				'th-grid-2' 		=> esc_html__( '2 Columns Grid', 'pridmag' ),
				'th-grid-3' 		=> esc_html__( '3 Columns Grid', 'pridmag' ),
				'th-large-posts' 	=> esc_html__( 'Large posts', 'pridmag' )
			)
		)
	);
	
	/**
	 * Single Post Layout
	 */

	$wp_customize->add_setting(
		'pridmag_post_sidebar_align',
		array(
			'default'			=> 'th-right-sidebar',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new PridMag_Radio_Image_Control( 
			$wp_customize,
			'pridmag_post_sidebar_align',
			array(
				'settings'		=> 'pridmag_post_sidebar_align',
				'section'		=> 'pridmag_post_layout_section',
				'label'			=> esc_html__( 'Single Post Layout', 'pridmag' ),
				'description'	=> esc_html__( 'Select content and sidebar alignment for posts.', 'pridmag' ),
				'choices'		=> array(
					'th-right-sidebar' 		=> get_template_directory_uri() . '/inc/customizer/assets/imgs/2cr.png',
					'th-left-sidebar'   	=> get_template_directory_uri() . '/inc/customizer/assets/imgs/2cl.png',
					'th-no-sidebar'  		=> get_template_directory_uri() . '/inc/customizer/assets/imgs/1c.png',
					'th-content-centered'  	=> get_template_directory_uri() . '/inc/customizer/assets/imgs/1cc.png'
				)
			)
		)
	);

	/**
	 * Page Layout
	 */

	$wp_customize->add_setting(
		'pridmag_page_sidebar_align',
		array(
			'default'			=> 'th-right-sidebar',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new PridMag_Radio_Image_Control( 
			$wp_customize,
			'pridmag_page_sidebar_align',
			array(
				'settings'		=> 'pridmag_page_sidebar_align',
				'section'		=> 'pridmag_page_layout_section',
				'label'			=> esc_html__( 'Page Layout', 'pridmag' ),
				'description'	=> esc_html__( 'Select content and sidebar alignment for pages.', 'pridmag' ),
				'choices'		=> array(
					'th-right-sidebar' 		=> get_template_directory_uri() . '/inc/customizer/assets/imgs/2cr.png',
					'th-left-sidebar'   	=> get_template_directory_uri() . '/inc/customizer/assets/imgs/2cl.png',
					'th-no-sidebar'  		=> get_template_directory_uri() . '/inc/customizer/assets/imgs/1c.png',
					'th-content-centered'  	=> get_template_directory_uri() . '/inc/customizer/assets/imgs/1cc.png'
				)
			)
		)
	);

	/**
	 * Blog Settings.
	 */

	// Archive category list control.
	$wp_customize->add_setting(
		'pridmag_archive_category_list',
		array(
			'default'			=> true,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'pridmag_archive_category_list',
		array(
			'settings'		=> 'pridmag_archive_category_list',
			'section'		=> 'pridmag_blog_meta_section',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display post category list.', 'pridmag' )
		)
	);	

	// Archive post date control.
	$wp_customize->add_setting(
		'pridmag_archive_date',
		array(
			'default'			=> true,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'pridmag_archive_date',
		array(
			'settings'		=> 'pridmag_archive_date',
			'section'		=> 'pridmag_blog_meta_section',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display post date.', 'pridmag' )
		)
	);

	// Archive post author control.
	$wp_customize->add_setting(
		'pridmag_archive_author',
		array(
			'default'			=> true,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'pridmag_archive_author',
		array(
			'settings'		=> 'pridmag_archive_author',
			'section'		=> 'pridmag_blog_meta_section',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display post author.', 'pridmag' ),
		)
	);

	// Archive post comments link control.
	$wp_customize->add_setting(
		'pridmag_archive_comments_link',
		array(
			'default'			=> true,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'pridmag_archive_comments_link',
		array(
			'settings'		=> 'pridmag_archive_comments_link',
			'section'		=> 'pridmag_blog_meta_section',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display number of comments.', 'pridmag' ),
		)
	);

	// Archive excerpt control.
	$wp_customize->add_setting(
		'pridmag_content_display_method',
		array(
			'default'			=> 'excerpt',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_select'
		)
	);

	$wp_customize->add_control(
		'pridmag_content_display_method',
		array(
			'settings'		=> 'pridmag_content_display_method',
			'section'		=> 'pridmag_blog_excerpt_section',
			'type'			=> 'radio',
			'label'			=> esc_html__( 'Content display method.', 'pridmag' ),
			'description'	=> esc_html__( 'How content should display in blog posts listing pages? Default: Excerpt', 'pridmag' ),
			'choices'		=> array(
				'excerpt' 		=> esc_html__( 'Excerpt', 'pridmag' ),
				'full-content' 	=> esc_html__( 'Full Content', 'pridmag' ),
				'none' 			=> esc_html__( 'Do not display', 'pridmag' )
			)
		)
	);

	// Excerpt length.
	$wp_customize->add_setting(
		'pridmag_excerpt_length',
		array(
			'default'			=> 25,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_number_absint'
		)
	);

	$wp_customize->add_control(
		'pridmag_excerpt_length',
		array(
			'settings'		=> 'pridmag_excerpt_length',
			'section'		=> 'pridmag_blog_excerpt_section',
			'type'			=> 'number',
			'label'			=> esc_html__( 'Excerpt length', 'pridmag' ),
			'description'	=> esc_html__( 'How many words do you want to display in excerpt? Default: 25', 'pridmag' )
		)
	);

	// Read more button control.
	$wp_customize->add_setting(
		'pridmag_readmore_button',
		array(
			'default'			=> false,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'pridmag_readmore_button',
		array(
			'settings'		=> 'pridmag_readmore_button',
			'section'		=> 'pridmag_blog_readmore_section',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display read more button.', 'pridmag' ),
		)
	);	

	// Read more button text.
	$wp_customize->add_setting(
		'pridmag_readmore_text',
		array(
			'default'			=> esc_html__( 'Read More', 'pridmag' ),
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'pridmag_readmore_text',
		array(
			'settings'		=> 'pridmag_readmore_text',
			'section'		=> 'pridmag_blog_readmore_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Read More Button Text', 'pridmag' )
		)
	);

	/**
	 * Single Post Settings
	 */

	// Single post category list control.
	$wp_customize->add_setting(
		'pridmag_post_category_list',
		array(
			'default'			=> true,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'pridmag_post_category_list',
		array(
			'settings'		=> 'pridmag_post_category_list',
			'section'		=> 'pridmag_singlepost_section',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display post category list.', 'pridmag' )
		)
	);	

	// Single post date control.
	$wp_customize->add_setting(
		'pridmag_post_date',
		array(
			'default'			=> true,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'pridmag_post_date',
		array(
			'settings'		=> 'pridmag_post_date',
			'section'		=> 'pridmag_singlepost_section',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display post date.', 'pridmag' )
		)
	);

	// Single post author control.
	$wp_customize->add_setting(
		'pridmag_post_author',
		array(
			'default'			=> true,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'pridmag_post_author',
		array(
			'settings'		=> 'pridmag_post_author',
			'section'		=> 'pridmag_singlepost_section',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display post author.', 'pridmag' ),
		)
	);

	// Single post comments link control.
	$wp_customize->add_setting(
		'pridmag_post_comments_link',
		array(
			'default'			=> true,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'pridmag_post_comments_link',
		array(
			'settings'		=> 'pridmag_post_comments_link',
			'section'		=> 'pridmag_singlepost_section',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display number of comments.', 'pridmag' ),
		)
	);

	// Show/hide featured image on single post
	$wp_customize->add_setting(
		'pridmag_single_thumbnail',
		array(
			'default'			=> true,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'pridmag_single_thumbnail',
		array(
			'settings'		=> 'pridmag_single_thumbnail',
			'section'		=> 'pridmag_singlepost_section',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display featured image.', 'pridmag' ),
		)
	);	 

	// Show/hide tags list on single post
	$wp_customize->add_setting(
		'pridmag_tags_list',
		array(
			'default'			=> true,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_checkbox'
		)
	);

	$wp_customize->add_control(
		'pridmag_tags_list',
		array(
			'settings'		=> 'pridmag_tags_list',
			'section'		=> 'pridmag_singlepost_section',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display tags list.', 'pridmag' ),
		)
	);

	// Footer copyright text 
	$wp_customize->add_setting(
		'pridmag_footer_copyright_text',
		array(
			'default'			=> '',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'pridmag_footer_copyright_text',
		array(
			'settings'		=> 'pridmag_footer_copyright_text',
			'section'		=> 'pridmag_footer_section',
			'type'			=> 'textarea',
			'label'			=> esc_html__( 'Footer Copyright Text', 'pridmag' )
		)
	);

	/* Add primary color setting */
	$wp_customize->add_setting(
		'pridmag_primary_color',
		array(
			'default'			=> '#3498db',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'pridmag_sanitize_hex_color'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
			$wp_customize,
			'pridmag_primary_color',
			array(
				'settings'		=> 'pridmag_primary_color',
				'section'		=> 'colors',
				'label'			=> esc_html__( 'Theme Primary Color', 'pridmag' ),
			)
		)
	);

}
add_action( 'customize_register', 'pridmag_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function pridmag_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function pridmag_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pridmag_customize_preview_js() {
	wp_enqueue_script( 'pridmag-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'pridmag_customize_preview_js' );

/**
 * Enqueue the customizer stylesheet.
 */
function pridmag_enqueue_customizer_stylesheets() {

    wp_register_style( 'pridmag-customizer-css', get_template_directory_uri() . '/inc/customizer/assets/customizer.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'pridmag-customizer-css' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0' );

}
add_action( 'customize_controls_print_styles', 'pridmag_enqueue_customizer_stylesheets' );


/**
 * Checkbox sanitization.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function pridmag_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Select sanitization
 *
 * @see sanitize_key()               https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param string               $input   Slug to sanitize.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
 */
function pridmag_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}

/**
 * Color sanitization
 */
function pridmag_sanitize_hex_color( $hex_color, $setting ) {
	// Sanitize $input as a hex value without the hash prefix.
	$hex_color = sanitize_hex_color( $hex_color );
	
	// If $input is a valid hex value, return it; otherwise, return the default.
	return ( ! is_null( $hex_color ) ? $hex_color : $setting->default );
}

/**
 * Number sanitization.
 *
 * @see absint() https://developer.wordpress.org/reference/functions/absint/
 *
 * @param int                  $number  Number to sanitize.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return int Sanitized number; otherwise, the setting default.
 */
function pridmag_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );
	
	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}