<?php
/**
 * oliva personal portfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package noriumportfolio
 */

if ( ! defined( 'noriumportfolio_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'noriumportfolio_S_VERSION', '1.0.8' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function noriumportfolio_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on oliva personal portfolio, use a find and replace
		* to change 'noriumportfolio' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'noriumportfolio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );
	add_theme_support( "align-wide" );
	add_theme_support( "custom-background");
	add_theme_support( "custom-header" );
	add_theme_support( "custom-logo" );
	add_theme_support( "html5" );
 	add_theme_support( "responsive-embeds" );
 	 add_theme_support( "wp-block-styles" );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'noriumportfolio' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'noriumportfolio_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'noriumportfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function noriumportfolio_content_width() {
	$GLOBALS['noriumportfolio_content_width'] = apply_filters( 'noriumportfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'noriumportfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function noriumportfolio_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'noriumportfolio' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'noriumportfolio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2  class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget One', 'noriumportfolio' ),
			'id'            => 'sidebar-one',
			'description'   => esc_html__( 'Add widgets here.', 'noriumportfolio' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Two', 'noriumportfolio' ),
			'id'            => 'sidebar-two',
			'description'   => esc_html__( 'Add widgets here.', 'noriumportfolio' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Three', 'noriumportfolio' ),
			'id'            => 'sidebar-three',
			'description'   => esc_html__( 'Add widgets here.', 'noriumportfolio' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'noriumportfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function noriumportfolio_scripts() {

	wp_enqueue_style( 'allmin', get_template_directory_uri() . '/assets/css/all.min.css', array(), '5.15.4', 'all' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array(), '5.15.4' , 'all');
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/vendors/css/bootstrap.min.css', array(), '5.0.2', 'all' );
	wp_enqueue_style( 'slick-slider', get_template_directory_uri() . '/assets/slick-slider/css/slick.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'popup', get_template_directory_uri() . '/assets/popup-video/css/popup.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'mobile-menu', get_template_directory_uri() . '/assets/css/mobile-menu.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'preloader', get_template_directory_uri() . '/assets/css/preloader.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'dark', get_template_directory_uri() . '/assets/css/dark.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'theme', get_template_directory_uri() . '/assets/css/theme.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'oliva-personal-portfolio-style', get_stylesheet_uri(), array(), noriumportfolio_S_VERSION );
	wp_style_add_data( 'oliva-personal-portfolio-style', 'rtl', 'replace' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/vendors/js/bootstrap.bundle.js', array('jquery'), '5.2.0', true );
	wp_enqueue_script( 'isotop', get_template_directory_uri() . '/assets/js/isotop.min.js', array('jquery'), '3.0.6', true );
	wp_enqueue_script( 'slick-slider', get_template_directory_uri() . '/assets/slick-slider/js/slick.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/popup-video/js/magnific-popup.js', array('jquery'), '1.1.0', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/counter-up/js/jquery.waypoints.min.js', array('jquery'), '4.0.1', true );
	wp_enqueue_script( 'counterup', get_template_directory_uri() . '/assets/counter-up/js/jquery.counterup.min.js', array(), '1.0',  true );
	wp_enqueue_script( 'nav', get_template_directory_uri() . '/assets/js/nav.min.js', array(), '3.0.0',  true );
	wp_enqueue_script( 'typeit', get_template_directory_uri() . '/assets/js/typeit.min.js', array(), '1.0.0',     true );
	wp_enqueue_script( 'mobile-menu', get_template_directory_uri() . '/assets/js/mobile-menu.js', array(), '1.0.0',     true );
	wp_enqueue_script( 'theme', get_template_directory_uri() . '/assets/js/main.js', array(), noriumportfolio_S_VERSION,   true );

	wp_enqueue_script( 'oliva-personal-portfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), noriumportfolio_S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'noriumportfolio_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/tgm/recommended-plugins.php';



/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

