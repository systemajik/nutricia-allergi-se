<?php

//box shortcode
//--------------------------------------------------------------
function nu_hero_image($atts, $content = null) {
  
  //1. create attributes
  extract(shortcode_atts([
    'title' =>'',
    'description' =>'',
    'img' =>''
  ], $atts));
  
  //2. set additional variables if required

  //end variables

  //3. begin output buffer (paste code and variables in here)
  ob_start(); ?>

<div class="nu-hero-image">
  <img src="<?php echo $img; ?>"/>
  <h1 class="nu-title"><?php echo $title; ?></h1>
</div>
<div class="nu-hero-box">
    <p class="nu-hero-p"><?php echo $title; ?></p>
</div>

  <?php return ob_get_clean();
  //end output buffer

}
//end function

//4. add shortcode
add_shortcode('nu_hero_image', 'nu_hero_image');

//5. register shortcode with fusion builder


function register_nu_hero_image() {

  fusion_builder_map( 
      array(
          'name'            => esc_attr__( 'Hero Image', 'fusion-builder' ),
          'shortcode'       => 'nu_hero_image',
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
                'type'        => 'textfield',
                'heading'     => esc_attr__( 'Description', 'fusion-builder' ),
                'description' => esc_attr__( 'Description', 'fusion-builder' ),
                'param_name'  => 'description',
                'value'       => '',
              ),
              array(
                'type'        => 'upload',
                'heading'     => esc_attr__( 'Image', 'fusion-builder' ),
                'description' => esc_attr__( 'Attach an image', 'fusion-builder' ),
                'param_name'  => 'img',
                'value'       => '',
               ),
          ),
      ) 
  );
  }
  add_action( 'fusion_builder_before_init', 'register_nu_hero_image' );

//--------------------------------------------------------------