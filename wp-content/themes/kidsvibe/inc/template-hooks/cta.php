<?php
/**
 * Call to action hook
 *
 * @package kidsvibe
 */

if ( ! function_exists( 'kidsvibe_add_cta_section' ) ) :
    /**
    * Add cta section
    *
    *@since KidsVibe 1.0.0
    */
    function kidsvibe_add_cta_section() {

        // Check if cta is enabled on frontpage
        $cta_enable = apply_filters( 'kidsvibe_section_status', 'enable_cta', '' );

        if ( ! $cta_enable )
            return false;

        // Get cta section details
        $section_details = array();
        $section_details = apply_filters( 'kidsvibe_filter_cta_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render cta section now.
        kidsvibe_render_cta_section( $section_details );
    }
endif;

if ( ! function_exists( 'kidsvibe_get_cta_section_details' ) ) :
    /**
    * cta section details.
    *
    * @since KidsVibe 1.0.0
    * @param array $input cta section details.
    */
    function kidsvibe_get_cta_section_details( $input ) {

        $content = array();
        $page_id = kidsvibe_theme_option( 'cta_content_page', '' );
        
        $args = array(
            'post_type' => 'page',
            'page_id' => absint( $page_id ),
            'posts_per_page' => 1,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = kidsvibe_trim_content( 25 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// cta section content details.
add_filter( 'kidsvibe_filter_cta_section_details', 'kidsvibe_get_cta_section_details' );


if ( ! function_exists( 'kidsvibe_render_cta_section' ) ) :
  /**
   * Start cta section
   *
   * @return string cta content
   * @since KidsVibe 1.0.0
   *
   */
   function kidsvibe_render_cta_section( $content_details = array() ) {
        $cta_opacity = kidsvibe_theme_option( 'cta_opacity', 0 );
        $read_more = kidsvibe_theme_option( 'cta_btn_label', esc_html__( 'Explore Us', 'kidsvibe' ) );

        if ( empty( $content_details ) )
            return;

        foreach ( $content_details as $content ) :  ?>
            <div class="page-section cta-section relative center-align" 
                <?php if ( ! empty( $content['image'] ) ) : ?> 
                    style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');"
                <?php endif; ?>>
                <?php if ( ! empty( $content['image'] ) ) : ?> 
                    <div class="overlay" style="opacity: 0.<?php echo absint( $cta_opacity ); ?>"></div>
                <?php endif; ?>
                <div class="wrapper">
                    <?php if ( ! empty( $content['title'] ) ) : ?>
                        <div class="section-header align-center">
                            <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                        </div><!-- .section-header -->
                    <?php endif; ?>

                    <article class="hentry">
                        <div class="post-wrapper">
                            <div class="entry-container">
                                <?php if ( ! empty( $content['excerpt'] ) ) : ?>
                                    <div class="entry-content">
                                        <?php echo wp_kses_post( $content['excerpt'] ); ?>
                                    </div><!-- .entry-content -->
                                <?php endif; ?>
                            </div><!-- .entry-container -->
                            
                            <div class="read-more">
                                <a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $read_more ); ?></a>
                            </div>
                        </div><!-- .post-wrapper -->
                    </article>
                </div><!-- .wrapper -->
            </div><!-- #cta -->
        <?php endforeach;
    }
endif;