<?php

//box shortcode
//--------------------------------------------------------------
function nu_hero_gradient($atts, $content = null) {
  
  //1. create attributes
  extract(shortcode_atts([
    'title' =>'',
    'leftcol' =>'',
    'rightcol' =>''
  ], $atts));
  
  //2. set additional variables if required

  //end variables

  //3. begin output buffer (paste code and variables in here)
  ob_start(); ?>
<div class="nu-hero-gradient">
  <h1 class="nu-title"><?php echo $title; ?></h1>
</div>
 <div class="nu-hero-grey-box">
   <div class="nu-hero-grey-box-left"><?php echo $leftcol; ?></div>
   <div class="nu-hero-grey-box-right"><?php echo $rightcol; ?></div>
 </div>

  <?php return ob_get_clean();
  //end output buffer

}
//end function

//4. add shortcode
add_shortcode('nu_hero_gradient', 'nu_hero_gradient');

//5. register shortcode with fusion builder


function register_nu_hero_gradient() {

  fusion_builder_map( 
      array(
          'name'            => esc_attr__( 'Hero Gradient', 'fusion-builder' ),
          'shortcode'       => 'nu_hero_gradient',
          'icon'       => 'fusiona-newspaper',
          'allow_generator' => true,
          'params'          => array(
              array(
                  'type'        => 'textfield',
                  'heading'     => esc_attr__( 'Title', 'fusion-builder' ),
                  'description' => esc_attr__( 'Title', 'fusion-builder' ),
                  'param_name'  => 'title',
                  'value'       => '',
              ),
              array(
                'type'        => 'tinymce',
                'heading'     => esc_attr__( 'Left Column', 'fusion-builder' ),
                'description' => esc_attr__( 'Left Content', 'fusion-builder' ),
                'param_name'  => 'leftcol',
                'value'       => esc_attr__( 'Click edit button to change this text.', 'fusion-builder' ),
					      'placeholder' => true,
               ),
               array(
                'type'        => 'tinymce',
                'heading'     => esc_attr__( 'Right Column', 'fusion-builder' ),
                'description' => esc_attr__( 'Right Content', 'fusion-builder' ),
                'param_name'  => 'rightcol',
                'value'       => esc_attr__( 'Click edit button to change this text.', 'fusion-builder' ),
					      'placeholder' => true,
               ),
          ),
      ) 
  );
  }
  add_action( 'fusion_builder_before_init', 'register_nu_hero_gradient' );

//--------------------------------------------------------------