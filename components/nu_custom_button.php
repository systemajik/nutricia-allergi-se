<?php

//box shortcode
//--------------------------------------------------------------
function nu_custom_button($atts, $content = null) {
  
  //1. create attributes
  extract(shortcode_atts([
    'text' =>'',
    'url' =>'',
    'target' =>''
  ], $atts));
  
  //2. set additional variables if required

  //end variables

  //3. begin output buffer (paste code and variables in here)
  ob_start(); ?>
  <div class="nu-special-button">
    <a class="nu-button" href="<?php echo $url; ?>" <?php if ($target === 'new'): ?>target="_blank"<?php endif; ?>>
<?php echo $text; ?></a>
  </div>

  <?php return ob_get_clean();
  //end output buffer

}
//end function

//4. add shortcode
add_shortcode('nu_custom_button', 'nu_custom_button');

//5. register shortcode with fusion builder


function register_nu_custom_button() {

  fusion_builder_map( 
      array(
          'name'            => esc_attr__( 'Nutricia Custom Button', 'fusion-builder' ),
          'shortcode'       => 'nu_custom_button',
          'icon'       => 'fusiona-newspaper',
          'allow_generator' => true,
          'params'          => array(
              array(
                  'type'        => 'textfield',
                  'heading'     => esc_attr__( 'Title', 'fusion-builder' ),
                  'description' => esc_attr__( 'Title', 'fusion-builder' ),
                  'param_name'  => 'text',
                  'value'       => '',
              ),
              array(
                'type'        => 'textfield',
                'heading'     => esc_attr__( 'URL', 'fusion-builder' ),
                'description' => esc_attr__( 'Button Link', 'fusion-builder' ),
                'param_name'  => 'url',
                'value'       => esc_attr__( 'Click edit button to change this text.', 'fusion-builder' ),
					      'placeholder' => true,
               ),
               array(
                'type'        => 'radio_button_set',
                'heading'     => esc_attr__( 'Button Target', 'fusion-builder' ),            
                'description' => esc_attr__( 'Choose if link shoud open in  same or new window', 'fusion-builder' ),           
                'param_name'  => 'target',           
                'value'       => array(
                      'same' => esc_attr__( 'Same Window', 'fusion-builder' ),
                      'new'  => esc_attr__( 'New Window', 'fusion-builder' ),
                 ),
              
              )
          ),
      ) 
  );
  }
  add_action( 'fusion_builder_before_init', 'register_nu_custom_button' );

//--------------------------------------------------------------