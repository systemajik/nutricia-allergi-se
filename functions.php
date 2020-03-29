<?php


//setup
define( 'DR_DEV_MODE', true );



//load shortcodes from individual files
require_once(__DIR__ . '/components/nu_hero_image.php');
require_once(__DIR__ . '/components/nu_hero_gradient.php');

//register and enqueue additional styles and scripts

function nu_enqueue(){
  
  $uri = get_theme_file_uri();
  $ver = DR_DEV_MODE ? time() : false;

  wp_register_style( 'nu_styles', $uri . '/css/nutricia.css', [], $ver );
  wp_enqueue_style( 'nu_styles' );
}

add_action( 'wp_enqueue_scripts', 'nu_enqueue' );

//add custom formats to editor

function wpb_mce_buttons_2($buttons) {
  array_unshift($buttons, 'styleselect');
  return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

function my_mce_before_init_insert_formats( $init_array ) {  
    
      $style_formats = array(  

        array(  
          'title' => 'White Text',  
          'block' => 'span',  
          'classes' => 'nu-white',
          'wrapper' => true, 
      ),  
      
  );

  $init_array['style_formats'] = json_encode( $style_formats );  
   
  return $init_array;  

} 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );