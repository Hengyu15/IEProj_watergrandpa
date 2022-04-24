<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package norium_portfolio
 */
$image_id = get_post_thumbnail_id();
$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);

?>



	<!-- Single Post Start -->
    <div class="col-xl-6 col-lg-6 col-md-12 mb-4">
        <div class="blog-single pos-relative">
            <div class="blog-inner">
                <div class="blog-thumb">
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), '')) ;?>" alt="<?php echo esc_attr($image_alt);?>" class="img-fluid">
                </div>
                <div class="blog-title">
                    <h4 class="text-white"><?php the_title();?></h4>

                </div>
            </div>
            <div class="blog-single-overly">
                <span>
                <?php the_category();?>
                </span>
                <h4 class="text-white pb-40"><a href="<?php esc_url(the_permalink());?>"><?php the_title();?></a></h4>
                    <p><?php
                        $excerpt = get_the_excerpt(); 
 
                        $excerpt = substr( $excerpt, 0, 100 );
                        $result = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
                         
                     echo esc_html($result);?> </p>
                <a href="<?php esc_url(the_permalink());?>" class="btn-theme pb-20"><?php echo esc_html('Read More', 'noriumportfolio');?> <i class="fas fa-long-arrow-alt-right"></i></a>
                <div class="meta-desc d-flex justify-content-between pt-20">
                    <div class="blog-date pos-relative">
                        <p><?php echo  get_the_date( 'l F j, Y' );?></p>
                    </div>
                    <div class="blog-author">
                        <p><?php echo esc_html('By ', 'noriumportfolio');?> <?php the_author();?></p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Single Post end -->


