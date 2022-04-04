<?php
/**
 * Functions which construct the theme by hooking into WordPress
 *
 * @package kidsvibe
 */


/*------------------------------------------------
            HEADER HOOK
------------------------------------------------*/

if ( ! function_exists( 'kidsvibe_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_doctype() { ?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php }
endif;
add_action( 'kidsvibe_doctype_action', 'kidsvibe_doctype', 10 );

if ( ! function_exists( 'kidsvibe_head' ) ) :
	/**
	 * head Codes
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_head() { ?>
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			<link rel="profile" href="http://gmpg.org/xfn/11">
			<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
				<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
			<?php endif; ?>
			<?php wp_head(); ?>
		</head>
	<?php }
endif;
add_action( 'kidsvibe_head_action', 'kidsvibe_head', 10 );

if ( ! function_exists( 'kidsvibe_body_start' ) ) :
	/**
	 * Body start codes
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_body_start() { ?>
		<body <?php body_class(); ?>>
		<?php do_action( 'wp_body_open' ); ?>
	<?php }
endif;
add_action( 'kidsvibe_body_start_action', 'kidsvibe_body_start', 10 );


if ( ! function_exists( 'kidsvibe_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_page_start() { ?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kidsvibe' ); ?></a>
	<?php }
endif;
add_action( 'kidsvibe_page_start_action', 'kidsvibe_page_start', 10 );


if ( ! function_exists( 'kidsvibe_loader' ) ) :
	/**
	 * loader html codes
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_loader() { 
		if ( ! kidsvibe_theme_option( 'enable_loader' ) )
			return;
		
		$loader = kidsvibe_theme_option( 'loader_type', 'default' )
		?>
		<div id="loader">
            <div class="loader-container">
            	<?php if ( 'default' == $loader ) : ?>
	               	<div id="preloader">
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                </div>
                <?php else : 
                	echo kidsvibe_get_svg( array( 'icon' => esc_attr( $loader ) ) ); 
                endif; ?>
            </div>
        </div><!-- #loader -->
	<?php }
endif;
add_action( 'kidsvibe_page_start_action', 'kidsvibe_loader', 20 );


if ( ! function_exists( 'kidsvibe_cart_link' ) ) {
	/**
	 * Cart Link
	 * Displayed a link to the cart including the number of items present and the cart total
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function kidsvibe_cart_link() {
		?>
			<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'kidsvibe' ); ?>">
				<?php echo kidsvibe_get_svg( array( 'icon' => 'basket' ) ); ?>
				<?php echo wp_kses_post( WC()->cart->get_cart_subtotal() ); ?> 
				<span class="topbar-count">
					<?php echo wp_kses_data( sprintf( _n( ' - %d item', ' - %d items', WC()->cart->get_cart_contents_count(), 'kidsvibe' ), WC()->cart->get_cart_contents_count() ) ); ?>
				</span>
			</a>
		<?php
	}
}


if ( ! function_exists( 'kidsvibe_header_start' ) ) :
	/**
	 * Header starts html codes
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_header_start() { 
		$sticky_header = kidsvibe_theme_option( 'enable_sticky_header' ) ? 'sticky-header' : ''; 
		$header_layout = kidsvibe_theme_option( 'header_layout', 'normal-header' ); 
		$header_layout = in_array( $header_layout, array( 'absolute-header-topbar', 'absolute-header' ) ) ? 'absolute-header' : $header_layout;
		?>
		<header id="masthead" class="site-header <?php echo esc_attr( $header_layout ); ?> <?php echo esc_attr( $sticky_header ); ?>">
		<div class="wrapper">
	<?php }
endif;
add_action( 'kidsvibe_header_start_action', 'kidsvibe_header_start', 10 );


if ( ! function_exists( 'kidsvibe_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_site_branding() { ?>
		<div class="site-menu">
            <div class="container">
				<div class="site-branding">
					<?php
					// site logo
					the_custom_logo();
					?>
					<div class="site-details">
						<?php if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div><!-- .site-details -->
				</div><!-- .site-branding -->
	<?php }
endif;
add_action( 'kidsvibe_site_branding_action', 'kidsvibe_site_branding', 10 );


if ( ! function_exists( 'kidsvibe_primary_nav' ) ) :
	/**
	 * Primary nav codes
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_primary_nav() { ?>
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <span class="screen-reader-text"><?php esc_html_e( 'Menu', 'kidsvibe' ); ?></span>
            <svg viewBox="0 0 40 40" class="icon-menu">
                <g>
                    <rect y="7" width="40" height="2"/>
                    <rect y="19" width="40" height="2"/>
                    <rect y="31" width="40" height="2"/>
                </g>
            </svg>
            <?php echo kidsvibe_get_svg( array( 'icon' => 'close' ) ); ?>
        </button>
		<nav id="site-navigation" class="main-navigation">
			<?php			
			wp_nav_menu( array(
				'theme_location' => 'primary',
    			'container' => 'div',
    			'menu_class' => 'menu nav-menu',
    			'menu_id' => 'primary-menu',
    			'fallback_cb' => 'kidsvibe_menu_fallback_cb',
			) );
			?>
		</nav><!-- #site-navigation -->
		</div><!-- .container -->
        </div><!-- .site-menu -->
	<?php }
endif;
add_action( 'kidsvibe_primary_nav_action', 'kidsvibe_primary_nav', 10 );


if ( ! function_exists( 'kidsvibe_header_ends' ) ) :
	/**
	 * Header ends codes
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_header_ends() { ?>
		</div><!-- .wrapper -->
		</header><!-- #masthead -->
	<?php }
endif;
add_action( 'kidsvibe_header_ends_action', 'kidsvibe_header_ends', 10 );


if ( ! function_exists( 'kidsvibe_site_content_start' ) ) :
	/**
	 * Site content start codes
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_site_content_start() { ?>
		<div id="content" class="site-content">
	<?php }
endif;
add_action( 'kidsvibe_site_content_start_action', 'kidsvibe_site_content_start', 10 );


/**
 * Display custom header title in frontpage and blog
 */
function kidsvibe_custom_header_title() {
	if ( is_home() && is_front_page() ) : 
		$title = kidsvibe_theme_option( 'latest_blog_title', 'Blogs' ); ?>
		<h2><?php echo esc_html( $title ); ?></h2>
	<?php elseif ( is_singular() || ( is_home() && ! is_front_page() ) ): ?>
		<h2><?php single_post_title(); ?></h2>
	<?php elseif ( class_exists( 'WooCommerce' ) && is_shop() ) : ?>
    	<h2><?php woocommerce_page_title(); ?></h2>
    <?php elseif ( is_archive() ) : 
		the_archive_title( '<h2>', '</h2>' );
	elseif ( is_search() ) : ?>
		<h2><?php printf( esc_html__( 'Search Results for: %s', 'kidsvibe' ), get_search_query() ); ?></h2>
	<?php elseif ( is_404() ) :
		echo '<h2>' . esc_html__( 'Oops! That page can&#39;t be found.', 'kidsvibe' ) . '</h2>';
	endif;
}


if ( ! function_exists( 'kidsvibe_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_add_breadcrumb() {
		// Bail if Breadcrumb disabled.
		if ( ! kidsvibe_theme_option( 'enable_breadcrumb' ) ) {
			return;
		}
		
		// Bail if Home Page.
		if ( ! is_home() && is_front_page() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >';
				/**
				 * kidsvibe_breadcrumb hook
				 *
				 * @hooked kidsvibe_breadcrumb -  10
				 *
				 */
				do_action( 'kidsvibe_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
		return;
	}
endif;


if ( ! function_exists( 'kidsvibe_custom_header' ) ) :
	/**
	 * Site content codes
	 *
	 * @since KidsVibe 1.0.0
	 *
	 */
	function kidsvibe_custom_header() {
		if ( ! is_home() && is_front_page() ) {
			return;
		}
		
		$header_layout = kidsvibe_theme_option( 'header_layout', 'normal-header' );
		$image = get_header_image() ? get_header_image() : get_template_directory_uri() . '/assets/uploads/banner.jpg';
		if ( is_singular() ) {
			$image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $image;
		}
		?>

        <div class="inner-header-image <?php echo ( 'absolute-header' == $header_layout ) ? 'inner-header-absolute' : ''; ?>" style="background-image: url( '<?php echo esc_url( $image ); ?>' )">
        	<div class="overlay"></div>
        	<div class="wrapper">
                <div class="custom-header-content">
                    <?php 
                    echo kidsvibe_custom_header_title();
                    kidsvibe_add_breadcrumb(); 
                    ?>
                </div><!-- .custom-header-content -->
        	</div><!-- .wrapper -->
        </div><!-- .custom-header-content-wrapper -->
		<?php
	}
endif;
add_action( 'kidsvibe_site_content_start_action', 'kidsvibe_custom_header', 20 );


/*------------------------------------------------
            FOOTER HOOK
------------------------------------------------*/

if ( ! function_exists( 'kidsvibe_site_content_ends' ) ) :
	/**
	 * Site content ends codes
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_site_content_ends() { ?>
		</div><!-- #content -->
	<?php }
endif;
add_action( 'kidsvibe_site_content_ends_action', 'kidsvibe_site_content_ends', 10 );


if ( ! function_exists( 'kidsvibe_footer_start' ) ) :
	/**
	 * Footer start codes
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_footer_start() { ?>
		<footer id="colophon" class="site-footer">
	<?php }
endif;
add_action( 'kidsvibe_footer_start_action', 'kidsvibe_footer_start', 10 );


if ( ! function_exists( 'kidsvibe_site_info' ) ) :
	/**
	 * Site info codes
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_site_info() { 
		$copyright = kidsvibe_theme_option('copyright_text');
		?>
		<div class="site-info">
            <div class="wrapper">
            	<?php if ( ! empty( $copyright ) ) : ?>
	                <div class="copyright">
	                	<p>
	                    	<?php 
	                    	echo kidsvibe_santize_allow_tags( $copyright ); 
	                    	printf( esc_html__( ' KidsVibe by %1$s Shark Themes %2$s', 'kidsvibe' ), '<a href="' . esc_url( 'http://sharkthemes.com/' ) . '" target="_blank">','</a>' );
	                    	if ( function_exists( 'the_privacy_policy_link' ) ) {
								the_privacy_policy_link( ' | ' );
							}
	                    	?>
	                    </p>
	                </div><!-- .copyright -->
	            <?php endif; 

	            if ( has_nav_menu( 'footer' ) ) : ?>
	                <div class="powered-by">
	                    <?php
							wp_nav_menu( array(
								'theme_location' => 'footer',
			        			'container' => false,
			        			'menu_class' => 'menu nav-menu',
			        			'menu_id' => 'footer-menu',
			        			'fallback_cb' => 'kidsvibe_menu_fallback_cb',
							) );
						?>
	                </div><!-- .powered-by -->
	            <?php endif; ?>
            </div><!-- .wrapper -->    
        </div><!-- .site-info -->
	<?php }
endif;
add_action( 'kidsvibe_site_info_action', 'kidsvibe_site_info', 10 );


if ( ! function_exists( 'kidsvibe_footer_ends' ) ) :
	/**
	 * Footer ends codes
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_footer_ends() { ?>
		</footer><!-- #colophon -->
	<?php }
endif;
add_action( 'kidsvibe_footer_ends_action', 'kidsvibe_footer_ends', 10 );


if ( ! function_exists( 'kidsvibe_slide_to_top' ) ) :
	/**
	 * Footer ends codes
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_slide_to_top() { ?>
		<div class="backtotop">
            <?php echo kidsvibe_get_svg( array( 'icon' => 'up' ) ); ?>
        </div><!-- .backtotop -->
	<?php }
endif;
add_action( 'kidsvibe_footer_ends_action', 'kidsvibe_slide_to_top', 20 );


if ( ! function_exists( 'kidsvibe_page_ends' ) ) :
	/**
	 * Page ends codes
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_page_ends() { ?>
		</div><!-- #page -->
	<?php }
endif;
add_action( 'kidsvibe_page_ends_action', 'kidsvibe_page_ends', 10 );


if ( ! function_exists( 'kidsvibe_body_html_ends' ) ) :
	/**
	 * Body & Html ends codes
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_body_html_ends() { ?>
		</body>
		</html>
	<?php }
endif;
add_action( 'kidsvibe_body_html_ends_action', 'kidsvibe_body_html_ends', 10 );

if ( ! function_exists( 'kidsvibe_infinite_loader' ) ) :
	/**
	 * infinite loader codes
	 *
	 * @since KidsVibe 1.0.0
	 */
	function kidsvibe_infinite_loader() { 
		global $post;
		if ( in_array( kidsvibe_theme_option( 'pagination_type' ), array( 'infinite', 'click' ) ) ) :
			if ( count( ( array ) $post ) > 0 ) {
				echo '<div class="blog-loader">' . kidsvibe_get_svg( array( 'icon' => 'spinner-umbrella' ) ) . '</div>';
			}
		endif;
	}
endif;
add_action( 'kidsvibe_infinite_loader_action', 'kidsvibe_infinite_loader', 10 );

if ( ! function_exists( 'kidsvibe_click_loader' ) ) :
	/**
	 * click loader codes
	 *
	 * @since BlogJr 1.0.0
	 */
	function kidsvibe_click_loader() { 
		global $post;
		if ( 'click' == kidsvibe_theme_option( 'pagination_type' ) ) :
			if ( count( ( array ) $post ) > 0 ) { ?>
				<div class="blog-loader-btn">
					<div class="read-more">
						<a href="#"><?php esc_html_e( 'Load More', 'kidsvibe' ); ?></a>
					</div>
				</div>
			<?php }
		endif;
	}
endif;
add_action( 'kidsvibe_infinite_loader_action', 'kidsvibe_click_loader', 20 );
