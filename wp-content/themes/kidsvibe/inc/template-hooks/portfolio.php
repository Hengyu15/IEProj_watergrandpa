<?php
/**
 * Portfolio hook
 *
 * @package kidsvibe
 */

if ( ! function_exists( 'kidsvibe_add_portfolio_section' ) ) :
    /**
    * Add portfolio section
    *
    *@since KidsVibe 1.0.0
    */
    function kidsvibe_add_portfolio_section() {

        // Check if portfolio is enabled on frontpage
        $portfolio_enable = apply_filters( 'kidsvibe_section_status', 'enable_portfolio', '' );

        if ( ! $portfolio_enable )
            return false;

        // Get portfolio section details
        $section_details = array();
        $section_details = apply_filters( 'kidsvibe_filter_portfolio_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render portfolio section now.
        kidsvibe_render_portfolio_section( $section_details );
    }
endif;

if ( ! function_exists( 'kidsvibe_get_portfolio_section_details' ) ) :
    /**
    * portfolio section details.
    *
    * @since KidsVibe 1.0.0
    * @param array $input portfolio section details.
    */
    function kidsvibe_get_portfolio_section_details( $input ) {

        $content = array();
        $post_ids = array();

        for ( $i = 1; $i <= 6; $i++ )  :
            $post_id = kidsvibe_theme_option( 'portfolio_content_post_' . $i );

            if ( ! empty( $post_id ) ) :
                $post_ids[] = $post_id;
            endif;
        endfor;
        
        $args = array(
            'post_type'         => 'post',
            'post__in'          => ( array ) $post_ids,
            'posts_per_page'    => 6,
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
// portfolio section content details.
add_filter( 'kidsvibe_filter_portfolio_section_details', 'kidsvibe_get_portfolio_section_details' );


if ( ! function_exists( 'kidsvibe_render_portfolio_section' ) ) :
  /**
   * Start portfolio section
   *
   * @return string portfolio content
   * @since KidsVibe 1.0.0
   *
   */
   function kidsvibe_render_portfolio_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $title = kidsvibe_theme_option( 'portfolio_title', '' );
        $sub_title = kidsvibe_theme_option( 'portfolio_sub_title', '' );
        $i = 1;
        ?>
    	<div id="portfolio" class="page-section relative">
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
                        $bg_color = kidsvibe_theme_option( 'portfolio_content_color_' . $i, '#ffffff' );
                        ?>
                        <article class="hentry">
                            <div class="post-wrapper" <?php echo ( '#ffffff' !== $bg_color ) ? 'style="background-color:' . esc_attr( $bg_color ) . '"' : ''; ?>>
                                <div class="gallery">
                                    <?php if ( ! empty( $content['image'] ) ) : ?>
                                        <div class="featured-image">
                                            <a href="<?php echo esc_url( $content['url'] ); ?>">
                                                <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                                            </a>
                                        </div>
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
                                    </div>
                                </div><!-- .gallery -->
                            </div><!-- .post-wrapper -->
                        </article>
                    <?php $i++; endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #gallery -->
    <?php 
    }
endif;