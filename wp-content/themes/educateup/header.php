<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EducateUp
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
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'educateup' ); ?></a>
	<header id="masthead" class="site-header <?php echo esc_attr( ( is_front_page() && ! is_home() ) ? 'site-header-fixed' : '' ); ?>">
		<div class="container">
			<?php if ( get_theme_mod( 'educateup_enable_top_bar', true ) ) { ?>
				<div class="site-header-top">
					<div class="site-header-top-info">
					<?php
					$contact_number = get_theme_mod( 'educateup_contact_number' );
					if ( ! empty( $contact_number ) ) {
						?>
						<span class="pe-4"><a href="tel:<?php echo esc_attr( $contact_number ); ?>"><em class="bi bi-telephone"></em> <?php echo esc_html( $contact_number ); ?></a></span>
						<?php
					}
					?>
					</div>
					<div class="site-header-top-links">
						<?php
						if ( has_nav_menu( 'social' ) ) {
							wp_nav_menu(
								array(
									'menu_class'     => 'menu social-links',
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>',
									'theme_location' => 'social',
								)
							);
						}
						?>
						<!-- inline links -->
						<div class="links-inline">
							<?php if ( class_exists( 'woocommerce' ) ) { ?>
								<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>"><em class="bi bi-person"></em></a>
								<a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><em class="bi bi-cart"></em></a>
							<?php } ?>
							<?php if ( get_theme_mod( 'educateup_enable_search_form', true ) ) { ?>
								<a href="#" id="search-modal-btn"><em class="bi bi-search"></em></a>
								<div class="search-modal">
									<button class="search-modal_close-btn"><em class="bi bi-x-circle-fill"></em></button>
									<div class="search-modal-container">
										<?php get_search_form(); ?>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div> 
			<?php } ?>
			<div class="site-header-bottom shadow">
				<div class="site-branding">
					<div class="site-logo">
						<?php the_custom_logo(); ?>
					</div>
					<div class="site-branding-details">
						<?php
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						$educateup_description = get_bloginfo( 'description', 'display' );
						if ( $educateup_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $educateup_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						<?php endif; ?>
					</div>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<button id="nav-icon" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</button>
					<!-- main-menu -->
					<div class="main-menu">
						<?php
						if ( has_nav_menu( 'primary' ) ) {
							wp_nav_menu(
								array(
									'theme_location' => 'primary',
								)
							);
						}
						?>
					</div>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</header><!-- #masthead -->
	<?php if ( ! is_front_page() || is_home() ) { ?>
		<div id="content" class="site-content">
			<div class="container">
				<div class="row">
	<?php } ?>
