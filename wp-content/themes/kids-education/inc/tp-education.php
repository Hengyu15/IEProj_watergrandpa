<?php
/**
 * Kids_Education tp education compatibility.
 *
 * This is the template that includes all the other files for core featured of Theme Palace
 *
 * @package Theme Palace
 * @subpackage Kids Education
 * @since Kids Education 1.0
 */

// pagination
add_action( 'tp_education_pagination_action', 'kids_education_pagination' );
add_action( 'tp_education_post_pagination_action', 'kids_education_post_pagination' );
