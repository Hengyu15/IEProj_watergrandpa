<?php
/**
 * Slider hook
 *
 * @package kidsvibe
 */

if ( ! function_exists( 'kidsvibe_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since KidsVibe 1.0.0
    */
    function kidsvibe_add_slider_section() {

        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'kidsvibe_section_status', 'enable_slider', '' );

        if ( ! $slider_enable )
            return false;

        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'kidsvibe_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render slider section now.
        kidsvibe_render_slider_section( $section_details );
    }
endif;

if ( ! function_exists( 'kidsvibe_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since KidsVibe 1.0.0
    * @param array $input slider section details.
    */
    function kidsvibe_get_slider_section_details( $input ) {

        // Content type.
        $content = array();
        $page_ids = array();
        $subtitle = array();

        for ( $i = 1; $i <= 5; $i++ )  :
            $page_id = kidsvibe_theme_option( 'slider_content_page_' . $i );

            if ( ! empty( $page_id ) ) :
                $page_ids[] = $page_id;
                $subtitle[] = kidsvibe_theme_option( 'slider_sub_title_' . $i );
            endif;
        endfor;
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 5,
            'orderby'           => 'post__in',
            ); 

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 0;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['sub_title'] = ! empty( $subtitle[ $i ] ) ? $subtitle[ $i ] : '';;
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = kidsvibe_trim_content( 10 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

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
// slider section content details.
add_filter( 'kidsvibe_filter_slider_section_details', 'kidsvibe_get_slider_section_details' );


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
            <div class="section-content banner-slider center-align <?php echo esc_attr( $slider_text ); ?>" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": false, "arrows":<?php echo $slider_control ? 'true' : 'false'; ?>, "autoplay": <?php echo $slider_autoplay ? 'true' : 'false'; ?>, "fade": true, "draggable": true }'>
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