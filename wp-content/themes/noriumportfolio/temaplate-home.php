<?php

/*

Template Name: Front Page

*/

get_header();

 ?>

 <?php if(get_theme_mod('banner_area_swticher', true)==true):?>

  <!-- banner-section start -->

    <div class="banner-section section-padding pos-relative" id="home">

        <div class="container">

            <div class="row pt-30">

                <div class="col-xl-7 col-lg-7">

                    <div class="banner-content">

                        <span class="banner-sub-heading text-type pb-15">

                            <?php echo esc_html(get_theme_mod('banner_subtitle'));?>  

                        </span>

                        <h1 class="banner-heaadig pb-10 d-block">

                            <?php echo esc_html(get_theme_mod('banner_title'));?>  

                        </h1>

                        <h2 class="focus-text pb-40">

                            <?php echo esc_html(get_theme_mod('banner_designation'));?>

                            </h2>

                        <p class="desc-text banner-text">

                            <?php echo esc_html(get_theme_mod('banner_desc'));?>   

                        </p>

                        <div class="banner-counter d-flex align-items-center justify-content-start">

                            <?php

                                $banner_working_ex = get_theme_mod('banner_working_ex');

                                if(!empty($banner_working_ex)): 

                                foreach($banner_working_ex as $banner_working_exs):

                                

                            ?>

                            <div class="counter-box">

                                <span class="counter">

                                    <?php echo esc_html($banner_working_exs['ex_number'], 'noriumportfolio');?> 

                                </span>

                                <div class="counter-info">

                                   <?php echo wpautop($banner_working_exs['ex_name']);?>

                                </div>

                            </div>

                            <?php  endforeach; endif;?> 

                        </div>

                        <div class="banner-btn pt-60 pos-relative">

                            

                            <a href="<?php echo esc_url(get_theme_mod('banner_btn_link'));?>" class="b-primary mb-5 mb-sm-0"><?php echo esc_html(get_theme_mod('banner_btn'), 'noriumportfolio');?> <i class="fas fa-envelope pl-10"></i></a>

                            



                             <?php if(!empty(get_theme_mod('banner_popup_video_btn_link'))):

                                $url = get_theme_mod('banner_popup_video_btn_link');

                               

                                ?>

                           <a id="play-btn"  href="<?php echo esc_url($url);?>" class="play-btn" data-effect="mfp-zoom-in"><i class="fas fa-play"></i></a>

                            <?php endif;?>

                            

                        </div>

                    </div>

                </div>



                <?php

                     $bannar_img= get_theme_mod('bannar_right_image');

                     if(!empty($bannar_img)): 

                ?>

                <div class="col-xl-5 col-lg-5">

                    <div class="thumbbail-wrap">

                        <div class="side-thumbnail pos-relative">

                            <div class="thumb-1">

                                <img src="<?php echo esc_url($bannar_img['url']);?>" alt="image here" class="img-fluid">

                            </div>

                            <div class="shape-white">

                                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape-white.png" alt="image here" class="img-fluid">

                            </div>                            

                            <div class="shape-dark">

                                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape-dark.png" alt="image here" class="img-fluid">

                            </div>

                        </div>

                    </div>

                </div>

            <?php endif;?>

            </div>

        </div>

        <?php if(get_theme_mod('banner_area_shap_swticher', true)==true):?>

        <div class="shape ball-1">

            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/frame-1.svg" alt="shape here">

        </div>        

        <div class="shape ball-2">

            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/frame-2.svg" alt="shape here">

        </div>        

        <div class="shape ball-3">

            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/frame-3.svg" alt="shape here">

        </div>        

        <div class="shape ball-4">

            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/frame-4.svg" alt="shape here">

        </div>        

        <div class="shape ball-5">

            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/frame-5.svg" alt="shape here">

        </div>        

        <div class="shape ball-6">

            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/frame-6.svg" alt="shape here">

        </div>        

        <div class="shape ball-7">

            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/frame-7.svg" alt="shape here">

        </div>        

        <div class="shape ball-8">

            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/frame-8.svg" alt="shape here">

        </div>             

        <div class="shape ball-11">

            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/ellipse-2.svg" alt="shape here">

        </div>        

        <div class="shape ball-22">

            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/ellipse-3.svg" alt="shape here">

        </div>        

        <div class="shape ball-33">

            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/elipse-5.svg" alt="shape here">

        </div>

    <?php endif;?>

    </div>

    <!-- banner-section ends -->

<?php endif;?>



    <?php 

        $about_left_image= get_theme_mod('about_left_image');

        $about_left_dark_image= get_theme_mod('about_left_image_dark');

        if(get_theme_mod('about_area_swticher', true)==true):

    ?>

    <!-- aboutus section start -->

    <div class="aboutus-section pos-relative" id="about">

        <div class="container-fluid">

            <div class="aboutus-inner">

                <?php

                    



                    if(!empty($about_left_image)):?>

                <div class="aboutus-thumb-section pos-relative mb-5 mb-lg-0">

                    <div class="aboutus-bg-shape">

                        <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape-2.png" alt="" class="img-fluid">

                    </div>

                    <div class="aboutus-thumb">

                        <img src="<?php echo esc_url($about_left_image['url']);?>" class="img-fluid aboutus-1">

                        <img src="<?php echo esc_url($about_left_dark_image['url']);?>"  class="img-fluid aboutus-2">

                    </div>

                </div>

            <?php endif;?>

                <div class="aboutus-content pos-relative">

                    <span class="sub-heading pos-relative">

                        <?php echo esc_html(get_theme_mod('about_subtitle'), 'noriumportfolio');?>

                    </span>

                    <span class="aboutus-bg-heading">

                        <?php echo esc_html(get_theme_mod('aboutus__offsettext'), 'noriumportfolio');?>  

                    </span>

                    <h2 class="section-heading pb-30">

                        <?php echo esc_html( get_theme_mod('about_title'), 'noriumportfolio');?> 

                        <span>

                            <?php echo esc_html(get_theme_mod('about_color_title'), 'noriumportfolio');?>  

                        </span>

                    </h2>



                    <p class="desc-text about-text">

                        <?php echo  esc_html(get_theme_mod('about_desc'), 'noriumportfolio');?>  

                    </p>



                    <?php if(!empty(get_theme_mod('about_btn_link'))):?>

                        <a class="b-primary" href="<?php echo esc_url(get_theme_mod('about_btn_link'));?>" download><?php echo esc_html(get_theme_mod('about_btn'));?></a>

                    <?php endif;?>

                </div>

            </div>

        </div>



        <?php if(get_theme_mod('about_area_shap_swticher', true)==true):?>



        <div class="shape-section">

            <div class="shape shape-1">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/about-1.svg" alt="image here" class="img-fluid">

            </div>                            

            <div class="shape shape-2">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/about-2.svg" alt="image here" class="img-fluid">

            </div>                            

            <div class="shape shape-3">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/about-2.svg" alt="image here" class="img-fluid">

            </div>

        </div>

    <?php endif;?>

    </div>

    <!-- aboutus section ends -->

<?php endif;?>

<?php if(get_theme_mod('eduex_area_swticher')):?>

    <!-- resume section start -->

    <div class="resume-section top-spacing pos-relative">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-xl-11 col-lg-12">

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                        <?php

                            $i = 0;

                            $educaex_area_repeaters= get_theme_mod('educaex_area_repeater');

                            if(!empty($educaex_area_repeaters)):

                            foreach($educaex_area_repeaters as $educaex_area_repeater):

                            $i++;

                        ?>

                        <li class="nav-item" role="presentation">

                          <button class="nav-link b-primary mb-3 mb-md-0 <?php if($i==1){echo "active";}?>

                          " id="education-home-<?php echo esc_attr($i);?>" data-bs-toggle="pill" data-bs-target="#education-<?php echo esc_attr($i);?>" type="button" role="tab" aria-controls="education-<?php echo esc_attr($i);?>" aria-selected="false"><?php echo esc_html($educaex_area_repeater['educaex_cat_name'], 'noriumportfolio');?></button>

                        </li>

                    <?php endforeach; endif;?>

                      </ul>

                </div>

            </div>



            <div class="tab-content pt-50" id="pills-tabContent">

            <?php



                $i = 0;

                $educaex_area_repeaters= get_theme_mod('educaex_area_repeater');

                if(!empty($educaex_area_repeaters)):

                foreach($educaex_area_repeaters as $educaex_area_repeater):

                $i++;

            ?>

                <div class="tab-pane fade <?php if($i==1){echo "show active";} ?>

                " id="education-<?php echo esc_attr($i);?>" role="tabpanel" aria-labelledby="education-home-<?php echo esc_attr($i);?>">

                    <div class="resume-inner">

                        <div class="row justify-content-md-between justify-content-center">

                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">

                                <div class="resume-content">

                                    <div class="job-experience">

                                        <span class="sub-title">

                                            <?php echo esc_html( $educaex_area_repeater['educa_sub_title'], 'noriumportfolio');?> 

                                        </span>

                                        <h3 class="main-title pb-60">

                                            <?php echo esc_html($educaex_area_repeater['educa_title'], 'noriumportfolio');?>

                                        </h3>

                                        <div class="experience-list pos-relative">

                                            <div class="experience-single">

                                                <div class="experience-single-inner">

                                                    <h4 class="heading pb-10">

                                                        <?php echo esc_html($educaex_area_repeater['educaex_edu_title'], 'noriumportfolio');?>

                                                    </h4>

                                                    <span class="d-block">

                                                         <?php echo esc_html($educaex_area_repeater['educaex_edu_sub_title'], 'noriumportfolio');?>

                                                    </span>

                                                    <span class="time-out">

                                                         <?php echo esc_html($educaex_area_repeater['educaex_edu_cgpa'], 'noriumportfolio');?>

                                                    </span>

                                                    <p class="pt-20">

                                                        <?php echo esc_html($educaex_area_repeater['educaex_edu_desc'], 'noriumportfolio');?> 

                                                    </p>

                                                </div>

                                            </div>                                   

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- resume content -->

                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">

                                <div class="resume-content">

                                    <div class="education-quality">

                                        <span class="sub-title">

                                            <?php echo esc_html($educaex_area_repeater['educaex_sub_title'], 'noriumportfolio');?>  

                                        </span>

                                        <h3 class="main-title pb-60">

                                            <?php echo esc_html($educaex_area_repeater['educaex_title'], 'noriumportfolio');?>

                                        </h3>

                                        <div class="resume-list pos-relative">

                                            <div class="resume-single">

                                                <div class="resume-single-inner">

                                                    <h4 class="heading pb-10">

                                                        <?php echo esc_html($educaex_area_repeater['educaex_exskill_title'], 'noriumportfolio');?>   

                                                    </h4>

                                                    <span class="d-block">

                                                        <?php echo esc_html($educaex_area_repeater['educaex_exskill_sub_title'], 'noriumportfolio');?> 

                                                    </span>

                                                    <span class="time-out">

                                                       <?php echo esc_html($educaex_area_repeater['educaex_exskill_cgpa'], 'noriumportfolio');?>   

                                                    </span>

                                                    <p class="pt-20">

                                                       <?php echo esc_html($educaex_area_repeater['educaex_exskill_desc'], 'noriumportfolio');?>   

                                                    </p>

                                                </div>

                                            </div>                                                                   

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



            <?php endforeach; endif;?>



                

            </div>

        </div>

        <?php if(get_theme_mod('eduex_area_shap_swticher')):?>

        <div class="portfolio-shape">

            <div class="shape resume-shape-1">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/port-1.svg" alt="image here" class="img-fluid">

            </div>

            <div class="shape resume-shape-2">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/port-2.svg" alt="image here" class="img-fluid">

            </div>

            <div class="shape resume-shape-3">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/port-3.svg" alt="image here" class="img-fluid">

            </div>

        </div>

    <?php endif;?>

    </div>

<?php endif;?>

    <!-- resume section ends -->



<?php if(get_theme_mod('service_area_swticher')==true):?>

    <!-- service section start -->

    <div class="service-section section-padding pos-relative" id="service">

        <div class="container">

            <div class="row justify-content-between">

                <div class="col-xl-5 col-lg-6">

                    <div class="sidebar-tittle pos-relative">

                        <span class="sub-heading pos-relative"><?php echo esc_html(get_theme_mod('services_subtitle'));?></span>

                        <span class="section-bg-heading"><?php echo esc_html(get_theme_mod('service_offset_title'));?></span>

                        <h2 class="section-heading pb-60"><?php echo esc_html(get_theme_mod('services_title'));?> <span><?php echo esc_html(get_theme_mod('services_color_title'));?></span></h2>

                    </div>

                </div>

                <div class="col-xl-5 col-lg-6">

                    <p class="desc-text">

                       <?php echo esc_html(get_theme_mod('services_heading_description'));?>

                    </p>

                </div>

            </div>

            <div class="service-box-wraapper">

                <div class="row justify-content-md-between justify-content-center">

                    <?php

                        $single_services_repeater = get_theme_mod('single_service_repeater');

                        if(!empty($single_services_repeater)):

                        foreach($single_services_repeater as $single_service_repeater):

                    ?>

                    <div class="col-xl-4 col-md-6 col-sm-8">

                        <div class="service-box-single template mb-3 mb-lg-0">

                            <div class="service-box-inner">

                                <div class="service-box-front">

                                    <div class="srv-icon">

                                        <i class="<?php echo esc_attr($single_service_repeater['single_service_icon']);?>"></i>

                                    </div>

                                    <div class="service-desc">

                                        <h4 class="pb-20"><?php echo esc_html($single_service_repeater['single_service_title'], 'noriumportfolio');?></h4>

                                        <p class="text-center"><?php echo esc_html($single_service_repeater['single_service_desciption'], 'noriumportfolio');?></p>

                                    </div>

                                </div>

                                <div class="service-box-back">

                                    <div class="srv-icon">

                                        <i class="<?php echo esc_attr($single_service_repeater['single_service_icon']);?>"></i>

                                    </div>

                                    <div class="service-desc">

                                        <p class="text-white pb-20"><?php echo esc_html($single_service_repeater['single_service_desciption'], 'noriumportfolio');?></p>

                                        <a href="<?php echo esc_url($single_service_repeater['single_service_hover_btn_link']);?>" class="btn-theme">

                                            <?php echo esc_html($single_service_repeater['single_service_hover_btn'], 'noriumportfolio');?> 

                                            <i class="fas fa-long-arrow-alt-right"></i></a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>  

                    <?php endforeach; endif;?>

                </div>

            </div>

        </div>

    <?php if(get_theme_mod('service_area_shap_swticher')==true):?>

        <div class="service-shape">

            <div class="shape srv-shape-1">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/about-1.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="shape srv-shape-2">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-1.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="shape srv-shape-3">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-2.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="shape srv-shape-4">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-2.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="shape srv-shape-5">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-3.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="shape srv-shape-6">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-4.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="shape srv-shape-7">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-5.svg" alt="image here" class="img-fluid">

            </div>                      

            <div class="shape srv-shape-8">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-6.svg" alt="image here" class="img-fluid">

            </div>

        </div>

    <?php endif;?>

    </div>

    <!-- service section ends -->

<?php endif;?>





<?php if(get_theme_mod('portfolio_area_swticher')==true):?>



    <!-- portfolio-section start -->

    <div class="portfolio-section pos-relative" id="portfolio">

        <div class="container">

            <div class="row justify-content-between pb-60">

                <div class="col-xl-5 col-lg-6 mb-5 mb-lg-0">

                    <div class="sidebar-tittle pos-relative">

                        <span class="sub-heading pos-relative"><?php echo esc_html(get_theme_mod('portfolio_subtitle'), 'noriumportfolio');?></span>

                        <span class="section-bg-heading"><?php echo esc_html(get_theme_mod('portfolio_offset_title'), 'noriumportfolio');?></span>

                        <h2 class="section-heading"><?php echo esc_html(get_theme_mod('portfolio_title'), 'noriumportfolio');?> <span><?php echo esc_html(get_theme_mod('portfolio_color_title'), 'noriumportfolio');?></span></h2>

                    </div>

                </div>

                <div class="col-xl-5 col-lg-6">

                    <p class="desc-text">

                        <?php echo esc_html(get_theme_mod('portfolio_heading_description'), 'noriumportfolio');?>

                    </p>

                </div>

            </div>

            <div class="row d-flex flex-wrap justify-content-between"> 

                <div class="menu-section"> 

                    <ul class="portfolio-menu">





                        <li class="active" data-filter="*"><?php echo esc_html('All', 'noriumportfolio');?></li>



                        <?php

                         $portfolio_item_repeaters = get_theme_mod('portfolio_item_repeater');

                         foreach($portfolio_item_repeaters as $portfolio_item_repeater): 

                         if(!empty( $portfolio_item_repeater['portfoli_cat_name'])):

                        ?>

                        <li data-filter=".<?php echo esc_attr($portfolio_item_repeater['portfoli_cat__data_name']);?>"><?php echo esc_html($portfolio_item_repeater['portfoli_cat_name'], 'noriumportfolio');?></li>

                        <?php endif; endforeach;?>



                   

                        

                    </ul>

                </div>

                <div class="portfolio-items-wrapper pos-relative">

                    <div class="portfolio-items">

                    <?php

                         $portfolio_item_repeaters = get_theme_mod('portfolio_item_repeater');

                         foreach($portfolio_item_repeaters as $portfolio_item_repeater):

                            $img_url = $portfolio_item_repeater['portfoli_cat__imge'];

                    ?>

                <div class="portfolio-single <?php echo esc_attr($portfolio_item_repeater['portfoli_cat__data_filer_name'])?> ">



                            <div class="portfolio-thumb">

                                <img src="<?php echo esc_url($img_url); ?>" alt="image here" class="img-fluid">

                            </div> 



                            <div class="portfolio-content">



                                <?php if(!empty($portfolio_item_repeater['portfoli_cat_video_link'])):?>

                                



                                <a id="play-btn-1"  href="<?php echo esc_url($portfolio_item_repeater['portfoli_cat_video_link'])?>" class="play-btn" data-effect="mfp-zoom-in"><i class="fas fa-play"></i></a>







                                <span class="d-block text-white"><?php echo esc_html('youtube', 'noriumportfolio');?></span>

                                <?php endif;?>



                                <h4 class="title text-white pt-20"><?php echo esc_html($portfolio_item_repeater['portfoli_cat__title'], 'noriumportfolio'); ?></h4>



                            </div>

                        </div>

                     <?php endforeach;?>

                     </div>

                </div>

            </div>

        </div>



   <?php if(get_theme_mod('portfolio_area_shap_swticher')==true):?>

        <div class="portfolio-shape">

            <div class="shape port-shape-1">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/about-1.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="shape port-shape-2">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/port-1.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="shape port-shape-3">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-2.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="shape port-shape-4">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-2.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="shape port-shape-5">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-3.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="shape port-shape-6">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-4.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="shape port-shape-7">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-5.svg" alt="image here" class="img-fluid">

            </div>                      

            <div class="shape port-shape-8">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-6.svg" alt="image here" class="img-fluid">

            </div>

            <div class="shape port-shape-9">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/port-1.svg" alt="image here" class="img-fluid">

            </div>  

        </div>

    <?php endif;?>

   

    </div>

    <!-- portfolio section ends -->

<?php endif;?>



  <?php if(get_theme_mod('testimonail_area_swticher')==true):?>

    <!-- testimonial section start -->

    <div class="testimonial-section top-spacing pos-relative" id="testimonial">

        <div class="container">

            <div class="row justify-content-center pb-60">

                <div class="col-xl-6 col-lg-8 text-center">

                    <div class="sidebar-tittle pos-relative">

                        <span class="sub-heading pos-relative"><?php echo esc_html(get_theme_mod('testimonial_subtitle'), 'noriumportfolio');?></span>

                        <span class="test-bg-heading"><?php echo esc_html(get_theme_mod('testimonial_offset_title'), 'noriumportfolio');?></span>

                        <h2 class="section-heading"><?php echo esc_html(get_theme_mod('testimonial_title'), 'noriumportfolio');?> <span><?php echo esc_html(get_theme_mod('testimonial_color_title'), 'noriumportfolio');?></span></h2>

                    </div>

                    

                </div>                

            </div>

            <div class="slider testimonial-slider pos-relative">

                <?php

                   

                 $single_testimonial_repeaters = get_theme_mod('single_testimonial_repeater');

                

                 foreach($single_testimonial_repeaters as $single_testimonial_repeater):



                        

                ?>

                <div class="slider-item d-flex flex-wrap justify-content-center align-items-center pos-relative">

                    <div class="test-thumbnail">



                        <img src="<?php echo esc_url(wp_get_attachment_url($single_testimonial_repeater['testimonial_author_image']))?>" alt="iamge here" class="rounded-circle">

                    </div>

                    <div class="test-content pos-relative">

                        <p class="pb-60"><?php echo esc_html($single_testimonial_repeater['testimonial_descrip'], 'noriumportfolio');?></p>

                        <div class="quote-icon">

                            <i class="flaticon-quotation"></i>

                        </div>

                        <div class="test-meta-wrap d-flex flex-wrap">

                            <div class="client-info">

                                <h5><?php echo esc_html($single_testimonial_repeater['testimonial_author_name'], 'noriumportfolio');?></h5>

                                <p><?php echo esc_html($single_testimonial_repeater['testimonial_author_designation'], 'noriumportfolio');?></p>

                            </div>

                            <div class="test-react pl-60">

                             <?php if($single_testimonial_repeater['testimonail_author_rating']== 'norating'):

                                ?>

                               <i class=""></i>

                            <?php endif;?>

                             <?php if($single_testimonial_repeater['testimonail_author_rating']== 'onestar'):

                                ?>

                                <i class="fas fa-star"></i>

                            <?php endif;?>

                             <?php if($single_testimonial_repeater['testimonail_author_rating']== 'twostar'):

                                ?>

                                <i class="fas fa-star"></i>

                                <i class="fas fa-star"></i>

                            <?php endif;?>

                             <?php if($single_testimonial_repeater['testimonail_author_rating']== 'threestar'):

                                ?>

                                <i class="fas fa-star"></i>

                                <i class="fas fa-star"></i>

                                <i class="fas fa-star"></i>

                            <?php endif;?>

                             <?php if($single_testimonial_repeater['testimonail_author_rating']== 'fourstar'):

                                ?>

                                <i class="fas fa-star"></i>

                                <i class="fas fa-star"></i>

                                <i class="fas fa-star"></i>

                                <i class="fas fa-star"></i>

                            <?php endif;?>

                             <?php if($single_testimonial_repeater['testimonail_author_rating']== 'fivestar'):

                                ?>

                                <i class="fas fa-star"></i>

                                <i class="fas fa-star"></i>

                                <i class="fas fa-star"></i>

                                <i class="fas fa-star"></i>

                                <i class="fas fa-star"></i>

                            <?php endif;?>

                            </div>

                        </div>

                    </div>

                </div>

            <?php endforeach;?>

            </div>

        </div>

         <?php if(get_theme_mod('testimonail_area_shap_swticher')==true):?>

            <div class="test-shape-section">

                <span class="test-shape test-shape-1"></span>

                <span class="test-shape test-shape-2"></span>

                <span class="test-shape test-shape-3"></span>

                <span class="test-shape test-shape-4"></span>

                <span class="test-shape test-shape-5"></span>

                <span class="test-shape test-shape-6"></span>

                <span class="test-shape test-shape-7"></span>

                <span class="test-shape test-shape-8"></span>

                <span class="test-shape test-shape-9"></span>

                <span class="test-shape test-shape-10"></span>

            </div>

        <?php endif;?>

    </div>

    <!-- testimonial section ends -->

<?php endif;?>





<?php if(get_theme_mod('pricing_area_swticher')==true):?>



    <!-- pricing-section start -->

    <div class="pricing-section pos-relative" id="pricing">

        <div class="container">

            <div class="row justify-content-between align-items-end pb-60">

                <div class="col-xl-4 col-lg-6 mb-5 mb-lg-0">

                    <div class="sidebar-tittle pos-relative">

                        <span class="sub-heading pos-relative"><?php echo esc_html(get_theme_mod('pricing_subtitle'), 'noriumportfolio');?></span>

                        <span class="section-bg-heading"><?php echo esc_html(get_theme_mod('pricing_offset_title'), 'noriumportfolio');?></span>

                        <h2 class="section-heading"><?php echo esc_html(get_theme_mod('pricing_title'), 'noriumportfolio');?><br> <span><?php echo esc_html(get_theme_mod('pricing_color_title'), 'noriumportfolio');?></span></h2>

                    </div>

                </div>

                <div class="col-xl-5 col-lg-6">

                    <p class="desc-text">

                        <?php echo esc_html(get_theme_mod('pricing_desc'), 'noriumportfolio');?>

                    </p>

                </div>

            </div>

            <div class="row justify-content-sm-center">



                <?php

                   $single_pricing_repeater = get_theme_mod('single_pricing_repeater');

                  foreach($single_pricing_repeater as $single_pricing_repeaters):

               

                ?>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">

                    <div class="pricing-single mb-4 mb-lg-0">

                        <h3><?php echo esc_html($single_pricing_repeaters['pricing_package_title'], 'noriumportfolio') ;?></h3>

                        <span class="theme pricing-rate"><?php echo esc_html($single_pricing_repeaters['pricing_package_price'], 'noriumportfolio') ;?></span>

                        <div class="pricing-body">

                            <h5><?php echo esc_html($single_pricing_repeaters['pricing_package_desc'], 'noriumportfolio') ;?></h5>

                            <span><?php echo esc_html($single_pricing_repeaters['pricing_package_service'], 'noriumportfolio') ;?></span>

                            <div class="pricing-item pt-40">

                                <?php echo wpautop($single_pricing_repeaters['pricing_package_service_list']);?>

                            </div>

                        </div>



                        <a href="<?php echo esc_url($single_pricing_repeaters['pricing_package_service_btn_link']) ;?>" class="theme b-primary"><?php echo esc_html($single_pricing_repeaters['pricing_package_service_btn'], 'noriumportfolio') ;?></a>



                        <p class="time-out"><i class="far fa-clock"></i> <?php echo esc_html($single_pricing_repeaters['pricing_package_service_delivery'], 'noriumportfolio') ;?></p>

                    </div>

                </div> 

            <?php endforeach;?>

            </div>

        </div>



        <?php if(get_theme_mod('pricing_area_shap_swticher')==true):?>

        <div class="pricing-shape">

            <div class="pricing-shape pricing-shape-1">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/pricing-1.svg" alt="image here" class="img-fluid">

            </div>               

            <div class="pricing-shape pricing-shape-2">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/pricing-1.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="pricing-shape pricing-shape-3">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/pricing-2.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="pricing-shape pricing-shape-4">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/pricing-2.svg" alt="image here" class="img-fluid">

            </div>

        </div>

    <?php endif;?>

    </div>

    <!-- pricing-section ends -->

<?php endif;?>





<?php if(get_theme_mod('blog_area_swticher')==true):?>

    <!-- blog section start -->

    <div class="blog-section section-padding" id="blog">

        <div class="container">

            <div class="row justify-content-between align-items-end pb-60">

                <div class="col-xl-5 col-lg-6">

                    <div class="sidebar-tittle pos-relative">

                        <span class="sub-heading pos-relative"><?php echo esc_html(get_theme_mod('blog_subtitle'), 'noriumportfolio');?></span>

                        <span class="section-bg-heading"><?php echo esc_html(get_theme_mod('blog_offset_title'), 'noriumportfolio');?></span>

                        <h2 class="section-heading pb-30"><?php echo esc_html(get_theme_mod('blog_title'), 'noriumportfolio');?> <span><?php echo esc_html(get_theme_mod('blog_color_title'), 'noriumportfolio');?></span></h2>

                    </div>

                </div>

                <div class="col-xl-5 col-lg-6">

                    <p class="desc-text">

                        <?php echo esc_html(get_theme_mod('blog_desc'), 'noriumportfolio');?>

                    </p>

                </div>

            </div>    

            <div class="row justify-content-sm-center">

                <?php

                     $args = array(  

                            'post_type' => 'post',

                            'posts_per_page' => 3,

                            'orderby' => 'ASC',

                        );

                    // The Query

                    $the_query = new WP_Query( $args );

                     

                    // The Loop

                    if ( $the_query->have_posts() ) {

                        while ( $the_query->have_posts() ) {

                            $the_query->the_post();

                         ?>

                         <!-- Single Post Start -->

                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 mb-4 mb-lg-0">

                                <div class="blog-single pos-relative">

                                    <div class="blog-inner pos-relative">

                                        <div class="blog-thumb">

                                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')) ;?>" alt="iamge here" class="img-fluid">

                                        </div>

                                        <div class="blog-title">

                                            <h4 class="text-white"><?php the_title();?></h4>

                                        </div>

                                    </div>

                                    <div class="blog-single-overly">

                                        <span><?php the_category();?></span>

                                        <h4 class="text-white pb-40"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>

                                       <p> <?php

                                            $excerpt = get_the_excerpt(); 

                     

                                            $excerpt = substr( $excerpt, 0, 100 );

                                            $result = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );

                                             

                                         echo esc_html($result);?> </p>

                                        <a href="<?php the_permalink();?>" class="btn-theme pb-20"><?php echo esc_html('Read More', 'noriumportfolio');?> <i class="fas fa-long-arrow-alt-right"></i></a>

                                        <div class="meta-desc d-flex justify-content-between pt-20">

                                            <div class="blog-date pos-relative">

                                                <p><?php echo get_the_date( 'l F j, Y' );?></p>

                                            </div>

                                            <div class="blog-author">

                                                <p><?php echo esc_html('By ', 'noriumportfolio');?> <?php echo the_author();?></p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div> <!-- Single Post end -->

                         <?php

                        }

                        

                    } 

                    /* Restore original Post Data */

                    wp_reset_postdata();

                 ?>                

            </div>        

        </div>

    </div>

    <!-- blog section ends -->

<?php endif;?>



<?php if(get_theme_mod('contact_area_swticher')==true):?>

    <!-- contact section start -->

    <div class="contact-section pos-relative" id="contact">

        <div class="container">

            <div class="row justify-content-between align-items-end pb-60">

                <div class="col-xl-5 col-lg-6">

                    <div class="sidebar-tittle pos-relative">

                        <span class="sub-heading pos-relative"><?php echo esc_html(get_theme_mod('contact_subtitle'), 'noriumportfolio');?></span>

                        <span class="section-bg-heading"><?php echo esc_html(get_theme_mod('contact_offset_title'), 'noriumportfolio');?></span>

                        <h2 class="section-heading pb-30"><?php echo esc_html(get_theme_mod('contact_title'), 'noriumportfolio');?></h2>

                    </div>

                </div>

                <div class="col-xl-5 col-lg-6">

                    <p class="desc-text">

                        <?php echo esc_html(get_theme_mod('contact_desc'), 'noriumportfolio');?>

                    </p>

                </div>

            </div>

            <div class="row">

                <div class="col-xl-4 col-lg-4 col-md-4">

                    <div class="contact-sidebar">

                        <h4 class="pb-20"><?php echo esc_html(get_theme_mod('contat_get_intouch_title'), 'noriumportfolio');?></h4>

                        <ul>



                            <?php

                                $contact_single_info_repeaters = get_theme_mod('contact_single_info_repeater');

                                foreach($contact_single_info_repeaters as $contact_single_info_repeater):

                             ?>

                            <li><span class="title"><?php echo esc_html($contact_single_info_repeater['contact_area_info']);?></span>

                                <span><?php echo wpautop($contact_single_info_repeater['contact_area_description']);?></span>

                            </li>

                        <?php endforeach;?>

                        </ul>

                        <div class="social-share">

                            <span class="d-block pb-20"><?php echo esc_html(get_theme_mod('social_title_contact'), 'noriumportfolio');?></span>

                            <div class="social-icon">

                                <ul>

                                    <?php $contact_social_repeaters= get_theme_mod('contact_social_repeater');

                                            foreach($contact_social_repeaters as $contact_social_repeater):



                                    ?>

                                    <li><a href="<?php echo esc_url($contact_social_repeater['contact_area_social_link']);?>"><i class="<?php echo esc_attr($contact_social_repeater['contact_area_social_icon']);?>"></i></a></li>

                                    <?php endforeach;?>

                                </ul>

                            </div>

                        </div>

                  

                    </div>   

                </div>

                <div class="col-xl-8 col-lg-8 col-md-8">

                    <div class="contact-form">

                        <h4 class="pb-20"><?php echo esc_html(get_theme_mod('form_title_contact'), 'noriumportfolio');?></h4>

                        <?php echo do_shortcode(get_theme_mod('contact_form_shortcode'));?>             

                    </div>

                </div>

            </div>        

        </div>



    <?php if(get_theme_mod('contact_area_shap_swticher')==true):?>

        <!-- contact shape -->

        <div class="contact-shape">

            <div class="shape port-shape-1">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/about-1.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="shape port-shape-2">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/port-1.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="shape port-shape-3">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-2.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="shape port-shape-4">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-2.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="shape port-shape-5">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-3.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="shape port-shape-6">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-4.svg" alt="image here" class="img-fluid">

            </div>            

            <div class="shape port-shape-7">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-5.svg" alt="image here" class="img-fluid">

            </div>                      

            <div class="shape port-shape-8">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/srv-6.svg" alt="image here" class="img-fluid">

            </div>

            <div class="shape port-shape-9">

                <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/shape/port-1.svg" alt="image here" class="img-fluid">

            </div>  

        </div>

        <?php endif;?>

    </div>

    <!-- contact section ends -->

<?php endif;?>

 <?php get_footer();?>