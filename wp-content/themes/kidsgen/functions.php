<?php
/**
 * Theme functions and definitions
 *
 * @package kidsgen
 */ 


if ( ! function_exists( 'kidsgen_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function kidsgen_enqueue_styles() {
		wp_enqueue_style( 'kidsvibe-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'kidsgen-style', get_stylesheet_directory_uri() . '/style.css', array( 'kidsvibe-style-parent' ), '1.0.0' );

        // Add custom fonts, used in the main stylesheet.
        wp_enqueue_style( 'kidsgen-fonts', kidsgen_fonts_url(), array(), null );
	}
endif;
add_action( 'wp_enqueue_scripts', 'kidsgen_enqueue_styles', 99 );

if ( ! function_exists( 'kidsgen_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function kidsgen_setup() {

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'social'    => esc_html__( 'Social Menu', 'kidsgen' ),
        ) );
    }
endif;
add_action( 'after_setup_theme', 'kidsgen_setup' );

function kidsgen_customize_register( $wp_customize ) {
    require get_stylesheet_directory() . '/inc/topbar-customizer.php';
}

function kidsgen_do_action() {
    add_action( 'customize_register', 'kidsgen_customize_register' );
    remove_action( 'customize_controls_enqueue_scripts', 'kidsvibe_customize_control_js' );
}
add_action( 'init', 'kidsgen_do_action');

/**
 * Load dynamic logic for the customizer controls area.
 */
function kidsgen_customize_control_js() {
    wp_enqueue_script( 'jquery-ui' );

    // Choose from select jquery.
    wp_enqueue_style( 'jquery-chosen', get_template_directory_uri() . '/assets/css/chosen' . kidsvibe_min() . '.css' );
    wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen' . kidsvibe_min() . '.js', array( 'jquery' ), '1.4.2', true );

    // Choose fontawesome select jquery.
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome' . kidsvibe_min() . '.css' );
    wp_enqueue_style( 'simple-iconpicker', get_template_directory_uri() . '/assets/css/simple-iconpicker' . kidsvibe_min() . '.css' );
    wp_enqueue_script( 'jquery-simple-iconpicker', get_template_directory_uri() . '/assets/js/simple-iconpicker' . kidsvibe_min() . '.js', array( 'jquery' ), '', true );

    // admin script
    wp_enqueue_style( 'kidsvibe-customizer-style', get_template_directory_uri() . '/assets/css/customizer' . kidsvibe_min() . '.css' );
    wp_enqueue_script( 'kidsgen-customizer-controls', get_stylesheet_directory_uri() . '/assets/js/customizer-controls' . kidsvibe_min() . '.js', array( 'jquery', 'jquery-chosen', 'jquery-simple-iconpicker' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'kidsgen_customize_control_js' );

/**
 * Enqueue editor styles for Gutenberg
 */
function kidsgen_block_editor_styles() {
    // Add custom fonts.
    wp_enqueue_style( 'kidsgen-fonts', kidsgen_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'kidsgen_block_editor_styles' );

if ( ! function_exists( 'kidsgen_fonts_url' ) ) :
/**
 * Register Google fonts
 *
 * @return string Google fonts URL for the theme.
 */
function kidsgen_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    /* translators: If there are characters in your language that are not supported by Nunito, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Nunito font: on or off', 'kidsgen' ) ) {
        $fonts[] = 'Nunito:300,400,500,600,700';
    }

    /* translators: If there are characters in your language that are not supported by Pontano Sans, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Pontano Sans font: on or off', 'kidsgen' ) ) {
        $fonts[] = 'Pontano Sans:300,400,500,600,700';
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

// Add class to body.
add_filter( 'body_class', 'kidsgen_add_body_class' );
function kidsgen_add_body_class( $classes ) {
    return array_merge( $classes, array( 'header-font-12', 'body-font-2' ) );
}

if ( ! function_exists( 'kidsgen_theme_defaults' ) ) :
    /**
     * Customize theme defaults.
     *
     * @since 1.0.0
     *
     * @param array $defaults Theme defaults.
     * @param array Custom theme defaults.
     */
    function kidsgen_theme_defaults( $defaults ) {
        $defaults['enable_slider'] = false;
        $defaults['blog_column_type'] = 'column-1';
        $defaults['enable_topbar'] = true;
        $defaults['show_topbar_cart'] = false;
        $defaults['show_social_menu'] = false;
        $defaults['show_top_search'] = true;

        return $defaults;
    }
endif;
add_filter( 'kidsvibe_default_theme_options', 'kidsgen_theme_defaults', 99 );

if ( ! function_exists( 'kidsgen_cart_link' ) ) {
    /**
     * Cart Link
     * Displayed a link to the cart including the number of items present and the cart total
     *
     * @return void
     * @since  1.0.0
     */
    function kidsgen_cart_link() {
        ?>
            <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'kidsgen' ); ?>">
                <?php echo kidsvibe_get_svg( array( 'icon' => 'basket' ) ); ?>
                <?php echo wp_kses_post( WC()->cart->get_cart_subtotal() ); ?> 
                <span class="topbar-count">
                    <?php echo wp_kses_data( sprintf( _n( ' - %d item', ' - %d items', WC()->cart->get_cart_contents_count(), 'kidsgen' ), WC()->cart->get_cart_contents_count() ) ); ?>
                </span>
            </a>
        <?php
    }
}

if ( ! function_exists( 'kidsgen_top_bar' ) ) :
    /**
     * Page starts html codes
     *
     * @since KidsVibe 1.0.0
     */
    function kidsgen_top_bar() { 
        if ( ! kidsvibe_theme_option( 'enable_topbar' ) )
            return;

        $address    = kidsvibe_theme_option( 'topbar_address' );
        $phone      = kidsvibe_theme_option( 'topbar_phone' );
        $email      = kidsvibe_theme_option( 'topbar_email' );
        ?>
        <div id="top-menu">
            <button class="topbar-menu-toggle">
                <?php 
                echo kidsvibe_get_svg( array( 'icon' => 'up', 'class' => 'dropdown-icon' ) );
                echo kidsvibe_get_svg( array( 'icon' => 'down', 'class' => 'dropdown-icon' ) ); 
                ?>
            </button>
            
            <div class="wrapper">
                <div class="secondary-menu">
                    <ul class="menu">
                        <?php if ( ! empty( $address ) ) : ?>
                            <li>
                                <?php 
                                echo kidsvibe_get_svg( array( 'icon' => 'location-o' ) ); 
                                echo esc_html( $address ); 
                                ?>
                            </li>
                        <?php endif;
                        
                        if ( ! empty( $phone ) ) :
                        $phones = explode(',', $phone); ?>
                            <li class="phone">
                                <?php echo kidsvibe_get_svg( array( 'icon' => 'phone-o' ) ); ?>
                                <?php foreach ( $phones as $phone ) : ?>
                                    <a href="<?php echo esc_url( 'tel:' . $phone ); ?>">
                                        <?php echo esc_html( $phone ); ?>
                                    </a>
                                <?php endforeach; ?>
                            </li>
                        <?php endif;
                        
                        if ( ! empty( $email ) ) : ?>
                            <li><a href="<?php echo esc_url( 'mailto:' . $email ); ?>">
                                <?php 
                                echo kidsvibe_get_svg( array( 'icon' => 'envelope-o' ) ); 
                                echo esc_html( $email ); 
                                ?>
                            </a></li>
                        <?php endif;

                        if ( class_exists( 'WooCommerce' ) && kidsvibe_theme_option( 'show_topbar_cart' ) ) : ?>
                            <li class="mini-cart">
                                <?php 
                                kidsgen_cart_link();
                                if ( ! is_cart() && ! is_checkout() ) : ?>
                                    <div class="mini-cart-items">
                                        <?php
                                        $instance = array( 'title' => '' );
                                        the_widget( 'WC_Widget_Cart', $instance );
                                        ?>
                                    </div><!-- .mini-cart-tems -->
                                <?php endif; ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div><!-- .secondary-menu -->

                <?php if ( kidsvibe_theme_option( 'show_top_search' ) ) : ?>
                    <div id="top-search" class="social-menu">
                        <ul>
                            <li>
                                <div id="search"><?php get_search_form(); ?></div>
                                <a href="#" class="search">
                                    <?php echo kidsvibe_get_svg( array( 'icon' => 'search' ) ); ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php endif;

                if ( kidsvibe_theme_option( 'show_social_menu' ) && has_nav_menu( 'social' ) ) : ?>
                    <div class="social-menu">
                        <?php  
                        wp_nav_menu( array(
                            'theme_location'    => 'social',
                            'container'         => false,
                            'menu_class'        => 'menu',
                            'depth'             => 1,
                            'link_before'       => '<span class="screen-reader-text">',
                            'link_after'        => '</span>',
                        ) );
                        ?>
                    </div><!-- .social-menu -->
                <?php endif; ?>
            </div><!-- .wrapper -->
        </div><!-- #top-menu -->
    <?php }
endif;
add_action( 'kidsvibe_page_start_action', 'kidsgen_top_bar', 20 );

if ( ! function_exists( 'kidsvibe_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since KidsVibe 1.0.0
   *
   */
   function kidsvibe_render_slider_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $slider_control = kidsvibe_theme_option( 'slider_arrow' );
        $slider_autoplay = kidsvibe_theme_option( 'slider_autoplay' );
        $slider_btn_label = kidsvibe_theme_option( 'slider_btn_label', '' );
        $slider_opacity = kidsvibe_theme_option( 'slider_opacity', 0 );
        $slider_text = kidsvibe_theme_option( 'slider_text', 'light-text' );
        $slider_wave = kidsvibe_theme_option( 'slider_wave_layout', 'wave' );
        ?>
        <div id="custom-header">
            <div class="section-content banner-slider left-align <?php echo esc_attr( $slider_text ); ?>" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": false, "arrows":<?php echo $slider_control ? 'true' : 'false'; ?>, "autoplay": <?php echo $slider_autoplay ? 'true' : 'false'; ?>, "fade": true, "draggable": true }'>
                <?php foreach ( $content_details as $content ) : ?>
                    <div class="custom-header-content-wrapper slide-item">
                        <?php if ( ! empty( $content['image'] ) ) : ?>
                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                        <?php endif; ?>
                        <div class="overlay" style="opacity: 0.<?php echo absint( $slider_opacity ); ?>"></div>
                        <div class="wrapper">
                            <div class="custom-header-content">
                                 <?php if ( ! empty( $content['sub_title'] ) ) : ?>
                                    <p class="sub-title"><?php echo esc_html( $content['sub_title'] ); ?></p>
                                <?php endif; 

                                if ( ! empty( $content['title'] ) ) : ?>
                                    <h2><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                <?php endif; 

                                if ( ! empty( $content['excerpt'] ) ) : ?>
                                    <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                <?php endif;

                                if ( ! empty( $slider_btn_label ) ) : ?>
                                    <div class="read-more">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $slider_btn_label ); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div><!-- .custom-header-content -->
                        </div>
                    </div><!-- .custom-header-content-wrapper -->
                <?php endforeach; ?>
            </div><!-- .banner-slider -->

            <?php if ( kidsvibe_theme_option( 'enable_slider_wave', false ) ) : ?>
                <div class="wave-saperator">
                    <?php 
                        if ( 'cloud' == $slider_wave ) : ?>
                            <img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/uploads/clouds.png'; ?>">
                        <?php else :
                            echo kidsvibe_get_svg( array( 'icon' => esc_attr( $slider_wave ) ) ); 
                        endif; 
                    ?>
                </div>
            <?php endif; ?>
        </div><!-- #custom-header -->
    <?php 
    }
endif;

