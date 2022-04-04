<?php
/**
 * Options functions
 *
 * @package kidsvibe
 */

if ( ! function_exists( 'kidsvibe_show_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function kidsvibe_show_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'kidsvibe' ),
            'off'       => esc_html__( 'No', 'kidsvibe' )
        );
        return apply_filters( 'kidsvibe_show_options', $arr );
    }
endif;

if ( ! function_exists( 'kidsvibe_page_choices' ) ) :
    /**
     * List of pages for page choices.
     * @return Array Array of page ids and name.
     */
    function kidsvibe_page_choices() {
        $pages = get_pages();
        $choices = array();
        $choices[0] = esc_html__( 'None', 'kidsvibe' );
        foreach ( $pages as $page ) {
            $choices[ $page->ID ] = $page->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'kidsvibe_post_choices' ) ) :
    /**
     * List of posts for post choices.
     * @return Array Array of post ids and name.
     */
    function kidsvibe_post_choices() {
        $posts = get_posts( array( 'numberposts' => -1 ) );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'kidsvibe' );
        foreach ( $posts as $post ) {
            $choices[ $post->ID ] = $post->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'kidsvibe_category_choices' ) ) :
    /**
     * List of categories for category choices.
     * @return Array Array of category ids and name.
     */
    function kidsvibe_category_choices() {
        $args = array(
                'type'          => 'post',
                'child_of'      => 0,
                'parent'        => '',
                'orderby'       => 'name',
                'order'         => 'ASC',
                'hide_empty'    => 0,
                'hierarchical'  => 0,
                'taxonomy'      => 'category',
            );
        $categories = get_categories( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'kidsvibe' );
        foreach ( $categories as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'kidsvibe_product_choices' ) ) :
    /**
     * List of products for product choices.
     * @return Array Array of product ids and name.
     */
    function kidsvibe_product_choices() {
        $posts = get_posts( array( 'post_type' => 'product', 'numberposts' => -1 ) );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'kidsvibe' );
        foreach ( $posts as $post ) {
            $choices[ $post->ID ] = $post->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'kidsvibe_product_category_choices' ) ) :
    /**
     * List of product categories for product category choices.
     * @return Array Array of product category ids and name.
     */
    function kidsvibe_product_category_choices() {
        $args = array(
                'type'          => 'product',
                'child_of'      => 0,
                'parent'        => '',
                'orderby'       => 'name',
                'order'         => 'ASC',
                'hide_empty'    => 0,
                'hierarchical'  => 0,
                'taxonomy'      => 'product_cat',
            );
        $categories = get_categories( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'kidsvibe' );
        foreach ( $categories as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'kidsvibe_site_layout' ) ) :
    /**
     * site layout
     * @return array site layout
     */
    function kidsvibe_site_layout() {
        $kidsvibe_site_layout = array(
            'full'    => get_template_directory_uri() . '/assets/uploads/full.png',
            'boxed'   => get_template_directory_uri() . '/assets/uploads/boxed.png',
        );

        $output = apply_filters( 'kidsvibe_site_layout', $kidsvibe_site_layout );

        return $output;
    }
endif;

if ( ! function_exists( 'kidsvibe_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidebar position
     */
    function kidsvibe_sidebar_position() {
        $kidsvibe_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/uploads/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/uploads/full.png',
            'no-sidebar-content'    => get_template_directory_uri() . '/assets/uploads/boxed.png',
        );

        $output = apply_filters( 'kidsvibe_sidebar_position', $kidsvibe_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'kidsvibe_get_spinner_list' ) ) :
    /**
     * List of spinner icons options.
     * @return array List of all spinner icon options.
     */
    function kidsvibe_get_spinner_list() {
        $arr = array(
            'default'               => esc_html__( 'Default', 'kidsvibe' ),
            'spinner-two-way'       => esc_html__( 'Two Way', 'kidsvibe' ),
            'spinner-umbrella'      => esc_html__( 'Umbrella', 'kidsvibe' ),
            'spinner-dots'          => esc_html__( 'Dots', 'kidsvibe' ),
            'spinner-one-way'       => esc_html__( 'One Way', 'kidsvibe' ),
        );
        return apply_filters( 'kidsvibe_spinner_list', $arr );
    }
endif;

if ( ! function_exists( 'kidsvibe_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function kidsvibe_selected_sidebar() {
        $kidsvibe_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'kidsvibe' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'kidsvibe' ),
        );

        $output = apply_filters( 'kidsvibe_selected_sidebar', $kidsvibe_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'kidsvibe_sortable_sections' ) ) :
    /**
     * homepage sections
     * @return array sortable sections
     */
    function kidsvibe_sortable_sections() {
        $kidsvibe_sections = array(
            'slider'        => esc_html__( 'Slider Section', 'kidsvibe' ),
            'service'       => esc_html__( 'Service Section', 'kidsvibe' ),
            'introduction'  => esc_html__( 'Introduction Section', 'kidsvibe' ),
            'team'          => esc_html__( 'Team Section', 'kidsvibe' ),
            'portfolio'     => esc_html__( 'Portfolio Section', 'kidsvibe' ),
            'gallery'       => esc_html__( 'Gallery Section', 'kidsvibe' ),
            'product'       => esc_html__( 'Product Section', 'kidsvibe' ),
            'cta'           => esc_html__( 'Call to Action Section', 'kidsvibe' ),
            'client'        => esc_html__( 'Client Section', 'kidsvibe' ),
            'testimonial'   => esc_html__( 'Testimonial Section', 'kidsvibe' ),
            'recent'        => esc_html__( 'Recent Section', 'kidsvibe' ),
        );
        $output = apply_filters( 'kidsvibe_sections', $kidsvibe_sections );

        return $output;
    }
endif;
