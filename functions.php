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

function myprefix_mce_buttons_1( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}

add_filter( 'mce_buttons_1', 'myprefix_mce_buttons_1' );

/**
 * Add custom styles to the mce formats dropdown
 *
 * @url https://codex.wordpress.org/TinyMCE_Custom_Styles
 *
 */
function myprefix_add_format_styles( $init_array ) {
	$style_formats = array(
		// Each array child is a format with it's own settings - add as many as you want
		array(
			'title'    => __( 'Theme Button', 'text-domain' ), // Title for dropdown
			'selector' => 'a', // Element to target in editor
			'classes'  => 'theme-button' // Class name used for CSS
		),
		array(
			'title'    => __( 'Highlight', 'text-domain' ), // Title for dropdown
			'inline'   => 'span', // Wrap a span around the selected content
			'classes'  => 'text-highlight' // Class name used for CSS
		),
	);
	$init_array['style_formats'] = json_encode( $style_formats );
	return $init_array;
} 
add_filter( 'tiny_mce_before_init', 'myprefix_add_format_styles' );

function myprefix_theme_add_editor_styles() {
  add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'myprefix_theme_add_editor_styles' );