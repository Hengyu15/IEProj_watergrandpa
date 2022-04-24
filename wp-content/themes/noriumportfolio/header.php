<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package norium_portfolio
 */
$pcolor = get_theme_mod('norium_theme_primary_color');
$scolor = get_theme_mod('norium_theme_secondary_color');

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
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'noriumportfolio' ); ?></a>
	<?php if(get_theme_mod('dark_light_switcher')==true):?>
	<!-- Dark Mode Area -->
    <div class="darkmode">           
        <span class="change"> <?php echo esc_html('Light', 'noriumportfolio');?></span>
    </div>
    <!-- Dark Mode ends -->
<?php endif;?>
	<header id="masthead" class="site-header customizer_header">

        <!-- <div class="mobile-menu">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'mobile-menu',
					)
				);
			?>
			<div class="close"><i class="fas fa-times-circle"></i></div>
		</div> -->
            <?php if(true == get_theme_mod( 'header_to_switcher', true )):?>
            <div class="top-header">
                <div class="container">
                    <div class="top-header-inner d-flex align-items-center justify-content-between">
                        <?php
                                $header_top_contact_infos = get_theme_mod( 'header_contact_info_switcher' );
                                if(!empty($header_top_contact_infos)):
                            ?>
                        <div class="header-contact">
                            <ul>
                                
                                <?php foreach($header_top_contact_infos as $header_top_contact_info):
                                    ?>
                                <li>
                                    <?php if(!empty($header_top_contact_info['header_top_icon'])):?>
                                    <i class="<?php echo esc_attr($header_top_contact_info['header_top_icon']); ?>"></i>
                                <?php endif;?>

                                    <span> <?php echo esc_html($header_top_contact_info['header_top_text'], 'noriumportfolio');?></span>
                                </li>
                            <?php endforeach;?>
                            </ul>
                        </div>
                    <?php endif;?>
                        <?php
                             $header_top_social_items = get_theme_mod('header_top_social_items');
                             if($header_top_social_items):
                         ?>
                        <div class="social-icon">
                            <ul>
                            <?php
                               
                                foreach($header_top_social_items as $header_top_social_item):
                            ?>
                                <li>
                                    <a href="<?php echo esc_attr($header_top_social_item['header_top_social_link'], 'noriumportfolio');?>">
                                        <i class="<?php echo esc_attr($header_top_social_item['header_top_social_icon'], 'noriumportfolio');?>"></i>
                                    </a>
                                </li>
                            <?php endforeach;?>
                            </ul>
                        </div>
                    <?php endif;?>
                    </div>
                </div>
            </div>
        <?php endif;?>
        <div class="main-header-menu">
	        <div class="container">
				<div class="row">
					<div class="col-lg-4 col-xl-4 col-md-4 col-sm-6 col">
								<div class="site-branding">
							<?php
							
							  	the_custom_logo();
								if ( is_front_page() && is_home() ) :
									?>
									<h1  class="site-title"><a style="color: <?php echo esc_attr($pcolor);?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
								else :
									?>
									<h1  class="site-title"><a style="color: <?php echo esc_attr($pcolor);?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
								endif;
								$norium_portfolio_description = get_bloginfo( 'description', 'display' );
								if ( $norium_portfolio_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo $norium_portfolio_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
								<?php endif; 							?>
						</div><!-- .site-branding -->
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col text-right">
						<nav id="site-navigation" class="main-navigation">
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="dbar fas fa-bars"></i><i class="mclose fas fa-times"></i></button>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
							<div class="off_canvars_overlay"></div>
						</nav><!-- #site-navigation -->

						<!-- <div class="menu-toggle">
							<i class="fas fa-align-right"></i>
						</div> -->
					</div>
				</div>
	        </div>
        </div>
	</header><!-- #masthead -->

<main id="primary" class="site-main">
