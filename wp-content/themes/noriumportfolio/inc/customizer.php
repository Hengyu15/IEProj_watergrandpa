<?php
/**
 * Norium Portfolio Theme Customizer
 *
 * @package noriumportfolio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function noriumportfolio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'noriumportfolio_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'noriumportfolio_customize_partial_blogdescription',
			)
		);
	}
	

	
}
add_action( 'customize_register', 'noriumportfolio_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function noriumportfolio_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function noriumportfolio_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function noriumportfolio_customize_preview_js() {
	wp_enqueue_script( 'norium-portfolio-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), noriumportfolio_S_VERSION, true );
}
add_action( 'customize_preview_init', 'noriumportfolio_customize_preview_js' );


//Kirki Customizer 

//Kirki customizer Start
if( class_exists( 'Kirki' ) ) {

//Oliva Theme Panel
Kirki::add_config( 'oliva_customizer_config', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );
Kirki::add_panel( 'oliva_panel', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Norium Options', 'noriumportfolio' ),
) );
//Theme Color Section
Kirki::add_section( 'norium_theme_color', array(
    'title'          => esc_html__( 'Theme Color', 'noriumportfolio' ),
    'panel'          => 'oliva_panel',
    'priority'       => 160,
) );

//Primary Color
Kirki::add_field( 'oliva_customizer_config', [
		'type'		=> 'color',
		'settings'    => 'norium_theme_primary_color',
		'label'       => esc_html__( 'Primary Color', 'noriumportfolio' ),
		'section'     => 'norium_theme_color',
		'default'     => '#EA4343',
		'transport'   => 'postMessage',
		'output' => array(
			array(
				'element'  => '.site-title a, .dark-mode .site-title a, .breadcum h1, .main-navigation a:hover, a:visited, .footer-bottom a, .dark-mode .breadcum h1, .banner-heaadig, .sub-heading, .section-heading span, .test-meta-wrap .client-info h5, .contact-form form label, .resume-content span.sub-title, .service-box-single .srv-icon i, .pricing-single h3, .pricing-single .pricing-body h5, .pricing-single .time-out, .footer-bottom a ',
				'property' => 'color',
			),
			array(
				'element'  => '.widget h2, .wp-block-search .wp-block-search__label, .blog-single-overly span ul li, .nav-links .page-numbers.current, .main-navigation ul li a::after, .nav-links .page-numbers:hover, .darkmode span, .oliva-breadcum a:nth-child(1)::after, ::selection, .resume-content span.time-out, .resume-inner .experience-single-inner::after, .resume-inner .resume-single-inner::after, #play-btn i, .portfolio-menu li.active, .portfolio-menu li:hover ',
				'property' => 'background',
			),
			array(
				'element'=> '.social-icon ul li a:hover i, .header-contact ul li:hover i',
				'property' => 'background-color',

			),
			array(
				'element'=> '',
				'property' => 'box-shadow',

			),
			array(
				'element' =>'p.desc-text, .top-header',
				'property' => 'border-color',
			),
		),
	] );

//Secondary Color
Kirki::add_field( 'oliva_customizer_config', [
		'type'		=> 'color',
		'settings'    => 'norium_theme_secondary_color',
		'label'       => esc_html__( 'Secondary Color', 'noriumportfolio' ),
		'section'     => 'norium_theme_color',
		'default'     => '',
		'transport'   => 'postMessage',
		'output' => array(
			array(
				'element'  => '.blog-single::before, .b-primary, input[type="submit"], .nav-link.b-primary.active, .resume-inner .experience-single::before, .resume-inner .resume-single::before, .service-box-back, .portfolio-single .portfolio-content, .slider .next-arrow, .slider .prev-arrow, .pricing-single .pricing-rate, .b-primary:hover, .contact-form .wpcf7-submit',
				'property' => 'background',
			),
			array(
				'element'=> '',
				'property' => 'background-color',

			),
			array(
				'element'=> '.test-react i',
				'property' => 'color',
			),
		),
	] );
//Typography Section
Kirki::add_section( 'dark_or_light', array(
    'title'          => esc_html__( 'Dark Or Light Button', 'noriumportfolio' ),
    'panel'          => 'oliva_panel',
    'priority'       => 160,
) );

//Page Breadcums Settings
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'dark_light_switcher',
	'label'       => esc_html__( 'Show/Hide', 'noriumportfolio' ),
	'section'     => 'dark_or_light',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );



//Typography Section
Kirki::add_section( 'oliva_global_options', array(
    'title'          => esc_html__( 'Typography', 'noriumportfolio' ),
    'panel'          => 'oliva_panel',
    'priority'       => 160,
) );


//Body Typography

Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'typography',
	'settings'    => 'body_typography',
	'label'       => esc_html__( 'Body Typography', 'noriumportfolio' ),
	'section'     => 'oliva_global_options',
	'default'     => [
		'font-family'    => 'Rubik',
		'font-weight'        => 300,
		'font-size'      => '16px',
		'line-height'    => '60px',
		'letter-spacing' => '0',
		'color'          => '#000000',
		'text-transform' => 'none',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'body',
		],
	],
] );

// //H1 Typography

Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'typography',
	'settings'    => 'h1_typography',
	'label'       => esc_html__( 'H1 Typography', 'noriumportfolio' ),
	'section'     => 'oliva_global_options',
	'default'     => [
		'font-family'    => 'Rubik',
		'font-weight'        => 700,
		'font-size'      => '70px',
		'line-height'    => '80px',
		'letter-spacing' => '0',
		'color'          => '#EA4343',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'h1',
		],
	],
] );

// //H2 Typography

Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'typography',
	'settings'    => 'h2_typography',
	'label'       => esc_html__( 'H2 Typography', 'noriumportfolio' ),
	'section'     => 'oliva_global_options',
	'default'     => [
		'font-family'    => 'Rubik',
		'font-weight'        => 600,
		'font-size'      => '38px',
		'line-height'    => '50px',
		'letter-spacing' => '0',
		'color'          => '',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'h2',
		],
	],
] );


// //H3 Typography

Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'typography',
	'settings'    => 'h3_typography',
	'label'       => esc_html__( 'H3 Typography', 'noriumportfolio' ),
	'section'     => 'oliva_global_options',
	'default'     => [
		'font-family'    => 'Rubik',
		'font-weight'        => 600,
		'font-size'      => '32px',
		'line-height'    => '42px',
		'letter-spacing' => '0',
		'color'          => '',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'h3',
		],
	],
] );
// //H4 Typography

Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'typography',
	'settings'    => 'h4_typography',
	'label'       => esc_html__( 'H4 Typography', 'noriumportfolio' ),
	'section'     => 'oliva_global_options',
	'default'     => [
		'font-family'    => 'Rubik',
		'font-weight'        => 600,
		'font-size'      => '22px',
		'line-height'    => '32px',
		'letter-spacing' => '0',
		'color'          => '',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'h4',
		],
	],
] );

// //H5 Typography

Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'typography',
	'settings'    => 'h5_typography',
	'label'       => esc_html__( 'H5 Typography', 'noriumportfolio' ),
	'section'     => 'oliva_global_options',
	'default'     => [
		'font-family'    => 'Rubik',
		'font-weight'        => 600,
		'font-size'      => '18px',
		'line-height'    => '28px',
		'letter-spacing' => '0',
		'color'          => '',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'h5',
		],
	],
] );

// //H6 Typography

Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'typography',
	'settings'    => 'h6_typography',
	'label'       => esc_html__( 'H6 Typography', 'noriumportfolio' ),
	'section'     => 'oliva_global_options',
	'default'     => [
		'font-family'    => 'Rubik',
		'font-weight'        => 600,
		'font-size'      => '16px',
		'line-height'    => '26px',
		'letter-spacing' => '0',
		'color'          => '',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'h6',
		],
	],
] );
//Header Top
Kirki::add_section( 'header_top', array(
    'title'          => esc_html__( 'Header Top', 'noriumportfolio' ),
    'panel'          => 'oliva_panel',
    'priority'       => 160,
) );
//Header customizer
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'header_to_switcher',
	'label'       => esc_html__( 'Header top enable?', 'noriumportfolio' ),
	'section'     => 'header_top',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Header Top Contact Info', 'noriumportfolio' ),
	'settings'     => 'header_contact_info_switcher',
	'section'     => 'header_top',
	'priority'    => 10,
	'button_label' => esc_html__('Add New', 'noriumportfolio' ),
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Header Top Info', 'noriumportfolio' ),
	],
	'transport' => 'postMessage',
	'js_vars'   => [
			[
				'function' => 'html',
			],
		],
	'fields' => [
		'header_top_icon' => [
			'type'        => 'text',
			'label'       => esc_html__( 'icon', 'noriumportfolio' ),
			'description' => esc_html__( 'You Can Use fonts Awesome(5.0.0) Like As ( fas fa-phone-alt', 'noriumportfolio' ),
			'default'     => '',
		],
		'header_top_text'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Info Text', 'noriumportfolio' ),
			'description' => esc_html__( 'Type Your Info', 'noriumportfolio' ),
			'default'     => '',
			'transport' => 'postMessage',
			'js_vars'   => [
				[
					'function' => 'html',
				],
			],
		],
	]
] );
//Header top Socials
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Header Top Social', 'noriumportfolio' ),
	'settings'     => 'header_top_social_items',
	'section'     => 'header_top',
	'priority'    => 10,
	'button_label' => esc_html__('Add New Social', 'noriumportfolio' ),
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Header Top Socials', 'noriumportfolio' ),
	],
	'fields' => [
		'header_top_social_icon' => [
			'type'        => 'text',
			'label'       => esc_html__( 'icon', 'noriumportfolio' ),
			'description' => esc_html__( 'You Can Use fonts Awesome(5.0.0) Like As ( fas fa-phone-alt', 'noriumportfolio' ),
			'default'     => '',
		],
		'header_top_social_link'  => [
			'type'        => 'link',
			'label'       => esc_html__( 'Social Link', 'noriumportfolio' ),
			'description' => esc_html__( 'Type Your Link', 'noriumportfolio' ),
			'default'     => '',
		],
	]
] );
//page Settings
Kirki::add_section( 'oliva_page_settings', array(
    'title'          => esc_html__( 'Page Settings', 'noriumportfolio' ),
    'panel'          => 'oliva_panel',
    'priority'       => 160,
) );

//Page Breadcums Settings
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'page_breadcumb_swtihcer',
	'label'       => esc_html__( 'Show Or Hide Page Breadcumb?', 'noriumportfolio' ),
	'section'     => 'oliva_page_settings',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );

//Page title Settings
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'page_title_swtihcer',
	'label'       => esc_html__( 'Show Or Hide Page Title?', 'noriumportfolio' ),
	'section'     => 'oliva_page_settings',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );

//Blog Page Settings
Kirki::add_section( 'oliva_blog_page_settings', array(
    'title'          => esc_html__( 'Blog Page Settings', 'noriumportfolio' ),
    'panel'          => 'oliva_panel',
    'priority'       => 160,
) );


//Blog Page Breadcums Title
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'text',
	'settings'    => 'blog_page_breadcumb_title',
	'label'       => esc_html__( 'Breadcumb Title', 'noriumportfolio' ),
	'section'     => 'oliva_blog_page_settings',
	'default'     => esc_html__('Latest Posts', 'noriumportfolio'),
] );

//Blog Page Margin 
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'dimension',
	'settings'    => 'blog_page_margin',
	'label'       => esc_html__( 'Blog Page Margin Top', 'noriumportfolio' ),
	'section'     => 'oliva_blog_page_settings',
	'description'=> esc_html__('If You Hide Blog Breadcumb You Will Need to Margin Top', 'noriumportfolio'),
	'default'     => '0px',
	'choices'     => [
		'accept_unitless' => true,
	],
] );

//Footer customizer
Kirki::add_section( 'footer_copywrite', array(
    'title'          => esc_html__( 'Footer Copywrite Area', 'noriumportfolio' ),
    'panel'          => 'oliva_panel',
    'priority'       => 160,
) );

Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'footer_switcher',
	'label'       => esc_html__( 'Footer Copywrite enable?', 'noriumportfolio' ),
	'section'     => 'footer_copywrite',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'textarea',
	'settings'    => 'footer_text',
	'label'       => esc_html__( 'Footer copywrite Text', 'noriumportfolio' ),
	'section'     => 'footer_copywrite',
	'default'     => 'Copyright @ 2022, Oliva. All rights reserved.',
	'priority'    => 10,
] );


// Front Page Pannel

Kirki::add_panel( 'oliva_front_page_panel', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Norium Front Page', 'noriumportfolio' ),
) );
//Hero Area Section
Kirki::add_section( 'oliva_front_page_options', array(
    'title'          => esc_html__( 'Hero Area', 'noriumportfolio' ),
    'panel'          => 'oliva_front_page_panel',
    'priority'       => 160,
) );
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'banner_area_swticher',
	'label'       => esc_html__( 'Enable Banner Area?', 'noriumportfolio' ),
	'section'     => 'oliva_front_page_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );

Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'banner_area_shap_swticher',
	'label'       => esc_html__( 'Are You Show Shap?', 'noriumportfolio' ),
	'section'     => 'oliva_front_page_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );

//Banner Sub Title
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'text',
	'settings'    => 'banner_subtitle',
	'label'       => esc_html__( 'Banner Sub title', 'noriumportfolio' ),
	'section'     => 'oliva_front_page_options',
	'default'     => esc_html__('Welcome To My World', 'noriumportfolio'),
	'priority'    => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.banner-sub-heading.text-type',
			'function' => 'html',
		],
	],
] );

//Banner Title
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'text',
	'settings'    => 'banner_title',
	'label'       => esc_html__( 'Banner Title', 'noriumportfolio' ),
	'section'     => 'oliva_front_page_options',
	'default'     => esc_html__('Hello I am Norium', 'noriumportfolio'),
	'priority'    => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.banner-heaadig',
			'function' => 'html',
		],
	],
] );

//Banner Designation
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'text',
	'settings'    => 'banner_designation',
	'label'       => esc_html__( 'Your Designation', 'noriumportfolio' ),
	'section'     => 'oliva_front_page_options',
	'default'     => esc_html__('Freelance UI/UX Designer & Developer', 'noriumportfolio'),
	'priority'    => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.focus-text',
			'function' => 'html',
		],
	],
] );

//Banner Description
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'textarea',
	'settings'    => 'banner_desc',
	'label'       => esc_html__( 'Your Skill Description', 'noriumportfolio' ),
	'section'     => 'oliva_front_page_options',
	'default'     => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mi, dolor proin sed rhoncus potenti vitae. Eu lobortis massa libero iaculis. Orci auctor fermentum...', 'noriumportfolio'),
	'priority'    => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => 'p.desc-text',
			'function' => 'html',
		],
	],
] );


//Banner Working Experience
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Working Experience', 'noriumportfolio' ),
	'settings'     => 'banner_working_ex',
	'section'     => 'oliva_front_page_options',
	'priority'    => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => 'p.desc-text',
			'function' => 'html',
		],
	],
	'button_label' => esc_html__('Add New Experience', 'noriumportfolio' ),
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Working Experience', 'noriumportfolio' ),
	],

	'default'  => [
		[
			'ex_number'   => esc_html__( '8', 'noriumportfolio' ),
			'ex_name'    => esc_html__( 'Years Experience', 'noriumportfolio' ),
		],
		[
			'ex_number'   => esc_html__( '250', 'noriumportfolio' ),
			'ex_name'    => esc_html__( 'Project Completed', 'noriumportfolio' ),
		],
		[
			'ex_number'   => esc_html__( '100', 'noriumportfolio' ),
			'ex_name'    => esc_html__( 'Clients Satisfied', 'noriumportfolio' ),
		]
	],
	'fields' => [
		'ex_number' => [
			'type'        => 'number',
			'label'       => esc_html__( 'Type Number', 'noriumportfolio' ),
			'default'     => '8',
		],
		'ex_name'  => [
			'type'        => 'textarea',
			'label'       => esc_html__( 'Work Name', 'noriumportfolio' ),
			'description' => esc_html__( 'Type Your Experience', 'noriumportfolio' ),
			'default'     => esc_html__( 'Years Experience', 'noriumportfolio' ),
		],
	],
	'choices' => [
		'limit' => 3
	],
] );
//Banner Button
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'text',
	'settings'    => 'banner_btn',
	'label'       => esc_html__( 'Button', 'noriumportfolio' ),
	'section'     => 'oliva_front_page_options',
	'default'     => esc_html__('Hire Me', 'noriumportfolio'),
	'priority'    => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.b-primary',
			'function' => 'html',
		],
	],
] );

//Banner Button Link
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'link',
	'settings'    => 'banner_btn_link',
	'label'       => esc_html__( 'Button Link', 'noriumportfolio' ),
	'section'     => 'oliva_front_page_options',
	'default'     => esc_html__('#', 'noriumportfolio'),
	'priority'    => 10,
] );

//Popup video Link
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'link',
	'settings'    => 'banner_popup_video_btn_link',
	'label'       => esc_html__( 'Popup video Link', 'noriumportfolio' ),
	'section'     => 'oliva_front_page_options',
	'default'     => esc_html__('https://www.youtube.com/watch?v=pWOv9xcoMeY', 'noriumportfolio'),
	'priority'    => 10,
] );

//Bannar Custom Seperator
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'custom',
	'settings'    => 'bannar_right',
	'section'     => 'oliva_front_page_options',
		'default'         => '<h3 style="padding:15px 10px; background:#EA4343; color:#fff; text-transform:uppercase; font-weight:bold; margin:0;">' . __( 'Bannar Image Section', 'noriumportfolio' ) . '</h3>',
	'priority'    => 10,
] );

//Bannar Image
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'image',
	'settings'    => 'bannar_right_image',
	'label'       => esc_html__( 'Bannar Light Image', 'noriumportfolio' ),
	'description' => esc_html__( 'Upload Image Here', 'noriumportfolio' ),
	'section'     => 'oliva_front_page_options',
	'default'     => '',
	'choices'     => [
		'save_as' => 'array',
	],
] );

//About Page Section

Kirki::add_section( 'oliva_about_page_options', array(
    'title'          => esc_html__( 'About Us Area', 'noriumportfolio' ),
    'panel'          => 'oliva_front_page_panel',
    'priority'       => 160,
) );

//About Area Switcher
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'about_area_swticher',
	'label'       => esc_html__( 'Enable About Area?', 'noriumportfolio' ),
	'section'     => 'oliva_about_page_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );

//About Shap Switcher
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'about_area_shap_swticher',
	'label'       => esc_html__( 'Show Or Hide Shap?', 'noriumportfolio' ),
	'section'     => 'oliva_about_page_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );

//About Custom Seperator
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'custom',
	'settings'    => 'about_left',
	'section'     => 'oliva_about_page_options',
		'default'         => '<h3 style="padding:15px 10px; background:#EA4343; color:#fff; text-transform:uppercase; font-weight:bold; margin:0;">' . __( 'About Image Section', 'noriumportfolio' ) . '</h3>',
	'priority'    => 10,
] );

//About Image
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'image',
	'settings'    => 'about_left_image',
	'label'       => esc_html__( 'About Image Light', 'noriumportfolio' ),
	'description' => esc_html__( 'Please Use 244x346px size image', 'noriumportfolio' ),
	'section'     => 'oliva_about_page_options',
	'default'     => '',
	'choices'     => [
		'save_as' => 'array',
	],
] );
//About Dark Image
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'image',
	'settings'    => 'about_left_image_dark',
	'label'       => esc_html__( 'About Image Dark', 'noriumportfolio' ),
	'description' => esc_html__( 'Please Use 244x346px size image', 'noriumportfolio' ),
	'section'     => 'oliva_about_page_options',
	'default'     => '',
	'choices'     => [
		'save_as' => 'array',
	],
] );

//About Custom Content Seperator
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'custom',
	'settings'    => 'about_content_right',
	'section'     => 'oliva_about_page_options',
		'default'         => '<h3 style="padding:15px 10px; background:#EA4343; color:#fff; text-transform:uppercase; font-weight:bold; margin:0;">' . __( 'About Content Section', 'noriumportfolio' ) . '</h3>',
	'priority'    => 10,
] );

//About subtitle
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'text',
	'settings'    => 'aboutus__offsettext',
	'label'       => esc_html__( 'About Us Offset Text', 'noriumportfolio' ),
	'section'     => 'oliva_about_page_options',
	'default'     => esc_html__('Introduction', 'noriumportfolio'),
	'priority'    => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.aboutus-bg-heading',
			'function' => 'html',
		],
	],
] );

//About subtitle
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'text',
	'settings'    => 'about_subtitle',
	'label'       => esc_html__( 'About Us Subtitle', 'noriumportfolio' ),
	'section'     => 'oliva_about_page_options',
	'default'     => esc_html__('about me', 'noriumportfolio'),
	'priority'    => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.sub-heading',
			'function' => 'html',
		],
	],
] );

//About Us Title
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'text',
	'settings'    => 'about_title',
	'label'       => esc_html__( 'About Us Title', 'noriumportfolio' ),
	'section'     => 'oliva_about_page_options',
	'default'     => esc_html__('Failure Is The Condiment
That Gives', 'noriumportfolio'),
	'priority'    => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.aboutus-section .aboutus-content h2',
			'function' => 'html',
		],
	],
] );
//About Us Color Title
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'text',
	'settings'    => 'about_color_title',
	'label'       => esc_html__( 'About Us Color Title', 'noriumportfolio' ),
	'section'     => 'oliva_about_page_options',
	'description' => esc_html__('If You Need Color Title Plese Add Text Here', 'noriumportfolio'),
	'default'     => esc_html__('Success', 'noriumportfolio'),
	'priority'    => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.aboutus-section .aboutus-content h2 span',
			'function' => 'html',
		],
	],
] );

//About Us description
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'textarea',
	'settings'    => 'about_desc',
	'label'       => esc_html__( 'About Us Title', 'noriumportfolio' ),
	'section'     => 'oliva_about_page_options',
	'default'     => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra a, sit lorem cursus mauris, mi pharetra sit fermentum Pharetra viverra egestas sed...', 'noriumportfolio'),
	'priority'    => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.aboutus-section .aboutus-content p.desc-text',
			'function' => 'html',
		],
	],
] );

//About Button
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'text',
	'settings'    => 'about_btn',
	'label'       => esc_html__( 'Button', 'noriumportfolio' ),
	'section'     => 'oliva_about_page_options',
	'default'     => esc_html__('Download CV', 'noriumportfolio'),
	'priority'    => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.aboutus-section .aboutus-content .b-primary',
			'function' => 'html',
		],
	],
] );

//About Button Link
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'link',
	'settings'    => 'about_btn_link',
	'label'       => esc_html__( 'Button Link', 'noriumportfolio' ),
	'section'     => 'oliva_about_page_options',
	'default'     => esc_html__('#', 'noriumportfolio'),
	'priority'    => 10,
	'transport' => 'postMessage',
] );


//////----------------------Experience and Qualificaiton Area Panel------------------////////


//Experience and Qualificaiton Panel
Kirki::add_section( 'oliva_eduex_page_options', array(
    'title'          => esc_html__( 'Education & Qualification Area', 'noriumportfolio' ),
    'panel'          => 'oliva_front_page_panel',
    'priority'       => 160,
) );

//Experience and Qualificaiton  Area Switcher
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'eduex_area_swticher',
	'label'       => esc_html__( 'Enable Area?', 'noriumportfolio' ),
	'section'     => 'oliva_eduex_page_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );

//Experience and Qualificaiton  Shap Switcher
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'eduex_area_shap_swticher',
	'label'       => esc_html__( 'Show Or Hide Shap?', 'noriumportfolio' ),
	'section'     => 'oliva_eduex_page_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );

//Experience and Qualificaiton  Custom Seperator
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'custom',
	'settings'    => 'eduex_custom_heading',
	'section'     => 'oliva_eduex_page_options',
		'default'         => '<h3 style="padding:15px 10px; background:#EA4343; color:#fff; text-transform:uppercase; font-weight:bold; margin:0;">' . __( 'Category Menu', 'noriumportfolio' ) . '</h3>',
	'priority'    => 10,
] );

//Experience and Qualificaiton Repeater

Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Education & Skill', 'noriumportfolio' ),
	'section'     => 'oliva_eduex_page_options',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Education And Skill', 'noriumportfolio' ),
	],
	'button_label' => esc_html__('Add new ', 'noriumportfolio' ),
	'settings'     => 'educaex_area_repeater',
	'default'  => [
		[
			'educaex_cat_name'   => esc_html__('Experience', 'noriumportfolio'),
			'educa_sub_title'    => esc_html__('2005-2010', 'noriumportfolio'),
			'educa_title' => esc_html__('Job Experience', 'noriumportfolio'),
			'educaex_sub_title'    => esc_html__('2005-2010', 'noriumportfolio'),
			'educaex_edu_title'    =>  esc_html__('Creative Director', 'noriumportfolio'),
			'educaex_edu_sub_title'    => esc_html__('BSE In CSE ((2004 - 08)', 'noriumportfolio'),
			'educaex_edu_cgpa'    => esc_html__('4.87/5', 'noriumportfolio'),
			'educaex_edu_desc'    => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Montes, amet erat integer pulvinar', 'noriumportfolio'),
			'educaex_exskill_title'    => esc_html__('Creating a Portfolio Website', 'noriumportfolio'),
			'educaex_exskill_sub_title'    => esc_html__('University of DVI (1997 - 01)', 'noriumportfolio'),
			'educaex_exskill_cgpa'    => esc_html__('4.87/5', 'noriumportfolio'),
			'educaex_exskill_desc'    =>  esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Montes, amet erat integer pulvinar', 'noriumportfolio'),
		],
	],
	'fields' => [
		'educaex_cat_name' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Category Name', 'noriumportfolio' ),
			'description' => esc_html__( 'Type Here', 'noriumportfolio' ),
			'default'     => esc_html__('Experience', 'noriumportfolio'),
		],
		'educa_sub_title'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Education Sub Title', 'noriumportfolio' ),
			'description' => esc_html__( 'Sub Title Here', 'noriumportfolio' ),
			'default'     => esc_html__('2005-2010', 'noriumportfolio'),
		],
		'educa_title'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Education  Title', 'noriumportfolio' ),
			'description' => esc_html__( 'Title Here', 'noriumportfolio' ),
			'default'     => esc_html__('Job Experience', 'noriumportfolio'),
		],

		'educaex_sub_title'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Experience or Skill Sub  Title', 'noriumportfolio' ),
			'description' => esc_html__( 'Title Here', 'noriumportfolio' ),
			'default'     => esc_html__('2005-2010', 'noriumportfolio'),
		],

		'educaex_title'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Experience or Skill Title', 'noriumportfolio' ),
			'description' => esc_html__( 'Title Here', 'noriumportfolio' ),
			'default'     => esc_html__('Education Quality', 'noriumportfolio'),
		],

		'educaex_custom_Heading'  => [
			'type'        => 'custom',
			'settings'    => 'eduex_edu_custom_heading',
			'section'     => 'oliva_eduex_page_options',
				'default'         => '<h3 style="padding:15px 10px; background:#EA4343; color:#fff; text-transform:uppercase; font-weight:bold; margin:0;">' . __( 'Education Qualifications', 'noriumportfolio' ) . '</h3>',
			'priority'    => 10,
		],
		'educaex_edu_title'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Education Title', 'noriumportfolio' ),
			'description' => esc_html__( 'Title Here', 'noriumportfolio' ),
			'default'     => esc_html__('Creative Director', 'noriumportfolio'),
		],
		'educaex_edu_sub_title'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Education Sub Title', 'noriumportfolio' ),
			'description' => esc_html__( 'Title Here', 'noriumportfolio' ),
			'default'     => esc_html__('BSE In CSE ((2004 - 08)', 'noriumportfolio'),
		],
		'educaex_edu_cgpa'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Education CGPA', 'noriumportfolio' ),
			'description' => esc_html__( 'Title Here', 'noriumportfolio' ),
			'default'     => esc_html__('4.87/5', 'noriumportfolio'),
		],
		'educaex_edu_desc'  => [
			'type'        => 'textarea',
			'label'       => esc_html__( 'Education Description', 'noriumportfolio' ),
			'description' => esc_html__( 'Title Here', 'noriumportfolio' ),
			'default'     => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Montes, amet erat integer pulvinar', 'noriumportfolio'),
		],	
		'educaex_exskill_custom_Heading'  => [
			'type'        => 'custom',
			'settings'    => 'eduex_skill_custom_heading',
			'section'     => 'oliva_eduex_page_options',
				'default'         => '<h3 style="padding:15px 10px; background:#EA4343; color:#fff; text-transform:uppercase; font-weight:bold; margin:0;">' . __( 'Exprience or Skill', 'noriumportfolio' ) . '</h3>',
			'priority'    => 10,
		],
		'educaex_exskill_title'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Exprience or Skill Title', 'noriumportfolio' ),
			'description' => esc_html__( 'Title Here', 'noriumportfolio' ),
			'default'     => esc_html__('Creating a Portfolio Website', 'noriumportfolio'),
		],
		'educaex_exskill_sub_title'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Exprience or Skill Sub Title', 'noriumportfolio' ),
			'description' => esc_html__( 'Title Here', 'noriumportfolio' ),
			'default'     => esc_html__('University of DVI (1997 - 01)', 'noriumportfolio'),
		],
		'educaex_exskill_cgpa'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Exprience or Skill CGPA', 'noriumportfolio' ),
			'description' => esc_html__( 'Title Here', 'noriumportfolio' ),
			'default'     => esc_html__('4.50/5', 'noriumportfolio'),
		],
		'educaex_exskill_desc'  => [
			'type'        => 'textarea',
			'label'       => esc_html__( 'Exprience or Skill Description', 'noriumportfolio' ),
			'description' => esc_html__( 'Title Here', 'noriumportfolio' ),
			'default'     => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Montes, amet erat integer pulvinar..', 'noriumportfolio'),
		],	
	],

	'choices' => [
		'limit' => 5
	],

] );




//////----------------------Services Area Panel------------------////////

Kirki::add_section( 'oliva_service_area_options', array(
    'title'          => esc_html__( 'Services Area', 'noriumportfolio' ),
    'panel'          => 'oliva_front_page_panel',
    'priority'       => 160,
) );

//About Area Switcher
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'service_area_swticher',
	'label'       => esc_html__( 'Enable Service Area?', 'noriumportfolio' ),
	'section'     => 'oliva_service_area_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );

//Service Shap Switcher
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'service_area_shap_swticher',
	'label'       => esc_html__( 'Show Or Hide Shap?', 'noriumportfolio' ),
	'section'     => 'oliva_service_area_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );
//Service Custom Heading Section
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'custom',
	'settings'    => 'service_cutom_heading',
	'section'     => 'oliva_service_area_options',
		'default'         => '<h3 style="padding:15px 10px; background:#EA4343; color:#fff; text-transform:uppercase; font-weight:bold; margin:0;">' . __( 'Service Heading', 'noriumportfolio' ) . '</h3>',
	'priority'    => 10,
] );
//Service Offset Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'service_offset_title',
	'label'    => esc_html__( 'Service Offset Title', 'noriumportfolio' ),
	'section'  => 'oliva_service_area_options',
	'default'  => esc_html__( 'Services', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.service-section .section-bg-heading',
			'function' => 'html',
		],
	],
] );
//Service Sub  Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'services_subtitle',
	'label'    => esc_html__( 'Service Subtitle', 'noriumportfolio' ),
	'section'  => 'oliva_service_area_options',
	'default'  => esc_html__( 'what i provide', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.service-section .sub-heading',
			'function' => 'html',
		],
	],
] );

//Service  Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'services_title',
	'label'    => esc_html__( 'Service Title', 'noriumportfolio' ),
	'section'  => 'oliva_service_area_options',
	'default'  => esc_html__( 'I Offer Wide Range Of Top Notch', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.service-section  .section-heading ',
			'function' => 'html',
		],
	],
] );


//Service Color  Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'services_color_title',
	'label'    => esc_html__( 'Service Color Title', 'noriumportfolio' ),
	'section'  => 'oliva_service_area_options',
	'description'=> esc_html__('If You Need Color Text You Can Type Here', 'noriumportfolio'),
	'default'  => esc_html__( 'Services', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.service-section  .section-heading span',
			'function' => 'html',
		],
	],
] );

//Service Heading Description
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'textarea',
	'settings' => 'services_heading_description',
	'label'    => esc_html__( 'Service Heading Description', 'noriumportfolio' ),
	'section'  => 'oliva_service_area_options',
	'description'=> esc_html__('Description Here', 'noriumportfolio'),
	'default'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra a, sit lorem cursus mauris, mi pharetra sit fermentum Pharetra viverra egestas sed.', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.service-section .desc-text',
			'function' => 'html',
		],
	],
] );

//Single Service Custom Heading Section
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'custom',
	'settings'    => 'single_service_cutom_heading',
	'section'     => 'oliva_service_area_options',
		'default'         => '<h3 style="padding:15px 10px; background:#EA4343; color:#fff; text-transform:uppercase; font-weight:bold; margin:0;">' . __( 'Service Single', 'noriumportfolio' ) . '</h3>',
	'priority'    => 10,
] );

//Single Service Repetar
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Repeater Control', 'noriumportfolio' ),
	'section'     => 'oliva_service_area_options',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Service', 'noriumportfolio' ),
	],
	'button_label' => esc_html__('Add New Service ', 'noriumportfolio' ),
	'settings'     => 'single_service_repeater',
	'fields' => [
		'single_service_icon'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Service Icon', 'noriumportfolio' ),
			'description' => esc_html__( 'Use fontAwesome-5.0 Icon Like as ( fa fa-facebook )', 'noriumportfolio' ),
			'default'     => esc_html__('fab fa-wordpress-simple', 'noriumportfolio'),
		],
		'single_service_title'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Service Title', 'noriumportfolio' ),
			'description' => esc_html__( 'Add Title Here', 'noriumportfolio' ),
			'default'     => esc_html__('Wordpress Ninja & Branding', 'noriumportfolio'),
		],
		'single_service_desciption'  => [
			'type'        => 'textarea',
			'label'       => esc_html__( 'Service Description', 'noriumportfolio' ),
			'description' => esc_html__( 'Add Description Here', 'noriumportfolio' ),
			'default'     => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra a, sit lorem cursus mauris', 'noriumportfolio'),
		],
		'single_service_hover_btn'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Service Hover Button', 'noriumportfolio' ),
			'description' => esc_html__( 'Add Hover Button Text', 'noriumportfolio' ),
			'default'     => esc_html__('Contact', 'noriumportfolio'),
		],

		'single_service_hover_btn_link'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Service Hover Button Link', 'noriumportfolio' ),
			'description' => esc_html__( 'Add Hover Button Link', 'noriumportfolio' ),
			'default'     => esc_html__('#', 'noriumportfolio'),
		],
	
	]
] );


//////----------------------Portfolio Area Panel------------------////////

Kirki::add_section( 'oliva_portfolio_area_options', array(
    'title'          => esc_html__( 'Portfolio Area', 'noriumportfolio' ),
    'panel'          => 'oliva_front_page_panel',
    'priority'       => 160,
) );

//Portfolio Area Switcher
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'portfolio_area_swticher',
	'label'       => esc_html__( 'Enable Portfolio Area?', 'noriumportfolio' ),
	'section'     => 'oliva_portfolio_area_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );

//Portfolio Shap Switcher
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'portfolio_area_shap_swticher',
	'label'       => esc_html__( 'Show Or Hide Shap?', 'noriumportfolio' ),
	'section'     => 'oliva_portfolio_area_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );
//Portfolio Custom Heading Section
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'custom',
	'settings'    => 'portfolio_cutom_heading',
	'section'     => 'oliva_portfolio_area_options',
		'default'         => '<h3 style="padding:15px 10px; background:#EA4343; color:#fff; text-transform:uppercase; font-weight:bold; margin:0;">' . __( 'Portfolio Heading', 'noriumportfolio' ) . '</h3>',
	'priority'    => 10,
] );
//Portfolio Offset Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'portfolio_offset_title',
	'label'    => esc_html__( 'Portfolio Offset Title', 'noriumportfolio' ),
	'section'  => 'oliva_portfolio_area_options',
	'default'  => esc_html__( 'portfolio', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.portfolio-section .section-bg-heading',
			'function' => 'html',
		],
	],
] );
//Portfolio Sub  Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'portfolio_subtitle',
	'label'    => esc_html__( 'Portfolio Subtitle', 'noriumportfolio' ),
	'section'  => 'oliva_portfolio_area_options',
	'default'  => esc_html__( 'selected work', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.portfolio-section .sub-heading',
			'function' => 'html',
		],
	],
] );

//Portfolio  Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'portfolio_title',
	'label'    => esc_html__( 'Portfolio Title', 'noriumportfolio' ),
	'section'  => 'oliva_portfolio_area_options',
	'default'  => esc_html__( 'Check my ', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.portfolio-section .section-heading ',
			'function' => 'html',
		],
	],
] );


//Portfolio Color  Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'portfolio_color_title',
	'label'    => esc_html__( 'Portfolio Color Title', 'noriumportfolio' ),
	'section'  => 'oliva_portfolio_area_options',
	'description'=> esc_html__('If You Need Color Text You Can Type Here', 'noriumportfolio'),
	'default'  => esc_html__( 'portfolio', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.portfolio-section .section-heading span',
			'function' => 'html',
		],
	],
] );

//Portfolio Heading Description
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'textarea',
	'settings' => 'portfolio_heading_description',
	'label'    => esc_html__( 'Portfolio Heading Description', 'noriumportfolio' ),
	'section'  => 'oliva_portfolio_area_options',
	'description'=> esc_html__('Description Here', 'noriumportfolio'),
	'default'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra a, sit lorem cursus mauris, mi pharetra sit fermentum Pharetra viverra egestas sed.', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.portfolio-section .desc-text',
			'function' => 'html',
		],
	],
] );







//Portfolio Items Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'custom',
	'settings'    => 'portfolio_cutom_items',
	'section'     => 'oliva_portfolio_area_options',
		'default'         => '<h3 style="padding:15px 10px; background:#EA4343; color:#fff; text-transform:uppercase; font-weight:bold; margin:0;">' . __( 'Portfolio items', 'noriumportfolio' ) . '</h3>',
	'priority'    => 10,
] );


//portfolio items repeater
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Portfolio Items', 'noriumportfolio' ),
	'section'     => 'oliva_portfolio_area_options',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Portfolio', 'noriumportfolio' ),
	],
	'button_label' => esc_html__('Add new Portfolio ', 'noriumportfolio' ),
	'settings'     => 'portfolio_item_repeater',
	'fields' => [
		'portfoli_cat_name' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Category Name', 'noriumportfolio' ),
			'description' => esc_html__( 'Type Here', 'noriumportfolio' ),
			'default'     => '',
		],
		'portfoli_cat__data_name'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Category Data Name', 'noriumportfolio' ),
			'description' => esc_html__( 'Data Filer Name here', 'noriumportfolio' ),
		],
		'portfoli_cat__data_filer_name'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Category Category filter Name', 'noriumportfolio' ),
			'description' => esc_html__( 'Category Filter Name here ( Category Data and Filter Name Must Be Same You Can You Multiple Filter Name Just Use Space )', 'noriumportfolio' ),
		],

		
		'portfoli_cat__imge'  => [
			'type'        => 'image',
			'label'       => esc_html__( 'Portfolio Image', 'noriumportfolio' ),
			'description' => esc_html__( 'Upload Image', 'noriumportfolio' ),
		],
		'portfoli_cat__title'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Portfolio Title', 'noriumportfolio' ),
			'description' => esc_html__( 'Add Title Here', 'noriumportfolio' ),
		],
		'portfoli_cat_video_link'  => [
			'type'        => 'link',
			'label'       => esc_html__( 'Portfolio Video', 'noriumportfolio' ),
			'description' => esc_html__( 'Video Link If You Need', 'noriumportfolio' ),
		],
	]
] );





//////----------------------Testimonial Area Panel------------------////////

Kirki::add_section( 'oliva_testimonial_area_options', array(
    'title'          => esc_html__( 'Testimonial Area', 'noriumportfolio' ),
    'panel'          => 'oliva_front_page_panel',
    'priority'       => 160,
) );

//Tesimonial Area Switcher
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'testimonail_area_swticher',
	'label'       => esc_html__( 'Enable Testimonail Area?', 'noriumportfolio' ),
	'section'     => 'oliva_testimonial_area_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );

//Tesimonial Shap Switcher
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'testimonail_area_shap_swticher',
	'label'       => esc_html__( 'Show Or Hide Shap?', 'noriumportfolio' ),
	'section'     => 'oliva_testimonial_area_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );
//Tesimonial Custom Heading Section
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'custom',
	'settings'    => 'testimonail_cutom_heading',
	'section'     => 'oliva_testimonial_area_options',
		'default'         => '<h3 style="padding:15px 10px; background:#EA4343; color:#fff; text-transform:uppercase; font-weight:bold; margin:0;">' . __( 'Testimonial Heading', 'noriumportfolio' ) . '</h3>',
	'priority'    => 10,
] );
//Tesimonial Offset Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'testimonial_offset_title',
	'label'    => esc_html__( 'Testimonial Offset Title', 'noriumportfolio' ),
	'section'  => 'oliva_testimonial_area_options',
	'default'  => esc_html__( 'testimonial', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.testimonial-section .section-bg-heading',
			'function' => 'html',
		],
	],
] );
//Tesimonial Sub  Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'testimonial_subtitle',
	'label'    => esc_html__( 'Testimonail Subtitle', 'noriumportfolio' ),
	'section'  => 'oliva_testimonial_area_options',
	'default'  => esc_html__( 'CLIENT’S VIEW', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.testimonial-section .sub-heading',
			'function' => 'html',
		],
	],
] );

//Tesimonial  Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'testimonial_title',
	'label'    => esc_html__( 'Testimonail Title', 'noriumportfolio' ),
	'section'  => 'oliva_testimonial_area_options',
	'default'  => esc_html__( 'What Client Says  ', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.testimonial-section .section-heading ',
			'function' => 'html',
		],
	],
] );


//Testimonail Color  Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'testimonial_color_title',
	'label'    => esc_html__( 'Testimonail Color Title', 'noriumportfolio' ),
	'section'  => 'oliva_testimonial_area_options',
	'description'=> esc_html__('If You Need Color Text You Can Type Here', 'noriumportfolio'),
	'default'  => esc_html__( 'About Me', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.testimonial-section .section-heading span',
			'function' => 'html',
		],
	],
] );

//Testimonail Carousel Switcher
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'testimonail_area_carousel_swticher',
	'label'       => esc_html__( 'Enable Carousel Button?', 'noriumportfolio' ),
	'section'     => 'oliva_testimonial_area_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );



//Single Testimonia Repetar
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Testimonail', 'noriumportfolio' ),
	'section'     => 'oliva_testimonial_area_options',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Testimonial', 'noriumportfolio' ),
	],
	'button_label' => esc_html__('Add New Testimonial ', 'noriumportfolio' ),
	'settings'     => 'single_testimonial_repeater',
	'fields' => [
		'testimonial_author_image'  => [
			'type'        => 'image',
			'label'       => esc_html__( 'Author Image', 'noriumportfolio' ),
			'description' => esc_html__( 'Upload Image', 'noriumportfolio' ),
			'default'     => '',
			'choices'     => [
				'save_as' => 'id',
			],
			
		],
		'testimonial_descrip'  => [
			'type'        => 'textarea',
			'label'       => esc_html__( 'Author Description', 'noriumportfolio' ),
			'description' => esc_html__( 'Add Description', 'noriumportfolio' ),
		],
		'testimonial_author_name'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Author Name', 'noriumportfolio' ),
			'description' => esc_html__( 'Name Here', 'noriumportfolio' ),
			'default'     => esc_html__('Alison Watson', 'noriumportfolio'),
		],
		'testimonial_author_designation'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Author Designation', 'noriumportfolio' ),
			'description' => esc_html__( 'Designation Here', 'noriumportfolio' ),
			'default'     => esc_html__('Web Developer', 'noriumportfolio'),
		],

		'testimonail_author_rating'  => [
			'type'        => 'select',
			'label'       => esc_html__( 'Author Rating', 'noriumportfolio' ),
			'description' => esc_html__( 'Select Your Rating', 'noriumportfolio' ),
			'choices'     => [
				'norating' => esc_html__( 'No Rating', 'noriumportfolio' ),
				'onestar' => esc_html__( '1 Star', 'noriumportfolio' ),
				'twostar' => esc_html__( '2 Star', 'noriumportfolio' ),
				'threestar' => esc_html__( '3 Star', 'noriumportfolio' ),
				'fourstar' => esc_html__( '4 Star', 'noriumportfolio' ),
				'fivestar' => esc_html__( '5 Star', 'noriumportfolio' ),
			],
		],
	
	]
] );


//////----------------------Pricing Area Panel------------------////////

Kirki::add_section( 'oliva_pricing_area_options', array(
    'title'          => esc_html__( 'Pricing Area', 'noriumportfolio' ),
    'panel'          => 'oliva_front_page_panel',
    'priority'       => 160,
) );

//Pricing Area Switcher
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'pricing_area_swticher',
	'label'       => esc_html__( 'Enable Pricing Area?', 'noriumportfolio' ),
	'section'     => 'oliva_pricing_area_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );

//Pricing Shap Switcher
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'pricing_area_shap_swticher',
	'label'       => esc_html__( 'Show Or Hide Shap?', 'noriumportfolio' ),
	'section'     => 'oliva_pricing_area_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );
//Pricing Custom Heading Section
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'custom',
	'settings'    => 'pircing_cutom_heading',
	'section'     => 'oliva_pricing_area_options',
		'default'         => '<h3 style="padding:15px 10px; background:#EA4343; color:#fff; text-transform:uppercase; font-weight:bold; margin:0;">' . __( 'Pricing Heading', 'noriumportfolio' ) . '</h3>',
	'priority'    => 10,
] );
//Pricing Offset Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'pricing_offset_title',
	'label'    => esc_html__( 'Pricing Offset Title', 'noriumportfolio' ),
	'section'  => 'oliva_pricing_area_options',
	'default'  => esc_html__( 'pricing', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.pricing-section .section-bg-heading',
			'function' => 'html',
		],
	],
] );
//Pricing Sub  Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'pricing_subtitle',
	'label'    => esc_html__( 'Pricing Subtitle', 'noriumportfolio' ),
	'section'  => 'oliva_pricing_area_options',
	'default'  => esc_html__( 'pricing table', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.pricing-section .sub-heading',
			'function' => 'html',
		],
	],
] );

//Pricing  Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'pricing_title',
	'label'    => esc_html__( 'Testimonail Title', 'noriumportfolio' ),
	'section'  => 'oliva_pricing_area_options',
	'default'  => esc_html__( 'Pricing List For  ', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.pricing-section .section-heading ',
			'function' => 'html',
		],
	],
] );


//Pricing Color  Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'pricing_color_title',
	'label'    => esc_html__( 'Pricing Color Title', 'noriumportfolio' ),
	'section'  => 'oliva_pricing_area_options',
	'description'=> esc_html__('If You Need Color Text You Can Type Here', 'noriumportfolio'),
	'default'  => esc_html__( 'My Services', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.pricing-section .section-heading span',
			'function' => 'html',
		],
	],
] );
//Pricing Color  Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'textarea',
	'settings' => 'pricing_desc',
	'label'    => esc_html__( 'Description', 'noriumportfolio' ),
	'section'  => 'oliva_pricing_area_options',
	'description'=> esc_html__('Description Here', 'noriumportfolio'),
	'default'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra a, sit lorem cursus mauris, mi pharetra sit fermentum Pharetra viverra egestas sed', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.pricing-section p.desc-text',
			'function' => 'html',
		],
	],
] );


//Pricing Custom Table Section
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'custom',
	'settings'    => 'pircing_cutom__table_heading',
	'section'     => 'oliva_pricing_area_options',
	'default'         => '<h3 style="padding:15px 10px; background:#EA4343; color:#fff; text-transform:uppercase; font-weight:bold; margin:0;">' . __( 'Pricing Table', 'noriumportfolio' ) . '</h3>',
	'priority'    => 10,
] );


//Pricing Table Repetar
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Pricing Table', 'noriumportfolio' ),
	'section'     => 'oliva_pricing_area_options',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Pricing Table', 'noriumportfolio' ),
	],
	'button_label' => esc_html__('Add New Table ', 'noriumportfolio' ),
	'settings'     => 'single_pricing_repeater',
	'fields' => [
		'pricing_package_title'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Package Name', 'noriumportfolio' ),
			'description' => esc_html__( 'Add Package Name', 'noriumportfolio' ),
			'default' => 'Basic',
			'transport' => 'postMessage',
			'js_vars'   => [
				[
					'element'  => '.pricing-single h3',
					'function' => 'html',
				],
			],
		],
		'pricing_package_price'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Package Price', 'noriumportfolio' ),
			'description' => esc_html__( 'Add Price Here', 'noriumportfolio' ),
			'default'     => esc_html__('$ 30.00', 'noriumportfolio'),
			'transport' => 'postMessage',
			'js_vars'   => [
				[
					'element'  => '.pricing-single .pricing-rate',
					'function' => 'html',
				],
			],
		],
		'pricing_package_desc'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Package Description', 'noriumportfolio' ),
			'description' => esc_html__( 'Description Here', 'noriumportfolio' ),
			'default'     => esc_html__('Customize Your Single Page', 'noriumportfolio'),
			'transport' => 'postMessage',
			'js_vars'   => [
				[
					'element'  => ' .pricing-single .pricing-body h5',
					'function' => 'html',
				],
			],
		],

		'pricing_package_service'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Package Service Name', 'noriumportfolio' ),
			'default'	=> esc_html__( 'Elementor', 'noriumportfolio' ),
			'transport' => 'postMessage',
			'js_vars'   => [
				[
					'element'  => '.pricing-body span',
					'function' => 'html',
				],
			],
		],



		'pricing_package_service_list'  => [
			'type'        => 'textarea',
			'label'       => esc_html__( 'Package Service List', 'noriumportfolio' ),
			'description' => esc_html__( 'You can use Enter Each line End', 'noriumportfolio' ),
			'default'	=> esc_html__( '1 Page with Elementor', 'noriumportfolio' ),
			'transport' => 'postMessage',
			'js_vars'   => [
				[
					'element'  => '.pricing-item p',
					'function' => 'html',
				],
			],
			
		],
		'pricing_package_service_btn'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Button Text', 'noriumportfolio' ),
			'default'	=> esc_html__( 'Order Now', 'noriumportfolio' ),
			'transport' => 'postMessage',
			'js_vars'   => [
				[
					'element'  => '.pricing-single .b-primary',
					'function' => 'html',
				],
			],
		],
		'pricing_package_service_btn_link'  => [
			'type'        => 'link',
			'label'       => esc_html__( 'Button Link', 'noriumportfolio' ),
			'description' => esc_html__( 'Add Link Here', 'noriumportfolio' ),
			'default'	=> esc_html__( '#', 'noriumportfolio' ),
		],
		'pricing_package_service_delivery'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Delivery Time', 'noriumportfolio' ),
			'default'	=> esc_html__( '2 Days Delivery', 'noriumportfolio' ),
			'transport' => 'postMessage',
			'js_vars'   => [
				[
					'element'  => '.pricing-single .time-out',
					'function' => 'html',
				],
			],
		],
	
	],
	'choices' => [
		'limit' => 3
	],

] );


//////----------------------Blog Area Panel------------------////////

Kirki::add_section( 'oliva_blog_area_options', array(
    'title'          => esc_html__( 'Blog Area', 'noriumportfolio' ),
    'panel'          => 'oliva_front_page_panel',
    'priority'       => 160,
) );

//Blog Area Switcher
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'blog_area_swticher',
	'label'       => esc_html__( 'Enable Blog Area?', 'noriumportfolio' ),
	'section'     => 'oliva_blog_area_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );

//Blog Shap Switcher
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'blog_area_shap_swticher',
	'label'       => esc_html__( 'Show Or Hide Shap?', 'noriumportfolio' ),
	'section'     => 'oliva_blog_area_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );
//Blog Custom Heading Section
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'custom',
	'settings'    => 'blog_cutom_heading',
	'section'     => 'oliva_blog_area_options',
		'default'         => '<h3 style="padding:15px 10px; background:#EA4343; color:#fff; text-transform:uppercase; font-weight:bold; margin:0;">' . __( 'Blog Heading', 'noriumportfolio' ) . '</h3>',
	'priority'    => 10,
] );
//Blog Offset Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'blog_offset_title',
	'label'    => esc_html__( 'Blog Offset Title', 'noriumportfolio' ),
	'section'  => 'oliva_blog_area_options',
	'default'  => esc_html__( 'News', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.blog-section .section-bg-heading',
			'function' => 'html',
		],
	],
] );
//Blog Sub  Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'blog_subtitle',
	'label'    => esc_html__( 'Blog Subtitle', 'noriumportfolio' ),
	'section'  => 'oliva_blog_area_options',
	'default'  => esc_html__( 'our news', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.blog-section .sub-heading',
			'function' => 'html',
		],
	],
] );

//Blog  Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'blog_title',
	'label'    => esc_html__( 'Blog Title', 'noriumportfolio' ),
	'section'  => 'oliva_blog_area_options',
	'default'  => esc_html__( 'LATEST BLOG  ', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.blog-section .section-heading ',
			'function' => 'html',
		],
	],
] );


//Blog Color  Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'blog_color_title',
	'label'    => esc_html__( 'Blog Color Title', 'noriumportfolio' ),
	'section'  => 'oliva_blog_area_options',
	'description'=> esc_html__('If You Need Color Text You Can Type Here', 'noriumportfolio'),
	'default'  => esc_html__( 'POSTS', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.blog-section .section-heading span',
			'function' => 'html',
		],
	],
] );
//Blog Section Description
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'textarea',
	'settings' => 'blog_desc',
	'label'    => esc_html__( 'Description', 'noriumportfolio' ),
	'section'  => 'oliva_blog_area_options',
	'description'=> esc_html__('Description Here', 'noriumportfolio'),
	'default'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra a, sit lorem cursus mauris, mi pharetra sit fermentum Pharetra viverra egestas sed', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.blog-section p.desc-text',
			'function' => 'html',
		],
	],
] );


//////----------------------Contact Area Panel------------------////////

Kirki::add_section( 'oliva_contact_area_options', array(
    'title'          => esc_html__( 'Contact Area', 'noriumportfolio' ),
    'panel'          => 'oliva_front_page_panel',
    'priority'       => 160,
) );

//Contact Area Switcher
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'contact_area_swticher',
	'label'       => esc_html__( 'Enable Contact Area?', 'noriumportfolio' ),
	'section'     => 'oliva_contact_area_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );

//Contact Shap Switcher
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'contact_area_shap_swticher',
	'label'       => esc_html__( 'Show Or Hide Shap?', 'noriumportfolio' ),
	'section'     => 'oliva_contact_area_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );
//Contact Custom Heading Section
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'custom',
	'settings'    => 'contact_cutom_heading',
	'section'     => 'oliva_contact_area_options',
		'default'         => '<h3 style="padding:15px 10px; background:#EA4343; color:#fff; text-transform:uppercase; font-weight:bold; margin:0;">' . __( 'Contact Heading', 'noriumportfolio' ) . '</h3>',
	'priority'    => 10,
] );
//Contact Offset Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'contact_offset_title',
	'label'    => esc_html__( 'Contact Offset Title', 'noriumportfolio' ),
	'section'  => 'oliva_contact_area_options',
	'default'  => esc_html__( 'Contact', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.contact-section .section-bg-heading',
			'function' => 'html',
		],
	],
] );
//Contact Sub  Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'contact_subtitle',
	'label'    => esc_html__( 'Contact Subtitle', 'noriumportfolio' ),
	'section'  => 'oliva_contact_area_options',
	'default'  => esc_html__( 'GET IN TOUCH !', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.contact-section .sub-heading',
			'function' => 'html',
		],
	],
] );

//Contact  Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'contact_title',
	'label'    => esc_html__( 'Contact Title', 'noriumportfolio' ),
	'section'  => 'oliva_contact_area_options',
	'default'  => esc_html__( 'HOW CAN I HELP YOU?  ', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.contact-section .section-heading ',
			'function' => 'html',
		],
	],
] );

//Contact Section Description
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'textarea',
	'settings' => 'contact_desc',
	'label'    => esc_html__( 'Description', 'noriumportfolio' ),
	'section'  => 'oliva_contact_area_options',
	'description'=> esc_html__('Description Here', 'noriumportfolio'),
	'default'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra a, sit lorem cursus mauris, mi pharetra sit fermentum Pharetra viverra egestas sed', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.contact-section p.desc-text',
			'function' => 'html',
		],
	],
] );

// Contact Heading Section
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'custom',
	'settings'    => 'contact_cutom_info_heading',
	'section'     => 'oliva_contact_area_options',
		'default'         => '<h3 style="padding:15px 10px; background:#EA4343; color:#fff; text-transform:uppercase; font-weight:bold; margin:0;">' . __( 'Contact Info', 'noriumportfolio' ) . '</h3>',
	'priority'    => 10,
] );

//Contact Info Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'contat_get_intouch_title',
	'label'    => esc_html__( 'Title', 'noriumportfolio' ),
	'section'  => 'oliva_contact_area_options',
	'default'  => esc_html__( 'Contact Info  ', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.contact-section .section-heading ',
			'function' => 'html',
		],
	],
] );


//Contact Info Repetar
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Contact Information', 'noriumportfolio' ),
	'section'     => 'oliva_contact_area_options',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Contact Information', 'noriumportfolio' ),
	],
	'button_label' => esc_html__('Add New Info ', 'noriumportfolio' ),
	'settings'     => 'contact_single_info_repeater',
	'fields' => [
		'contact_area_info'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Title', 'noriumportfolio' ),
			'description' => esc_html__( 'Add Title', 'noriumportfolio' ),
			'default' => esc_html__( 'Address', 'noriumportfolio' ),
		],
		'contact_area_description'  => [
			'type'        => 'textarea',
			'label'       => esc_html__( 'Location/Email/Phone', 'noriumportfolio' ),
			'description' => esc_html__( 'Add Location/Email/Phone', 'noriumportfolio' ),
			'default'     => esc_html__('Description Here', 'noriumportfolio'),
		],
	
	],
	'choices' => [
		'limit' => 3
	],

] );

//Contact Are Social Section
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'custom',
	'settings'    => 'contact_area_social_heading',
	'section'     => 'oliva_contact_area_options',
		'default'         => '<h3 style="padding:15px 10px; background:#EA4343; color:#fff; text-transform:uppercase; font-weight:bold; margin:0;">' . __( 'Contact Socials', 'noriumportfolio' ) . '</h3>',
	'priority'    => 10,
] );

//Contact Social Switcher
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'switch',
	'settings'    => 'contact_social_area_swticher',
	'label'       => esc_html__( 'Enable Social Area?', 'noriumportfolio' ),
	'section'     => 'oliva_contact_area_options',
	'default'     => 'off',
	'priority'    => 10,
	'choices'     => [
		'on'  => esc_html__( 'Show', 'noriumportfolio' ),
		'off' => esc_html__( 'Hide', 'noriumportfolio' ),
	],
] );


//Contact  Social Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'social_title_contact',
	'label'    => esc_html__( 'Social Title', 'noriumportfolio' ),
	'section'  => 'oliva_contact_area_options',
	'default'  => esc_html__( 'SOCIAL NETWORK', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.contact-sidebar .social-share span ',
			'function' => 'html',
		],
	],
] );


//Contact Social Repetar
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Contact Soical', 'noriumportfolio' ),
	'section'     => 'oliva_contact_area_options',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Social', 'noriumportfolio' ),
	],
	'button_label' => esc_html__('Add New Social ', 'noriumportfolio' ),
	'settings'     => 'contact_social_repeater',
	'fields' => [
		'contact_area_social_icon'  => [
			'type'        => 'select',
			'label'       => esc_html__( 'Icon', 'noriumportfolio' ),
			'description' => esc_html__( 'Select Icon', 'noriumportfolio' ),
			'default' => esc_html__( 'Facebook', 'noriumportfolio' ),
			'choices'     => [
				'fab fa-facebook-f' => esc_html__( 'Facebook', 'noriumportfolio' ),
				'fab fa-whatsapp' => esc_html__( 'Whatsapp', 'noriumportfolio' ),
				'fab fa-linkedin-in' => esc_html__( 'Linkedin', 'noriumportfolio' ),
				'fab fa-twitter' => esc_html__( 'Twitter', 'noriumportfolio' ),
				'fab fa-instagram' => esc_html__( 'Instagram', 'noriumportfolio' ),
				'fab fa-youtube' => esc_html__( 'Youtube', 'noriumportfolio' ),

			],
		],
		'contact_area_social_link'  => [
			'type'        => 'link',
			'label'       => esc_html__( 'Link', 'noriumportfolio' ),
			'description' => esc_html__( 'Add Link Here', 'noriumportfolio' ),
			'default'     => esc_html__('#', 'noriumportfolio'),
		],
	
	],
	'choices' => [
		'limit' => 6
	],

] );

//Contact form Section
Kirki::add_field( 'oliva_customizer_config', [
	'type'        => 'custom',
	'settings'    => 'contact_form_heading',
	'section'     => 'oliva_contact_area_options',
		'default'         => '<h3 style="padding:15px 10px; background:#EA4343; color:#fff; text-transform:uppercase; font-weight:bold; margin:0;">' . __( 'Contact Form', 'noriumportfolio' ) . '</h3>',
	'priority'    => 10,
] );
//Contact  Form Heading
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'text',
	'settings' => 'form_title_contact',
	'label'    => esc_html__( 'Form Title', 'noriumportfolio' ),
	'section'  => 'oliva_contact_area_options',
	'default'  => esc_html__( 'Which Service You Need', 'noriumportfolio' ),
	'priority' => 10,
	'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.contact-form h4 ',
			'function' => 'html',
		],
	],
] );
//Contact  Form shortcode
Kirki::add_field( 'oliva_customizer_config', [
	'type'     => 'editor',
	'settings' => 'contact_form_shortcode',
	'label'    => esc_html__( 'Form Shortcode', 'noriumportfolio' ),
	'section'  => 'oliva_contact_area_options',
	'description'=> esc_html__( 'You Can Use Here Contact Form 7 shortcode', 'noriumportfolio' ),
	'priority' => 10,
] );


}
