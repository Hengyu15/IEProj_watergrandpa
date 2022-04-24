<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package norium_portfolio
 */

?>
</div>
    <!-- footer section start -->
    <div class="footer-section top-spacing pos-relative">
        <footer>
            <div class="container">
                <div class="row align-items-center">

                    <?php if(is_active_sidebar('sidebar-one')) : ?>
                    <div class="col-xl-4 col-lg-4">
                        <div class="footer-child mb-4 mb-lg-0">
                            <?php dynamic_sidebar('sidebar-one');?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(is_active_sidebar('sidebar-two')) : ?>
                    <div class="col-xl-4 col-lg-4">
                        <div class="footer-child text-lg-center mb-4 mb-lg-0">
                            <?php dynamic_sidebar('sidebar-two');?>          
                        </div>
                    </div>
                      <?php endif; ?>
                    <?php if(is_active_sidebar('sidebar-three')) : ?>
                    <div class="col-xl-4 col-lg-4">
                        <div class="footer-child ">
                            <div class="footer-contact">
                                <?php dynamic_sidebar('sidebar-three');?>
                            </div>
                        </div>
                    </div>
                      <?php endif; ?>
                </div>
            </div>
            <!-- footer bottom -->
            <?php if(get_theme_mod('footer_switcher',  true) == true):?>
            <div class="container-fluid coppyright-section">
                <div class="row justify-content-center">
                    <div class="col-xl-4">
                        <div class="footer-bottom text-center">

                            <p>
                                <?php
                                $oliva_footer_copyright_text = get_theme_mod('footer_text');
                            ?>
                            <?php if(!empty($oliva_footer_copyright_text)) : ?>
                                <?php echo esc_html($oliva_footer_copyright_text, 'noriumportfolio'); ?>
                                <?php
                                /* translators: 1: Theme name, 2: Theme author. */
                                printf( esc_html__( 'Theme %2$s  By  %1$s', 'noriumportfolio' ), '<a href="#" >ordainIT</a>' , '<a href="#">Norium Portfolio</a>' );?>
                            <?php else : ?>
                                <?php esc_html_e('&copy; All Right Reserved ','noriumportfolio'); bloginfo('title');?> <?php echo  esc_html(date_i18n( __( 'Y' , 'noriumportfolio' ) ));?>
                                <?php
                                /* translators: 1: Theme name, 2: Theme author. */
                                printf( esc_html__( 'Theme %2$s  By  %1$s', 'noriumportfolio' ), '<a href="#"  >OrdainIT</a>' , '<a href="#">Norium Portfolio</a>' );?>
                            <?php endif; ?>
                            </p>


                            



                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
        </footer>
        <div class="footer-shape">
            <div class="footer-shape-1">
                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/footer-1.svg" alt="image here">
            </div>            
            <div class="footer-shape-2">
                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/footer-1.svg" alt="image here">
            </div>                       
            <div class="footer-shape-4">
                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/footer-3.svg" alt="image here">
            </div>            
            <div class="footer-shape-5">
                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/pricing-1.svg" alt="image here">
            </div>            
            <div class="footer-shape-6">
                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/pricing-1.svg" alt="image here">
            </div>           
        </div>
        <!-- scroll to up button -->
        <a href="#" class="to-top"><i class="fas fa-long-arrow-alt-up"></i></a>
    </div>
    <!-- footer section ends -->
    </div><!-- #page -->

   <?php wp_footer();?>


</body>
</html>
