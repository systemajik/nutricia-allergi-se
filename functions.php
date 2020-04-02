<?php


//setup
define( 'DR_DEV_MODE', true );



//load shortcodes from individual files
require_once(__DIR__ . '/components/nu_hero_image.php');
require_once(__DIR__ . '/components/nu_hero_gradient.php');
require_once(__DIR__ . '/components/nu_custom_button.php');


//register and enqueue additional styles and scripts

function nu_enqueue(){
  
  $uri = get_theme_file_uri();
  $ver = DR_DEV_MODE ? time() : false;

  wp_register_style( 'nu_styles', $uri . '/css/nutricia.css', [], $ver );
  wp_enqueue_style( 'nu_styles' );
}

add_action( 'wp_enqueue_scripts', 'nu_enqueue' );


function wpb_mce_buttons_2($buttons) {
  array_unshift($buttons, 'styleselect');
  return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

/*
* Callback function to filter the MCE settings
*/
 
function my_mce_before_init_insert_formats( $init_array ) {  
 
  // Define the style_formats array
   
      $style_formats = array(  
  /*
  * Each array child is a format with it's own settings
  * Notice that each array has title, block, classes, and wrapper arguments
  * Title is the label which will be visible in Formats menu
  * Block defines whether it is a span, div, selector, or inline style
  * Classes allows you to define CSS classes
  * Wrapper whether or not to add a new block-level element around any selected elements
  */
          array(  
              'title' => 'Content Block',  
              'block' => 'span',  
              'classes' => 'content-block',
              'wrapper' => true,
               
          ),  
          array(  
              'title' => 'Blue Button',  
              'block' => 'span',  
              'classes' => 'blue-button',
              'wrapper' => true,
          ),
          array(  
              'title' => 'Red Button',  
              'block' => 'span',  
              'classes' => 'red-button',
              'wrapper' => true,
          ),
      );  
      // Insert the array, JSON ENCODED, into 'style_formats'
      $init_array['style_formats'] = json_encode( $style_formats );  
       
      return $init_array;  
     
  } 
  // Attach callback to 'tiny_mce_before_init' 
  add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 