<?php
/**
 * Service hook
 *
 * @package kidsvibe
 */

if ( ! function_exists( 'kidsvibe_add_service_section' ) ) :
    /**
    * Add service section
    *
    *@since KidsVibe 1.0.0
    */
    function kidsvibe_add_service_section() {

        // Check if service is enabled on frontpage
        $service_enable = apply_filters( 'kidsvibe_section_status', 'enable_service', '' );

        if ( ! $service_enable )
            return false;

        // Get service section details
        $section_details = array();
        $section_details = apply_filters( 'kidsvibe_filter_service_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render service section now.
        kidsvibe_render_service_section( $section_details );
    }
endif;

if ( ! function_exists( 'kidsvibe_get_service_section_details' ) ) :
    /**
    * service section details.
    *
    * @since KidsVibe 1.0.0
    * @param array $input service section details.
    */
    function kidsvibe_get_service_section_details( $input ) {

        $content = array();
        $page_ids = array();
        $icons = array();

        for ( $i = 1; $i <= 6; $i++ )  :
            $page_id = kidsvibe_theme_option( 'service_content_page_' . $i );

            if ( ! empty( $page_id ) ) :
                $page_ids[] = $page_id;
                $icons[] = kidsvibe_theme_option( 'service_icon_' . $i );
            endif;

        endfor;
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          =>  ( array ) $page_ids,
            'posts_per_page'    => 6,
            'orderby'           => 'post__in',
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 0;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = kidsvibe_trim_content( 15 );
                $page_post['icon']      = ! empty( $icons[ $i ] ) ? $icons[ $i ] : 'fa-laptop';

                // Push to the main array.
                array_push( $content, $page_post );
                $i++;
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// service section content details.
add_filter( 'kidsvibe_filter_service_section_details', 'kidsvibe_get_service_section_details' );


if ( ! function_exists( 'kidsvibe_render_service_section' ) ) :
  /**
   * Start service section
   *
   * @return string service content
   * @since KidsVibe 1.0.0
   *
   */
   function kidsvibe_render_service_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $title = kidsvibe_theme_option( 'service_title', '' );
        $sub_title = kidsvibe_theme_option( 'service_sub_title', '' );
        $i = 1;
        ?>
    	<div class="our-services multicolor page-section relative center-align">
            <div class="wrapper">
                <?php if ( ! empty( $title ) || ! empty( $sub_title ) ) : ?>
                    <div class="section-header align-center">
                        <?php if ( ! empty( $sub_title ) ) : ?>
                            <p class="sub-title"><?php echo esc_html( $sub_title ); ?></p>
                        <?php endif;

                        if ( ! empty( $title ) ) : ?>
                            <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
                        <?php endif; ?>

                        <div class="title-separator"></div>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="section-content column-3">
                    <?php foreach ( $content_details as $content ) : 
                        $bg_color = kidsvibe_theme_option( 'service_content_color_' . $i, '#ffffff' );
                        ?>
                        <article class="hentry">
                            <div class="post-wrapper" <?php echo ( '#ffffff' !== $bg_color ) ? 'style="background-color:' . esc_attr( $bg_color ) . '"' : ''; ?>>
                                <?php if ( ! empty( $content['icon'] ) ) : ?>
                                    <div class="service">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>">
                                            <i class="fa <?php echo esc_attr( $content['icon'] ); ?>" ></i>
                                        </a>
                                    </div><!-- .service -->
                                <?php endif; ?>

                                <div class="entry-container">
                                    <?php if ( !empty( $content['title'] ) ) : ?>
                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>
                                    <?php endif;

                                    if ( !empty( $content['excerpt'] ) ) : ?>
                                        <div class="entry-content">
                                            <?php echo wp_kses_post( $content['excerpt'] ); ?>
                                        </div><!-- .entry-content -->
                                    <?php endif; ?>
                                </div><!-- .entry-container -->

                            </div><!-- .post-wrapper -->
                        </article>
                    <?php $i++; endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #our-services -->
    <?php 
    }
endif;