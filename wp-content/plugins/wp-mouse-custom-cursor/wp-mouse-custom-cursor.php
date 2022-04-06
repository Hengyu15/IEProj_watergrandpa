<?php
/*

Plugin Name: WP Mouse Custom Cursor
Plugin URI: https://ninetyseveninfotech.com/wp-mouse-custom-cursor
Description: WP Mouse Custom Cursor | WordPress Mouse Cursor Plugin is a WordPress plugin that enables integration of custom cursors. The Plugin is packed with a set of ready-to-use HTML/SVG cursors.
Version: 1.2
Author: Ninetyseven Infotech
Author URI: https://ninetyseveninfotech.com 
License: GPLv2 or later 


Developer: 
Ninetyseven Infotech
ninetyseveninfotech@gmail.com 
Blog: https://ninetyseveninfotech.com/blog
Instagram : https://www.instagram.com/ninetyseveninfotech/
Facebook : https://www.facebook.com/ninetyseveninfotech
LinkedIn: https://www.linkedin.com/in/ninetyseven-infotech-71820219b/
 
*/
 
// direct file access
if ( ! defined ( 'ABSPATH' ) ) {
  exit;
}
$mouse_cursor_style = 'style1';
if(get_theme_mod('wp_mouse_custom_cursor_style')){
  $mouse_cursor_style = get_theme_mod('wp_mouse_custom_cursor_style'); 
}

function wpmousecustom_add_header(){
  wp_register_script('jquery', plugin_dir_url(__FILE__).'/jquery.min.js', array(), null, true);
  wp_enqueue_script( 'jquery' );
}
// Common Script Start //
function wpmousecustom_cursor_commonscript(){
  ?>
    <script type="text/javascript">
          jQuery(document).ready(function () {
            jQuery('body').mousemove(function (e) {
                jQuery("#wpcustomcursorid_first").css({
                      position: 'absolute',
                      left: e.pageX,
                      top: e.pageY,
                      display: 'block'
                })
                jQuery("#wpcustomcursorid_second").css({
                      position: 'absolute',
                      left: e.pageX,
                      top: e.pageY,
                      display: 'block'
                }) 
                jQuery("#wpcustomcursorid_third").css({
                      position: 'absolute',
                      left: e.pageX,
                      top: e.pageY,
                      display: 'block'
                })            
            });
            jQuery('a').hover(function(){
                  jQuery('#wpcustomcursorid_first').addClass('hover');
              }, function(){
                  jQuery('#wpcustomcursorid_first').removeClass('hover');
              })
          });
      </script>
  <?php 
}
// Common Script END //

// Custom Style First Start//
function wpmousecustom_cursor_function_first(){
?>
  <style>
    #wpcustomcursorid_first{
      width: 35px;
      height: 35px;
      border-radius: 50%;
      border:1px solid <?php echo get_theme_mod('wp_mouse_custom_cursor_color', '#ff0000'); ?>;
      display: none;
      transform: translate(-50%, -50%);
      pointer-events: none;
      transition: all .1s linear;
      z-index: 99999999999999;
    }
    #wpcustomcursorid_second{
      position: absolute;
      height:8px;
      width: 8px;
      transform: translate(-50%, -50%);
      top:50%;
      left: 50%;
      border-radius: 100%;
      background-color: <?php echo get_theme_mod('wp_mouse_custom_cursor_color', '#ff0000'); ?>;
      pointer-events: none;
      z-index: 99999999999999;
    }
    #wpcustomcursorid_first.hover{
      width: 45px;
      height: 45px;
      transition: all .1s;
    }
    body,body a{
      cursor:none!important
    }
  </style> 
<?php 
}
// Custom Style First END //

// Custom Style Second Start//
function wpmousecustom_cursor_function_second(){
?>  
  <style>
    #wpcustomcursorid_first{
      width: 40px;
      height: 40px;
      border-radius: 50%;
      border:1px solid <?php echo get_theme_mod('wp_mouse_custom_cursor_color', '#ff0000'); ?>;
      display: none;
      transform: translate(-50%, -50%);
      pointer-events: none;
      transition: all .1s linear;
      z-index: 99999999999999;
    }
    #wpcustomcursorid_second{
      height:20px;
      width: 2px;
      transform: translate(-50%, -50%);
      background-color: <?php echo get_theme_mod('wp_mouse_custom_cursor_color', '#ff0000'); ?>;
      pointer-events: none;
      z-index: 99999999999999;
    }
    #wpcustomcursorid_third{
      height:2px;
      width: 20px;
      transform: translate(-50%, -50%);
      background-color: <?php echo get_theme_mod('wp_mouse_custom_cursor_color', '#ff0000'); ?>;
      pointer-events: none;
      z-index: 99999999999999;
    }
    #wpcustomcursorid_first.hover{
      width: 45px;
      height: 45px;
      transition: all .1s;
    }
    body,body a,body a{
      cursor:none!important
    }
  </style>  
<?php
}
// Custom Style Second END //

// Custom Style Third Start//
function wpmousecustom_cursor_function_third(){
?>  
  <style>
    #wpcustomcursorid_first{
      width: 40px;
      height: 40px;
      border-radius: 50%;
      border:1px solid <?php echo get_theme_mod('wp_mouse_custom_cursor_color', '#ff0000'); ?>;
      display: none;
      transform: translate(-50%, -50%);
      pointer-events: none;
      transition: all .1s linear;
      z-index: 99999999999999;
    }
    #wpcustomcursorid_second{
      width: 0;
      height: 0;
      border-left: 5px solid transparent;
      border-right: 5px solid transparent;
      border-bottom: 10px solid <?php echo get_theme_mod('wp_mouse_custom_cursor_color', '#ff0000'); ?>;
      pointer-events: none;
      transform: translate(-35%, -50%) rotate(87deg);
      z-index: 99999999999999;
    }
    #wpcustomcursorid_first.hover{
      width: 45px;
      height: 45px;
      transition: all .1s;
    }
    body,body a{
      cursor:none!important
    }
  </style>  
<?php
}
// Custom Style Third END //

// Custom Style FOUR START//
function wpmousecustom_cursor_function_four(){
?>  
  <style>
    #wpcustomcursorid_first{
      position: absolute;
      height:8px;
      width: 8px;
      transform: translate(-50%, -50%);
      top:50%;
      left: 50%;
      border-radius: 100%;
      background-color: <?php echo get_theme_mod('wp_mouse_custom_cursor_color', '#ff0000'); ?>;
      pointer-events: none;
      z-index: 99999999999999;
      transition: all .1s linear;
    }
    #wpcustomcursorid_first.hover{
      width: 15px;
      height: 15px;
      transition: all .1s;
    }
    body,body a{
      cursor:none!important
    }
  </style>  
<?php
}
// Custom Style FOUR END //


// Custom Style FOUR START//
function wpmousecustom_cursor_function_five(){
?>  
  <style>
    #wpcustomcursorid_first{
      position: absolute;
      height:30px;
      width: 30px;
      transform: translate(-50%, -50%);
      top:50%;
      left: 50%;
      border-radius: 100%;
      background-color: <?php echo get_theme_mod('wp_mouse_custom_cursor_color', '#ff0000'); ?>;
      pointer-events: none;
      z-index: 99999999999999;
      transition: width .1s,height .1s;
    }
    #wpcustomcursorid_first.hover{
      width: 40px;
      height: 40px;
      transition: width .1s,height .1s ;
    }
    body,body a{
      cursor:none!important
    }
  </style>  
<?php
}
// Custom Style FOUR END //

if(function_exists('wpmousecustom_cursor_commonscript')){
  add_action('wp_enqueue_scripts', 'wpmousecustom_add_header');  
    add_action( 'wp_head', 'wpmousecustom_cursor_function_html' ); 
    add_action('wp_head', 'wpmousecustom_cursor_commonscript');     
    function wpmousecustom_cursor_function_html(){
      echo '<div id="wpcustomcursorid_first"></div><div id="wpcustomcursorid_second"></div><div id="wpcustomcursorid_third"></div>';
    } 
    if($mouse_cursor_style=='style1'){
      if(function_exists('wpmousecustom_cursor_function_first')){
        add_action('wp_head', 'wpmousecustom_cursor_function_first');         
      }
  }else if($mouse_cursor_style=='style2'){
    if(function_exists('wpmousecustom_cursor_function_second')){
        add_action('wp_head', 'wpmousecustom_cursor_function_second');   
      }
  }
  else if($mouse_cursor_style=='style3'){
    if(function_exists('wpmousecustom_cursor_function_third')){
        add_action('wp_head', 'wpmousecustom_cursor_function_third');   
      }
  }
  else if($mouse_cursor_style=='style4'){
    if(function_exists('wpmousecustom_cursor_function_four')){
        add_action('wp_head', 'wpmousecustom_cursor_function_four');   
      }
  }
  else if($mouse_cursor_style=='style5'){
    if(function_exists('wpmousecustom_cursor_function_five')){
        add_action('wp_head', 'wpmousecustom_cursor_function_five');   
      }
  }
}

// Customize Appearance Options
function learningWordPress_customize_register( $wp_customize ) { 
  $wp_customize->add_setting( 'wp_mouse_custom_cursor_style', 
     array(
        'default'    => 'default'
     ) 
  );
  $wp_customize->add_section('wp_mouse_custom_cursor_options', array(
    'title' => __('WP Mouse Custom Cursor', 'mytheme'),
    'priority' => 30,
  ));

  $wp_customize->add_control('wp_mouse_custom_cursor_style_control',array(
    'label'    => __( 'Mouse Cursor Style', 'mytheme' ),
    'section'  => 'wp_mouse_custom_cursor_options',
    'settings' => 'wp_mouse_custom_cursor_style',
    'type'     => 'select',
    'choices'  => array(
      'default'  => 'Default',
      'style1' => 'Style1',
      'style2' => 'Style2',
      'style3' => 'Style3',
      'style4' => 'Style4',
      'style5' => 'Style5'
  )));

  $wp_customize->add_setting( 'wp_mouse_custom_cursor_color' , array(
    'default'     => '#ff0000',
    'transport'   => 'refresh',    
  )); 
     
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_mouse_custom_cursor_color', array(
    'label'      => __( 'Mouse Cursor Color', 'mytheme' ),
    'section'    => 'wp_mouse_custom_cursor_options',
    'settings' => 'wp_mouse_custom_cursor_color',
    'show_opacity' => true, 
  )));
}
add_action('customize_register', 'learningWordPress_customize_register');
