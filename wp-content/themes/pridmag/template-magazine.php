<?php
/**
 * Template Name: Magazine Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PridMag
 */

get_header();
?>

    <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>

    <?php if ( !is_active_sidebar( 'featured-sidebar' ) && !is_active_sidebar( 'magazine-sidebar-1' ) && !is_active_sidebar( 'magazine-sidebar-2' ) && !is_active_sidebar( 'magazine-sidebar-3' ) && !is_active_sidebar( 'magazine-sidebar-4' ) ) : ?>
        <div class="th-instructions">
            <p>
                <?php esc_html_e( 'Please go to Appearance &#8594; Widgets OR Appearance &#8594; Customize &#8594; Widgets and add widgets to the "Featured Content Area", "Magazine Top Content", "Magazine Mid Left Content" and "Magazine Mid Right Content" widget areas.
                You can use TH: Magazine Posts widgets to set up the theme like the demo website. If you want more information please read the theme documentaion.', 'pridmag' ); ?>
            </p>
        </div>
    <?php endif; ?>

    <?php endif; ?>

    <div class="pm-featured-content-area">
        <?php
            if ( is_active_sidebar( 'featured-sidebar' ) ) {
                dynamic_sidebar( 'featured-sidebar' );
            }
        ?>
    </div><!-- .pm-featured-content-area -->

    <div class="pm-magazine-top">
        <?php
            if ( is_active_sidebar( 'magazine-sidebar-1' ) ) {
                dynamic_sidebar( 'magazine-sidebar-1' );
            }
        ?>
    </div><!-- .pm-magazine-top -->

	<div class="pm-magazine-mid-left">
		<?php
            if ( is_active_sidebar( 'magazine-sidebar-2' ) ) {
                dynamic_sidebar( 'magazine-sidebar-2' );
            }
		?>
    </div><!-- .pm-magazine-mid-left -->

    <div class="pm-magazine-mid-right">
        <?php 
            if ( is_active_sidebar( 'magazine-sidebar-3' ) ) {
                dynamic_sidebar( 'magazine-sidebar-3' );
            }
        ?>
    </div><!-- .pm-magazine-mid-right -->

    <div class="pm-magazine-bottom">
        <?php
            if ( is_active_sidebar( 'magazine-sidebar-4' ) ) {
                dynamic_sidebar( 'magazine-sidebar-4' );
            }
        ?>   
    </div><!-- .pm-magazine-bottom -->

<?php

get_footer();