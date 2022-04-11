<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PridMag
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pridmag' ); ?></a>

	<?php if ( get_theme_mod( 'pridmag_header_image_position', 'before-header' ) === 'before-header' ) { pridmag_header_image(); } ?>

	<header id="masthead" class="site-header">
		<div class="th-container">
			<div class="site-branding">
				<?php if( has_custom_logo() ) : ?>
					<div class="th-site-logo">
						<?php the_custom_logo(); ?>
					</div><!-- .th-site-logo -->
				<?php endif; ?>
				
				<div class="th-site-title">
				
					<?php if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$pridmag_description = get_bloginfo( 'description', 'display' );
					if ( $pridmag_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $pridmag_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div><!-- .th-site-title -->
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
				<?php if ( true == get_theme_mod( 'pridmag_show_search', true ) ) : ?>
					<div class="th-search-button-icon"></div>
					<div class="th-search-box-container">
						<div class="th-search-box">
							<?php get_search_form(); ?>
						</div><!-- th-search-box -->
					</div><!-- .th-search-box-container -->
				<?php endif; ?>
			</nav><!-- #site-navigation -->
		</div><!-- .th-container -->
	</header><!-- #masthead -->

	<?php if ( is_active_sidebar( 'header-sidebar' ) ) : ?>
		<div class="th-header-sidebar">
			<?php dynamic_sidebar( 'header-sidebar' ); ?>
		</div><!--.th-header-sidebar -->
	<?php endif; ?>

	<?php if ( get_theme_mod( 'pridmag_header_image_position', 'before-header' ) === 'after-header' ) { pridmag_header_image(); } ?>

	<div id="content" class="site-content">
		<div class="th-container">