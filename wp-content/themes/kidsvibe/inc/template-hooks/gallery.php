<?php
/**
 * Gallery hook
 *
 * @package kidsvibe
 */

if ( ! function_exists( 'kidsvibe_add_gallery_section' ) ) :
    /**
    * Add gallery section
    *
    *@since KidsVibe 1.0.0
    */
    function kidsvibe_add_gallery_section() {

        // Check if gallery is enabled on frontpage
        $gallery_enable = apply_filters( 'kidsvibe_section_status', 'enable_gallery', '' );

        if ( ! $gallery_enable )
            return false;

        // Get gallery section details
        $section_details = array();
        $section_details = apply_filters( 'kidsvibe_filter_gallery_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render gallery section now.
        kidsvibe_render_gallery_section( $section_details );
    }
endif;

if ( ! function_exists( 'kidsvibe_get_gallery_section_details' ) ) :
    /**
    * gallery section details.
    *
    * @since KidsVibe 1.0.0
    * @param array $input gallery section details.
    */
    function kidsvibe_get_gallery_section_details( $input ) {

        $content = array();
        $post_ids = array();

        for ( $i = 1; $i <= 8; $i++ )  :
            $post_id = kidsvibe_theme_option( 'gallery_content_post_' . $i );

            if ( ! empty( $post_id ) ) :
                $post_ids[] = $post_id;
            endif;
        endfor;
        
        $args = array(
            'post_type'         => 'post',
            'post__in'          => ( array ) $post_ids,
            'posts_per_page'    => 8,
            'orderby'           => 'post__in',
            'ignore_sticky_posts' => true,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 0;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = kidsvibe_trim_content( 15 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ) : '';
                $page_post['large_image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : '';

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
// gallery section content details.
add_filter( 'kidsvibe_filter_gallery_section_details', 'kidsvibe_get_gallery_section_details' );


if ( ! function_exists( 'kidsvibe_render_gallery_section' ) ) :
  /**
   * Start gallery section
   *
   * @return string gallery content
   * @since KidsVibe 1.0.0
   *
   */
   function kidsvibe_render_gallery_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $title = kidsvibe_theme_option( 'gallery_title', '' );
        $sub_title = kidsvibe_theme_option( 'gallery_sub_title', '' );

        ?>
    	<div id="gallery" class="page-section relative">
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

                <div class="section-content column-4">
                    <?php foreach ( $content_details as $content ) : ?>
                        <?php if ( ! empty( $content['image'] ) ) : ?>
                            <article class="hentry">
                                <div class="post-wrapper">
                                    <div class="gallery">
                                        <div class="featured-image">
                                            <a href="<?php echo esc_url( $content['url'] ); ?>">
                                                <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                                            </a>

                                            <div class="overlay">
                                                <a class="more-btn" href="<?php echo esc_url( $content['url'] ); ?>">
                                                    <i class="fa fa-chain"></i>
                                                </a>

                                                <a class="more-btn gallery-view" href="<?php echo esc_url( $content['large_image'] ); ?>">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div><!-- .featured-image -->
                                    </div><!-- .gallery -->
                                </div><!-- .post-wrapper -->
                            </article>
                        <?php endif; ?> 
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #gallery -->
    <?php 
    }
endif;