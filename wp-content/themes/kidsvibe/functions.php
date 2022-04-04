<?php
/**
 * KidsVibe functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kidsvibe
 */

if ( ! function_exists( 'kidsvibe_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kidsvibe_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on KidsVibe, use a find and replace
		 * to change 'kidsvibe' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'kidsvibe', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 600, 450, true );
		add_image_size( 'kidsvibe-medium', 500, 500, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' 	=> esc_html__( 'Primary Menu', 'kidsvibe' ),
			'footer' 	=> esc_html__( 'Footer Menu', 'kidsvibe' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'kidsvibe_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add theme support for page excerpt.
		add_post_type_support( 'page', 'excerpt' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 400,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		// Enable support for footer widgets.
		add_theme_support( 'footer-widgets', 4 );

		// Load Footer Widget Support.
		require_if_theme_supports( 'footer-widgets', get_template_directory() . '/inc/footer-widget.php' );

		// Gutenberg support
		add_theme_support( 'editor-color-palette', array(
	       	array(
	           	'name' => esc_html__( 'Valhalla', 'kidsvibe' ),
	           	'slug' => 'valhalla',
	           	'color' => '#2f1b5d',
	       	),
	       	array(
	           	'name' => esc_html__( 'Turquoise', 'kidsvibe' ),
	           	'slug' => 'turquoise',
	           	'color' => '#34ead8',
	       	),
	       	array(
	           	'name' => esc_html__( 'Gray', 'kidsvibe' ),
	           	'slug' => 'gray',
	           	'color' => '#484848',
	       	),
	   	));

		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-font-sizes', array(
		   	array(
		       	'name' => esc_html__( 'small', 'kidsvibe' ),
		       	'shortName' => esc_html__( 'S', 'kidsvibe' ),
		       	'size' => 12,
		       	'slug' => 'small'
		   	),
		   	array(
		       	'name' => esc_html__( 'regular', 'kidsvibe' ),
		       	'shortName' => esc_html__( 'M', 'kidsvibe' ),
		       	'size' => 16,
		       	'slug' => 'regular'
		   	),
		   	array(
		       	'name' => esc_html__( 'large', 'kidsvibe' ),
		       	'shortName' => esc_html__( 'L', 'kidsvibe' ),
		       	'size' => 36,
		       	'slug' => 'larger'
		   	),
		   	array(
		       	'name' => esc_html__( 'extra large', 'kidsvibe' ),
		       	'shortName' => esc_html__( 'XL', 'kidsvibe' ),
		       	'size' => 48,
		       	'slug' => 'huge'
		   	)
		));
		add_theme_support('editor-styles');
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'kidsvibe_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kidsvibe_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kidsvibe_content_width', 819 );
}
add_action( 'after_setup_theme', 'kidsvibe_content_width', 0 );

if ( ! function_exists( 'kidsvibe_fonts_url' ) ) :
/**
 * Register Google fonts
 *
 * @return string Google fonts URL for the theme.
 */
function kidsvibe_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* Header Font */

	/* translators: If there are characters in your language that are not supported by Amatic SC, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Amatic SC font: on or off', 'kidsvibe' ) ) {
		$fonts[] = 'Amatic SC: 200,300,400,500,600,700';
	}

	/* Body Font */

	/* translators: If there are characters in your language that are not supported by News Cycle, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'News Cycle font: on or off', 'kidsvibe' ) ) {
		$fonts[] = 'News Cycle: 300,400,500';
	}

	$query_args = array(
		'family' => urlencode( implode( '|', $fonts ) ),
		'subset' => urlencode( $subsets ),
	);

	if ( $fonts ) {
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
endif;

/**
 * Add preconnect for Google Fonts.
 *
 * @since KidsVibe 1.0.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function kidsvibe_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'kidsvibe-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'kidsvibe_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kidsvibe_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kidsvibe' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'kidsvibe' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Optional Sidebar', 'kidsvibe' ),
		'id'            => 'optional-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'kidsvibe' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Sidebar', 'kidsvibe' ),
		'id'            => 'woocommerce-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'kidsvibe' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'kidsvibe_widgets_init' );

/**
 * Function to detect SCRIPT_DEBUG on and off.
 * @return string If on, empty else return .min string.
 */
function kidsvibe_min() {
	return defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
}

/**
 * Enqueue scripts and styles.
 */
function kidsvibe_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'kidsvibe-fonts', kidsvibe_fonts_url(), array(), null );

	// slick
	wp_enqueue_style( 'jquery-slick', get_template_directory_uri() . '/assets/css/slick' . kidsvibe_min() . '.css' );

	// slick theme
	wp_enqueue_style( 'jquery-slick-theme', get_template_directory_uri() . '/assets/css/slick-theme' . kidsvibe_min() . '.css' );

	// font awesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome' . kidsvibe_min() . '.css' );

	// font awesome
	wp_enqueue_style( 'simple-lightbox', get_template_directory_uri() . '/assets/css/simpleLightbox' . kidsvibe_min() . '.css' );

	// blocks
	wp_enqueue_style( 'kidsvibe-blocks', get_template_directory_uri() . '/assets/css/blocks' . kidsvibe_min() . '.css' );

	wp_enqueue_style( 'kidsvibe-style', get_stylesheet_uri() );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_template_directory_uri() . '/assets/js/html5' . kidsvibe_min() . '.js', array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'kidsvibe-navigation', get_template_directory_uri() . '/assets/js/navigation' . kidsvibe_min() . '.js', array(), '20151215', true );

	$kidsvibe_l10n = array(
		'quote'          => kidsvibe_get_svg( array( 'icon' => 'quote-right' ) ),
		'expand'         => esc_html__( 'Expand child menu', 'kidsvibe' ),
		'collapse'       => esc_html__( 'Collapse child menu', 'kidsvibe' ),
		'icon'           => kidsvibe_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) ),
	);
	wp_localize_script( 'kidsvibe-navigation', 'kidsvibe_l10n', $kidsvibe_l10n );

	wp_enqueue_script( 'kidsvibe-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . kidsvibe_min() . '.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/slick' . kidsvibe_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'jquery-simple-lightbox', get_template_directory_uri() . '/assets/js/simpleLightbox' . kidsvibe_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'kidsvibe-custom', get_template_directory_uri() . '/assets/js/custom' . kidsvibe_min() . '.js', array( 'jquery' ), '20151215', true );

}
add_action( 'wp_enqueue_scripts', 'kidsvibe_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 */
function kidsvibe_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'kidsvibe-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks' . kidsvibe_min() . '.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'kidsvibe-fonts', kidsvibe_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'kidsvibe_block_editor_styles' );

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
* TGM plugin additions.
*/
require get_template_directory() . '/inc/tgm-plugin/tgm-hook.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * WooCommerce plugin compatibility.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * OCDI plugin demo importer compatibility.
 */
if ( class_exists( 'OCDI_Plugin' ) ) {
    require get_template_directory() . '/inc/demo-import.php';
}
