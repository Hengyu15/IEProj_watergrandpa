<?php
/**
 * Blog / Archive / Search Customizer Options
 *
 * @package kidsvibe
 */

// Add blog section
$wp_customize->add_section( 'kidsvibe_blog_section', array(
	'title'             => esc_html__( 'Blog/Archive Page Setting','kidsvibe' ),
	'description'       => esc_html__( 'Blog/Archive/Search Page Setting Options', 'kidsvibe' ),
	'panel'             => 'kidsvibe_theme_options_panel',
) );

// latest blog title drop down chooser control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[latest_blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'          	=> kidsvibe_theme_option( 'latest_blog_title' ),
) );

$wp_customize->add_control( new KidsVibe_Dropdown_Chosen_Control( $wp_customize, 'kidsvibe_theme_options[latest_blog_title]', array(
	'label'             => esc_html__( 'Latest Blog Title', 'kidsvibe' ),
	'description'       => esc_html__( 'Note: This title is displayed when your homepage displays option is set to latest posts.', 'kidsvibe' ),
	'section'           => 'kidsvibe_blog_section',
	'type'				=> 'text',
) ) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[sidebar_layout]', array(
	'sanitize_callback'   => 'kidsvibe_sanitize_select',
	'default'             => kidsvibe_theme_option( 'sidebar_layout' ),
) );

$wp_customize->add_control(  new KidsVibe_Radio_Image_Control ( $wp_customize, 'kidsvibe_theme_options[sidebar_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'kidsvibe' ),
	'section'             => 'kidsvibe_blog_section',
	'choices'			  => kidsvibe_sidebar_position(),
) ) );

// column control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[column_type]', array(
	'default'          	=> kidsvibe_theme_option( 'column_type' ),
	'sanitize_callback' => 'kidsvibe_sanitize_select',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[column_type]', array(
	'label'             => esc_html__( 'Column Layout', 'kidsvibe' ),
	'section'           => 'kidsvibe_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'column-1' 		=> esc_html__( 'One Column', 'kidsvibe' ),
		'column-2' 		=> esc_html__( 'Two Column', 'kidsvibe' ),
	),
) );

// excerpt count control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[excerpt_count]', array(
	'default'          	=> kidsvibe_theme_option( 'excerpt_count' ),
	'sanitize_callback' => 'kidsvibe_sanitize_number_range',
	'validate_callback' => 'kidsvibe_validate_excerpt_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[excerpt_count]', array(
	'label'             => esc_html__( 'Excerpt Length', 'kidsvibe' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 50.', 'kidsvibe' ),
	'section'           => 'kidsvibe_blog_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 50,
		),
) );

// pagination control and setting
$wp_customize->add_setting( 'kidsvibe_theme_options[pagination_type]', array(
	'default'          	=> kidsvibe_theme_option( 'pagination_type' ),
	'sanitize_callback' => 'kidsvibe_sanitize_select',
) );

$wp_customize->add_control( 'kidsvibe_theme_options[pagination_type]', array(
	'label'             => esc_html__( 'Pagination Type', 'kidsvibe' ),
	'section'           => 'kidsvibe_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'default' 		=> esc_html__( 'Default', 'kidsvibe' ),
		'numeric' 		=> esc_html__( 'Numeric', 'kidsvibe' ),
	),
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[show_date]', array(
	'default'           => kidsvibe_theme_option( 'show_date' ),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[show_date]', array(
	'label'             => esc_html__( 'Show Date', 'kidsvibe' ),
	'section'           => 'kidsvibe_blog_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[show_category]', array(
	'default'           => kidsvibe_theme_option( 'show_category' ),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[show_category]', array(
	'label'             => esc_html__( 'Show Category', 'kidsvibe' ),
	'section'           => 'kidsvibe_blog_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[show_author]', array(
	'default'           => kidsvibe_theme_option( 'show_author' ),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[show_author]', array(
	'label'             => esc_html__( 'Show Author', 'kidsvibe' ),
	'section'           => 'kidsvibe_blog_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );

// Archive comment meta setting and control.
$wp_customize->add_setting( 'kidsvibe_theme_options[show_comment]', array(
	'default'           => kidsvibe_theme_option( 'show_comment' ),
	'sanitize_callback' => 'kidsvibe_sanitize_switch',
) );

$wp_customize->add_control( new KidsVibe_Switch_Control( $wp_customize, 'kidsvibe_theme_options[show_comment]', array(
	'label'             => esc_html__( 'Show Comment', 'kidsvibe' ),
	'section'           => 'kidsvibe_blog_section',
	'on_off_label' 		=> kidsvibe_show_options(),
) ) );