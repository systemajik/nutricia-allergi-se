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