<?php


//setup
define( 'DR_DEV_MODE', true );



//load shortcodes from individual files

//register and enqueue additional styles and scripts

function dr_enqueue(){
  
  $uri = get_theme_file_uri();
  $ver = DR_DEV_MODE ? time() : false;

  wp_register_style( 'dr_styles', $uri . '/css/dreamatic.css', [], $ver );
  wp_enqueue_style( 'dr_styles' );
}

add_action( 'wp_enqueue_scripts', 'dr_enqueue' );