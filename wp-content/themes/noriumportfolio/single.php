<?php

/**
 * The template for displaying all pages
 * Template Name: Sidebar Width Page
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Oliva Personal Portfolio
 */

get_header();
?>

 <div class="page-breadcumb breadcum">
        <div class="container">
            <div class="row">
            <div class="col-lg-12 col-xl-12 col-md-12">
                <div class="oliva-breadcum">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'noriumportfolio');?></a> <a href="<?php esc_url(the_permalink());?>"><?php echo esc_html(get_the_title()) ;?></a>
                </div>
            </div>
        </div>
        </div>
    </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-8 col-md-8">
                    <div class="single-blog-content">
                    	<h2><?php the_title();?></h2>
                    	<div class="blog-thumbnail">
                    		<?php the_post_thumbnail('thumnail');?>
                    	</div>
                    	<?php the_content();?>
                    </div>

                   
                    	<?php
                    		// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
                    	 ?>
                   
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="oliva-sidebar">
                        <?php get_sidebar();?>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php
get_footer();
