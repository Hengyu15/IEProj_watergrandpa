<?php
/**
 * Testimonial hook
 *
 * @package kidsvibe
 */

if ( ! function_exists( 'kidsvibe_add_testimonial_section' ) ) :
    /**
    * Add testimonial section
    *
    *@since KidsVibe 1.0.0
    */
    function kidsvibe_add_testimonial_section() {

        // Check if testimonial is enabled on frontpage
        $testimonial_enable = apply_filters( 'kidsvibe_section_status', 'enable_testimonial', '' );

        if ( ! $testimonial_enable )
            return false;

        // Get testimonial section details
        $section_details = array();
        $section_details = apply_filters( 'kidsvibe_filter_testimonial_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render testimonial section now.
        kidsvibe_render_testimonial_section( $section_details );
    }
endif;

if ( ! function_exists( 'kidsvibe_get_testimonial_section_details' ) ) :
    /**
    * testimonial section details.
    *
    * @since KidsVibe 1.0.0
    * @param array $input testimonial section details.
    */
    function kidsvibe_get_testimonial_section_details( $input ) {

        $content = array();
        $page_ids = array();
        $position = array();

        for ( $i = 1; $i <= 2; $i++ )  :
            $page_id = kidsvibe_theme_option( 'testimonial_content_page_' . $i );

            if ( ! empty( $page_id ) ) :
                $page_ids[] = $page_id;
                $position[] = kidsvibe_theme_option( 'testimonial_position_' . $i );
            endif;

        endfor;
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          =>  ( array ) $page_ids,
            'posts_per_page'    => 2,
            'orderby'           => 'post__in',
            );                    


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 0;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = kidsvibe_trim_content( 35 );
                $page_post['position']  = ! empty( $position[ $i ] ) ? $position[ $i ] : '';
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'thumbnail' ) : '';

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
// testimonial section content details.
add_filter( 'kidsvibe_filter_testimonial_section_details', 'kidsvibe_get_testimonial_section_details' );


if ( ! function_exists( 'kidsvibe_render_testimonial_section' ) ) :
  /**
   * Start testimonial section
   *
   * @return string testimonial content
   * @since KidsVibe 1.0.0
   *
   */
   function kidsvibe_render_testimonial_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $control = kidsvibe_theme_option( 'testimonial_control', false );
        $title = kidsvibe_theme_option( 'testimonial_title', '' );
        $sub_title = kidsvibe_theme_option( 'testimonial_sub_title', '' );
        $i = 1;
        ?>
    	<div class="page-section testimonial-section relative">
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

                <div class="section-content testimonial-slider" data-slick='{"slidesToShow": 2, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": <?php echo $control ? 'true' : 'false'; ?>, "arrows": false, "autoplay": true, "fade": false, "draggable": true }'>
                    <?php foreach ( $content_details as $content ) : 
                        $bg_color = kidsvibe_theme_option( 'testimonial_content_color_' . $i, '#fff' );
                        ?>
                        <article class="hentry slide-item">
                            <div class="post-wrapper" <?php echo ( '#fff' !== $bg_color ) ? 'style="background-color:' . esc_attr( $bg_color ) . '"' : ''; ?>>
                                <span class="quote">
                                    <?php echo kidsvibe_get_svg( array( 'icon' => 'quote-right' ) ); ?>
                                </span>

                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="testimonial-image">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>">
                                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ) ?>">
                                        </a>
                                    </div><!-- .testimonial-image -->
                                <?php endif; ?>

                                <div class="entry-header">
                                    <?php if ( ! empty( $content['title'] ) ) : ?>
                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>
                                    <?php endif; 

                                    if ( ! empty( $content['position'] ) ) : ?>
                                        <p class="position"><?php echo esc_html( $content['position'] ); ?></p>
                                    <?php endif; ?>
                                </div>

                                <div class="entry-container">
                                    <?php if ( ! empty( $content['excerpt'] ) ) : ?>
                                        <div class="entry-content">
                                            <?php echo '"' . wp_kses_post( $content['excerpt'] ) . '"'; ?>
                                        </div><!-- .entry-content -->
                                    <?php endif; ?>
                                </div><!-- .entry-container -->
                            </div><!-- .post-wrapper -->
                        </article>
                    <?php $i++; endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #testimonial-posts -->
    <?php 
    }
endif;